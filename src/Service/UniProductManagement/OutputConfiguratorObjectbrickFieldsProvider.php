<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use App\Util\Helpers;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
use Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject\Objectbrick\Definition;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class OutputConfiguratorObjectbrickFieldsProvider implements SelectOptionsProviderInterface
{
    /**
     * Returns the list of all Object Brick fields for the given classes.
     *
     * @param array<string, mixed> $context
     *
     * @return array<array<string, string>> List of key-value pairs for options.
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        return $this->getObjectBrickFields();
    }

    /**
     * Returns the list of all data fields, including relation fields, localized fields,
     * object bricks, and their subfields, from the target classes.
     *
     * @return array<array<string, string>> List of key-value pairs for fields.
     */
    public function getObjectBrickFields(): array
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
                error_log(sprintf('Class definition not found for key: %s', $classKey));

                continue;
            }

            foreach ($class->getFieldDefinitions() as $field) {
                if ($field instanceof Objectbricks) {
                    $brickFields = $this->getFieldsFromObjectBrick($field);
                    $fields = array_merge($fields, $brickFields);
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
     * Extracts fields from an Object Brick field definition.
     *
     * @param Objectbricks $objectBrickField The Object Brick field being processed.
     *
     * @return array<array<string, string>> List of Object Brick fields.
     */
    private function getFieldsFromObjectBrick(Objectbricks $objectBrickField): array
    {
        $fields = [];
        $brickDefinitions = $objectBrickField->getAllowedTypes(); // Get allowed Object Brick types

        foreach ($brickDefinitions as $brickDefinitionName) {
            $brickDefinition = Definition::getByKey($brickDefinitionName);

            if (!$brickDefinition instanceof Definition) {
                continue;
            }

            foreach ($brickDefinition->getFieldDefinitions() as $brickField) {
                if ($brickField instanceof Localizedfields) {
                    foreach ($brickField->getFieldDefinitions() as $localizedField) {
                        $fields[] = [
                            'key' => $localizedField->getName(),
                            'value' => sprintf('%s.%s', $brickDefinitionName, $localizedField->getName()),
                            'title' => $this->getFieldTitleOrLabel($localizedField),
                            'localized' => true,
                        ];
                    }
                } else {
                    $fields[] = [
                        'key' => $brickField->getName(),
                        'value' => sprintf('%s.%s', $brickDefinitionName, $brickField->getName()),
                        'title' => $this->getFieldTitleOrLabel($brickField),
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
        return !in_array($field->getTitle(), ['', '0'], true) ? $field->getTitle() : $field->getName();
    }
}
