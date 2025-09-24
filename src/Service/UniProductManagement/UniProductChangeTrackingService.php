<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use Pimcore\Db;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks;
use Psr\Log\LoggerInterface;

class UniProductChangeTrackingService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Compute changes for the current object state.
     * Includes changes for standard fields, object bricks, localized fields, and relation fields.
     */
    public function computeChanges(AbstractObject $object): array
    {
        $dirtyFields = $object->getDirtyFields();

        $oldData = $this->getOldDataFromDatabase($object);

        $newData = [];

        foreach ($dirtyFields as $field) {
            $getterMethod = 'get' . ucfirst($field);

            if (method_exists($object, $getterMethod)) {
                $newValue = $object->$getterMethod();
                $newData[$field] = $this->transformSpecialFieldValue($object, $field, $newValue);
            }
        }

        $objectBrickChanges = $this->computeObjectBrickChanges($object);
        $localizedFieldChanges = $this->computeLocalizedFieldChanges($object);
        $brickLocalizedFieldChanges = $this->computeLocalizedFieldChangesInBricks($object);
        $relationFieldChanges = $this->computeRelationFieldChanges($object);
        $standardFieldChanges = [];

        foreach ($dirtyFields as $field) {
            $oldRawValue = $oldData[$field] ?? null;
            $oldValue = $this->transformSpecialFieldValue($object, $field, $oldRawValue);
            $newValue = $newData[$field] ?? null;

            if ($oldValue === $newValue) {
                continue;
            }

            $standardFieldChanges[$field] = [
                'old' => $oldValue,
                'new' => $newValue,
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
     * Transform special field values (e.g., "checkbox" or "assignedUser") for better display in history.
     */
    private function transformSpecialFieldValue(AbstractObject $object, string $field, $value)
    {
        if ($field === 'assignedUser') {
            $userId = (int) $value;
            $user = \Pimcore\Model\User::getById($userId);

            return $user instanceof \Pimcore\Model\User ? $user->getName() : "User ID $userId (Not Found)";
        }

        if ($this->isCheckboxField($object, $field)) {
            if ($value === true) {
                return 'Yes';
            }

            return 'No';
        }

        return $this->transformValue($value);
    }

    /**
     * Generic value transformation for standard fields.
     */
    private function transformValue($value): ?string
    {
        if ($value === null) {
            return 'NULL';
        }

        if (is_bool($value)) {
            return $value ? 'Yes' : 'No';
        }

        if (is_array($value)) {
            return implode(', ', array_map([$this, 'transformValue'], $value));
        }

        if ($value instanceof \Pimcore\Model\User) {
            $username = $value->getName();
            $email = $value->getEmail();

            return $email !== null && $email !== '' && $email !== '0' ? "$username <$email>" : $username;
        }

        if ($value instanceof AbstractObject) {
            $objectKey = $value->getKey();
            $name = $value->get('name');

            if ($name) {
                return "$name";
            }

            return $name ? "<$objectKey>: $name" : $objectKey;
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
        $class = $object->getClass();

        if ($class) {
            $fieldDefinition = $class->getFieldDefinition($field);

            return $fieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect
                   || $fieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Select
                   || $fieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox;
        }

        return false;
    }

    /**
     * Compute changes for the  object brick.
     */
    private function computeObjectBrickChanges(AbstractObject $object): array
    {
        $changes = [];

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if ($fieldDefinition instanceof Objectbricks) {
                $fieldName = $fieldDefinition->getName();
                $objectBrickData = $object->get($fieldName);
                $oldBrickData = $this->getOldBrickDataFromDatabase($object, $objectBrickData);

                if ($objectBrickData) {
                    foreach ($objectBrickData->getBrickGetters() as $brickGetter) {
                        $brick = $objectBrickData->$brickGetter();

                        if ($brick) {
                            $brickType = $brick->getType();
                            $brickClassDefinition = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($brickType);

                            foreach ($brickClassDefinition->getFieldDefinitions() as $brickFieldDefinition) {
                                $field = $brickFieldDefinition->getName();

                                if ($brickFieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields) {
                                    continue;
                                }

                                if ($brickFieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations) {
                                    $oldRelationValue = $oldBrickData[$brickType][$field] ?? [];
                                    $newRelationValue = $brick->get($field);

                                    $oldRelationValue = is_array($oldRelationValue) ? $oldRelationValue : explode(',', (string) $oldRelationValue);
                                    $newRelationValue = $this->transformRelationObjectsToNames($newRelationValue);
                                    $oldRelationValue = $this->transformRelationIdsToNames($oldRelationValue);

                                    if ($newRelationValue !== $oldRelationValue) {
                                        $changes["{$brickType}.relation.{$field}"] = [
                                            'old' => $oldRelationValue,
                                            'new' => $newRelationValue,
                                        ];
                                    }

                                    continue;
                                }
                                $newValue = $this->getFieldValue($brickFieldDefinition, $brick, $field);
                                $oldValue = $oldBrickData[$brickType][$field] ?? null;

                                $newValue = $this->normalizeValue($newValue);
                                $oldValue = $this->normalizeValue($oldValue);

                                if ($this->areValuesEquivalent($oldValue, $newValue)) {
                                    continue;
                                }

                                $changes["{$brickType}.{$field}"] = [
                                    'old' => $oldValue,
                                    'new' => $newValue,
                                ];
                            }
                        }
                    }
                }
            }
        }

        return $changes;
    }

    /**
     * Extract the value of a field based on its type.
     */
    private function getFieldValue($fieldDefinition, $brick, $field)
    {
        if ($fieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations) {
            return $this->extractRelations($brick->get($field));
        }

        return $brick->get($field);
    }

    /**
     * Normalize values for comparison.
     */
    private function normalizeValue($value): array|string|object|null
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
     * Check if two values are equivalent, considering type differences.
     */
    private function areValuesEquivalent($oldValue, $newValue): bool
    {
        return $oldValue === $newValue;
    }

    /**
     * Compute changes for localized fields inside object bricks - only show changed fields.
     */
    private function computeLocalizedFieldChangesInBricks(AbstractObject $object): array
    {
        $changes = [];
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
     * Process brick data and return changes.
     */
    private function processBrickData($objectBrickData, array $localizedBrickData): array
    {
        $changes = [];

        foreach ($objectBrickData->getBrickGetters() as $brickGetter) {
            $brick = $objectBrickData->$brickGetter();

            if (!$brick || !$brick->getLocalizedFields()) {
                continue;
            }

            $brickChanges = $this->processBrickLocalizedFields($brick, $localizedBrickData);
            $changes = array_merge($changes, $brickChanges);
        }

        return $changes;
    }

    /**
     * Process localized fields for a specific brick - only return changed fields.
     */
    private function processBrickLocalizedFields($brick, array $localizedBrickData): array
    {
        $changes = [];
        $newLocalizedFields = $brick->getLocalizedFields()->getItems();
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
     */
    private function getOldFieldsForLanguage(array $localizedBrickData, string $brickType, string $language): array
    {
        return $localizedBrickData[$brickType]['localized'][$language]['levelSpecificData'] ?? [];
    }

    /**
     * Compare field values between new and old - only return actual changes.
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
            if (!array_key_exists($fieldName, $newFields)) {
                if ($this->shouldSkipBrickField($fieldName)) {
                    continue;
                }

                $newValue = null;

                if ($this->hasFieldChanged($oldValue, $newValue)) {
                    $fieldChanges[$fieldName]['old'][$language] = $oldValue;
                    $fieldChanges[$fieldName]['new'][$language] = $newValue;
                }
            }
        }

        return $fieldChanges;
    }

    /**
     * Merge field changes arrays.
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
    private function hasFieldChanged($oldValue, $newValue): bool
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
    private function shouldSkipChange($oldValue, $newValue): bool
    {
        $oldEmpty = ($oldValue === null || $oldValue === '' || $oldValue === []);
        $newEmpty = ($newValue === null || $newValue === '' || $newValue === []);

        if ($oldEmpty && $newEmpty) {
            return true;
        }

        return ($oldValue === [] && $newValue === null)
               || ($oldValue === null && $newValue === [])
               || ($oldValue === '' && $newValue === null)
               || ($oldValue === null && $newValue === '');
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
     * Normalize the old `levelSpecificData` format to match the new structure dynamically.
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
    private function normalizeFieldValue($value)
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
     * Determine if a string value should be converted to an array
     * This can be customized based on your specific business logic.
     */
    private function shouldBeArray(): bool
    {
        return false;
    }

    /**
     * Compute changes for relation fields.
     */
    private function computeRelationFieldChanges(AbstractObject $object): array
    {
        $changes = [];
        $oldRelationData = $this->getOldRelationDataFromDatabase($object);

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if ($fieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations) {
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

    private function transformRelationObjectsToNames($relations): array
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
     */
    private function extractRelations($relations): array
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
     */
    private function getOldDataFromDatabase(AbstractObject $object): array
    {
        $classDefinition = \Pimcore\Model\DataObject\ClassDefinition::getByName($object->getClassName());
        $tableName = 'object_' . $classDefinition->getId();
        $sql = "SELECT * FROM $tableName WHERE oo_id = :id";

        return Db::get()->fetchAssociative($sql, ['id' => $object->getId()]) ?: [];
    }

    /**
     * Retrieve localized field data for bricks.
     */
    private function getOldLocalizedBrickDataFromDatabase(AbstractObject $object): array
    {
        $data = [];
        $classDefinition = $object->getClass();

        foreach ($classDefinition->getFieldDefinitions() as $fieldDefinition) {
            if ($fieldDefinition instanceof Objectbricks) {
                foreach ($fieldDefinition->getAllowedTypes() as $brickType) {
                    $classId = $classDefinition->getId();
                    $objectId = $object->getId();

                    $localizedTableName = "object_brick_localized_{$brickType}_{$classId}";

                    try {
                        $localizedSql = "SELECT * FROM $localizedTableName WHERE ooo_id = :id";
                        $localizedRows = Db::get()->fetchAllAssociative($localizedSql, ['id' => $objectId]);

                        foreach ($localizedRows as $localizedRow) {
                            $language = $localizedRow['language'];
                            $fieldname = $localizedRow['fieldname'];
                            unset($localizedRow['ooo_id'], $localizedRow['language'], $localizedRow['fieldname']);

                            $data[$brickType]['localized'][$language][$fieldname] = $localizedRow;
                        }
                    } catch (\Exception $e) {
                        $this->logger->warning("Localized table for {$brickType} not found: " . $e->getMessage());

                        continue;
                    }
                }
            }
        }

        return $data;
    }

    /**
     * Retrieve relation field data of an object from the database.
     */
    private function getOldRelationDataFromDatabase(AbstractObject $object): array
    {
        $classDefinition = \Pimcore\Model\DataObject\ClassDefinition::getByName($object->getClassName());
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
     * Retrieve object brick data of an object from the database.
     */
    private function getOldBrickDataFromDatabase(AbstractObject $object, $objectBrickData): array
    {
        $data = [];

        if ($objectBrickData) {
            foreach ($objectBrickData->getBrickGetters() as $brickGetter) {
                $brick = $objectBrickData->$brickGetter();

                if ($brick) {
                    $brickType = $brick->getType();
                    $classId = $object->getClass()->getId();
                    $objectId = $object->getId();

                    $tableName = "object_brick_query_{$brickType}_{$classId}";
                    $sql = "SELECT * FROM $tableName WHERE id = :id AND fieldname = :fieldname";
                    $row = Db::get()->fetchAssociative($sql, [
                        'id' => $objectId,
                        'fieldname' => $brick->getFieldname(),
                    ]);

                    if ($row) {
                        unset($row['fieldname'], $row['id']);
                        $data[$brickType] = $row;

                        $relationData = $this->getRelationData($objectId, $object->getClass()->getId(), $brick->getFieldname());

                        if ($relationData !== []) {
                            $data[$brickType]['relations'] = $relationData;
                        }
                    }
                }
            }
        }

        return $data;
    }

    /**
     * Get relational data for a specific brick type and fieldname.
     */
    private function getRelationData(?int $objectId, string $brickType, $fieldname): array
    {
        $relationData = [];

        $tableName = 'object_relations_' . $brickType;
        $sql = "SELECT * FROM $tableName WHERE src_id = :objectId AND fieldname = :fieldname";

        $rows = Db::get()->fetchAllAssociative($sql, [
            'objectId' => $objectId,
            'fieldname' => $fieldname,
        ]);

        foreach ($rows as $row) {
            $relationData[] = [
                'dest_id' => $row['dest_id'],
                'type' => $row['type'],
                'index' => $row['index'],
            ];
        }

        return $relationData;
    }

    /**
     * Compute changes for localized fields in normal data objects (not bricks).
     * Only shows the last changed fields.
     */
    private function computeLocalizedFieldChanges(AbstractObject $object): array
    {
        $changes = [];
        $localizedFieldData = $this->getOldLocalizedFieldDataFromDatabase($object);

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if ($fieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields) {
                $localizedFields = $object->get($fieldDefinition->getName());

                if ($localizedFields) {
                    $fieldChanges = [];

                    foreach ($localizedFields->getItems() as $language => $newFields) {
                        $oldFields = $localizedFieldData[$language] ?? [];

                        foreach ($newFields as $fieldName => $newValue) {
                            $oldValue = $oldFields[$fieldName] ?? null;

                            $newValue = $this->normalizeValue($newValue);
                            $oldValue = $this->normalizeValue($oldValue);

                            if (($oldValue === [] && $newValue === null) || ($oldValue === null && $newValue === [])) {
                                continue;
                            } elseif ($oldValue === $newValue) {
                                continue;
                            }

                            if (!isset($fieldChanges[$fieldName])) {
                                $fieldChanges[$fieldName] = ['old' => [], 'new' => []];
                            }

                            $fieldChanges[$fieldName]['old'][$language] = $oldValue;
                            $fieldChanges[$fieldName]['new'][$language] = $newValue;
                        }
                    }

                    foreach ($fieldChanges as $fieldName => $languageChanges) {
                        $oldFormatted = $this->formatLocalizedValues($languageChanges['old']);
                        $newFormatted = $this->formatLocalizedValues($languageChanges['new']);

                        $changes["localized.{$fieldName}"] = [
                            'old' => $oldFormatted,
                            'new' => $newFormatted,
                        ];
                    }
                }
            }
        }

        return $changes;
    }

    private function getOldLocalizedFieldDataFromDatabase(AbstractObject $object): array
    {
        $data = [];
        $objectId = $object->getId();
        $classDefinition = $object->getClass();
        $tableName = 'object_localized_data_' . $classDefinition->getId();

        try {
            $localizedSql = "SELECT * FROM {$tableName} WHERE ooo_id = :id";
            $rows = Db::get()->fetchAllAssociative($localizedSql, ['id' => $objectId]);

            foreach ($rows as $row) {
                $language = $row['language'];
                unset($row['ooo_id'], $row['language']);
                $data[$language] = $row;
            }
        } catch (\Exception $e) {
            $this->logger->warning('Localized table for normal fields not found: ' . $e->getMessage());
        }

        return $data;
    }

    /**
     * Format localized values as a string in the format "DE: value, CN: value".
     *
     * @param array $languageValues Array with language codes as keys and values
     *
     * @return string Formatted string or null if no values
     */
    private function formatLocalizedValues(array $languageValues): ?string
    {
        if ($languageValues === []) {
            return null;
        }

        $formatted = [];

        foreach ($languageValues as $language => $value) {
            if ($value !== null && $value !== '' && $value !== []) {
                if (is_array($value)) {
                    $value = implode(', ', $value);
                }
                $formatted[] = strtoupper($language) . ': ' . $value;
            }
        }

        return $formatted !== [] ? implode(', ', $formatted) : null;
    }
}
