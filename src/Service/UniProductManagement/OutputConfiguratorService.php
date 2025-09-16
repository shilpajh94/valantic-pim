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

    /**
     * Creates an asset from the export file and deletes the temporary file.
     *
     * @throws \Exception If the asset creation fails.
     */
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
                [$brickName, $brickField] = explode('.', $fieldKey, 2);

                $columnNames[$fieldKey] = match ($columnType) {
                    UniOutputConfigurationColumnType::LABEL->value => sprintf('%s.%s', $brickName, $fieldValue),
                    UniOutputConfigurationColumnType::TECHNICAL->value => $fieldValue,
                    default => throw new \RuntimeException(sprintf('Unknown column type "%s"', $columnType)),
                };
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

        foreach ($fields as $fieldKey => $key) {
            $fieldValue = null;

            if (str_contains($fieldKey, '.')) {
                [$brickName, $brickField] = explode('.', $fieldKey, 2);
                $brickGetter = 'get' . ucfirst($brickName);

                if (method_exists($object, $brickGetter)) {
                    $brickInstance = $object->$brickGetter();

                    if ($brickInstance instanceof DataObject\Objectbrick\Data\AbstractData) {
                        $fieldValue = $brickInstance->get($brickField);
                    }
                }
            } else {
                $fieldKey1 = preg_replace('/_[a-z]{2}(_[A-Z]{2})?$/', '', $fieldKey);

                $fieldValue = $object->get($fieldKey1);
            }

            $row[$fieldKey] = $this->formatCellValue($fieldValue);
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
     *
     * @return string The formatted value.
     */
    public function formatCellValue(mixed $value): string
    {
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
     * Maps fields to their corresponding values (labels or technical names).
     *
     * @param array<string> $fields List of field names.
     * @param array<array<string, string>> $options Field options with metadata.
     * @param callable $titleCallback Callback for determining the title.
     * @param array<string> $languages The language codes (e.g., 'en', 'de').
     *
     * @return array<string, string> Mapped fields with their respective values.
     */
    private function mapFieldsHelper(array $fields, array $options, array $languages, callable $titleCallback): array
    {
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
