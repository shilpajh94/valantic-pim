<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use App\Enum\UniOutputConfigurationColumnType;
use App\Enum\UniOutputConfigurationOutputFormat;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Folder;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\DataObject\UniProductDataOutputConfiguration;

class OutputConfiguratorService
{
    public function __construct(
        private readonly OutputConfiguratorDataFieldsProvider $dynamicFieldsProvider,
        private readonly OutputConfiguratorObjectbrickFieldsProvider $objectBrickFieldsProvider,
    ) {
    }

    public function generateExport(
        UniProductDataOutputConfiguration $configurator,
    ): string {
        $dynamicFields = $this->dynamicFieldsProvider->getFields();
        $objectBrickFields = $this->objectBrickFieldsProvider->getObjectBrickFields();
        $options = array_merge($dynamicFields, $objectBrickFields);

        $finishedGoods = $configurator->getFinishedGoods();
        $internalCategories = $configurator->getFinishedGoods();
        $dataFields = $configurator->getDataFields();
        $productfields = $configurator->getProductGroupSpecificDatafields();

        if ($productfields !== null) {
            $fields = array_merge($dataFields, $productfields);
        } else {
            $fields = $dataFields;
        }

        $columnType = $configurator->getColumnNameType();
        $languages = $configurator->getLanguages() ?? [];

        $fields = match ($columnType) {
            UniOutputConfigurationColumnType::LABEL->value => $this->mapFieldsToLabels($fields, $options, $languages),
            UniOutputConfigurationColumnType::TECHNICAL->value => $this->mapFields($fields, $options, $languages),
            default => throw new \RuntimeException(sprintf('Unknown column type "%s"', $columnType)),
        };

        $columnNames = $this->prepareColumnNames($fields, $columnType);
        $data = $this->fetchData($finishedGoods, $internalCategories, $fields, $languages);

        $uniqueHash = bin2hex(random_bytes(8));
        $timestamp = Carbon::now()->format('Y-m-d_His');
        $filename = sprintf('%s_%s_%s.%s', $timestamp, $configurator->getKey(), $uniqueHash, $configurator->getOutputFormat());

        $tempFilePath = PIMCORE_PROJECT_ROOT . '/var/temp/' . $filename;
        $this->generateFile($data, $fields, $columnNames, $configurator->getOutputFormat(), $tempFilePath);

        return $tempFilePath;
    }

    public function generateExportToAsset(
        UniProductDataOutputConfiguration $configurator,
    ): string {
        $tempFilePath = $this->generateExport($configurator);

        $assetDirectory = $configurator->getExportDirectory();

        if (!$assetDirectory instanceof Folder) {
            unlink($tempFilePath);

            throw new \Exception('No valid asset directory configured for scheduled exports.');
        }

        $asset = new Asset();
        $asset->setFilename(basename($tempFilePath));
        $asset->setParent($assetDirectory);
        $asset->setData(file_get_contents($tempFilePath));
        $asset->save();

        unlink($tempFilePath);

        return $asset->getFullPath();
    }

    /**
     * Prepares column names for the given fields.
     *
     * @param array<string, string> $fields The input array of fields.
     * @param string $columnType The processed column type
     *
     * @return array<string, string> The processed column names.
     */
    public function prepareColumnNames(array $fields, string $columnType): array
    {
        $columnNames = [];

        foreach ($fields as $fieldKey => $fieldValue) {
            if (str_contains($fieldKey, '.')) {
                $parts = explode('.', $fieldKey);

                if (count($parts) >= 3) {
                    $columnNames[$fieldKey] = match ($columnType) {
                        UniOutputConfigurationColumnType::LABEL->value => $fieldValue,
                        UniOutputConfigurationColumnType::TECHNICAL->value => sprintf('%s.%s', $parts[count($parts) - 2], $parts[count($parts) - 1]),
                        default => throw new \RuntimeException(sprintf('Unknown column type "%s"', $columnType)),
                    };
                } else {
                    [$brickName, $brickField] = explode('.', $fieldKey, 2);
                    $columnNames[$fieldKey] = match ($columnType) {
                        UniOutputConfigurationColumnType::LABEL->value => sprintf('%s.%s', $brickName, $fieldValue),
                        UniOutputConfigurationColumnType::TECHNICAL->value => $fieldValue,
                        default => throw new \RuntimeException(sprintf('Unknown column type "%s"', $columnType)),
                    };
                }
            } else {
                $columnNames[$fieldKey] = $fieldValue;
            }
        }

        return $columnNames;
    }

    /**
     * Fetches data for finished goods and internal categories.
     *
     * @param array<AbstractObject> $finishedGoods List of finished goods.
     * @param array<AbstractObject> $internalCategories List of internal categories.
     * @param array<string> $dataFields List of data fields to process.
     * @param array<string> $languages The language codes (e.g., 'en', 'de').
     *
     * @return array<int, array<string, mixed>> The fetched data.
     */
    public function fetchData(
        array $finishedGoods,
        array $internalCategories,
        array $dataFields,
        array $languages,
    ): array {
        $data = [];

        foreach ($finishedGoods as $finishedGood) {
            $data[] = $this->extractDataFromObject($finishedGood, $dataFields);
        }

        foreach ($internalCategories as $category) {
            if ($category instanceof UniProductCategoryInternal) {
                $this->fetchCategoryData($category, $data, $dataFields, $languages);
            }
        }

        return $data;
    }

    /**
     * Fetches category data recursively.
     *
     * @param UniProductCategoryInternal $category The category object.
     * @param array<int, array<string, mixed>> $data Reference to the data array.
     * @param array<string> $dataFields List of data fields to process.
     * @param array<string> $languages The language codes (e.g., 'en', 'de').
     */
    public function fetchCategoryData(
        UniProductCategoryInternal $category,
        array &$data,
        array $dataFields,
        array $languages,
    ): void {
        $data[] = $this->extractDataFromObject($category, $dataFields);

        foreach ($category->getChildren() as $subcategory) {
            if (!$subcategory instanceof UniProductCategoryInternal) {
                continue;
            }

            $this->fetchCategoryData($subcategory, $data, $dataFields, $languages);
        }
    }

    /**
     * Extracts data from an object based on the specified fields.
     *
     * @param AbstractObject $object The object to extract data from.
     * @param array<string> $fields List of fields to extract.
     *
     * @return array<string, mixed> Extracted data.
     */
    public function extractDataFromObject(
        AbstractObject $object,
        array $fields,
    ): array {
        $row = [
            'object_id' => $object->getId(),
            'object_key' => $object->getKey(),
        ];

        if (!$object instanceof DataObject\Concrete) {
            throw new \RuntimeException(sprintf('Object must be a Concrete object, got "%s".', $object::class));
        }

        $classId = $object->getClassId();
        $classDefinition = ClassDefinition::getById($classId);

        if (!$classDefinition instanceof ClassDefinition) {
            throw new \RuntimeException(sprintf('Class definition not found for class "%s".', $object->getClassName()));
        }

        foreach ($fields as $fieldKey => $key) {
            if (str_contains($fieldKey, '.')) {
                $row[$fieldKey] = $this->extractComplexFieldValue($object, $fieldKey, $classDefinition);
            } else {
                $row[$fieldKey] = $this->extractSimpleFieldValue($object, $fieldKey, $classDefinition);
            }
        }

        return $row;
    }

    /**
     * Generates and writes the export file.
     *
     * @param array<int, array<string, mixed>> $data The data to export.
     * @param array<string> $fields The fields to include in the export.
     * @param array<string, string> $columnNames Mapping of fields to column names.
     * @param string $format The export format (e.g., 'xlsx' or 'csv').
     * @param string $filePath The file path to write the export.
     */
    public function generateFile(
        array $data,
        array $fields,
        array $columnNames,
        string $format,
        string $filePath,
    ): void {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $columnIndex = 1;

        foreach ($columnNames as $fieldTitle) {
            $columnLetter = Coordinate::stringFromColumnIndex($columnIndex);
            $sheet->setCellValue($columnLetter . '1', $fieldTitle);
            $columnIndex++;
        }

        $rowIndex = 2;

        foreach ($data as $row) {
            $columnIndex = 1;

            foreach ($fields as $fieldKey => $fieldTitle) {
                $cellKey = $fieldKey;
                $cellValue = $row[$cellKey] ?? '';
                $columnLetter = Coordinate::stringFromColumnIndex($columnIndex);
                $sheet->setCellValue($columnLetter . $rowIndex, $cellValue);
                $columnIndex++;
            }
            $rowIndex++;
        }

        $directory = dirname($filePath);

        if (!is_dir($directory)) {
            if (!mkdir($directory, 0o755, true) && !is_dir($directory)) {
                throw new \Exception(sprintf('Unable to create directory: %s', $directory));
            }
        }

        $writer = $format === UniOutputConfigurationOutputFormat::XLSX->value ? new Xlsx($spreadsheet) : new Csv($spreadsheet);
        $writer->save($filePath);

        if (!file_exists($filePath)) {
            throw new \Exception(sprintf('File not created at path: %s', $filePath));
        }
    }

    /**
     * Formats a cell value for export.
     *
     * @param mixed $value The value to format.
     * @param string|null $fieldType The field type (e.g., 'checkbox').
     *
     * @return string The formatted value.
     */
    public function formatCellValue(mixed $value, ?string $fieldType = null): string
    {
        if ($fieldType === 'checkbox') {
            if ($value === true || $value === 1 || $value === '1') {
                return 'Yes';
            }

            return 'No';
        }

        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        } elseif (is_array($value)) {
            return implode(', ', $value);
        } elseif (is_object($value)) {
            return method_exists($value, '__toString') ? (string) $value : '[Object]';
        }

        return (string) $value;
    }

    /**
     * Maps fields to their labels, appending language suffix for localized fields.
     *
     * @param array<string> $fields List of field names.
     * @param array<array<string, string>> $options Field options with metadata.
     * @param array<string> $language Language codes (e.g., 'en', 'de').
     *
     * @return array<string, string> Mapped fields with labels.
     */
    public function mapFieldsToLabels(array $fields, array $options, array $language = []): array
    {
        return $this->mapFieldsHelper(
            $fields,
            $options,
            $language,
            fn (array $option) => $option['title'] ?? $option['value'],
        );
    }

    /**
     * Maps fields to their technical names, appending language suffix for localized fields.
     *
     * @param array<string> $fields List of field names.
     * @param array<array<string, string>> $options Field options with metadata.
     * @param array<string> $language Language codes (e.g., 'en', 'de').
     *
     * @return array<string, string> Mapped fields with technical names.
     */
    public function mapFields(array $fields, array $options, array $language = []): array
    {
        return $this->mapFieldsHelper(
            $fields,
            $options,
            $language,
            fn (array $option) => $option['value'],
        );
    }

    /**
     * Extracts value from complex fields (field collections or objectbricks).
     */
    private function extractComplexFieldValue(
        DataObject\Concrete $object,
        string $fieldKey,
        ClassDefinition $classDefinition,
    ): string {
        $parts = explode('.', $fieldKey);

        if (count($parts) < 2) {
            return '';
        }

        $containerName = $parts[0];
        $fieldDef = $classDefinition->getFieldDefinition($containerName);

        if ($fieldDef instanceof ClassDefinition\Data\Fieldcollections) {
            return $this->extractFieldCollectionValue($object, $fieldKey);
        }

        return $this->extractBrickFieldValue($object, $fieldKey, $classDefinition);
    }

    /**
     * Extracts value from a field collection.
     */
    private function extractFieldCollectionValue(
        DataObject\Concrete $object,
        string $fieldKey,
    ): string {
        $parts = explode('.', $fieldKey);

        if (count($parts) !== 3) {
            return '';
        }

        [$containerName, $collectionType, $fieldName] = $parts;
        $cleanFieldName = preg_replace('/_[a-z]{2}(?:_[A-Z]{2})?$/', '', $fieldName);

        $getter = 'get' . ucfirst($containerName);

        if (!method_exists($object, $getter)) {
            return '';
        }

        $fieldCollection = $object->$getter();

        if (!$fieldCollection instanceof DataObject\Fieldcollection) {
            return '';
        }
        $values = [];

        foreach ($fieldCollection->getItems() as $item) {
            if ($item->getType() !== $collectionType) {
                continue;
            }

            $itemGetter = 'get' . ucfirst($cleanFieldName);

            if (!method_exists($item, $itemGetter)) {
                continue;
            }

            try {
                if (preg_match('/_([a-z]{2}(?:_[A-Z]{2})?)$/', $fieldName, $matches)) {
                    $language = $matches[1];
                    $value = $item->$itemGetter($language);
                } else {
                    $value = $item->$itemGetter();
                }

                if ($value !== null && $value !== '') {
                    $values[] = $value;
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        $fieldType = $this->getFieldCollectionFieldType($collectionType, $cleanFieldName);

        $formattedValues = array_map(
            fn ($val): string => $this->formatCellValue($val, $fieldType),
            $values,
        );

        return implode(', ', $formattedValues);
    }

    /**
     * Gets the field type from a field collection definition.
     */
    private function getFieldCollectionFieldType(string $collectionType, string $fieldName): ?string
    {
        $collectionDefinition = DataObject\Fieldcollection\Definition::getByKey($collectionType);

        if (!$collectionDefinition instanceof DataObject\Fieldcollection\Definition) {
            return null;
        }

        $fieldDef = $collectionDefinition->getFieldDefinition($fieldName);

        if (!$fieldDef instanceof ClassDefinition\Data) {
            return null;
        }

        return $fieldDef->getFieldtype();
    }

    private function extractBrickFieldValue(
        DataObject\Concrete $object,
        string $fieldKey,
        ClassDefinition $classDefinition,
    ): string {
        $parts = explode('.', $fieldKey);

        if (count($parts) === 2) {
            [$brickTypeName, $brickField] = $parts;
            $brickContainerName = null;
        } elseif (count($parts) === 3) {
            [$brickContainerName, $brickTypeName, $brickField] = $parts;
        } else {
            return '';
        }

        $cleanBrickField = preg_replace('/_[a-z]{2}(?:_[A-Z]{2})?$/', '', $brickField);

        if ($brickContainerName === null) {
            $brickContainerName = $this->findBrickContainerName($classDefinition, $brickTypeName);
        }

        if ($brickContainerName === null) {
            return '';
        }

        $brickGetter = 'get' . ucfirst($brickContainerName);

        if (!method_exists($object, $brickGetter)) {
            return '';
        }

        $brickContainer = $object->$brickGetter();

        if (!$brickContainer instanceof DataObject\Objectbrick) {
            return '';
        }

        $brickInstance = $brickContainer->get($brickTypeName);

        if (!$brickInstance instanceof DataObject\Objectbrick\Data\AbstractData) {
            return '';
        }

        $fieldType = $this->getBrickFieldType($brickTypeName, $cleanBrickField);
        $fieldValue = $this->getValueFromBrickInstance($brickInstance, $brickField, $cleanBrickField);

        return $this->formatCellValue($fieldValue, $fieldType);
    }

    private function findBrickContainerName(ClassDefinition $classDefinition, string $brickTypeName): ?string
    {
        foreach ($classDefinition->getFieldDefinitions() as $fieldDef) {
            if (!$fieldDef instanceof ClassDefinition\Data\Objectbricks) {
                continue;
            }

            $allowedTypes = $fieldDef->getAllowedTypes();

            if (in_array($brickTypeName, $allowedTypes, true)) {
                return $fieldDef->getName();
            }
        }

        return null;
    }

    private function getBrickFieldType(string $brickTypeName, string $cleanBrickField): ?string
    {
        $brickDefinition = DataObject\Objectbrick\Definition::getByKey($brickTypeName);

        if (!$brickDefinition instanceof DataObject\Objectbrick\Definition) {
            return null;
        }

        $fieldDef = $brickDefinition->getFieldDefinition($cleanBrickField);

        if (!$fieldDef instanceof ClassDefinition\Data) {
            return null;
        }

        return $fieldDef->getFieldtype();
    }

    private function getValueFromBrickInstance(
        DataObject\Objectbrick\Data\AbstractData $brickInstance,
        string $brickField,
        string $cleanBrickField,
    ): mixed {
        if (preg_match('/_([a-z]{2}(?:_[A-Z]{2})?)$/', $brickField, $matches)) {
            $language = $matches[1];
            $getter = 'get' . ucfirst($cleanBrickField);

            if (!method_exists($brickInstance, $getter)) {
                return null;
            }

            try {
                return $brickInstance->$getter($language);
            } catch (\Exception $e) {
                return null;
            }
        }

        $getter = 'get' . ucfirst($cleanBrickField);

        if (!method_exists($brickInstance, $getter)) {
            return null;
        }

        try {
            return $brickInstance->$getter();
        } catch (\Exception $e) {
            return null;
        }
    }

    private function extractSimpleFieldValue(
        DataObject\Concrete $object,
        string $fieldKey,
        ClassDefinition $classDefinition,
    ): string {
        $baseFieldKey = preg_replace('/_[a-z]{2}(?:_[A-Z]{2})?$/', '', $fieldKey);
        $fieldDef = $classDefinition->getFieldDefinition($baseFieldKey);

        $fieldType = null;

        if ($fieldDef instanceof ClassDefinition\Data) {
            $fieldType = $fieldDef->getFieldtype();
        }

        if (preg_match('/_([a-z]{2}(?:_[A-Z]{2})?)$/', $fieldKey, $matches)) {
            $language = $matches[1];
            $fieldValue = $object->get($baseFieldKey, $language);
        } else {
            $fieldValue = $object->get($fieldKey);
        }

        return $this->formatCellValue($fieldValue, $fieldType);
    }

    /**
     * Maps fields to their technical names, appending language suffix for localized fields.
     *
     * @param array<string> $fields List of field names.
     * @param array<array<string, string>> $options Field options with metadata.
     * @param array<string> $languages List of language codes (e.g., 'en', 'de').
     * @param callable $titleCallback Callback to generate field titles.
     *
     * @return array<string, string> Mapped fields with technical names.
     */
    private function mapFieldsHelper(
        array $fields,
        array $options,
        array $languages,
        callable $titleCallback,
    ): array {
        $optionsMap = [];

        foreach ($options as $option) {
            $optionsMap[$option['value']] = [
                'title' => $titleCallback($option),
                'localized' => $option['localized'] ?? false,
            ];
        }

        $mappedFields = [];

        foreach ($fields as $field) {
            if (isset($optionsMap[$field])) {
                $isLocalized = $optionsMap[$field]['localized'];

                if ($isLocalized && $languages !== []) {
                    foreach ($languages as $language) {
                        $mappedFields[$field . '_' . $language] = $optionsMap[$field]['title'] . '_' . $language;
                    }
                } else {
                    $mappedFields[$field] = $optionsMap[$field]['title'];
                }
            } else {
                $mappedFields[$field] = $field;
            }
        }

        return $mappedFields;
    }
}
