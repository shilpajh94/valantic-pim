<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use Pimcore\Db;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
use Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick;
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
     *
     * @return array<string, array{old: mixed, new: mixed}> Array with field names as keys and change data
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
     *
     * @param AbstractObject $object The object containing the field
     * @param string $field The field name
     * @param mixed $value The field value to transform
     *
     * @return string|null Transformed string representation or null
     */
    private function transformSpecialFieldValue(AbstractObject $object, string $field, mixed $value): ?string
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
     *
     * @param mixed $value The value to transform
     *
     * @return string|null Transformed string representation or null
     */
    private function transformValue(mixed $value): ?string
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
                return (string) $name;
            }

            return $objectKey;
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
     *
     * @return bool True if the field is a multiselect, select, or checkbox field
     */
    private function isCheckboxField(AbstractObject $object, string $field): bool
    {
        // Fix: Check if object is Concrete before calling getClass()
        if (!$object instanceof Concrete) {
            return false;
        }

        $class = $object->getClass();
        $fieldDefinition = $class->getFieldDefinition($field);

        return $fieldDefinition instanceof ClassDefinition\Data\Multiselect
            || $fieldDefinition instanceof ClassDefinition\Data\Select
            || $fieldDefinition instanceof ClassDefinition\Data\Checkbox;
    }

    /**
     * Compute changes for the object brick.
     *
     * @return array<string, array{old: mixed, new: mixed}> Array with brick field names as keys and change data
     */
    private function computeObjectBrickChanges(AbstractObject $object): array
    {
        $changes = [];

        // Fix: Check if object is Concrete before calling getClass()
        if (!$object instanceof Concrete) {
            return $changes;
        }

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
                            $brickClassDefinition = Objectbrick\Definition::getByKey($brickType);

                            foreach ($brickClassDefinition->getFieldDefinitions() as $brickFieldDefinition) {
                                $field = $brickFieldDefinition->getName();

                                if ($brickFieldDefinition instanceof Localizedfields) {
                                    continue;
                                }

                                if ($brickFieldDefinition instanceof ClassDefinition\Data\Relations\AbstractRelations) {
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
     *
     * @param mixed $fieldDefinition The field definition object
     * @param object $brick The brick object containing the field
     * @param string $field The field name to extract
     *
     * @return mixed The field value - relation IDs for relation fields, raw value for others
     */
    private function getFieldValue(mixed $fieldDefinition, object $brick, string $field): mixed
    {
        if ($fieldDefinition instanceof ClassDefinition\Data\Relations\AbstractRelations) {
            return $this->extractRelations($brick->get($field));
        }

        return $brick->get($field);
    }

    /**
     * Normalize values for comparison.
     *
     * @param mixed $value The value to normalize
     *
     * @return array<int, string>|string|object|null Normalized value - arrays become string arrays, strings are trimmed, objects unchanged
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
     * Check if two values are equivalent, considering type differences.
     *
     * @param string|object|array<mixed>|null $oldValue The old value to compare
     * @param string|object|array<mixed>|null $newValue The new value to compare
     *
     * @return bool True if values are equivalent
     */
    private function areValuesEquivalent(string|object|array|null $oldValue, string|object|array|null $newValue): bool
    {
        return $oldValue === $newValue;
    }

    /**
     * Compute changes for localized fields inside object bricks - only show changed fields.
     *
     * @return array<string, array{old: string|null, new: string|null}> Array with brick field names as keys and formatted change data
     */
    private function computeLocalizedFieldChangesInBricks(AbstractObject $object): array
    {
        $changes = [];

        // Fix: Check if object is Concrete before calling getClass()
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
     * Process brick data and return changes.
     *
     * @param Objectbrick $objectBrickData The object brick data containing brick getters
     * @param array<string, mixed> $localizedBrickData Localized brick data with brick types as keys
     *
     * @return array<string, array{old: string|null, new: string|null}> Array with brick field names as keys and formatted change data
     */
    private function processBrickData(Objectbrick $objectBrickData, array $localizedBrickData): array
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
     *
     * @param object $brick The brick object containing localized fields (must have getLocalizedFields() and getType() methods)
     * @param array<string, mixed> $localizedBrickData Localized brick data with brick types as keys
     *
     * @return array<string, array{old: string|null, new: string|null}> Array with brick field names as keys and formatted change data
     */
    private function processBrickLocalizedFields(object $brick, array $localizedBrickData): array
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
     *
     * @param array<string, mixed> $localizedBrickData Localized brick data with brick types as keys
     * @param string $brickType The brick type to get data for
     * @param string $language The language code to get data for
     *
     * @return array<string, mixed> Array of field data for the specified language, or empty array if not found
     */
    private function getOldFieldsForLanguage(array $localizedBrickData, string $brickType, string $language): array
    {
        return $localizedBrickData[$brickType]['localized'][$language]['levelSpecificData'] ?? [];
    }

    /**
     * Compare field values between new and old - only return actual changes.
     *
     * @param array<string, mixed> $newFields New field values with field names as keys
     * @param array<string, mixed> $normalizedOldFields Normalized old field values with field names as keys
     * @param string $language Language code for the comparison
     *
     * @return array<string, array{old: array<string, mixed>, new: array<string, mixed>}> Field changes with field names as keys and language-specific old/new values
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
     *
     * @param array<string, array{old: array<mixed>, new: array<mixed>}> $existing Existing field changes
     * @param array<string, array{old: array<mixed>, new: array<mixed>}> $new New field changes to merge
     *
     * @return array<string, array{old: array<mixed>, new: array<mixed>}> Merged field changes
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
     *
     * @param mixed $oldValue The old field value
     * @param mixed $newValue The new field value
     *
     * @return bool True if the field has changed
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
     *
     * @param mixed $oldValue The old field value
     * @param mixed $newValue The new field value
     *
     * @return bool True if the change should be skipped
     */
    private function shouldSkipChange(mixed $oldValue, mixed $newValue): bool
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
     *
     * @param array<string, mixed> $oldFields Array with locale keys and nested data
     *
     * @return array<string, array<string, mixed>> Normalized array with locale keys and field data
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
     *
     * @param mixed $value The value to normalize
     *
     * @return mixed The normalized value (could be original value, array, or processed string)
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
     * Determine if a string value should be converted to an array
     * This can be customized based on your specific business logic.
     */
    private function shouldBeArray(): bool
    {
        return false;
    }

    /**
     * Compute changes for relation fields.
     *
     * @return array<string, array{old: list<string>, new: list<string>}> Array with relation field names as keys and change data
     */
    private function computeRelationFieldChanges(AbstractObject $object): array
    {
        $changes = [];

        // Fix: Check if object is Concrete before calling getClass()
        if (!$object instanceof Concrete) {
            return $changes;
        }

        $oldRelationData = $this->getOldRelationDataFromDatabase($object);

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if ($fieldDefinition instanceof ClassDefinition\Data\Relations\AbstractRelations) {
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
     * @param mixed $relations Single object, array of objects, or other relation data
     *
     * @return list<string> Array of object names or string representations
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
     * @param array<mixed>|string|null $relationIds Array of IDs, comma-separated string, or null
     *
     * @return list<string> Array of object names or fallback strings
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
     * @param mixed $relations Single object, array of objects, or other relation data
     *
     * @return list<mixed> Array of relation IDs or values
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
     * @return array<string, mixed> Array with field names as keys and field values as values
     */
    private function getOldDataFromDatabase(AbstractObject $object): array
    {
        // Fix: Check if object is Concrete before calling getClassName()
        if (!$object instanceof Concrete) {
            return [];
        }

        $classDefinition = ClassDefinition::getByName($object->getClassName());

        if (!$classDefinition instanceof ClassDefinition) {
            return [];
        }

        $tableName = 'object_' . $classDefinition->getId();
        $sql = "SELECT * FROM $tableName WHERE oo_id = :id";

        return Db::get()->fetchAssociative($sql, ['id' => $object->getId()]) ?: [];
    }

    /**
     * Retrieve localized field data for bricks.
     *
     * @return array<string, array<string, mixed>> Array with brick types as keys and nested localized data
     */
    private function getOldLocalizedBrickDataFromDatabase(AbstractObject $object): array
    {
        $data = [];

        // Fix: Check if object is Concrete before calling getClass()
        if (!$object instanceof Concrete) {
            return $data;
        }

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
     *
     * @return array<string, list<mixed>> Array with field names as keys and arrays of destination IDs as values
     */
    private function getOldRelationDataFromDatabase(AbstractObject $object): array
    {
        // Fix: Check if object is Concrete before calling getClassName()
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
     * Retrieve object brick data of an object from the database.
     *
     * @return array<string, array<string, mixed>> Array with brick types as keys and brick data as values
     */
    private function getOldBrickDataFromDatabase(AbstractObject $object, ?Objectbrick $objectBrickData): array
    {
        $data = [];

        // Fix: Check if object is Concrete before calling getClass()
        if (!$object instanceof Concrete) {
            return $data;
        }

        if ($objectBrickData instanceof Objectbrick) {
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

                        $relationData = $this->getRelationData($objectId, (string) $object->getClass()->getId(), $brick->getFieldname());

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
     *
     * @return array<int, array{dest_id: mixed, type: mixed, index: mixed}> Array of relation data
     */
    private function getRelationData(?int $objectId, string $brickType, string $fieldname): array
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
     *
     * @return array<string, array{old: string|null, new: string|null}> Array with field names as keys and change data
     */
    private function computeLocalizedFieldChanges(AbstractObject $object): array
    {
        $changes = [];

        // Fix: Check if object is Concrete before calling getClass()
        if (!$object instanceof Concrete) {
            return $changes;
        }

        $localizedFieldData = $this->getOldLocalizedFieldDataFromDatabase($object);

        foreach ($object->getClass()->getFieldDefinitions() as $fieldDefinition) {
            if ($fieldDefinition instanceof Localizedfields) {
                $localizedFields = $object->get($fieldDefinition->getName());

                if ($localizedFields) {
                    /** @var array<string, array{old: array<string, mixed>, new: array<string, mixed>}> $fieldChanges */
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

    /**
     * Get old localized field data from database.
     *
     * @return array<string, array<string, mixed>> Array with language codes as keys and field data as values
     */
    private function getOldLocalizedFieldDataFromDatabase(AbstractObject $object): array
    {
        $data = [];

        // Fix: Check if object is Concrete before calling getClass()
        if (!$object instanceof Concrete) {
            return $data;
        }

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
     * @param array<string, string|array<int|string, mixed>|null> $languageValues Array with language codes as keys
     *                                                                            and string, array, or null as values
     *
     * @return string|null Formatted string or null if no values
     */
    private function formatLocalizedValues(array $languageValues): ?string
    {
        if ($languageValues === []) {
            return null;
        }

        $formatted = [];

        foreach ($languageValues as $language => $value) {
            if (is_array($value)) {
                // More type-safe array handling
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
}
