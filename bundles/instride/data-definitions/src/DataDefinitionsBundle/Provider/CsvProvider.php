<?php
/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 instride AG (https://www.instride.ch)
 * @license    https://github.com/instride/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace Instride\Bundle\DataDefinitionsBundle\Provider;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;
use Instride\Bundle\DataDefinitionsBundle\Filter\FilterInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\ExportDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\ImportDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\ImportMapping\FromColumn;
use Instride\Bundle\DataDefinitionsBundle\ProcessManager\ArtifactGenerationProviderInterface;
use Instride\Bundle\DataDefinitionsBundle\ProcessManager\ArtifactProviderTrait;
use Instride\Bundle\DataDefinitionsBundle\Helper\CommonHelper as commonHelper;
use Pimcore\Model\Asset;
use Instride\Bundle\DataDefinitionsBundle\Provider\ImportDataSetInterface;
use Instride\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;





class CsvProvider extends AbstractFileProvider implements ImportProviderInterface, ExportProviderInterface, ArtifactGenerationProviderInterface
{
    use ArtifactProviderTrait;

    private array $exportData = [];

    public function testData(array $configuration): bool
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumns(array $configuration, $definitionName = ''): array
    {
        $commonHelperObject = new commonHelper();
        $delimiter = $configuration['delimiter'];
        $enclosure = $configuration['enclosure'];
        $csvFile = $definitionName . "-" . $configuration['csvFile'];
        $path = PIMCORE_PROJECT_ROOT . '/var/tmp/'. $csvFile;

        if ($path) {
            $fullPath = $path;
            $fp = fopen($fullPath, 'r');
            $headers = fgetcsv($fp, 4096, $delimiter, '"');
            fclose($fp);
        }
        $returnHeaders = [];
        if (count($headers) > 0) {
            //First line are the headers
            foreach ($headers as $header) {
                if (!$header) {
                    continue;
                }

                $headerObj = new FromColumn();
                $headerObj->setIdentifier($header);
                $headerObj->setLabel($header);

                $returnHeaders[] = $headerObj;
            }
        }
        return $returnHeaders;
    }

    public function getData(
        array $configuration,
        ImportDefinitionInterface $definition,
        array $params,
        FilterInterface $filter = null
    ): ImportDataSetInterface {
        // $csvHeaders = $configuration['csvHeaders'];
        $delimiter = $configuration['delimiter'];
        $enclosure = $configuration['enclosure'];

        $offset = $params['offset'] ?? null;
        $limit = $params['limit'] ?? null;

        $file = $this->getFile($params);

        $csv = Reader::createFromPath($file, 'r');
        $csv->setDelimiter($delimiter);
        $csv->setEnclosure($enclosure);

        if ($configuration['csvFile']) {
            $headers = array_map(function (FromColumn $column) {
                return $column->getIdentifier();
            }, $this->getColumns($configuration, $definition->name));
            $writer = Writer::createFromString('');

            $stmt = new Statement();
            $records = $stmt->process($csv);

            $writer->insertOne($headers);
            $writer->insertAll($records);

            $csv = Reader::createFromString($writer->toString());
            $csv->setHeaderOffset(0);
        } else {
            $csv->setHeaderOffset(0);
        }

        $stmt = new Statement();

        if ($offset) {
            $stmt = $stmt->offset((int)$offset);
        }

        if ($limit) {
            $stmt = $stmt->limit((int)$limit);
        }

        $records = $stmt->process($csv);

        return new TraversableImportDataSet($records);
    }

    public function exportData(array $configuration, ExportDefinitionInterface $definition, array $params): void
    {
        if (!array_key_exists('file', $params)) {
            return;
        }

        $file = $this->getFile($params);

        $headers = count($this->exportData) > 0 ? array_keys($this->exportData[0]) : [];

        $writer = Writer::createFromPath($file, 'w+');
        $writer->setDelimiter($configuration['delimiter']);
        $writer->setEnclosure($configuration['enclosure']);
        if (isset($configuration['escape'])) {
            $writer->setEscape($configuration['escape']);
        }
        $writer->insertOne($headers);
        $writer->insertAll($this->exportData);
    }

    public function addExportData(
        array $data,
        array $configuration,
        ExportDefinitionInterface $definition,
        array $params
    ): void {
        $this->exportData[] = $data;
    }

    public function provideArtifactStream(array $configuration, ExportDefinitionInterface $definition, array $params)
    {
        $headers = count($this->exportData) > 0 ? array_keys($this->exportData[0]) : [];

        $stream = fopen('php://memory', 'rw+');

        $writer = Writer::createFromStream($stream);
        $writer->setDelimiter($configuration['delimiter']);
        $writer->setEnclosure($configuration['enclosure']);
        if (isset($configuration['escape'])) {
            $writer->setEscape($configuration['escape']);
        }
        $writer->insertOne($headers);
        $writer->insertAll($this->exportData);

        return $stream;
    }

    public function downloadFile($filePath) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    }
}
