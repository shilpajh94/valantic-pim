<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use App\Entity\UniProductManagement\UniProductChangeHistory;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Pimcore\Db;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox;
use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
use Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect;
use Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks;
use Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue;
use Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations;
use Pimcore\Model\DataObject\ClassDefinition\Data\Select;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\User;
use Pimcore\Security\User\User as SecurityUser;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UniProductChangeTrackingService
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly EntityManagerInterface $entityManager,
        private readonly TokenStorageInterface $tokenStorage,
    ) {
    }

    /**
     * Track and save changes for an object.
     */
    public function trackAndSaveChanges(AbstractObject $object): void
    {
        $changes = $this->computeChanges($object);

        if ($changes === []) {
            return;
        }

        $this->saveChangeHistory($object, $changes);
    }

    /**
     * Save change history to database.
     *
     * @param array<string, array{old: mixed, new: mixed}> $changes
     */
    private function saveChangeHistory(AbstractObject $object, array $changes): void
    {
        $previousValues = [];
        $newValues = [];
        $fieldLabels = [];

        foreach ($changes as $field => $change) {
            $previousValues[$field] = $this->formatValueForStorage($change['old']);
            $newValues[$field] = $this->formatValueForStorage($change['new']);
            $fieldLabels[$field] = $this->getFieldLabel($object, $field);
        }

        $fieldLabels = $fieldLabels !== [] ? $fieldLabels : [];

        $history = new UniProductChangeHistory();
        $history
            ->setObjectId((string) $object->getId())
            ->setFullObjectPath($object->getFullPath())
            ->setObjectClass($object::class)
            ->setTimestamp(Carbon::now())
            ->setUser($this->getCurrentUserName())
            ->setPreviousValues($previousValues)
            ->setNewValues($newValues)
            ->setFieldLabels($fieldLabels)
        ;

        $this->entityManager->persist($history);
        $this->entityManager->flush();
    }

    /**
     * Get the label for a field.
     */
    private function getFieldLabel(AbstractObject $object, string $field): string
    {
        if (!$object instanceof Concrete) {
            throw new \InvalidArgumentException('The provided object must be a Concrete object.');
        }

        if (str_contains($field, '.')) {
            $parts = explode('.', $field);
            $brickType = $parts[0];

            if (count($parts) === 3 && $parts[1] === 'localized') {
                $fieldName = $parts[2];

                return $this->getBrickFieldLabel($brickType, $fieldName) ?? ucfirst($field);
            }

            if (count($parts) === 3 && $parts[1] === 'relation') {
                $fieldName = $parts[2];

                return $this->getBrickFieldLabel($brickType, $fieldName) ?? ucfirst($field);
            }

            if (count($parts) === 2) {
                $fieldName = $parts[1];

                return $this->getBrickFieldLabel($brickType, $fieldName) ?? ucfirst($field);
            }
        }

        if (str_starts_with($field, 'relation.')) {
            $fieldName = substr($field, 9);
            $classDefinition = ClassDefinition::getByName($object->getClassName());

            if ($classDefinition !== null) {
                $fieldDefinition = $classDefinition->getFieldDefinition($fieldName);
            } else {
                throw new \RuntimeException("Class definition not found for object: {$object->getClassName()}");
            }

            return $fieldDefinition && $fieldDefinition->getTitle() ? $fieldDefinition->getTitle() : ucfirst($fieldName);
        }

        if (str_starts_with($field, 'localized.')) {
            $fieldName = substr($field, 10);
            $classDefinition = ClassDefinition::getByName($object->getClassName());

            if ($classDefinition === null) {
                throw new \RuntimeException("Class definition not found for object: {$object->getClassName()}");
            }

            $localizedFieldDef = $classDefinition->getFieldDefinition('localizedfields');

            if ($localizedFieldDef instanceof Localizedfields) {
                $fieldDefinition = $localizedFieldDef->getFieldDefinition($fieldName);

                return $fieldDefinition && $fieldDefinition->getTitle() ? $fieldDefinition->getTitle() : ucfirst($fieldName);
            }

            return ucfirst($fieldName);
        }

        $classDefinition = ClassDefinition::getByName($object->getClassName());

        if ($classDefinition === null) {
            throw new \RuntimeException("Class definition not found for object: {$object->getClassName()}");
        }

        $fieldDefinition = $classDefinition->getFieldDefinition($field);

        if (!$fieldDefinition instanceof ClassDefinition\Data) {
            return ucfirst($field);
        }

        return !in_array($fieldDefinition->getTitle(), ['', '0'], true) ? $fieldDefinition->getTitle() : ucfirst($field);
    }

    /**
     * Get field label from brick definition.
     */
    private function getBrickFieldLabel(string $brickType, string $fieldName): ?string
    {
        try {
            $brickDefinition = Objectbrick\Definition::getByKey($brickType);

            if (!$brickDefinition instanceof Objectbrick\Definition) {
                return null;
            }

            $fieldDefinition = $brickDefinition->getFieldDefinition($fieldName);

            if ($fieldDefinition instanceof ClassDefinition\Data) {
                return !in_array($fieldDefinition->getTitle(), ['', '0'], true) ? $fieldDefinition->getTitle() : null;
            }

            $localizedFieldDef = $brickDefinition->getFieldDefinition('localizedfields');

            if ($localizedFieldDef instanceof Localizedfields) {
                $fieldDefinition = $localizedFieldDef->getFieldDefinition($fieldName);

                return $fieldDefinition->getTitle() !== null && $fieldDefinition->getTitle() !== '' && $fieldDefinition->getTitle() !== '0'
                    ? $fieldDefinition->getTitle()
                    : null;
            }

            return null;
        } catch (\Exception $e) {
            $this->logger->warning("Could not load brick definition for {$brickType}: " . $e->getMessage());

            return null;
        }
    }

    /**
     * Normalize QuantityValue field data from database.
     */
    private function normalizeQuantityValueFromDb(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_array($value)) {
            $val = $value['value'] ?? null;
            $unit = $value['unit'] ?? null;

            return $this->formatQuantityValue($val, $unit);
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $this->normalizeQuantityValueFromDb($decoded);
            }

            return trim($value);
        }

        return null;
    }

    /**
     * Normalize QuantityValue field data consistently.
     */
    private function normalizeQuantityValue(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_object($value) && method_exists($value, 'getValue') && method_exists($value, 'getUnit')) {
            $val = $value->getValue();
            $unit = $value->getUnit();

            return $this->formatQuantityValue($val, $unit);
        }

        if (is_array($value)) {
            $val = $value['value'] ?? null;
            $unit = $value['unit'] ?? null;

            return $this->formatQuantityValue($val, $unit);
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $this->normalizeQuantityValue($decoded);
            }

            return trim($value);
        }

        return null;
    }

    /**
     * Format QuantityValue consistently for storage and comparison.
     */
    private function formatQuantityValue(mixed $value, mixed $unit): string
    {
        if ($value === null && $unit === null) {
            return '(Empty)';
        }

        $formattedValue = $value !== null ? number_format((float) $value, 4) : '';

        return trim($formattedValue . ' ' . ($unit ?? ''));
    }

    /**
     * Format value for JSON storage.
     */
    private function formatValueForStorage(mixed $value): string
    {
        if ($value === null) {
            return '(Empty)';
        }

        if (is_array($value)) {
            return implode(', ', $value);
        }

        return (string) $value;
    }

    /**
     * Get current authenticated username.
     */
    private function getCurrentUserName(): string
    {
        $token = $this->tokenStorage->getToken();

        if (!$token instanceof TokenInterface || !$token->getUser() instanceof UserInterface) {
            return 'System';
        }

        $user = $token->getUser();

        if (!$user instanceof SecurityUser) {
            return 'System';
        }

        $innerUser = $user->getUser();
        $username = $innerUser->getName() ?? 'Unknown';
        $email = $innerUser->getEmail();

        if ($email !== null && $email !== '' && $email !== '0') {
            return sprintf('%s <%s>', $username, $email);
        }

        return $username;
    }

    /**
     * Compute changes for the current object state.
     *
     * @return array<string, array{old: string, new: string}> Array with field names as keys and formatted change data
     */
    private function computeChanges(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $dirtyFields = $object->getDirtyFields();
        $oldData = $this->getOldDataFromDatabase($object);

        $allFieldsToCheck = $this->getAllFieldsToCheck($object, $dirtyFields, $oldData);

        $newData = [];

        foreach ($allFieldsToCheck as $field) {
            $fieldDefinition = $object->getClass()->getFieldDefinition($field);

            if ($fieldDefinition instanceof Localizedfields) {
                continue;
            }

            $getterMethod = 'get' . ucfirst($field);

            if (!method_exists($object, $getterMethod)) {
                continue;
            }

            $newValue = $object->$getterMethod();

            if ($fieldDefinition instanceof ClassDefinition\Data\Numeric) {
                $newValue = $newValue !== null && $newValue !== '' ? (float) $newValue : null;
            }

            if ($fieldDefinition instanceof QuantityValue) {
                $newValue = $this->normalizeQuantityValue($newValue);

                $this->logger->debug("QuantityValue field {$field} new value", [
                    'raw' => $object->$getterMethod(),
                    'normalized' => $newValue,
                ]);
            }

            $newData[$field] = $fieldDefinition instanceof Select
                ? $this->normalizeSelectValue($fieldDefinition, $newValue)
                : $this->transformSpecialFieldValue($object, $field, $newValue);
        }

        $objectBrickChanges = $this->computeObjectBrickChanges($object);
        $localizedFieldChanges = $this->computeLocalizedFieldChanges($object);
        $brickLocalizedFieldChanges = $this->computeLocalizedFieldChangesInBricks($object);
        $relationFieldChanges = $this->computeRelationFieldChanges($object);

        $standardFieldChanges = [];

        foreach ($allFieldsToCheck as $field) {
            $fieldDefinition = $object->getClass()->getFieldDefinition($field);
            $oldRawValue = $oldData[$field] ?? null;

            if ($fieldDefinition instanceof ClassDefinition\Data\Numeric) {
                $oldRawValue = $oldRawValue !== null && $oldRawValue !== '' ? (float) $oldRawValue : null;
            }

            $oldValue = $fieldDefinition instanceof Select
                ? $this->normalizeSelectValue($fieldDefinition, $oldRawValue)
                : $this->transformSpecialFieldValue($object, $field, $oldRawValue);

            $newValue = $newData[$field] ?? null;

            if ($this->areValuesEquivalent($oldValue, $newValue)) {
                continue;
            }

            $standardFieldChanges[$field] = [
                'old' => $oldValue ?? '(Empty)',
                'new' => $newValue ?? '(Empty)',
            ];
        }

        return array_merge(
            $standardFieldChanges,
            $objectBrickChanges,
            $localizedFieldChanges,
            $brickLocalizedFieldChanges,
            $relationFieldChanges,
        );
    }

    /**
     * Get all fields to check for changes, including numeric and QuantityValue fields that getDirtyFields() might miss.
     *
     * @param array<int, string> $dirtyFields
     * @param array<string, mixed> $oldData
     *
     * @return array<int, string>
     */
    private function getAllFieldsToCheck(AbstractObject $object, array $dirtyFields, array $oldData): array
    {
        if (!$object instanceof Concrete) {
            return $dirtyFields;
        }

        $fieldsToCheck = $dirtyFields;

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            $fieldName = $fieldDefinition->getName();

            if (in_array($fieldName, $dirtyFields, true)) {
                continue;
            }

            if ($fieldDefinition instanceof ClassDefinition\Data\Numeric) {
                $getterMethod = 'get' . ucfirst($fieldName);

                if (!method_exists($object, $getterMethod)) {
                    continue;
                }

                $newValue = $object->$getterMethod();
                $newValue = $newValue !== null && $newValue !== '' ? (float) $newValue : null;

                $oldValue = $oldData[$fieldName] ?? null;
                $oldValue = $oldValue !== null && $oldValue !== '' && is_numeric($oldValue) ? (float) $oldValue : null;

                if ($oldValue !== null && $newValue !== null) {
                    if (abs($oldValue - $newValue) >= 0.0001) {
                        $fieldsToCheck[] = $fieldName;
                    }
                } elseif ($oldValue !== $newValue) {
                    $fieldsToCheck[] = $fieldName;
                }
            }

            if ($fieldDefinition instanceof QuantityValue) {
                $getterMethod = 'get' . ucfirst($fieldName);

                if (!method_exists($object, $getterMethod)) {
                    continue;
                }

                $newValue = $object->$getterMethod();
                $newValue = $this->normalizeQuantityValue($newValue);

                $oldValue = $oldData[$fieldName] ?? null;

                $this->logger->debug("QuantityValue comparison for {$fieldName}", [
                    'old' => $oldValue,
                    'new' => $newValue,
                    'equal' => $oldValue === $newValue,
                ]);

                if ($oldValue !== $newValue) {
                    $fieldsToCheck[] = $fieldName;
                }
            }
        }

        return $fieldsToCheck;
    }

    /**
     * Normalize value for Select fields.
     */
    private function normalizeSelectValue(Select $fieldDefinition, mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        foreach ($fieldDefinition->getOptions() as $option) {
            if ((string) $option['value'] === (string) $value) {
                return $option['key'];
            }
        }

        return (string) $value;
    }

    /**
     * Transform special field values (e.g., "checkbox" or "assignedUser") for better display in history.
     */
    private function transformSpecialFieldValue(AbstractObject $object, string $field, mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if ($field === UniProductCategoryInternal::FIELD_ASSIGNED_USER) {
            $userId = (int) $value;
            $user = User::getById($userId);

            if ($user instanceof User) {
                $username = $user->getName();
                $email = $user->getEmail();

                return sprintf('%s <%s>', $username, $email);
            }

            return sprintf('User ID %d (Not Found)', $userId);
        }

        if ($this->isCheckboxField($object, $field)) {
            return $value === true ? 'Yes' : 'No';
        }

        if (!$object instanceof Concrete) {
            throw new \InvalidArgumentException('The provided object must be a Concrete object.');
        }

        $classDefinition = ClassDefinition::getByName($object->getClassName());

        if (!$classDefinition instanceof ClassDefinition) {
            throw new \RuntimeException("Class definition not found for object: {$object->getClassName()}");
        }

        $fieldDefinition = $classDefinition->getFieldDefinition($field);

        if ($fieldDefinition instanceof ClassDefinition\Data\Numeric) {
            return (string) $value;
        }

        if ($fieldDefinition instanceof QuantityValue) {
            return $this->normalizeQuantityValue($value);
        }

        if ($value instanceof AbstractObject) {
            $name = $value->get('name');

            return $name ? (string) $name : $value->getKey();
        }

        if (is_array($value)) {
            return implode(', ', array_map(fn ($v): ?string => $this->transformSpecialFieldValue($object, $field, $v), $value));
        }

        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        }

        if (is_object($value)) {
            return $value::class;
        }

        return is_scalar($value) ? trim((string) $value) : null;
    }

    /**
     * Generic value transformation for standard fields.
     */
    private function transformValue(mixed $value): ?string
    {
        if ($value === null) {
            return '(Empty)';
        }

        if (is_bool($value)) {
            return $value ? 'Yes' : 'No';
        }

        if (is_array($value)) {
            return implode(', ', array_map([$this, 'transformValue'], $value));
        }

        if ($value instanceof User) {
            $username = $value->getName();
            $email = $value->getEmail();

            return $email !== null && $email !== '' ? "$username <$email>" : $username;
        }

        if ($value instanceof AbstractObject) {
            $name = $value->get('name');

            return $name ? (string) $name : $value->getKey();
        }

        if (is_object($value)) {
            if ($value instanceof \DateTimeInterface) {
                return $value->format('Y-m-d H:i:s');
            }

            return $value::class;
        }

        if (is_string($value)) {
            return trim($value);
        }

        return (string) $value;
    }

    /**
     * Check if a field is a checkbox field.
     */
    private function isCheckboxField(AbstractObject $object, string $field): bool
    {
        if (!$object instanceof Concrete) {
            return false;
        }

        $class = $object->getClass();
        $fieldDefinition = $class->getFieldDefinition($field);

        return $fieldDefinition instanceof Multiselect
            || $fieldDefinition instanceof Select
            || $fieldDefinition instanceof Checkbox;
    }

    /**
     * Compute changes for the object brick.
     *
     * @return array<string, array{old: mixed, new: mixed}>
     */
    private function computeObjectBrickChanges(AbstractObject $object): array
    {
        $changes = [];

        if (!$object instanceof Concrete) {
            return $changes;
        }

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof Objectbricks) {
                continue;
            }

            $fieldName = $fieldDefinition->getName();
            $objectBrickData = $object->get($fieldName);
            $oldBrickData = $this->getOldBrickDataFromDatabase($object, $objectBrickData);

            if (!$objectBrickData) {
                continue;
            }

            foreach ($objectBrickData->getBrickGetters() as $brickGetter) {
                $brick = $objectBrickData->$brickGetter();

                if (!$brick) {
                    continue;
                }

                $brickType = $brick->getType();
                $brickClassDefinition = Objectbrick\Definition::getByKey($brickType);

                foreach ($brickClassDefinition->getFieldDefinitions() as $brickFieldDefinition) {
                    $field = $brickFieldDefinition->getName();

                    if ($brickFieldDefinition instanceof Localizedfields) {
                        continue;
                    }

                    if ($brickFieldDefinition instanceof AbstractRelations) {
                        $this->processRelationFieldChanges($changes, $object, $brick, $brickType, $field);

                        continue;
                    }

                    $this->processRegularFieldChanges($changes, $brick, $brickFieldDefinition, $oldBrickData, $brickType, $field);
                }
            }
        }

        return $changes;
    }

    /**
     * Process changes for relation fields in object bricks.
     *
     * @param array<string, array{old: string, new: string}> $changes
     */
    private function processRelationFieldChanges(
        array &$changes,
        AbstractObject $object,
        Objectbrick\Data\AbstractData $brick,
        string $brickType,
        string $field,
    ): void {
        $fieldname = $brick->getFieldname();
        $oldRelationIds = $this->getBrickRelationIds($object, $fieldname, $field);
        $newRelationValue = $brick->get($field);

        $oldRelationValue = $this->transformRelationIdsToNames($oldRelationIds);
        $newRelationValue = $this->transformRelationObjectsToNames($newRelationValue);

        sort($oldRelationValue);
        sort($newRelationValue);

        if ($oldRelationValue === [] && $newRelationValue === []) {
            return;
        }

        if ($oldRelationValue === $newRelationValue) {
            return;
        }

        $changes["{$brickType}.relation.{$field}"] = [
            'old' => implode(', ', $oldRelationValue),
            'new' => implode(', ', $newRelationValue),
        ];
    }

    /**
     * Process changes for regular (non-relation) fields in object bricks.
     *
     * @param array<string, array{old: mixed, new: mixed}> $changes
     * @param array<string, array<string, mixed>> $oldBrickData
     */
    private function processRegularFieldChanges(
        array &$changes,
        object $brick,
        ClassDefinition\Data $brickFieldDefinition,
        array $oldBrickData,
        string $brickType,
        string $field,
    ): void {
        $rawNewValue = $this->getFieldValue($brickFieldDefinition, $brick, $field);

        $rawOldValue = $oldBrickData[$brickType][$field] ?? null;

        if ($brickFieldDefinition instanceof Checkbox) {
            $newValue = $rawNewValue === true ? 'Yes' : 'No';
            $oldValue = ($rawOldValue === 1 || $rawOldValue === '1' || $rawOldValue === true) ? 'Yes' : 'No';
        } elseif ($brickFieldDefinition instanceof QuantityValue) {
            $newValue = $this->normalizeQuantityValue($rawNewValue);
            $oldValue = $this->normalizeQuantityValueFromDb($rawOldValue);

            $this->logger->debug('QuantityValue brick field comparison', [
                'field' => "{$brickType}.{$field}",
                'raw_old' => $rawOldValue,
                'raw_new' => $rawNewValue,
                'normalized_old' => $oldValue,
                'normalized_new' => $newValue,
            ]);
        } elseif ($brickFieldDefinition instanceof ClassDefinition\Data\Numeric) {
            $newValue = $rawNewValue !== null && $rawNewValue !== '' ? (string) round((float) $rawNewValue, 4) : null;
            $oldValue = $rawOldValue !== null && $rawOldValue !== '' ? (string) round((float) $rawOldValue, 4) : null;
        } elseif ($brickFieldDefinition instanceof ClassDefinition\Data\NumericRange) {
            $newValue = $this->normalizeNumericRange($rawNewValue);
            $oldValue = $rawOldValue;

            $this->logger->debug('NumericRange brick field comparison', [
                'field' => "{$brickType}.{$field}",
                'raw_old' => $rawOldValue,
                'raw_new' => $rawNewValue,
                'normalized_old' => $oldValue,
                'normalized_new' => $newValue,
            ]);
        } else {
            $newValue = $this->normalizeValue($rawNewValue);
            $oldValue = $this->normalizeValue($rawOldValue);
        }

        $this->logger->debug("Comparing brick field '{$brickType}.{$field}'", [
            'old_value' => $oldValue,
            'new_value' => $newValue,
            'is_equal' => $this->areValuesEquivalent($oldValue, $newValue),
        ]);

        if ($this->areValuesEquivalent($oldValue, $newValue)) {
            return;
        }

        $changes["{$brickType}.{$field}"] = [
            'old' => $oldValue ?? '(Empty)',
            'new' => $newValue ?? '(Empty)',
        ];
    }

    /**
     * Normalize a NumericRange field from the object.
     */
    private function normalizeNumericRange(?\Pimcore\Model\DataObject\Data\NumericRange $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $minimum = $value->getMinimum();
        $maximum = $value->getMaximum();

        return sprintf(
            '%s to %s',
            $this->formatNumericValue($minimum),
            $this->formatNumericValue($maximum),
        );
    }

    /**
     * Format a numeric value for consistent comparison.
     */
    private function formatNumericValue(?float $value): string
    {
        if ($value === null) {
            return '(Empty)';
        }

        return fmod($value, 1) === 0.0 ? (string) (int) $value : number_format($value, 4);
    }

    /**
     * Extract the value of a field based on its type.
     */
    private function getFieldValue(mixed $fieldDefinition, object $brick, string $field): mixed
    {
        if ($fieldDefinition instanceof AbstractRelations) {
            return $this->extractRelations($brick->get($field));
        }

        return $brick->get($field);
    }

    /**
     * Normalize values for comparison.
     *
     * @return array<int, string>|string|object|null
     */
    private function normalizeValue(mixed $value): array|string|object|null
    {
        if (is_array($value)) {
            return array_map('strval', array_values($value));
        }

        if (is_string($value)) {
            if (preg_match('/^,.*,$/', $value)) {
                $value = explode(',', trim($value, ','));

                return array_map('strval', $value);
            }

            return trim($value);
        }

        if (is_object($value)) {
            return $value;
        }

        return $value !== null ? (string) $value : null;
    }

    /**
     * Compare old and new values for equivalence.
     */
    private function areValuesEquivalent(mixed $oldValue, mixed $newValue): bool
    {
        if ($oldValue === $newValue) {
            return true;
        }

        if ($oldValue === null && $newValue === null) {
            return true;
        }

        if ($oldValue === null || $newValue === null) {
            if ($oldValue === '(Empty)' && $newValue === null) {
                return true;
            }

            if ($oldValue === null && $newValue === '(Empty)') {
                return true;
            }

            return false;
        }

        if (is_string($oldValue) && is_string($newValue) && str_contains($oldValue, 'to') && str_contains($newValue, 'to')) {
            return trim($oldValue) === trim($newValue);
        }

        if (is_numeric($oldValue) && is_numeric($newValue)) {
            return abs((float) $oldValue - (float) $newValue) < 0.0001;
        }

        if (is_array($oldValue) && is_array($newValue)) {
            sort($oldValue);
            sort($newValue);

            return $oldValue === $newValue;
        }

        if (is_scalar($oldValue) && is_scalar($newValue)) {
            return trim((string) $oldValue) === trim((string) $newValue);
        }

        return false;
    }

    /**
     * Compute changes for localized fields inside object bricks.
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function computeLocalizedFieldChangesInBricks(AbstractObject $object): array
    {
        $changes = [];

        if (!$object instanceof Concrete) {
            return $changes;
        }

        $localizedBrickData = $this->getOldLocalizedBrickDataFromDatabase($object);

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if (!($fieldDefinition instanceof Objectbricks)) {
                continue;
            }

            $fieldName = $fieldDefinition->getName();
            $objectBrickData = $object->get($fieldName);

            if (!$objectBrickData) {
                continue;
            }

            $brickChanges = $this->processBrickData($objectBrickData, $localizedBrickData);
            $changes = array_merge($changes, $brickChanges);
        }

        return $changes;
    }

    /**
     * Process data from object bricks and handle localized fields if they exist.
     *
     * @param array<string, mixed> $localizedBrickData
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function processBrickData(Objectbrick $objectBrickData, array $localizedBrickData): array
    {
        $changes = [];

        foreach ($objectBrickData->getBrickGetters() as $brickGetter) {
            $brick = $objectBrickData->$brickGetter();

            if (!$brick) {
                continue;
            }

            $brickType = $brick->getType();

            if (!$this->doesBrickHaveLocalizedFields($brick)) {
                $this->logger->debug("Skipping brick: {$brickType} (no localizedfields defined in its structure).");

                continue;
            }

            $brickChanges = $this->processBrickLocalizedFields($brick, $localizedBrickData);
            $changes = array_merge($changes, $brickChanges);
        }

        return $changes;
    }

    /**
     * Check if the given brick contains localized fields in its definition.
     */
    private function doesBrickHaveLocalizedFields(Objectbrick\Data\AbstractData $brick): bool
    {
        $brickDefinition = Objectbrick\Definition::getByKey($brick->getType());

        if (!$brickDefinition instanceof Objectbrick\Definition) {
            $this->logger->warning("Brick definition not found for brick type: {$brick->getType()}");

            return false;
        }

        $localizedFieldDef = $brickDefinition->getFieldDefinition('localizedfields');

        return $localizedFieldDef instanceof Localizedfields;
    }

    /**
     * Process localized fields for a specific brick.
     *
     * @param array<string, mixed> $localizedBrickData
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function processBrickLocalizedFields(
        Objectbrick\Data\AbstractData $brick,
        array $localizedBrickData,
    ): array {
        $changes = [];

        $localizedFields = $brick->get('localizedfields');

        if (!$localizedFields instanceof \Pimcore\Model\DataObject\Localizedfield) {
            $this->logger->debug("Localizedfields not found for brick: {$brick->getType()}. Skipping.");

            return $changes;
        }

        $newLocalizedFields = $localizedFields->getItems();
        $brickType = $brick->getType();

        $fieldChanges = [];

        foreach ($newLocalizedFields as $language => $newFields) {
            $oldFields = $this->getOldFieldsForLanguage($localizedBrickData, $brickType, $language);
            $normalizedOldFields = $this->normalizeOldFields([$language => ['levelSpecificData' => $oldFields]]);
            $normalizedOldFields = $normalizedOldFields[$language] ?? [];

            $languageChanges = $this->compareFieldValues($newFields, $normalizedOldFields, $language);
            $fieldChanges = $this->mergeFieldChanges($fieldChanges, $languageChanges);
        }

        foreach ($fieldChanges as $fieldName => $languageChanges) {
            if (!empty($languageChanges['old']) || !empty($languageChanges['new'])) {
                $changes["{$brickType}.localized.{$fieldName}"] = [
                    'old' => $this->formatLocalizedValues($languageChanges['old']),
                    'new' => $this->formatLocalizedValues($languageChanges['new']),
                ];
            }
        }

        return $changes;
    }

    /**
     * Get old fields for a specific language.
     *
     * @param array<string, mixed> $localizedBrickData
     *
     * @return array<string, mixed>
     */
    private function getOldFieldsForLanguage(array $localizedBrickData, string $brickType, string $language): array
    {
        return $localizedBrickData[$brickType]['localized'][$language]['levelSpecificData'] ?? [];
    }

    /**
     * Compare field values between new and old.
     *
     * @param array<string, mixed> $newFields
     * @param array<string, mixed> $normalizedOldFields
     *
     * @return array<string, array{old: array<string, mixed>, new: array<string, mixed>}>
     */
    private function compareFieldValues(array $newFields, array $normalizedOldFields, string $language): array
    {
        $fieldChanges = [];

        foreach ($newFields as $fieldName => $newValue) {
            $oldValue = $normalizedOldFields[$fieldName] ?? null;

            if ($this->shouldSkipBrickField($fieldName)) {
                continue;
            }

            if ($this->hasFieldChanged($oldValue, $newValue)) {
                $fieldChanges[$fieldName]['old'][$language] = $oldValue;
                $fieldChanges[$fieldName]['new'][$language] = $newValue;
            }
        }

        foreach ($normalizedOldFields as $fieldName => $oldValue) {
            if (array_key_exists($fieldName, $newFields) || $this->shouldSkipBrickField($fieldName)) {
                continue;
            }
            $newValue = null;

            if ($this->hasFieldChanged($oldValue, $newValue)) {
                $fieldChanges[$fieldName]['old'][$language] = $oldValue;
                $fieldChanges[$fieldName]['new'][$language] = $newValue;
            }
        }

        return $fieldChanges;
    }

    /**
     * Merge field changes arrays.
     *
     * @param array<string, array{old: array<mixed>, new: array<mixed>}> $existing
     * @param array<string, array{old: array<mixed>, new: array<mixed>}> $new
     *
     * @return array<string, array{old: array<mixed>, new: array<mixed>}>
     */
    private function mergeFieldChanges(array $existing, array $new): array
    {
        foreach ($new as $fieldName => $changes) {
            if (!isset($existing[$fieldName])) {
                $existing[$fieldName] = ['old' => [], 'new' => []];
            }

            $existing[$fieldName]['old'] = array_merge($existing[$fieldName]['old'], $changes['old']);
            $existing[$fieldName]['new'] = array_merge($existing[$fieldName]['new'], $changes['new']);
        }

        return $existing;
    }

    /**
     * Check if a field has actually changed.
     */
    private function hasFieldChanged(mixed $oldValue, mixed $newValue): bool
    {
        if ($this->shouldSkipChange($oldValue, $newValue)) {
            return false;
        }

        if (is_array($oldValue) && is_array($newValue)) {
            sort($oldValue);
            sort($newValue);

            return $oldValue !== $newValue;
        }

        if (is_string($oldValue) && is_array($newValue)) {
            $oldAsArray = array_map('trim', explode(',', $oldValue));
            sort($oldAsArray);
            sort($newValue);

            return $oldAsArray !== $newValue;
        }

        if (is_array($oldValue) && is_string($newValue)) {
            $newAsArray = array_map('trim', explode(',', $newValue));
            sort($oldValue);
            sort($newAsArray);

            return $oldValue !== $newAsArray;
        }

        return $oldValue !== $newValue;
    }

    /**
     * Check if a change should be skipped.
     */
    private function shouldSkipChange(mixed $oldValue, mixed $newValue): bool
    {
        $oldEmpty = $oldValue === null || $oldValue === '' || $oldValue === [];
        $newEmpty = $newValue === null || $newValue === '' || $newValue === [];

        return $oldEmpty && $newEmpty;
    }

    /**
     * Determine which brick fields should be skipped from change tracking.
     */
    private function shouldSkipBrickField(string $fieldName): bool
    {
        $fieldsToSkip = [
            'index',
        ];

        return in_array($fieldName, $fieldsToSkip, true);
    }

    /**
     * Normalize the old `levelSpecificData` format.
     *
     * @param array<string, mixed> $oldFields
     *
     * @return array<string, array<string, mixed>>
     */
    private function normalizeOldFields(array $oldFields): array
    {
        $normalized = [];

        foreach ($oldFields as $locale => $data) {
            if (!isset($data['levelSpecificData'])) {
                continue;
            }

            $levelSpecificData = $data['levelSpecificData'];
            $normalized[$locale] = [];

            foreach ($levelSpecificData as $fieldName => $fieldValue) {
                $normalized[$locale][$fieldName] = $this->normalizeFieldValue($fieldValue);
            }
        }

        return $normalized;
    }

    /**
     * Normalize field value based on its type and content.
     */
    private function normalizeFieldValue(mixed $value): mixed
    {
        if ($value === null || is_array($value)) {
            return $value;
        }

        if (is_string($value) && str_contains($value, ',')) {
            return array_map('trim', explode(',', $value));
        }

        if (is_string($value) && $this->shouldBeArray()) {
            return [$value];
        }

        return $value;
    }

    /**
     * Determine if a string value should be converted to an array.
     */
    private function shouldBeArray(): bool
    {
        return false;
    }

    /**
     * Compute changes for relation fields.
     *
     * @return array<string, array{old: list<string>, new: list<string>}>
     */
    private function computeRelationFieldChanges(AbstractObject $object): array
    {
        $changes = [];

        if (!$object instanceof Concrete) {
            return $changes;
        }

        $oldRelationData = $this->getOldRelationDataFromDatabase($object);

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if ($fieldDefinition instanceof AbstractRelations) {
                $fieldName = $fieldDefinition->getName();
                $relations = $object->get($fieldName);

                $newValue = $this->transformRelationObjectsToNames($relations);
                $oldValue = $this->transformRelationIdsToNames($oldRelationData[$fieldName] ?? []);

                if ($oldValue !== $newValue) {
                    $changes["relation.{$fieldName}"] = [
                        'old' => $oldValue,
                        'new' => $newValue,
                    ];
                }
            }
        }

        return $changes;
    }

    /**
     * Transform relation objects to their names.
     *
     * @return list<string>
     */
    private function transformRelationObjectsToNames(mixed $relations): array
    {
        if (!$relations) {
            return [];
        }

        return array_map(function ($relatedObject) {
            if ($relatedObject instanceof AbstractObject) {
                return $relatedObject->get('name') ?: $relatedObject->getKey();
            }

            return (string) $relatedObject;
        }, is_array($relations) ? $relations : [$relations]);
    }

    /**
     * Transform relation IDs to object names.
     *
     * @param array<mixed>|string|null $relationIds
     *
     * @return list<string>
     */
    private function transformRelationIdsToNames(array|string|null $relationIds): array
    {
        if (is_string($relationIds)) {
            $relationIds = explode(',', $relationIds);
        } elseif ($relationIds === null) {
            $relationIds = [];
        }

        $relationIds = array_filter($relationIds, fn ($id): bool => !empty($id) && is_numeric($id));

        $names = [];

        foreach ($relationIds as $relationId) {
            $relatedObject = AbstractObject::getById($relationId);

            if ($relatedObject instanceof AbstractObject) {
                $names[] = $relatedObject->get('name') ?: $relatedObject->getKey();
            } else {
                $names[] = "Unknown Reference (Object ID $relationId)";
            }
        }

        return $names;
    }

    /**
     * Helper function to extract relation IDs from a relation field.
     *
     * @return list<mixed>
     */
    private function extractRelations(mixed $relations): array
    {
        if (!$relations) {
            return [];
        }

        return array_map(
            fn ($relatedObject) => $relatedObject instanceof AbstractObject ? $relatedObject->getId() : $relatedObject,
            is_array($relations) ? $relations : [$relations],
        );
    }

    /**
     * Retrieve the original data of an object from the database.
     *
     * @return array<string, mixed>
     */
    private function getOldDataFromDatabase(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $classDefinition = ClassDefinition::getByName($object->getClassName());

        if (!$classDefinition instanceof ClassDefinition) {
            return [];
        }

        $tableName = 'object_' . $classDefinition->getId();
        $sql = "SELECT * FROM $tableName WHERE oo_id = :id";

        $oldData = Db::get()->fetchAssociative($sql, ['id' => $object->getId()]) ?: [];

        foreach ($classDefinition->getFieldDefinitions() as $fieldDefinition) {
            $fieldName = $fieldDefinition->getName();

            if (!array_key_exists($fieldName, $oldData)) {
                continue;
            }

            if ($fieldDefinition instanceof ClassDefinition\Data\Numeric) {
                $value = $oldData[$fieldName];
                $oldData[$fieldName] = ($value !== null && $value !== '' && is_numeric($value))
                    ? (float) $value
                    : null;
            }

            if ($fieldDefinition instanceof QuantityValue) {
                $value = $oldData[$fieldName];

                $valueColumn = $fieldName . '__value';
                $unitColumn = $fieldName . '__unit';

                if (isset($oldData[$valueColumn]) || isset($oldData[$unitColumn])) {
                    $parts = [];

                    if (isset($oldData[$valueColumn]) && $oldData[$valueColumn] !== null && $oldData[$valueColumn] !== '') {
                        $parts[] = (string) $oldData[$valueColumn];
                    }

                    if (isset($oldData[$unitColumn]) && $oldData[$unitColumn] !== null && $oldData[$unitColumn] !== '') {
                        $parts[] = (string) $oldData[$unitColumn];
                    }
                    $oldData[$fieldName] = $parts !== [] ? implode(' ', $parts) : null;
                } elseif ($value === null || $value === '') {
                    $oldData[$fieldName] = null;
                } else {
                    $normalized = $this->normalizeQuantityValue($value);
                    $oldData[$fieldName] = $normalized;
                }

                $this->logger->debug("QuantityValue field {$fieldName} old value from DB", [
                    'has_value_column' => isset($oldData[$valueColumn]),
                    'has_unit_column' => isset($oldData[$unitColumn]),
                    'value_column' => $oldData[$valueColumn] ?? null,
                    'unit_column' => $oldData[$unitColumn] ?? null,
                    'main_column' => $value,
                    'normalized' => $oldData[$fieldName],
                ]);
            }
        }

        return $oldData;
    }

    /**
     * Retrieve localized field data for bricks.
     *
     * @return array<string, array<string, mixed>>
     */
    private function getOldLocalizedBrickDataFromDatabase(AbstractObject $object): array
    {
        $data = [];

        if (!$object instanceof Concrete) {
            return $data;
        }

        $classDefinition = $object->getClass();

        foreach ($classDefinition->getFieldDefinitions() as $fieldDefinition) {
            if (!($fieldDefinition instanceof Objectbricks)) {
                continue;
            }

            foreach ($fieldDefinition->getAllowedTypes() as $brickType) {
                $classId = $classDefinition->getId();
                $objectId = $object->getId();
                $localizedTableName = "object_brick_localized_{$brickType}_{$classId}";

                $localizedSql = "SELECT * FROM $localizedTableName WHERE ooo_id = :id";

                try {
                    $localizedRows = Db::get()->fetchAllAssociative($localizedSql, ['id' => $objectId]);
                } catch (\Exception $e) {
                    $this->logger->warning("Localized table for {$brickType} not found: " . $e->getMessage());

                    continue;
                }

                foreach ($localizedRows as $localizedRow) {
                    $language = $localizedRow['language'];
                    $fieldname = $localizedRow['fieldname'];
                    unset($localizedRow['ooo_id'], $localizedRow['language'], $localizedRow['fieldname']);

                    $data[$brickType]['localized'][$language][$fieldname] = $localizedRow;
                }
            }
        }

        return $data;
    }

    /**
     * Retrieve relation field data of an object from the database.
     *
     * @return array<string, list<mixed>>
     */
    private function getOldRelationDataFromDatabase(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $classDefinition = ClassDefinition::getByName($object->getClassName());

        if (!$classDefinition instanceof ClassDefinition) {
            return [];
        }

        $tableName = 'object_relations_' . $classDefinition->getId();
        $sql = "SELECT * FROM $tableName WHERE src_id = :id";
        $rows = Db::get()->fetchAllAssociative($sql, ['id' => $object->getId()]);

        $data = [];

        foreach ($rows as $row) {
            $data[$row['fieldname']][] = $row['dest_id'];
        }

        return $data;
    }

    /**
     * Retrieve old brick data from the database and normalize it.
     *
     * @return array<string, array<string, mixed>>
     */
    private function getOldBrickDataFromDatabase(AbstractObject $object, ?Objectbrick $objectBrickData): array
    {
        $data = [];

        if (!$object instanceof Concrete || !$objectBrickData instanceof Objectbrick) {
            return $data;
        }

        foreach ($objectBrickData->getBrickGetters() as $brickGetter) {
            $brick = $objectBrickData->$brickGetter();

            if (!$brick) {
                continue;
            }

            $brickType = $brick->getType();
            $classId = $object->getClass()->getId();
            $objectId = $object->getId();

            $tableName = "object_brick_query_{$brickType}_{$classId}";
            $sql = "SELECT * FROM $tableName WHERE id = :id AND fieldname = :fieldname";

            try {
                $row = Db::get()->fetchAssociative($sql, [
                    'id' => $objectId,
                    'fieldname' => $brick->getFieldname(),
                ]);

                if (!$row) {
                    continue;
                }
                unset($row['fieldname'], $row['id']);

                foreach ($row as $field => $value) {
                    if (str_ends_with($field, '__minimum') || str_ends_with($field, '__maximum')) {
                        $mainField = explode('__', $field)[0];

                        if (!isset($data[$brickType][$mainField])) {
                            $data[$brickType][$mainField] = [
                                'minimum' => null,
                                'maximum' => null,
                            ];
                        }

                        if (str_ends_with($field, '__minimum')) {
                            $data[$brickType][$mainField]['minimum'] = $value !== null && $value !== '' ? round((float) $value, 4) : null;
                        } elseif (str_ends_with($field, '__maximum')) {
                            $data[$brickType][$mainField]['maximum'] = $value !== null && $value !== '' ? round((float) $value, 4) : null;
                        }
                    } else {
                        $data[$brickType][$field] = $value;
                    }
                }
            } catch (\Exception $e) {
                $this->logger->warning("Error retrieving brick data for {$brickType}: " . $e->getMessage());
            }
        }

        foreach ($data as $brickType => $brickFields) {
            foreach ($brickFields as $field => $value) {
                if (is_array($value) && isset($value['minimum'], $value['maximum'])) {
                    $data[$brickType][$field] = $this->normalizeNumericRangeFromDb($value);
                }
            }
        }

        return $data;
    }

    /**
     * Normalize NumericRange field data from the database.
     *
     * @param array{minimum: float, maximum: float}|null $value
     */
    private function normalizeNumericRangeFromDb(?array $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $minimum = round($value['minimum'], 4);
        $maximum = round($value['maximum'], 4);

        return sprintf('%s to %s', $minimum, $maximum);
    }

    /**
     * Compute changes for localized fields in normal data objects.
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function computeLocalizedFieldChanges(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $localizedFieldData = $this->getOldLocalizedFieldDataFromDatabase($object);
        $changes = [];

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof Localizedfields) {
                continue;
            }

            $localizedFields = $object->get($fieldDefinition->getName());

            if (!$localizedFields) {
                continue;
            }

            $fieldChanges = $this->processLocalizedFieldChanges($localizedFields, $localizedFieldData);

            if ($fieldChanges === []) {
                continue;
            }

            $this->formatFieldChanges($fieldChanges, $changes);
        }

        return $changes;
    }

    /**
     * @param object $localizedFields
     * @param array<string, array<string, mixed>> $localizedFieldData
     *
     * @return array<string, array{old: array<string, mixed>, new: array<string, mixed>}>
     */
    private function processLocalizedFieldChanges($localizedFields, array $localizedFieldData): array
    {
        $fieldChanges = [];

        foreach ($localizedFields->getItems() as $language => $newFields) {
            $oldFields = $localizedFieldData[$language] ?? [];

            foreach ($newFields as $fieldName => $newValue) {
                $oldValue = $oldFields[$fieldName] ?? null;

                $newValue = $this->normalizeValue($newValue);
                $oldValue = $this->normalizeValue($oldValue);

                if ($this->areValuesEquivalent($oldValue, $newValue)) {
                    continue;
                }

                if (!isset($fieldChanges[$fieldName])) {
                    $fieldChanges[$fieldName] = ['old' => [], 'new' => []];
                }

                $fieldChanges[$fieldName]['old'][$language] = $oldValue;
                $fieldChanges[$fieldName]['new'][$language] = $newValue;
            }
        }

        return $fieldChanges;
    }

    /**
     * @param array<string, array{old: mixed, new: mixed}> $fieldChanges
     * @param array<string, array{old: mixed, new: mixed}> $changes
     */
    private function formatFieldChanges(array $fieldChanges, array &$changes): void
    {
        foreach ($fieldChanges as $fieldName => $languageChanges) {
            $oldFormatted = $this->formatLocalizedValues($languageChanges['old']);
            $newFormatted = $this->formatLocalizedValues($languageChanges['new']);

            $changes["localized.{$fieldName}"] = [
                'old' => $oldFormatted,
                'new' => $newFormatted,
            ];
        }
    }

    /**
     * Get old localized field data from database.
     *
     * @return array<string, array<string, mixed>>
     */
    private function getOldLocalizedFieldDataFromDatabase(AbstractObject $object): array
    {
        $data = [];

        if (!$object instanceof Concrete) {
            return $data;
        }

        $objectId = $object->getId();
        $classDefinition = $object->getClass();
        $tableName = 'object_localized_data_' . $classDefinition->getId();
        $localizedSql = "SELECT * FROM {$tableName} WHERE ooo_id = :id";

        try {
            $rows = Db::get()->fetchAllAssociative($localizedSql, ['id' => $objectId]);
        } catch (\Exception $e) {
            $this->logger->warning('Localized table for normal fields not found: ' . $e->getMessage());

            return $data;
        }

        foreach ($rows as $row) {
            $language = $row['language'];
            unset($row['ooo_id'], $row['language']);
            $data[$language] = $row;
        }

        return $data;
    }

    /**
     * Format localized values as a string.
     *
     * @param array<string, string|array<int|string, mixed>|null> $languageValues
     */
    private function formatLocalizedValues(array $languageValues): ?string
    {
        if ($languageValues === []) {
            return null;
        }

        $formatted = [];

        foreach ($languageValues as $language => $value) {
            if (is_array($value)) {
                $stringValues = array_filter(
                    array_map('strval', $value),
                    static fn ($v): bool => $v !== '',
                );
                $value = implode(', ', $stringValues);
            }

            if (!empty($value) && is_string($language)) {
                $formatted[] = strtoupper($language) . ': ' . $value;
            }
        }

        return $formatted !== [] ? implode(', ', $formatted) : null;
    }

    /**
     * Get relation IDs for a specific brick field.
     *
     * @return array<int, int>
     */
    private function getBrickRelationIds(AbstractObject $object, string $brickFieldname, string $relationField): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $classId = $object->getClass()->getId();
        $tableName = 'object_relations_' . $classId;

        $fullFieldname = $brickFieldname . '~' . $relationField;

        $sql = "SELECT dest_id FROM $tableName WHERE src_id = :objectId AND fieldname = :fieldname ORDER BY `index`";

        try {
            $rows = Db::get()->fetchAllAssociative($sql, [
                'objectId' => $object->getId(),
                'fieldname' => $fullFieldname,
            ]);

            if ($rows === []) {
                $rows = Db::get()->fetchAllAssociative($sql, [
                    'objectId' => $object->getId(),
                    'fieldname' => $relationField,
                ]);
            }

            return array_map(fn ($row): int => (int) $row['dest_id'], $rows);
        } catch (\Exception $e) {
            $this->logger->warning('Error fetching brick relations: ' . $e->getMessage());

            return [];
        }
    }
}
