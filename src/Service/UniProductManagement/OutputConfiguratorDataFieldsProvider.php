<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use App\Util\Helpers;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections;
use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject\Fieldcollection\Definition;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class OutputConfiguratorDataFieldsProvider implements SelectOptionsProviderInterface
{
    /**
     * Returns the list of all data fields from the target classes for Pimcore multiselect.
     *
     * @param array<string, mixed> $context
     *
     * @return array<array<string, string>> List of key-value pairs for options.
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        return $this->getFields();
    }

    /**
     * Returns the list of all data fields, including relation fields, localized fields,
     * field collections, and their subfields, from the target classes.
     *
     * @return array<array<string, string>> List of key-value pairs for fields.
     */
    public function getFields(): array
    {
        $targetClasses = [
            UniProductBase::class,
            UniProductCategoryInternal::class,
        ];

        $fields = [];

        foreach ($targetClasses as $fullyQualifiedClassName) {
            $classKey = Helpers::classBasename($fullyQualifiedClassName);
            $class = ClassDefinition::getByName($classKey);

            if (!$class instanceof ClassDefinition) {
                continue;
            }

            foreach ($class->getFieldDefinitions() as $field) {
                if ($field instanceof Localizedfields) {
                    foreach ($field->getFieldDefinitions() as $localizedField) {
                        $fields[] = [
                            'key' => $localizedField->getName(),
                            'value' => $localizedField->getName(),
                            'title' => $this->getFieldTitleOrLabel($localizedField),
                            'localized' => true,
                        ];
                    }
                } elseif ($field instanceof Fieldcollections) {
                    $fieldCollectionFields = $this->getFieldCollectionFields($field);
                    $fields = array_merge($fields, $fieldCollectionFields);
                } else {
                    $fields[] = [
                        'key' => $field->getName(),
                        'value' => $field->getName(),
                        'title' => $this->getFieldTitleOrLabel($field),
                        'localized' => false,
                    ];
                }
            }
        }

        return $fields;
    }

    /**
     * Indicates whether the options are static or dynamic.
     *
     * @param array<string, mixed> $context
     */
    public function hasStaticOptions(array $context, Data $fieldDefinition): bool
    {
        return false;
    }

    /**
     * Returns the default value for the field.
     *
     * @param array<string, mixed> $context
     *
     * @return array<string, mixed>|string|null Default value for the field.
     */
    public function getDefaultValue(array $context, Data $fieldDefinition): array|string|null
    {
        return null;
    }

    /**
     * Extracts fields from a Field Collection definition.
     *
     * @return array<array<string, string>> List of fields within the field collection.
     */
    private function getFieldCollectionFields(Fieldcollections $fieldCollection): array
    {
        $fields = [];
        $allowedTypes = $fieldCollection->getAllowedTypes();

        if ($allowedTypes === []) {
            return $fields;
        }

        foreach ($allowedTypes as $collectionType) {
            $collectionDefinition = Definition::getByKey($collectionType);

            if (!$collectionDefinition instanceof Definition) {
                continue;
            }

            foreach ($collectionDefinition->getFieldDefinitions() as $subField) {
                if ($subField instanceof Localizedfields) {
                    foreach ($subField->getFieldDefinitions() as $localizedField) {
                        $fieldKey = sprintf('%s.%s.%s', $fieldCollection->getName(), $collectionType, $localizedField->getName());
                        $fieldTitle = sprintf('%s.%s', $collectionType, $this->getFieldTitleOrLabel($localizedField));

                        $fields[] = [
                            'key' => $fieldKey,
                            'value' => $fieldKey,
                            'title' => $fieldTitle,
                            'localized' => true,
                        ];
                    }
                } else {
                    $fieldKey = sprintf('%s.%s.%s', $fieldCollection->getName(), $collectionType, $subField->getName());
                    $fieldTitle = sprintf('%s.%s', $collectionType, $this->getFieldTitleOrLabel($subField));

                    $fields[] = [
                        'key' => $fieldKey,
                        'value' => $fieldKey,
                        'title' => $fieldTitle,
                        'localized' => false,
                    ];
                }
            }
        }

        return $fields;
    }

    /**
     * Returns the title or label of a field, falling back to its name if not available.
     */
    private function getFieldTitleOrLabel(Data $field): string
    {
        $title = $field->getTitle();

        return $title !== '' ? $title : $field->getName();
    }
}
