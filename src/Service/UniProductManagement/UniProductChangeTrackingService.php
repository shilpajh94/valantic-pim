<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use App\Entity\UniProductManagement\UniProductChangeHistory;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Pimcore\Db;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Image as AssetImage;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox;
use Pimcore\Model\DataObject\ClassDefinition\Data\Image;
use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
use Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect;
use Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks;
use Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue;
use Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations;
use Pimcore\Model\DataObject\ClassDefinition\Data\Select;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\NumericRange;
use Pimcore\Model\DataObject\Fieldcollection;
use Pimcore\Model\DataObject\Fieldcollection\Definition;
use Pimcore\Model\DataObject\Localizedfield;
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
    private const EMPTY_VALUE = '(Empty)';
    private const NUMERIC_PRECISION = 0.0001;
    private const DECIMAL_PLACES = 4;
    private const FIELDS_TO_SKIP = ['index', 'userModification', 'modificationDate', 'userOwner', 'creationDate'];

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly EntityManagerInterface $entityManager,
        private readonly TokenStorageInterface $tokenStorage,
    ) {
    }

    public function trackAndSaveChanges(AbstractObject $object): void
    {
        $changes = $this->computeChanges($object);

        if ($changes === []) {
            return;
        }

        $this->saveChangeHistory($object, $changes);
    }

    /**
     * @param array<string, array{old: mixed, new: mixed}> $changes
     */
    public function saveChangeHistory(AbstractObject $object, array $changes): void
    {
        $previousValues = [];
        $newValues = [];
        $fieldLabels = [];

        foreach ($changes as $field => $change) {
            $previousValues[$field] = $this->formatValueForStorage($change['old']);
            $newValues[$field] = $this->formatValueForStorage($change['new']);
            $fieldLabels[$field] = $this->getFieldLabel($object, $field);
        }

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
     * @return array<string, array{old: string, new: string}>
     */
    public function computeChanges(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $dirtyFields = $object->getDirtyFields();
        $oldData = $this->getOldDataFromDatabase($object);
        $allFieldsToCheck = $this->getAllFieldsToCheck($object, $dirtyFields, $oldData);

        $newData = $this->collectNewFieldData($object, $allFieldsToCheck);
        $standardFieldChanges = $this->compareStandardFields($object, $allFieldsToCheck, $oldData, $newData);

        $objectBrickChanges = $this->computeObjectBrickChanges($object);
        $localizedFieldChanges = $this->computeLocalizedFieldChanges($object);
        $brickLocalizedFieldChanges = $this->computeLocalizedFieldChangesInBricks($object);
        $relationFieldChanges = $this->computeRelationFieldChanges($object);

        $fieldCollectionChanges = $this->computeFieldCollectionChanges($object);
        $fieldCollectionLocalizedChanges = $this->computeLocalizedFieldChangesInFieldCollections($object);

        return array_merge(
            $standardFieldChanges,
            $objectBrickChanges,
            $localizedFieldChanges,
            $brickLocalizedFieldChanges,
            $relationFieldChanges,
            $fieldCollectionChanges,
            $fieldCollectionLocalizedChanges,
        );
    }

    private function getFieldLabel(AbstractObject $object, string $field): string
    {
        if (!$object instanceof Concrete) {
            throw new \InvalidArgumentException('The provided object must be a Concrete object.');
        }

        if (preg_match('/^([^[]+)\[(\d+)\]\.(.+)$/', $field, $matches)) {
            $fcType = $matches[1];
            $index = $matches[2];
            $fieldPath = $matches[3];

            return $this->getFieldCollectionFieldLabel($fcType, $fieldPath);
        }

        if (str_contains($field, '.') && !str_starts_with($field, 'localized.') && !str_starts_with($field, 'relation.')) {
            return $this->getBrickFieldLabel($field);
        }

        if (str_starts_with($field, 'relation.')) {
            return $this->getRelationFieldLabel($object, substr($field, 9));
        }

        if (str_starts_with($field, 'localized.')) {
            return $this->getLocalizedFieldLabel($object, substr($field, 10));
        }

        return $this->getStandardFieldLabel($object, $field);
    }

    private function getBrickFieldLabel(string $field): string
    {
        $parts = explode('.', $field);
        $brickType = $parts[0];

        if (count($parts) === 3 && in_array($parts[1], ['localized', 'relation'], true)) {
            $fieldName = $parts[2];

            return $this->getBrickFieldLabelFromDefinition($brickType, $fieldName) ?? ucfirst($field);
        }

        if (count($parts) === 2) {
            $fieldName = $parts[1];

            return $this->getBrickFieldLabelFromDefinition($brickType, $fieldName) ?? ucfirst($field);
        }

        return ucfirst($field);
    }

    private function getBrickFieldLabelFromDefinition(string $brickType, string $fieldName): ?string
    {
        try {
            $brickDefinition = Objectbrick\Definition::getByKey($brickType);

            if (!$brickDefinition instanceof Objectbrick\Definition) {
                return null;
            }

            $fieldDefinition = $brickDefinition->getFieldDefinition($fieldName);

            if ($fieldDefinition instanceof ClassDefinition\Data) {
                return $this->extractFieldTitle($fieldDefinition);
            }

            $localizedFieldDef = $brickDefinition->getFieldDefinition('localizedfields');

            if ($localizedFieldDef instanceof Localizedfields) {
                $fieldDefinition = $localizedFieldDef->getFieldDefinition($fieldName);

                return $fieldDefinition instanceof ClassDefinition\Data ? $this->extractFieldTitle($fieldDefinition) : null;
            }

            return null;
        } catch (\Exception $e) {
            $this->logger->warning("Could not load brick definition for {$brickType}: " . $e->getMessage());

            return null;
        }
    }

    private function getRelationFieldLabel(AbstractObject $object, string $fieldName): string
    {
        $classDefinition = $this->getClassDefinition($object);
        $fieldDefinition = $classDefinition->getFieldDefinition($fieldName);

        return $fieldDefinition instanceof ClassDefinition\Data ? $this->extractFieldTitle($fieldDefinition) : ucfirst($fieldName);
    }

    private function getLocalizedFieldLabel(AbstractObject $object, string $fieldName): string
    {
        if (!$object instanceof Concrete) {
            return ucfirst($fieldName);
        }

        $classDefinition = $this->getClassDefinition($object);
        $localizedFieldDef = $classDefinition->getFieldDefinition('localizedfields');

        if ($localizedFieldDef instanceof Localizedfields) {
            $fieldDefinition = $localizedFieldDef->getFieldDefinition($fieldName);

            if ($fieldDefinition instanceof ClassDefinition\Data) {
                return $this->extractFieldTitle($fieldDefinition);
            }
        }

        return ucfirst($fieldName);
    }

    private function getStandardFieldLabel(AbstractObject $object, string $field): string
    {
        $classDefinition = $this->getClassDefinition($object);
        $fieldDefinition = $classDefinition->getFieldDefinition($field);

        if (!$fieldDefinition instanceof ClassDefinition\Data) {
            return ucfirst($field);
        }

        return $this->extractFieldTitle($fieldDefinition);
    }

    private function extractFieldTitle(ClassDefinition\Data $fieldDefinition): string
    {
        $title = $fieldDefinition->getTitle();

        return $title !== '' && $title !== '0' ? $title : ucfirst($fieldDefinition->getName());
    }

    private function getClassDefinition(AbstractObject $object): ClassDefinition
    {
        if (!$object instanceof Concrete) {
            throw new \InvalidArgumentException('The provided object must be a Concrete object.');
        }

        return $object->getClass();
    }

    private function normalizeQuantityValue(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_object($value) && method_exists($value, 'getValue') && method_exists($value, 'getUnit')) {
            return $this->formatQuantityValue($value->getValue(), $value->getUnit());
        }

        if (is_array($value)) {
            return $this->formatQuantityValue($value['value'] ?? null, $value['unit'] ?? null);
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

    private function formatQuantityValue(mixed $value, mixed $unit): string
    {
        if ($value === null && $unit === null) {
            return self::EMPTY_VALUE;
        }

        $formattedValue = $value !== null ? number_format((float) $value, self::DECIMAL_PLACES) : '';

        return trim($formattedValue . ' ' . ($unit ?? ''));
    }

    private function formatValueForStorage(mixed $value): string
    {
        if ($value === null) {
            return self::EMPTY_VALUE;
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

            if ($this->shouldCheckNumericField($object, $fieldDefinition, $fieldName, $oldData)) {
                $fieldsToCheck[] = $fieldName;
            }

            if ($this->shouldCheckQuantityValueField($object, $fieldDefinition, $fieldName, $oldData)) {
                $fieldsToCheck[] = $fieldName;
            }
        }

        return $fieldsToCheck;
    }

    /**
     * @param array<string, mixed> $oldData
     */
    private function shouldCheckNumericField(
        Concrete $object,
        ClassDefinition\Data $fieldDefinition,
        string $fieldName,
        array $oldData,
    ): bool {
        if (!$fieldDefinition instanceof ClassDefinition\Data\Numeric) {
            return false;
        }

        $getterMethod = 'get' . ucfirst($fieldName);

        if (!method_exists($object, $getterMethod)) {
            return false;
        }

        $newValue = $this->normalizeNumericValue($object->$getterMethod());
        $oldValue = $this->normalizeNumericValue($oldData[$fieldName] ?? null);

        return !$this->areNumericValuesEqual($oldValue, $newValue);
    }

    /**
     * @param array<string, mixed> $oldData
     */
    private function shouldCheckQuantityValueField(
        Concrete $object,
        ClassDefinition\Data $fieldDefinition,
        string $fieldName,
        array $oldData,
    ): bool {
        if (!$fieldDefinition instanceof QuantityValue) {
            return false;
        }

        $getterMethod = 'get' . ucfirst($fieldName);

        if (!method_exists($object, $getterMethod)) {
            return false;
        }

        $newValue = $this->normalizeQuantityValue($object->$getterMethod());
        $oldValue = $oldData[$fieldName] ?? null;

        return $oldValue !== $newValue;
    }

    private function normalizeNumericValue(mixed $value): ?float
    {
        return ($value !== null && $value !== '' && is_numeric($value)) ? (float) $value : null;
    }

    private function areNumericValuesEqual(?float $oldValue, ?float $newValue): bool
    {
        if ($oldValue === null && $newValue === null) {
            return true;
        }

        if ($oldValue === null || $newValue === null) {
            return false;
        }

        return abs($oldValue - $newValue) < self::NUMERIC_PRECISION;
    }

    /**
     * @param array<int, string> $allFieldsToCheck
     *
     * @return array<string, mixed>
     */
    private function collectNewFieldData(Concrete $object, array $allFieldsToCheck): array
    {
        $newData = [];

        foreach ($allFieldsToCheck as $field) {
            if (in_array($field, self::FIELDS_TO_SKIP, true)) {
                continue;
            }

            $fieldDefinition = $object->getClass()->getFieldDefinition($field);

            if ($fieldDefinition instanceof Localizedfields) {
                continue;
            }

            if ($fieldDefinition instanceof Objectbricks
                || $fieldDefinition instanceof ClassDefinition\Data\Fieldcollections) {
                continue;
            }

            $getterMethod = 'get' . ucfirst($field);

            if (!method_exists($object, $getterMethod)) {
                continue;
            }

            $newValue = $object->$getterMethod();
            $newData[$field] = $this->normalizeFieldValue($fieldDefinition, $newValue);
        }

        return $newData;
    }

    private function normalizeFieldValue(?ClassDefinition\Data $fieldDefinition, mixed $value): mixed
    {
        if ($fieldDefinition instanceof ClassDefinition\Data\Numeric) {
            return $this->normalizeNumericValue($value);
        }

        if ($fieldDefinition instanceof QuantityValue) {
            return $this->normalizeQuantityValue($value);
        }

        if ($fieldDefinition instanceof Select) {
            return $this->normalizeSelectValue($fieldDefinition, $value);
        }

        return $value;
    }

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
     * @param array<int, string> $allFieldsToCheck
     * @param array<string, mixed> $oldData
     * @param array<string, mixed> $newData
     *
     * @return array<string, array{old: string, new: string}>
     */
    private function compareStandardFields(
        Concrete $object,
        array $allFieldsToCheck,
        array $oldData,
        array $newData,
    ): array {
        $changes = [];

        foreach ($allFieldsToCheck as $field) {
            if (in_array($field, self::FIELDS_TO_SKIP, true)) {
                continue;
            }

            $fieldDefinition = $object->getClass()->getFieldDefinition($field);

            if ($fieldDefinition instanceof AbstractRelations) {
                continue;
            }

            if ($fieldDefinition instanceof Objectbricks
                || $fieldDefinition instanceof ClassDefinition\Data\Fieldcollections) {
                continue;
            }

            $oldRawValue = $oldData[$field] ?? null;
            $oldValue = $this->transformFieldValue($object, $field, $fieldDefinition, $oldRawValue);

            $newRawValue = $newData[$field] ?? null;
            $newValue = $this->transformFieldValue($object, $field, $fieldDefinition, $newRawValue);

            if ($this->areValuesEquivalent($oldValue, $newValue)) {
                continue;
            }

            if ($fieldDefinition instanceof Checkbox) {
                $changes[$field] = [
                    'old' => $oldValue ?? 'No',
                    'new' => $newValue ?? 'No',
                ];
            } else {
                $changes[$field] = [
                    'old' => $oldValue ?? self::EMPTY_VALUE,
                    'new' => $newValue ?? self::EMPTY_VALUE,
                ];
            }
        }

        return $changes;
    }

    private function transformFieldValue(
        Concrete $object,
        string $field,
        ?ClassDefinition\Data $fieldDefinition,
        mixed $value,
    ): mixed {
        if ($fieldDefinition instanceof Select) {
            return $this->normalizeSelectValue($fieldDefinition, $value);
        }

        return $this->transformSpecialFieldValue($object, $field, $value);
    }

    private function transformSpecialFieldValue(AbstractObject $object, string $field, mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if ($this->isEmptyObjectInstance($value)) {
            return null;
        }

        if ($field === UniProductCategoryInternal::FIELD_ASSIGNED_USER) {
            return $this->formatUserValue((int) $value);
        }

        if ($this->isCheckboxField($object, $field)) {
            return ($value === true || $value === 1 || $value === '1') ? 'Yes' : 'No';
        }

        if (!$object instanceof Concrete) {
            return (string) $value;
        }

        $classDefinition = $this->getClassDefinition($object);
        $fieldDefinition = $classDefinition->getFieldDefinition($field);

        if ($fieldDefinition instanceof ClassDefinition\Data\Numeric) {
            return (string) $value;
        }

        if ($fieldDefinition instanceof QuantityValue) {
            return $this->normalizeQuantityValue($value);
        }

        if ($fieldDefinition instanceof AbstractRelations) {
            if (is_numeric($value)) {
                $relatedObject = AbstractObject::getById((int) $value);

                if ($relatedObject instanceof AbstractObject) {
                    return $this->formatObjectReference($relatedObject);
                }

                return "Unknown Reference (ID $value)";
            }

            if ($value instanceof AbstractObject) {
                return $this->formatObjectReference($value);
            }
        }

        if ($value instanceof AbstractObject) {
            return $this->formatObjectReference($value);
        }

        if ($value instanceof Objectbrick || $value instanceof Fieldcollection) {
            return null;
        }

        if (is_array($value)) {
            return implode(', ', array_map(
                fn ($v): ?string => $this->transformSpecialFieldValue($object, $field, $v),
                $value,
            ));
        }

        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        }

        if (is_object($value)) {
            return $value::class;
        }

        return is_scalar($value) ? trim((string) $value) : null;
    }

    private function formatUserValue(int $userId): string
    {
        $user = User::getById($userId);

        if ($user instanceof User) {
            $username = $user->getName();
            $email = $user->getEmail();

            return sprintf('%s <%s>', $username, $email);
        }

        return sprintf('User ID %d (Not Found)', $userId);
    }

    private function formatObjectReference(AbstractObject $object): string
    {
        $name = $object->get('name');

        return $name ? (string) $name : $object->getKey();
    }

    /**
     * Check if a field is a Checkbox field (NOT Select or Multiselect).
     */
    private function isCheckboxField(AbstractObject $object, string $field): bool
    {
        if (!$object instanceof Concrete) {
            return false;
        }

        $fieldDefinition = $object->getClass()->getFieldDefinition($field);

        return $fieldDefinition instanceof Checkbox;
    }

    /**
     * @return array<string, array{old: mixed, new: mixed}>
     */
    private function computeObjectBrickChanges(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $changes = [];

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof Objectbricks) {
                continue;
            }

            $fieldName = $fieldDefinition->getName();
            $objectBrickData = $object->get($fieldName);

            if (!$objectBrickData) {
                continue;
            }

            $oldBrickData = $this->getOldBrickDataFromDatabase($object, $objectBrickData);

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
                    } else {
                        $this->processRegularFieldChanges($changes, $brick, $brickFieldDefinition, $oldBrickData, $brickType, $field);
                    }
                }
            }
        }

        return $changes;
    }

    /**
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
        $rawNewValue = $brick->get($field);
        $rawOldValue = $oldBrickData[$brickType][$field] ?? null;

        [$oldValue, $newValue] = $this->normalizeBrickFieldValues(
            $brickFieldDefinition,
            $rawOldValue,
            $rawNewValue,
        );

        if ($this->areValuesEquivalent($oldValue, $newValue)) {
            return;
        }

        $changes["{$brickType}.{$field}"] = [
            'old' => $oldValue ?? self::EMPTY_VALUE,
            'new' => $newValue ?? self::EMPTY_VALUE,
        ];
    }

    /**
     * @return array{0: mixed, 1: mixed}
     */
    private function normalizeBrickFieldValues(
        ClassDefinition\Data $brickFieldDefinition,
        mixed $rawOldValue,
        mixed $rawNewValue,
    ): array {
        if ($brickFieldDefinition instanceof Checkbox) {
            return [
                ($rawOldValue === 1 || $rawOldValue === '1' || $rawOldValue === true) ? 'Yes' : 'No',
                $rawNewValue === true ? 'Yes' : 'No',
            ];
        }

        if ($brickFieldDefinition instanceof Image) {
            $oldValue = $this->normalizeImageValue($rawOldValue);
            $newValue = $this->normalizeImageValue($rawNewValue);

            return [
                $oldValue ?? self::EMPTY_VALUE,
                $newValue ?? self::EMPTY_VALUE,
            ];
        }

        if ($brickFieldDefinition instanceof QuantityValue) {
            $oldValue = $this->normalizeQuantityValueFromDb($rawOldValue);
            $newValue = $this->normalizeQuantityValue($rawNewValue);

            return [$oldValue, $newValue];
        }

        if ($brickFieldDefinition instanceof ClassDefinition\Data\Numeric) {
            return [
                $rawOldValue !== null && $rawOldValue !== '' ? (string) round((float) $rawOldValue, self::DECIMAL_PLACES) : null,
                $rawNewValue !== null && $rawNewValue !== '' ? (string) round((float) $rawNewValue, self::DECIMAL_PLACES) : null,
            ];
        }

        if ($brickFieldDefinition instanceof ClassDefinition\Data\NumericRange) {
            $normalizedOldValue = null;

            if ($rawOldValue !== null) {
                if (is_string($rawOldValue)) {
                    $normalizedOldValue = $rawOldValue;
                } elseif (is_array($rawOldValue)) {
                    $normalizedOldValue = $this->normalizeNumericRangeFromDb($rawOldValue);
                }
            }

            $normalizedNewValue = $this->normalizeNumericRange($rawNewValue);

            return [$normalizedOldValue, $normalizedNewValue];
        }

        return [$this->normalizeValue($rawOldValue), $this->normalizeValue($rawNewValue)];
    }

    /**
     * Normalize image values (e.g., resolve numeric IDs or extract file paths from image objects).
     */
    private function normalizeImageValue(mixed $value): ?string
    {
        if ($value instanceof AssetImage) {
            return $value->getFullPath();
        }

        if (is_numeric($value)) {
            $image = Asset::getById((int) $value);

            if ($image instanceof AssetImage) {
                return $image->getFullPath();
            }
        }

        if (is_string($value)) {
            return trim($value);
        }

        return null;
    }

    private function normalizeQuantityValueFromDb(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_array($value)) {
            return $this->formatQuantityValue($value['value'] ?? null, $value['unit'] ?? null);
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

    private function normalizeNumericRange(?NumericRange $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $minimum = $value->getMinimum();
        $maximum = $value->getMaximum();

        if ($minimum === null && $maximum === null) {
            return null;
        }

        return sprintf(
            '%s to %s',
            $this->formatNumericValue($minimum),
            $this->formatNumericValue($maximum),
        );
    }

    private function formatNumericValue(float|string|null $value): string
    {
        if ($value === null || $value === '') {
            return '';
        }

        $floatValue = (float) $value;

        return fmod($floatValue, 1) === 0.0 ? (string) (int) $floatValue : number_format($floatValue, self::DECIMAL_PLACES);
    }

    /**
     * @return array<int, string>|string|object|null
     */
    private function normalizeValue(mixed $value): array|string|object|null
    {
        if (is_array($value)) {
            return array_map('strval', array_values($value));
        }

        if (is_string($value)) {
            if (preg_match('/^,.*,$/', $value)) {
                return array_map('trim', explode(',', trim($value, ',')));
            }

            return trim($value);
        }

        if (is_object($value)) {
            return $value;
        }

        return $value !== null ? (string) $value : null;
    }

    private function areValuesEquivalent(mixed $oldValue, mixed $newValue): bool
    {
        if ($oldValue === $newValue) {
            return true;
        }

        if ($this->isEmptyValue($oldValue) && $this->isEmptyValue($newValue)) {
            return true;
        }

        if (is_numeric($oldValue) && is_numeric($newValue)) {
            return abs((float) $oldValue - (float) $newValue) < self::NUMERIC_PRECISION;
        }

        if (is_array($oldValue) && is_array($newValue)) {
            if ($this->isAssociativeArray($oldValue) || $this->isAssociativeArray($newValue)) {
                return $oldValue === $newValue;
            }

            sort($oldValue);
            sort($newValue);

            return $oldValue === $newValue;
        }

        if (is_string($oldValue) && is_string($newValue)) {
            return trim($oldValue) === trim($newValue);
        }

        if (is_string($oldValue) && is_string($newValue)
            && str_contains($oldValue, 'to') && str_contains($newValue, 'to')) {
            return trim($oldValue) === trim($newValue);
        }

        if (is_scalar($oldValue) && is_scalar($newValue)) {
            return trim((string) $oldValue) === trim((string) $newValue);
        }

        return false;
    }

    private function isEmptyValue(mixed $value): bool
    {
        return $value === null || $value === '' || $value === self::EMPTY_VALUE || $value === [];
    }

    /**
     * Determines if an array is associative.
     *
     * @param array<mixed, mixed> $array The input array (keys and values can be of any type).
     *
     * @return bool True if the array is associative, false otherwise.
     */
    private function isAssociativeArray(array $array): bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function computeLocalizedFieldChangesInBricks(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $localizedBrickData = $this->getOldLocalizedBrickDataFromDatabase($object);
        $changes = [];

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof Objectbricks) {
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
     * @param array<string, mixed> $localizedBrickData
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function processBrickData(Objectbrick $objectBrickData, array $localizedBrickData): array
    {
        $changes = [];

        foreach ($objectBrickData->getBrickGetters() as $brickGetter) {
            $brick = $objectBrickData->$brickGetter();

            if (!$brick || !$this->doesBrickHaveLocalizedFields($brick)) {
                continue;
            }

            $brickChanges = $this->processBrickLocalizedFields($brick, $localizedBrickData);

            $changes = array_merge($changes, $brickChanges);
        }

        return $changes;
    }

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
     * @param array<string, mixed> $localizedBrickData
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function processBrickLocalizedFields(
        Objectbrick\Data\AbstractData $brick,
        array $localizedBrickData,
    ): array {
        $localizedFields = $brick->get('localizedfields');

        if (!$localizedFields instanceof Localizedfield) {
            return [];
        }

        $brickType = $brick->getType();

        $brickDefinition = Objectbrick\Definition::getByKey($brickType);
        $localizedFieldDef = $brickDefinition->getFieldDefinition('localizedfields');

        if (!$localizedFieldDef instanceof Localizedfields) {
            return [];
        }

        $allLocalizedItems = $localizedFields->getItems();

        if ($allLocalizedItems === []) {
            return [];
        }

        $completeNewData = [];

        foreach ($allLocalizedItems as $language => $items) {
            $completeNewData[$language] = [];

            foreach ($localizedFieldDef->getFieldDefinitions() as $fieldDef) {
                $fieldName = $fieldDef->getName();

                $value = $localizedFields->getLocalizedValue($fieldName, $language);

                $completeNewData[$language][$fieldName] = $value;
            }
        }

        $fieldChanges = $this->collectBrickLocalizedFieldChanges(
            $completeNewData,
            $localizedBrickData,
            $brickType,
        );

        return $this->formatBrickLocalizedChanges($fieldChanges, $brickType);
    }

    /**
     * @param array<string, array<string, mixed>> $newLocalizedFields
     * @param array<string, mixed> $localizedBrickData
     *
     * @return array<string, array{old: array<string, mixed>, new: array<string, mixed>}>
     */
    private function collectBrickLocalizedFieldChanges(
        array $newLocalizedFields,
        array $localizedBrickData,
        string $brickType,
    ): array {
        $fieldChanges = [];

        $brickDefinition = Objectbrick\Definition::getByKey($brickType);
        $localizedFieldDef = $brickDefinition->getFieldDefinition('localizedfields');

        if (!$localizedFieldDef instanceof Localizedfields) {
            return [];
        }

        foreach ($newLocalizedFields as $language => $newFields) {
            $oldFields = [];

            if (isset($localizedBrickData[$brickType]['localized'][$language])) {
                $languageData = $localizedBrickData[$brickType]['localized'][$language];

                foreach ($languageData as $fieldData) {
                    if (is_array($fieldData)) {
                        $oldFields = array_merge($oldFields, $fieldData);
                    }
                }
            } else {
                $oldFields = [];
            }

            foreach ($newFields as $fieldName => $newValue) {
                if (in_array($fieldName, self::FIELDS_TO_SKIP, true)) {
                    continue;
                }

                $oldValue = $oldFields[$fieldName] ?? null;

                $fieldDefinition = $localizedFieldDef->getFieldDefinition($fieldName);

                $normalizedOldValue = $this->normalizeLocalizedFieldValue($fieldDefinition, $oldValue);
                $normalizedNewValue = $this->normalizeLocalizedFieldValue($fieldDefinition, $newValue);

                $areEqual = $this->areValuesEquivalent($normalizedOldValue, $normalizedNewValue);

                if (!$areEqual) {
                    if (!isset($fieldChanges[$fieldName])) {
                        $fieldChanges[$fieldName] = ['old' => [], 'new' => []];
                    }

                    $fieldChanges[$fieldName]['old'][$language] = $normalizedOldValue;
                    $fieldChanges[$fieldName]['new'][$language] = $normalizedNewValue;
                }
            }
        }

        return $fieldChanges;
    }

    /**
     * @param array<string, array{old: array<string, mixed>, new: array<string, mixed>}> $fieldChanges
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function formatBrickLocalizedChanges(array $fieldChanges, string $brickType): array
    {
        $changes = [];

        foreach ($fieldChanges as $fieldName => $languageChanges) {
            if (empty($languageChanges['old']) && empty($languageChanges['new'])) {
                continue;
            }

            $changes["{$brickType}.localized.{$fieldName}"] = [
                'old' => $this->formatLocalizedValues($languageChanges['old']),
                'new' => $this->formatLocalizedValues($languageChanges['new']),
            ];
        }

        return $changes;
    }

    /**
     * @return array<string, array{old: list<string>, new: list<string>}>
     */
    private function computeRelationFieldChanges(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $oldRelationData = $this->getOldRelationDataFromDatabase($object);
        $changes = [];

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof AbstractRelations) {
                continue;
            }

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

        return $changes;
    }

    /**
     * @return list<string>
     */
    private function transformRelationObjectsToNames(mixed $relations): array
    {
        if (!$relations) {
            return [];
        }

        $relationsArray = is_array($relations) ? $relations : [$relations];

        return array_map(function ($relatedObject): string {
            if ($relatedObject instanceof AbstractObject) {
                return $this->formatObjectReference($relatedObject);
            }

            return (string) $relatedObject;
        }, $relationsArray);
    }

    /**
     * @param array<mixed>|string|null $relationIds
     *
     * @return list<string>
     */
    private function transformRelationIdsToNames(array|string|null $relationIds): array
    {
        $relationIds = $this->normalizeRelationIds($relationIds);
        $names = [];

        foreach ($relationIds as $relationId) {
            $relatedObject = AbstractObject::getById($relationId);

            if ($relatedObject instanceof AbstractObject) {
                $names[] = $this->formatObjectReference($relatedObject);

                continue;
            }

            $relatedAsset = Asset::getById($relationId);

            if ($relatedAsset instanceof Asset) {
                $names[] = $this->formatAssetReference($relatedAsset);

                continue;
            }

            $names[] = "Unknown Reference (ID $relationId)";
        }

        return $names;
    }

    /**
     * Format the reference for an asset.
     */
    private function formatAssetReference(Asset $asset): string
    {
        return $asset->getFullPath();
    }

    /**
     * @param array<mixed>|string|null $relationIds
     *
     * @return array<int>
     */
    private function normalizeRelationIds(array|string|null $relationIds): array
    {
        if (is_string($relationIds)) {
            $relationIds = explode(',', $relationIds);
        } elseif ($relationIds === null) {
            return [];
        }

        return array_values(array_filter(
            $relationIds,
            fn ($id): bool => !empty($id) && is_numeric($id),
        ));
    }

    /**
     * @return array<string, mixed>
     */
    private function getOldDataFromDatabase(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $classDefinition = $this->getClassDefinition($object);
        $tableName = 'object_' . $classDefinition->getId();
        $sql = "SELECT * FROM $tableName WHERE oo_id = :id";

        $oldData = Db::get()->fetchAssociative($sql, ['id' => $object->getId()]) ?: [];

        return $this->normalizeOldDataFromDatabase($oldData, $classDefinition);
    }

    /**
     * @param array<string, mixed> $oldData
     *
     * @return array<string, mixed>
     */
    private function normalizeOldDataFromDatabase(array $oldData, ClassDefinition $classDefinition): array
    {
        foreach ($classDefinition->getFieldDefinitions() as $fieldDefinition) {
            $fieldName = $fieldDefinition->getName();

            if (!array_key_exists($fieldName, $oldData)) {
                continue;
            }

            if ($fieldDefinition instanceof ClassDefinition\Data\Numeric) {
                $oldData[$fieldName] = $this->normalizeNumericValue($oldData[$fieldName]);
            }

            if ($fieldDefinition instanceof QuantityValue) {
                $oldData[$fieldName] = $this->extractQuantityValueFromDatabase($oldData, $fieldName);
            }
        }

        return $oldData;
    }

    /**
     * @param array<string, mixed> $oldData
     */
    private function extractQuantityValueFromDatabase(array $oldData, string $fieldName): ?string
    {
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

            return $parts !== [] ? implode(' ', $parts) : null;
        }

        $value = $oldData[$fieldName];

        return ($value === null || $value === '') ? null : $this->normalizeQuantityValue($value);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function getOldLocalizedBrickDataFromDatabase(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $data = [];
        $classDefinition = $object->getClass();

        foreach ($classDefinition->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof Objectbricks) {
                continue;
            }

            foreach ($fieldDefinition->getAllowedTypes() as $brickType) {
                $brickData = $this->fetchLocalizedBrickData($object, $brickType, $classDefinition->getId());

                if ($brickData !== []) {
                    $data[$brickType] = $brickData;
                }
            }
        }

        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    private function fetchLocalizedBrickData(Concrete $object, string $brickType, string $classId): array
    {
        $localizedTableName = "object_brick_localized_{$brickType}_{$classId}";
        $localizedSql = "SELECT * FROM $localizedTableName WHERE ooo_id = :id";

        try {
            $localizedRows = Db::get()->fetchAllAssociative($localizedSql, ['id' => $object->getId()]);
        } catch (\Exception $e) {
            $this->logger->warning("Localized table for {$brickType} not found: " . $e->getMessage());

            return [];
        }

        $data = [];

        foreach ($localizedRows as $localizedRow) {
            $language = $localizedRow['language'];
            $fieldname = $localizedRow['fieldname'];
            unset($localizedRow['ooo_id'], $localizedRow['language'], $localizedRow['fieldname']);

            $data['localized'][$language][$fieldname] = $localizedRow;
        }

        return $data;
    }

    /**
     * @return array<string, list<mixed>>
     */
    private function getOldRelationDataFromDatabase(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $classDefinition = $this->getClassDefinition($object);
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
     * @return array<string, array<string, mixed>>
     */
    private function getOldBrickDataFromDatabase(AbstractObject $object, ?Objectbrick $objectBrickData): array
    {
        if (!$object instanceof Concrete || !$objectBrickData instanceof Objectbrick) {
            return [];
        }

        $data = [];

        foreach ($objectBrickData->getBrickGetters() as $brickGetter) {
            $brick = $objectBrickData->$brickGetter();

            if (!$brick) {
                continue;
            }

            $brickData = $this->fetchBrickDataFromDatabase($object, $brick);

            if ($brickData !== []) {
                $data[$brick->getType()] = $brickData;
            }
        }

        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    private function fetchBrickDataFromDatabase(Concrete $object, Objectbrick\Data\AbstractData $brick): array
    {
        $brickType = $brick->getType();
        $classId = $object->getClass()->getId();
        $tableName = "object_brick_query_{$brickType}_{$classId}";
        $sql = "SELECT * FROM $tableName WHERE id = :id AND fieldname = :fieldname";

        try {
            $row = Db::get()->fetchAssociative($sql, [
                'id' => $object->getId(),
                'fieldname' => $brick->getFieldname(),
            ]);

            if (!$row) {
                return [];
            }

            unset($row['fieldname'], $row['id']);

            return $this->processNumericRangeFields($row);
        } catch (\Exception $e) {
            $this->logger->warning("Error retrieving brick data for {$brickType}: " . $e->getMessage());

            return [];
        }
    }

    /**
     * @param array<string, mixed> $row
     *
     * @return array<string, mixed>
     */
    private function processNumericRangeFields(array $row): array
    {
        $data = [];

        foreach ($row as $field => $value) {
            if (str_ends_with($field, '__minimum') || str_ends_with($field, '__maximum')) {
                $mainField = explode('__', $field)[0];

                if (!isset($data[$mainField])) {
                    $data[$mainField] = ['minimum' => null, 'maximum' => null];
                }

                $key = str_ends_with($field, '__minimum') ? 'minimum' : 'maximum';

                $data[$mainField][$key] = ($value !== null && $value !== '')
                    ? round((float) $value, self::DECIMAL_PLACES)
                    : null;
            } else {
                $data[$field] = $value;
            }
        }

        foreach ($data as $field => $value) {
            if (is_array($value) && array_key_exists('minimum', $value) && array_key_exists('maximum', $value)) {
                if ($value['minimum'] === null && $value['maximum'] === null) {
                    $data[$field] = null;
                } else {
                    $data[$field] = $this->normalizeNumericRangeFromDb($value);
                }
            }
        }

        return $data;
    }

    /**
     * @param array{minimum: float|string|null, maximum: float|string|null} $value
     */
    private function normalizeNumericRangeFromDb(array $value): ?string
    {
        $minimum = ($value['minimum'] === '' || $value['minimum'] === null) ? null : $value['minimum'];
        $maximum = ($value['maximum'] === '' || $value['maximum'] === null) ? null : $value['maximum'];

        if ($minimum === null && $maximum === null) {
            return null;
        }

        return sprintf(
            '%s to %s',
            $this->formatNumericValue($minimum),
            $this->formatNumericValue($maximum),
        );
    }

    /**
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

            $fieldChanges = $this->processLocalizedFieldChanges($localizedFields, $localizedFieldData, $fieldDefinition);

            if ($fieldChanges === []) {
                continue;
            }

            $this->formatFieldChanges($fieldChanges, $changes);
        }

        return $changes;
    }

    /**
     * @param array<string, array<string, mixed>> $localizedFieldData
     *
     * @return array<string, array{old: array<string, mixed>, new: array<string, mixed>}>
     */
    private function processLocalizedFieldChanges(
        object $localizedFields,
        array $localizedFieldData,
        Localizedfields $localizedFieldDefinition,
    ): array {
        $fieldChanges = [];

        foreach ($localizedFields->getItems() as $language => $newFields) {
            $oldFields = $localizedFieldData[$language] ?? [];

            foreach ($newFields as $fieldName => $newValue) {
                if (in_array($fieldName, self::FIELDS_TO_SKIP, true)) {
                    continue;
                }
                $oldValue = $oldFields[$fieldName] ?? null;

                $fieldDefinition = $localizedFieldDefinition->getFieldDefinition($fieldName);

                $normalizedNewValue = $this->normalizeLocalizedFieldValue($fieldDefinition, $newValue);
                $normalizedOldValue = $this->normalizeLocalizedFieldValue($fieldDefinition, $oldValue);

                if ($this->areValuesEquivalent($normalizedOldValue, $normalizedNewValue)) {
                    continue;
                }

                if (!isset($fieldChanges[$fieldName])) {
                    $fieldChanges[$fieldName] = ['old' => [], 'new' => []];
                }

                $fieldChanges[$fieldName]['old'][$language] = $normalizedOldValue;
                $fieldChanges[$fieldName]['new'][$language] = $normalizedNewValue;
            }
        }

        return $fieldChanges;
    }

    private function normalizeLocalizedFieldValue(?ClassDefinition\Data $fieldDefinition, mixed $value): mixed
    {
        if ($fieldDefinition instanceof Checkbox) {
            if ($value === null || $value === '') {
                return 'No';
            }

            return ($value === 1 || $value === '1' || $value === true || $value === 'true') ? 'Yes' : 'No';
        }

        return $this->normalizeValue($value);
    }

    /**
     * @param array<string, array{old: mixed, new: mixed}> $fieldChanges
     * @param array<string, array{old: mixed, new: mixed}> $changes
     */
    private function formatFieldChanges(array $fieldChanges, array &$changes): void
    {
        foreach ($fieldChanges as $fieldName => $languageChanges) {
            if (empty($languageChanges['old']) && empty($languageChanges['new'])) {
                continue;
            }

            $changes["localized.{$fieldName}"] = [
                'old' => $this->formatLocalizedValues($languageChanges['old']),
                'new' => $this->formatLocalizedValues($languageChanges['new']),
            ];
        }
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function getOldLocalizedFieldDataFromDatabase(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $classDefinition = $object->getClass();
        $tableName = 'object_localized_data_' . $classDefinition->getId();
        $localizedSql = "SELECT * FROM {$tableName} WHERE ooo_id = :id";

        try {
            $rows = Db::get()->fetchAllAssociative($localizedSql, ['id' => $object->getId()]);
        } catch (\Exception $e) {
            $this->logger->warning('Localized table for normal fields not found: ' . $e->getMessage());

            return [];
        }

        $data = [];

        foreach ($rows as $row) {
            $language = $row['language'];
            unset($row['ooo_id'], $row['language']);
            $data[$language] = $row;
        }

        return $data;
    }

    /**
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

    /**
     * Add this method to compute field collection changes.
     *
     * @return array<string, array{old: mixed, new: mixed}>
     */
    private function computeFieldCollectionChanges(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $changes = [];
        $hasOverallChanges = false;

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof ClassDefinition\Data\Fieldcollections) {
                continue;
            }

            $fieldName = $fieldDefinition->getName();
            $fieldCollectionData = $object->get($fieldName);

            if (!$fieldCollectionData) {
                continue;
            }

            $oldFieldCollectionData = $this->getOldFieldCollectionDataFromDatabase($object, $fieldCollectionData);

            foreach ($fieldCollectionData->getItems() as $index => $item) {
                if (!$item) {
                    continue;
                }

                $fcType = $item->getType();
                $fcDefinition = Definition::getByKey($fcType);

                if (!$fcDefinition instanceof Definition) {
                    continue;
                }

                $fcChanges = [];

                foreach ($fcDefinition->getFieldDefinitions() as $fcFieldDefinition) {
                    $field = $fcFieldDefinition->getName();

                    if ($fcFieldDefinition instanceof Localizedfields) {
                        continue;
                    }

                    if ($fcFieldDefinition instanceof AbstractRelations) {
                        $this->processFieldCollectionRelationChanges(
                            $fcChanges,
                            $object,
                            $item,
                            $fcType,
                            $field,
                            $index,
                        );
                    } else {
                        $this->processFieldCollectionRegularFieldChanges(
                            $fcChanges,
                            $item,
                            $fcFieldDefinition,
                            $oldFieldCollectionData,
                            $fcType,
                            $field,
                            $index,
                        );
                    }
                }

                if (!empty($fcChanges)) {
                    $hasOverallChanges = true;
                    $changes = array_merge($changes, $fcChanges);
                }
            }
        }

        return $hasOverallChanges ? $changes : [];
    }

    /**
     * Process relation field changes in field collections.
     *
     * @param array<string, array{old: string, new: string}> $changes
     */
    private function processFieldCollectionRelationChanges(
        array &$changes,
        AbstractObject $object,
        Fieldcollection\Data\AbstractData $item,
        string $fcType,
        string $field,
        int $index,
    ): void {
        $fieldname = $item->getFieldname();
        $oldRelationIds = $this->getFieldCollectionRelationIds($object, $fieldname, $field, $index);
        $newRelationValue = $item->get($field);

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

        $oldString = implode(', ', $oldRelationValue);
        $newString = implode(', ', $newRelationValue);

        if ($oldString === $newString) {
            return;
        }

        $changes["{$fcType}[{$index}].relation.{$field}"] = [
            'old' => $oldString,
            'new' => $newString,
        ];
    }

    /**
     * Process regular field changes in field collections.
     *
     * @param array<string, array{old: mixed, new: mixed}> $changes
     * @param array<string, array<int, array<string, mixed>>> $oldFieldCollectionData
     */
    private function processFieldCollectionRegularFieldChanges(
        array &$changes,
        object $item,
        ClassDefinition\Data $fcFieldDefinition,
        array $oldFieldCollectionData,
        string $fcType,
        string $field,
        int $index,
    ): void {
        $rawNewValue = $item->get($field);
        $rawOldValue = $oldFieldCollectionData[$fcType][$index][$field] ?? null;
        [$oldValue, $newValue] = $this->normalizeFieldCollectionFieldValues(
            $fcFieldDefinition,
            $rawOldValue,
            $rawNewValue,
        );

        if ($this->areValuesEquivalent($oldValue, $newValue)) {
            return;
        }

        $changes["{$fcType}[{$index}].{$field}"] = [
            'old' => $oldValue ?? self::EMPTY_VALUE,
            'new' => $newValue ?? self::EMPTY_VALUE,
        ];
    }

    /**
     * Normalize field collection field values.
     *
     * @return array{0: mixed, 1: mixed}
     */
    private function normalizeFieldCollectionFieldValues(
        ClassDefinition\Data $fcFieldDefinition,
        mixed $rawOldValue,
        mixed $rawNewValue,
    ): array {
        if ($fcFieldDefinition instanceof Checkbox) {
            return [
                ($rawOldValue === 1 || $rawOldValue === '1' || $rawOldValue === true) ? 'Yes' : 'No',
                ($rawNewValue === true || $rawNewValue === 1 || $rawNewValue === '1') ? 'Yes' : 'No',
            ];
        }

        if ($fcFieldDefinition instanceof Image) {
            return [
                $this->normalizeImageValue($rawOldValue),
                $this->normalizeImageValue($rawNewValue),
            ];
        }

        if ($fcFieldDefinition instanceof QuantityValue) {
            return [
                $this->normalizeQuantityValueFromDb($rawOldValue),
                $this->normalizeQuantityValue($rawNewValue),
            ];
        }

        if ($fcFieldDefinition instanceof ClassDefinition\Data\Numeric) {
            return [
                $rawOldValue !== null ? (string) round((float) $rawOldValue, self::DECIMAL_PLACES) : null,
                $rawNewValue !== null ? (string) round((float) $rawNewValue, self::DECIMAL_PLACES) : null,
            ];
        }

        return [
            $this->normalizeValue($rawOldValue),
            $this->normalizeValue($rawNewValue),
        ];
    }

    /**
     * @template TItem of Fieldcollection\Data\AbstractData
     *
     * @param Fieldcollection<TItem>|null $fieldCollectionData
     *                                                         Field collection data.
     *
     * @return array<string, array<int, array<string, mixed>>> The old field collection data.
     */
    private function getOldFieldCollectionDataFromDatabase(
        AbstractObject $object,
        ?Fieldcollection $fieldCollectionData,
    ): array {
        if (!$object instanceof Concrete || !$fieldCollectionData instanceof Fieldcollection) {
            return [];
        }

        $data = [];

        foreach ($fieldCollectionData->getItems() as $index => $item) {
            $fcData = $this->fetchFieldCollectionDataFromDatabase($object, $item, $index);

            if ($fcData !== []) {
                $fcType = $item->getType();
                $data[$fcType][$index] = $fcData;
            }
        }

        return $data;
    }

    /**
     * Fetch field collection data from the database.
     *
     * @param Concrete $object The parent Pimcore object.
     * @param Fieldcollection\Data\AbstractData $item The field collection item.
     * @param int $index The index of the field collection item.
     *
     * @return array<string, mixed> The fetched field collection data.
     */
    private function fetchFieldCollectionDataFromDatabase(
        Concrete $object,
        Fieldcollection\Data\AbstractData $item,
        int $index,
    ): array {
        $fcType = $item->getType();
        $classId = $object->getClass()->getId();
        $tableName = "object_collection_{$fcType}_{$classId}";

        $sql = "SELECT * FROM $tableName WHERE id = :id AND fieldname = :fieldname AND `index` = :index";

        try {
            $row = Db::get()->fetchAssociative($sql, [
                'id' => $object->getId(),
                'fieldname' => $item->getFieldname(),
                'index' => $index,
            ]);

            if (!$row) {
                return [];
            }

            unset($row['id'], $row['fieldname'], $row['index']);

            return $this->processNumericRangeFields($row);
        } catch (\Exception $e) {
            $this->logger->warning("Error retrieving field collection data for {$fcType}: " . $e->getMessage());

            return [];
        }
    }

    /**
     * Get field collection relation IDs from database - IMPROVED VERSION.
     *
     * @return array<int, int>
     */
    private function getFieldCollectionRelationIds(
        AbstractObject $object,
        string $fcFieldname,
        string $relationField,
        int $index,
    ): array {
        if (!$object instanceof Concrete) {
            return [];
        }

        $classId = $object->getClass()->getId();
        $tableName = 'object_relations_' . $classId;

        $fullFieldname = $fcFieldname . '~' . $relationField;

        $sql = "SELECT dest_id FROM $tableName
        WHERE src_id = :objectId
        AND fieldname = :fieldname
        AND ownertype = 'fieldcollection'
        AND ownername = :fcFieldname
        AND position = :position
        ORDER BY `index`";

        try {
            $rows = Db::get()->fetchAllAssociative($sql, [
                'objectId' => $object->getId(),
                'fieldname' => $fullFieldname,
                'fcFieldname' => $fcFieldname,
                'position' => (string) $index,
            ]);

            if ($rows === []) {
                $rows = Db::get()->fetchAllAssociative($sql, [
                    'objectId' => $object->getId(),
                    'fieldname' => $relationField,
                    'fcFieldname' => $fcFieldname,
                    'position' => (string) $index,
                ]);
            }

            return array_map(fn ($row): int => (int) $row['dest_id'], $rows);
        } catch (\Exception $e) {
            $this->logger->warning('Error fetching field collection relations: ' . $e->getMessage());

            return [];
        }
    }

    /**
     * Compute localized field changes in field collections.
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function computeLocalizedFieldChangesInFieldCollections(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $localizedFcData = $this->getOldLocalizedFieldCollectionDataFromDatabase($object);
        $changes = [];

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof ClassDefinition\Data\Fieldcollections) {
                continue;
            }

            $fieldName = $fieldDefinition->getName();
            $fieldCollectionData = $object->get($fieldName);

            if (!$fieldCollectionData) {
                continue;
            }

            $fcChanges = $this->processFieldCollectionData($fieldCollectionData, $localizedFcData);

            $changes = array_merge($changes, $fcChanges);
        }

        return $changes;
    }

    /**
     * Process field collection data for localized fields.
     *
     * @template TItem of Fieldcollection\Data\AbstractData
     *
     * @param Fieldcollection<TItem> $fieldCollectionData Field collection data.
     * @param array<string, mixed> $localizedFcData Localized field collection data.
     *
     * @return array<string, array{old: string|null, new: string|null}> The field collection changes.
     */
    private function processFieldCollectionData(
        Fieldcollection $fieldCollectionData,
        array $localizedFcData,
    ): array {
        $changes = [];

        foreach ($fieldCollectionData->getItems() as $index => $item) {
            if (!$this->doesFieldCollectionHaveLocalizedFields($item)) {
                continue;
            }

            $fcChanges = $this->processFieldCollectionLocalizedFields($item, $localizedFcData, $index);

            $changes = array_merge($changes, $fcChanges);
        }

        return $changes;
    }

    /**
     * Check if field collection has localized fields.
     */
    private function doesFieldCollectionHaveLocalizedFields(
        Fieldcollection\Data\AbstractData $item,
    ): bool {
        $fcDefinition = Definition::getByKey($item->getType());

        if (!$fcDefinition instanceof Definition) {
            $this->logger->warning("Field collection definition not found for type: {$item->getType()}");

            return false;
        }

        $localizedFieldDef = $fcDefinition->getFieldDefinition('localizedfields');

        return $localizedFieldDef instanceof Localizedfields;
    }

    /**
     * Process localized fields in field collection.
     *
     * @param array<string, mixed> $localizedFcData
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function processFieldCollectionLocalizedFields(
        Fieldcollection\Data\AbstractData $item,
        array $localizedFcData,
        int $index,
    ): array {
        $localizedFields = $item->get('localizedfields');

        if (!$localizedFields instanceof Localizedfield) {
            return [];
        }

        $fcType = $item->getType();
        $fcDefinition = Definition::getByKey($fcType);
        $localizedFieldDef = $fcDefinition->getFieldDefinition('localizedfields');

        if (!$localizedFieldDef instanceof Localizedfields) {
            return [];
        }

        $allLocalizedItems = $localizedFields->getItems();

        if ($allLocalizedItems === []) {
            return [];
        }

        $completeNewData = [];

        foreach ($allLocalizedItems as $language => $items) {
            $completeNewData[$language] = [];

            foreach ($localizedFieldDef->getFieldDefinitions() as $fieldDef) {
                $fieldName = $fieldDef->getName();
                $value = $localizedFields->getLocalizedValue($fieldName, $language);
                $completeNewData[$language][$fieldName] = $value;
            }
        }

        $fieldChanges = $this->collectFieldCollectionLocalizedFieldChanges(
            $completeNewData,
            $localizedFcData,
            $fcType,
            $index,
        );

        return $this->formatFieldCollectionLocalizedChanges($fieldChanges, $fcType, $index);
    }

    /**
     * Collect localized field changes in field collection.
     *
     * @param array<string, array<string, mixed>> $newLocalizedFields
     * @param array<string, mixed> $localizedFcData
     *
     * @return array<string, array{old: array<string, mixed>, new: array<string, mixed>}>
     */
    private function collectFieldCollectionLocalizedFieldChanges(
        array $newLocalizedFields,
        array $localizedFcData,
        string $fcType,
        int $index,
    ): array {
        $fieldChanges = [];

        $fcDefinition = Definition::getByKey($fcType);
        $localizedFieldDef = $fcDefinition->getFieldDefinition('localizedfields');

        if (!$localizedFieldDef instanceof Localizedfields) {
            return [];
        }

        foreach ($newLocalizedFields as $language => $newFields) {
            $oldFields = $localizedFcData[$fcType][$index]['localized'][$language] ?? [];

            foreach ($newFields as $fieldName => $newValue) {
                if (in_array($fieldName, self::FIELDS_TO_SKIP, true)) {
                    continue;
                }

                $oldValue = $oldFields[$fieldName] ?? null;
                $fieldDefinition = $localizedFieldDef->getFieldDefinition($fieldName);

                $normalizedOldValue = $this->normalizeLocalizedFieldValue($fieldDefinition, $oldValue);
                $normalizedNewValue = $this->normalizeLocalizedFieldValue($fieldDefinition, $newValue);

                if (!$this->areValuesEquivalent($normalizedOldValue, $normalizedNewValue)) {
                    if (!isset($fieldChanges[$fieldName])) {
                        $fieldChanges[$fieldName] = ['old' => [], 'new' => []];
                    }

                    $fieldChanges[$fieldName]['old'][$language] = $normalizedOldValue;
                    $fieldChanges[$fieldName]['new'][$language] = $normalizedNewValue;
                }
            }
        }

        return $fieldChanges;
    }

    /**
     * Format field collection localized changes.
     *
     * @param array<string, array{old: array<string, mixed>, new: array<string, mixed>}> $fieldChanges
     *
     * @return array<string, array{old: string|null, new: string|null}>
     */
    private function formatFieldCollectionLocalizedChanges(
        array $fieldChanges,
        string $fcType,
        int $index,
    ): array {
        $changes = [];

        foreach ($fieldChanges as $fieldName => $languageChanges) {
            if (empty($languageChanges['old']) && empty($languageChanges['new'])) {
                continue;
            }

            $changes["{$fcType}[{$index}].localized.{$fieldName}"] = [
                'old' => $this->formatLocalizedValues($languageChanges['old']),
                'new' => $this->formatLocalizedValues($languageChanges['new']),
            ];
        }

        return $changes;
    }

    /**
     * Get old localized field collection data from database.
     *
     * @return array<string, array<int, array<string, mixed>>>
     */
    private function getOldLocalizedFieldCollectionDataFromDatabase(AbstractObject $object): array
    {
        if (!$object instanceof Concrete) {
            return [];
        }

        $data = [];
        $classDefinition = $object->getClass();

        foreach ($classDefinition->getFieldDefinitions() as $fieldDefinition) {
            if (!$fieldDefinition instanceof ClassDefinition\Data\Fieldcollections) {
                continue;
            }

            foreach ($fieldDefinition->getAllowedTypes() as $fcType) {
                $fcData = $this->fetchLocalizedFieldCollectionData($object, $fcType, $classDefinition->getId());

                if ($fcData !== []) {
                    $data[$fcType] = $fcData;
                }
            }
        }

        return $data;
    }

    /**
     * Fetch localized field collection data from database.
     *
     * @return array<int, array<string, mixed>>
     */
    private function fetchLocalizedFieldCollectionData(Concrete $object, string $fcType, string $classId): array
    {
        $localizedTableName = "object_collection_localized_{$fcType}_{$classId}";
        $localizedSql = "SELECT * FROM $localizedTableName WHERE ooo_id = :id";

        try {
            $localizedRows = Db::get()->fetchAllAssociative($localizedSql, ['id' => $object->getId()]);
        } catch (\Exception $e) {
            $this->logger->warning("Localized table for field collection {$fcType} not found: " . $e->getMessage());

            return [];
        }

        $data = [];

        foreach ($localizedRows as $localizedRow) {
            $language = $localizedRow['language'];
            $index = (int) $localizedRow['index'];
            unset($localizedRow['ooo_id'], $localizedRow['language'], $localizedRow['index']);

            $data[$index]['localized'][$language] = $localizedRow;
        }

        return $data;
    }

    /**
     * Get field label for field collection fields.
     */
    private function getFieldCollectionFieldLabel(string $fcType, string $fieldPath): string
    {
        try {
            $fcDefinition = Definition::getByKey($fcType);

            if (!$fcDefinition instanceof Definition) {
                return ucfirst($fcType) . ' - ' . ucfirst($fieldPath);
            }

            $fcTitle = $fcDefinition->getTitle() !== null && $fcDefinition->getTitle() !== '' && $fcDefinition->getTitle() !== '0' ? $fcDefinition->getTitle() : ucfirst($fcType);

            if (str_starts_with($fieldPath, 'localized.')) {
                $fieldName = substr($fieldPath, 10);
                $fieldLabel = $this->getFieldCollectionLocalizedFieldLabel($fcDefinition, $fieldName);

                return "{$fcTitle} {$fieldLabel}";
            }

            if (str_starts_with($fieldPath, 'relation.')) {
                $fieldName = substr($fieldPath, 9);
                $fieldLabel = $this->getFieldCollectionFieldLabelFromDefinition($fcDefinition, $fieldName);

                return "{$fcTitle} {$fieldLabel}";
            }

            $fieldLabel = $this->getFieldCollectionFieldLabelFromDefinition($fcDefinition, $fieldPath);

            return "{$fcTitle} {$fieldLabel}";
        } catch (\Exception $e) {
            $this->logger->warning("Could not load field collection definition for {$fcType}: " . $e->getMessage());

            return ucfirst($fcType) . ' - ' . ucfirst($fieldPath);
        }
    }

    /**
     * Get field label from field collection definition.
     */
    private function getFieldCollectionFieldLabelFromDefinition(
        Definition $fcDefinition,
        string $fieldName,
    ): string {
        $fieldDefinition = $fcDefinition->getFieldDefinition($fieldName);

        if ($fieldDefinition instanceof ClassDefinition\Data) {
            return $this->extractFieldTitle($fieldDefinition);
        }

        return ucfirst($fieldName);
    }

    /**
     * Get localized field label from field collection definition.
     */
    private function getFieldCollectionLocalizedFieldLabel(
        Definition $fcDefinition,
        string $fieldName,
    ): string {
        $localizedFieldDef = $fcDefinition->getFieldDefinition('localizedfields');

        if ($localizedFieldDef instanceof Localizedfields) {
            $fieldDefinition = $localizedFieldDef->getFieldDefinition($fieldName);

            if ($fieldDefinition instanceof ClassDefinition\Data) {
                return $this->extractFieldTitle($fieldDefinition);
            }
        }

        return ucfirst($fieldName);
    }

    /**
     * Check if a value is just an empty object instance (not actual data).
     */
    private function isEmptyObjectInstance(mixed $value): bool
    {
        if (!is_object($value)) {
            return false;
        }

        if ($value instanceof Objectbrick) {
            return count($value->getItems()) === 0;
        }

        if ($value instanceof Fieldcollection) {
            return count($value->getItems()) === 0;
        }

        return false;
    }
}
