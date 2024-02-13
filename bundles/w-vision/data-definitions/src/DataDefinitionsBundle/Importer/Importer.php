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
 * @copyright  Copyright (c) 2016-2019 w-vision AG (https://www.w-vision.ch)
 * @license
 * https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace Wvision\Bundle\DataDefinitionsBundle\Importer;

use CoreShop\Component\Registry\ServiceRegistryInterface;
use Countable;
use InvalidArgumentException;
use Pimcore;
use Pimcore\File;
use Pimcore\Mail;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Service;
use Pimcore\Model\Document;
use Pimcore\Model\Factory;
use Pimcore\Model\Version;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;
use Wvision\Bundle\DataDefinitionsBundle\Context\ContextFactoryInterface;
use Wvision\Bundle\DataDefinitionsBundle\Event\EventDispatcherInterface;
use Wvision\Bundle\DataDefinitionsBundle\Exception\DoNotSetException;
use Wvision\Bundle\DataDefinitionsBundle\Exception\UnexpectedValueException;
use Wvision\Bundle\DataDefinitionsBundle\Filter\FilterInterface;
use Wvision\Bundle\DataDefinitionsBundle\Interpreter\InterpreterInterface;
use Wvision\Bundle\DataDefinitionsBundle\Loader\LoaderInterface;
use Wvision\Bundle\DataDefinitionsBundle\Messenger\ImportRowMessage;
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportDefinitionInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportMapping;
use Wvision\Bundle\DataDefinitionsBundle\Model\ParamsAwareInterface;
use Wvision\Bundle\DataDefinitionsBundle\Persister\PersisterInterface;
use Wvision\Bundle\DataDefinitionsBundle\Provider\ArrayImportDataSet;
use Wvision\Bundle\DataDefinitionsBundle\Provider\ImportDataSet;
use Wvision\Bundle\DataDefinitionsBundle\Provider\ImportDataSetInterface;
use Wvision\Bundle\DataDefinitionsBundle\Provider\ImportProviderInterface;
use Wvision\Bundle\DataDefinitionsBundle\Runner\ImportStartFinishRunnerInterface;
use Wvision\Bundle\DataDefinitionsBundle\Runner\RunnerInterface;
use Wvision\Bundle\DataDefinitionsBundle\Runner\SaveRunnerInterface;
use Wvision\Bundle\DataDefinitionsBundle\Runner\SetterRunnerInterface;
use Wvision\Bundle\DataDefinitionsBundle\Setter\SetterInterface;
use AppBundle\Lib\UnitConversion\ConverterFactory;
use AppBundle\Lib\UnitConversion\Unit;
use AppBundle\Services\AppService;
use Pimcore\Model\Asset;
use Pimcore\Placeholder;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Wvision\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataDefinitionImport;
use Wvision\Bundle\DataDefinitionsBundle\Lib\Constants;
use Pimcore\Model\Element;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Data\BlockElement;
use Symfony\Component\Yaml\Yaml;


final class Importer implements ImporterInterface, AsyncImporterInterface
{
    private bool $shouldStop = false;
    const PRIMARY_KEY_HEADER = 'Primary Key';
    const NON_IMPORTED_ATTRIBUTES = 'Non Imported Attributes';
    const STATUS_CODE = 'Status Code';
    const FAILURE_REASON = 'Failure Reason';


    public function __construct(
        private ServiceRegistryInterface $providerRegistry,
        private ServiceRegistryInterface $filterRegistry,
        private ServiceRegistryInterface $runnerRegistry,
        private ServiceRegistryInterface $interpreterRegistry,
        private ServiceRegistryInterface $setterRegistry,
        private ServiceRegistryInterface $cleanerRegistry,
        private ServiceRegistryInterface $loaderRegistry,
        private ServiceRegistryInterface $persisterRegistry,
        private EventDispatcherInterface $eventDispatcher,
        private ContextFactoryInterface $contextFactory,
        private LoggerInterface $logger,
        private Factory $modelFactory,
        private ExpressionLanguage $expressionLanguage,
        private MessageBusInterface $bus,
    ) {
        $this->providerRegistry = $providerRegistry;
        $this->filterRegistry = $filterRegistry;
        $this->runnerRegistry = $runnerRegistry;
        $this->interpreterRegistry = $interpreterRegistry;
        $this->setterRegistry = $setterRegistry;
        $this->cleanerRegistry = $cleanerRegistry;
        $this->loaderRegistry = $loaderRegistry;
        $this->eventDispatcher = $eventDispatcher;
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->appService = \Pimcore::getKernel()->getContainer()->get(\AppBundle\Services\AppService::class);
        $this->appServiceIFSEU = \Pimcore::getKernel()->getContainer()->get('ifs_eu_import.appServices');


    }

    public function doImportRowAsync(ImportDefinitionInterface $definition, array $row, array $params): void
    {
        if ($definition->getCreateVersion()) {
            Version::enable();
        } else {
            Version::disable();
        }

        $dataSet = new ArrayImportDataSet($row);
        $runner = null;
        $runnerContext = $this->contextFactory->createRunnerContext($definition, $params, $row, $dataSet, null);

        if ($definition->getRunner()) {
            /**
             * @var RunnerInterface $runner
             */
            $runner = $this->runnerRegistry->get($definition->getRunner());
        }

        if ($runner instanceof ImportStartFinishRunnerInterface) {
            $runner->startImport($runnerContext);
        }

        $filter = null;
        $filterType = $definition->getFilter();
        if ($filterType) {
            /**
             * @var FilterInterface $filter
             */
            $filter = $this->filterRegistry->get($filterType);
        }


        $this->importRow(
            $definition,
            $row,
            $dataSet,
            $params,
            $filter,
            $runner
        );
    }

    public function doImportAsync(ImportDefinitionInterface $definition, array $params): void
    {
        /** @var ImportDataSetInterface|array $data */
        $data = $this->getData($definition, $params);

        foreach ($data as $row) {
            $this->bus->dispatch(
                new ImportRowMessage(
                    $definition->getId(),
                    $row,
                    $params,
                )
            );
        }
    }

    public function doImport(ImportDefinitionInterface $definition, $params): array
    {

        $filter = null;
        $objectIds = [];
        $exceptions = [];

        if ($definition->getCreateVersion()) {
            Version::enable();
        } else {
            Version::disable();
        }

        $filterType = $definition->getFilter();
        if ($filterType) {
            /**
             * @var FilterInterface $filter
             */
            $filter = $this->filterRegistry->get($filterType);
        }

        /** @var ImportDataSetInterface|array $data */
        $data = $this->getData($definition, $params);
        if ((is_array($data) || $data instanceof \Countable) && \count($data) > 0) {
            $this->eventDispatcher->dispatch($definition, 'data_definitions.import.total', \count($data), $params);
        }
        $totalRowsWithData = !empty($data) ? count($data) : null ;

        // update total rows for the respective data definition import id
        $importDataId   = $params['importDataId'];
        $dataImport     = DataDefinitionImport::getById($importDataId);
        if($totalRowsWithData == null)
        {
            $dataImport->setStatus(Constants::SCHEDULE_STATUS_FAILED);
            $dataImport->setImportProcessEndTime(new \DateTime());
        }
        $dataImport->setTotalRecords($totalRowsWithData);
        $dataImport->save();
        list($objectIds, $exceptions, $logResult) =
                        $this->runImport($definition, $params, $totalRowsWithData, $filter, $data);

        $cleanerType = $definition->getCleaner();
        if ($cleanerType) {
            $cleaner = $this->cleanerRegistry->get($cleanerType);

            $this->logger->info(sprintf('Running Cleaner "%s"', $cleanerType));
            $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
                sprintf('Running Cleaner "%s"', $cleanerType));

            if ($cleaner instanceof DataSetAwareInterface) {
                $cleaner->setDataSet($data);
            }

            if ($cleaner instanceof ParamsAwareInterface) {
                $cleaner->setParams($params);
            }

            if ($cleaner instanceof LoggerAwareInterface) {
                $cleaner->setLogger($this->logger);
            }

            $cleaner->cleanup($definition, $objectIds, $logResult);

            $this->logger->info(sprintf('Finished Cleaner "%s"', $cleanerType));
            $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
                sprintf('Finished Cleaner "%s"', $cleanerType));
        }

        if (\count($exceptions) > 0) {
            $this->processFailedImport($definition, $params, $objectIds, $exceptions, $logResult);
        } else {
            $this->processSuccessfullImport($definition, $params, $objectIds, $exceptions, $logResult);
        }

        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.finished', '', $params);

        return $objectIds;
    }

    /**
     * @param ImportDefinitionInterface $definition
     * @param                           $params
     * @param                           $objectIds
     * @param                           $exceptions
     * @throws \Exception
     */
    public function processSuccessfullImport(ImportDefinitionInterface $definition,
                                                $params,
                                                $objectIds,
                                                $exceptions,
                                                $logResult)
    {
        // if (!is_int($definition->getSuccessNotificationDocument())) {
        //     return;
        // }

        $this->sendDocument($definition,$objectIds, $exceptions, $params, $logResult);
        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.success', $params);
    }

    /**
     * @param ImportDefinitionInterface $definition
     * @param                           $params
     * @param                           $objectIds
     * @param                           $exceptions
     * @throws \Exception
     */
    public function processFailedImport(ImportDefinitionInterface $definition,
                                        $params,
                                        $objectIds,
                                        $exceptions,
                                        $logResult)
    {
        // if (!is_int($definition->getFailureNotificationDocument())) {
        //     return;
        // }

        $this->sendDocument($definition, $objectIds, $exceptions, $params, $logResult);
        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.failure', $params);
    }

    public function stop(): void
    {
        $this->shouldStop = true;
    }

    /**
     * @param ImportDefinitionInterface $definition
     * @param                           $document
     * @param array                     $objectIds
     * @param array                     $exceptions
     * @throws \Exception
     */
    private function sendDocument(ImportDefinitionInterface $definition,
                                  $objectIds,
                                  $exceptions,
                                  $importDataParams =[],
                                  $logResult=[])
    {
        $params = [
            'exceptions' => $exceptions,
            'objectIds' => implode(',',$objectIds),
            'className' => $definition->getClass(),
            'countObjects' => \count($objectIds),
            'countExceptions' => \count($exceptions),
            'name' => $definition->getName(),
            'provider' => $definition->getProvider(),
            'importDataId' => $importDataParams['importDataId'],
            'logResult' => $logResult
        ];
        $this->CreateLogsFilesForImport($params );
        // $templateParam['tableContent'] = $definition->getName();
        // $documentEmail = Document\Email::getByPath(Constants::BULK_PRODUCT_IMPORT_REPORT);
        // if ($documentEmail instanceof Document\Email) {
        //     $mail = new Mail();
        //     $mail->setDocument($documentEmail);
        //     $mail->addto('admin@example.com');
        //     $mail->Subject("Import Log");
        //     $mail->setParams($templateParam);

        //     $mail->send();
        // } elseif (is_a($document, "\\Pimcore\\Model\\Document\\Pushover")) {
        //     $document->send($params);
        // }
    }

    public function CreateLogsFilesForImport($params)
    {
        $rows = [];
        $rows = $params['logResult'];

        # If sheet provided is incorrect
        if(empty($rows)){
            $data[]  = [self::FAILURE_REASON];
            $params['logResult'][0] =
                                ["Import failed due to one or more reason(s)\n
                                1. Duplicate column name exist\n
                                2. Blank column exist\n3. Data incorrect"];
            $rows = $params['logResult'];
        }else{
            $data[]  = [self::PRIMARY_KEY_HEADER,self::NON_IMPORTED_ATTRIBUTES,self::STATUS_CODE,self::FAILURE_REASON];
        }

        $data           = array_merge($data,$rows);
        $importDataId   = $params['importDataId'];
        $dataImport     = DataDefinitionImport::getById($importDataId);

        $importDataName = $dataImport->getName();
        $importFileName = $dataImport->getImportFileName();
        $arrFileName    = explode('.', $importFileName);
        $fileExtension  = end($arrFileName);
        $onlyFileName   = str_replace('.'.$fileExtension,"",$importFileName);
        $fileName       = $onlyFileName. '-'.$importDataName. '-Log.'.$fileExtension;
        $fileResource   = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName, 'w');
        
        foreach($data as $arr)
        {
            fputcsv($fileResource, $arr, ',');
        }
        $this->ImportLogFileAsset($fileName, $importDataId);
    }

    public function ImportLogFileAsset($fileName, $importDataId) 
    {
        $fileName = basename($fileName);
        $filePath = PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName;
        $parentAsset = Constants::DATA_DEFINITION_LOG_FILES_IN_ASSET_FOLDER;
        $fileName = Element\Service::getValidKey($fileName, 'asset');
        if (empty($fileName)) {
            throw new \Exception('The filename of the asset is empty');
        }

        try
        {
            $newAsset = new Asset();
            $newAsset->setFilename($fileName);
            $newAsset->setData(@file_get_contents($filePath));
            $newAsset->setParent(\Pimcore\Model\Asset::getByPath($parentAsset));
            $newAsset->save();

            $assetId =  $newAsset->getId();

            // update file name and asset id for the respective record into data definition import table
            $dataImport     = DataDefinitionImport::getById($importDataId);
            $dataImport->setLogFilePimcoreAssetId($assetId);
            $dataImport->setLogFileName($fileName);
            $dataImport->save();

        } catch (\Exception $ex) {
            //exception
        }
    }

    /**
     * @param ImportDefinitionInterface $definition
     * @param                           $params
     * @return ImportDataSetInterface|array
     */
    private function getData(ImportDefinitionInterface $definition, $params)
    {
        /** @var ImportProviderInterface $provider */
        try{
            $provider = $this->providerRegistry->get($definition->getProvider());
            
            return $provider->getData($definition->getConfiguration(), $definition, $params);
            
        }catch(\Exception $ex){
           //exception
        }
    }


    /**
     * @param ImportDefinitionInterface    $definition
     * @param                              $params
     * @param null                         $filter
     * @param ImportDataSetInterface|array $dataSet
     * @return array
     * @throws \Exception
     */
    private function runImport(ImportDefinitionInterface $definition,
                                $params, $totalRowsWithData,
                                $filter = null,
                                $dataSet = null): array
    {
        if (null === $dataSet) {
            $dataSet = [];
        }

        $count          = 0;
        $countToClean   = 1000;
        $objectIds      = [];
        $exceptions     = [];
        $logResult      = [];
        $importDataId   = $params['importDataId'];
        $i = 0;

        foreach ($dataSet as $row) {
            $i++;
            $failedReason = '';
            $status = 'Success';

            if($definition->getClass() == 'Product'){
                $primaryKey = $row['SAP Code / Material Number'];

            }
            elseif($definition->getClass() == 'PTGEUProduct'){
                $primaryKey = $row['SAPMaterialCode'];
            }
            elseif($definition->getClass() == 'IFSEUProduct'){
                $primaryKey = $row['Material'];
            }
            elseif($definition->getClass() == 'CSProducts'){
                $region = '';
                if($row['Region']){
                    $regionArray = explode("|",$row['Region']);
                    foreach($regionArray as $eachRegion){
                        $regionObj = DataObject\CSRegion::getByPath(
                                                            '/Contitech_ConveyorSolution/Master Data/Region/'.
                                                            trim($eachRegion));
                        if($regionObj){
                            $region = trim($eachRegion);
                            break;
                        }
                    }
                }
                $primaryKey = trim($row['Product Hierarchy']);
                if($row['Product Flag'] == "0" || ($row['Product Flag'] == "1" && !$row['Region'])){
                    $productName = str_replace("/", "-", $row['Product Name']);
                    $primaryKey = trim($row['Product Hierarchy']).'/'.trim($productName);

                }elseif($row['Product Flag'] == "1" && $row['Region']){
                    $productName = str_replace("/", "-", $row['Product Name']);
                    $primaryKey = trim($row['Product Hierarchy']).'/'.$region.'/'.trim($productName);
                }
            }
            
            try {
                list($object, $nonImportedAttributes) = $this->importRow($definition,
                                                                        $row,
                                                                        $dataSet,
                                                                        array_merge($params, ['row' => $count]),
                                                                        $filter);
                $nonImportedAttributesString =  implode(", ",$nonImportedAttributes);
                if ($object instanceof Concrete) {
                    $objectIds[] = $object->getId();
                }
                else{

                    if($definition->getClass() == 'Product' || $definition->getClass() == 'PTGEUProduct'){
                        $failedReason = 'Sap Number does not exist';
                        $status = 'Failure';
                    }
                    elseif($definition->getClass() == 'CSProducts'){
                        $failedReason  = 'Path does not exist';
                        $status = 'Failure';
                    }
                    elseif($definition->getClass() == 'IFSEUProduct'){
                        $failedReason  = 'Material Number does not exist';
                        $status = 'Failure';
                    }
                }
                if (($count + 1) % $countToClean === 0) {
                    \Pimcore::collectGarbage();
                    $this->logger->info('Clean Garbage');
                    $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status', 'Collect Garbage',
                        $params);
                }
                $count++;

                $logResult[] = [self::PRIMARY_KEY_HEADER => $primaryKey,
                                self::NON_IMPORTED_ATTRIBUTES => $nonImportedAttributesString,
                                self::STATUS_CODE => $status,
                                self::FAILURE_REASON => $failedReason];
            }catch (\Throwable $ex) {
                $mesage = $ex;
                // $mesage = $ex->getMessage();
                // preg_match_all("|\: field (.*)  in |imsU",$mesage,$match);
                // $failedReason = implode(PHP_EOL,$match[1]);
                if(empty($failedReason)){
                    $failedReason = $mesage;
                }
                $logResult[] = [self::PRIMARY_KEY_HEADER => $primaryKey,
                                self::NON_IMPORTED_ATTRIBUTES => '',
                                self::STATUS_CODE => 'Failure',
                                self::FAILURE_REASON => $failedReason];

                $this->logger->error($ex);

                $exceptions[] = $ex;

                $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
                    sprintf('Error: %s', $ex->getMessage()), $params);

                if ($definition->getStopOnException()) {
                    throw $ex;
                }
            }

            $this->eventDispatcher->dispatch($definition, 'data_definitions.import.progress', '', $params);

            if ($this->shouldStop) {
                $this->eventDispatcher->dispatch(
                    $definition,
                    'data_definitions.import.status',
                    'Process has been stopped.'
                );

                return [$objectIds, $exceptions];
            }

            // set status and process end time
            if($totalRowsWithData === $i)
            {
                $dataImport     = DataDefinitionImport::getById($importDataId);
                $dataImport->setStatus(Constants::SCHEDULE_STATUS_COMPLETED);
                $dataImport->setImportProcessEndTime(new \DateTime());
                $dataImport->setProcessedRecords($totalRowsWithData);
                $dataImport->save();
                
                // unlink temp file 
                $tempFilePath = PIMCORE_PROJECT_ROOT . '/var/tmp/'.$dataImport->getImportFileName();
                if(file_exists($tempFilePath))
                {
                    unlink($tempFilePath);
                }
            }
            else
            {
                // update definition import table after every 10 iteration
                if(fmod($i, 100)==0)
                {
                    $dataImport     = DataDefinitionImport::getById($importDataId);
                    $dataImport->setProcessedRecords($i);
                    $dataImport->save();
                }
            }

            
        }

        return [$objectIds, $exceptions, $logResult];
    }
    /**
     * @param ImportDefinitionInterface    $definition
     * @param array                        $data
     * @param ImportDataSetInterface|array $dataSet
     * @param                              $params
     * @param null                         $filter
     * @return null|Concrete
     * @throws \Exception
     */
    private function importRow(ImportDefinitionInterface $definition, $data, $dataSet, $params, $filter = null): ?array
    {
        $nonImportedAttributes = [];
        if (null === $data) {
            return [null, $nonImportedAttributes];
        }
        $runner = null;


        $object = $this->getObject($definition, $data, $dataSet, $params);

        if (null !== $object && !$object->getId()) {
            if ($definition->getSkipNewObjects()) {
                $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status', 'Ignoring new Object',
                    $params);

                    return [null, $nonImportedAttributes];
            }
        } else {
            if ($definition->getSkipExistingObjects()) {
                $this->eventDispatcher->dispatch($definition,
                                                'data_definitions.import.status',
                                                'Ignoring existing Object',
                                                $params);
                    return [null, $nonImportedAttributes];
            }
        }

        if ($filter instanceof FilterInterface) {
            if ($filter instanceof DataSetAwareInterface) {
                $filter->setDataSet($dataSet);
            }

            if ($filter instanceof LoggerAwareInterface) {
                $filter->setLogger($this->logger);
            }

            if (!$filter->filter($definition, $data, $object)) {
                $this->eventDispatcher->dispatch($definition,
                                                'data_definitions.import.status',
                                                'Filtered Object',
                                                $params);

                return [null, $nonImportedAttributes];
            }
        }

        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
            sprintf('Import Object %s', ($object->getId() ? $object->getFullPath() : 'new')), $params);
        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.object.start', $object, $params);

        if ($definition->getRunner()) {
            $runner = $this->runnerRegistry->get($definition->getRunner());
        }


        if ($runner instanceof RunnerInterface) {
            if ($runner instanceof DataSetAwareInterface) {
                $runner->setDataSet($dataSet);
            }

            if ($runner instanceof LoggerAwareInterface) {
                $runner->setLogger($this->logger);
            }

            $runner->preRun($object, $data, $definition, $params);
        }

        $this->logger->info(sprintf('Imported Object: %s', $object->getRealFullPath()));

        /** @var ImportMapping $mapItem */
        foreach ($definition->getMapping() as $mapItem) {
            $value = null;
            if ((array_key_exists($mapItem->getFromColumn(), $data) &&
                                    $mapItem->getToColumn() != $definition->primaryKey) ||
                                    $mapItem->getFromColumn() === "custom") {
                $value = $data[$mapItem->getFromColumn()];
                if (strpos($mapItem->getToColumn(), 'objectbrick') !== false) {
                    $list = new DataObject\Objectbrick\Definition\Listing();
                    $list = $list->load();
                    $objectBrickName = explode('~',$mapItem->getToColumn());
                    $objectBrickFieldName = end($objectBrickName);
                    foreach($list as $brickDef){
                        $fieldDefs = $brickDef->getFieldDefinitions();
                        foreach($fieldDefs as $fieldName => $field){
                            if($value && $fieldName == $objectBrickFieldName &&
                                $field->getFieldtype() == 'numeric' && !is_numeric($value) &&
                                !empty($value)){
                                    array_push($nonImportedAttributes,$mapItem->getFromColumn());
                            }
                        }
                    }
                }else{

                    $classDefinition = ClassDefinition::getByName($definition->getClass());
                    foreach($classDefinition->getFieldDefinitions() as $field){
                        if($field->getName() == $mapItem->getToColumn() &&
                            $field->fieldtype == 'numeric' && !is_numeric($value) &&
                            !empty($value)){
                                array_push($nonImportedAttributes,$mapItem->getFromColumn());
                        }
                    }
                }
                $this->setObjectValue($object, $mapItem, $value, $data, $dataSet, $definition, $params, $runner);
            }
        }

        $shouldSave = true;
        if ($runner instanceof SaveRunnerInterface) {
            if ($runner instanceof DataSetAwareInterface) {
                $runner->setDataSet($dataSet);
            }

            if ($runner instanceof LoggerAwareInterface) {
                $runner->setLogger($this->logger);
            }

            $shouldSave = $runner->shouldSaveObject($object, $data, $definition, $params);
        }

        if ($shouldSave) {
            $object->setUserModification($params['userId'] ?? 0);
            $object->setOmitMandatoryCheck($definition->getOmitMandatoryCheck());
            $this->saveObject($object, $definition, $params);

            $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
                sprintf('Imported Object %s', $object->getFullPath()), $params);
        } else {
            $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
                sprintf('Skipped Object %s', $object->getFullPath()), $params);
        }
        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
            sprintf('Imported Object %s', $object->getFullPath()), $params);
        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.object.finished', $object, $params);

        if ($runner instanceof RunnerInterface) {
            if ($runner instanceof DataSetAwareInterface) {
                $runner->setDataSet($dataSet);
            }

            if ($runner instanceof LoggerAwareInterface) {
                $runner->setLogger($this->logger);
            }

            $runner->postRun($object, $data, $definition, $params);
        }
        
        return [$object,$nonImportedAttributes];
    }


    /**
     * @param Concrete                     $object
     * @param ImportMapping                $map
     * @param                              $value
     * @param array                        $data
     * @param ImportDataSetInterface|array $dataSet
     * @param ImportDefinitionInterface    $definition
     * @param                              $params
     * @param RunnerInterface              $runner
     */
    private function setObjectValue(
        Concrete $object,
        ImportMapping $map,
        $value,
        array $data,
        ImportDataSetInterface $dataSet,
        ImportDefinitionInterface $definition,
        array $params,
        RunnerInterface $runner = null
    ): void {
        if ($map->getInterpreter()) {
            try {
                $interpreter = $this->interpreterRegistry->get($map->getInterpreter());

                if ($interpreter instanceof DataSetAwareInterface) {
                    $interpreter->setDataSet($dataSet);
                }

                if ($interpreter instanceof LoggerAwareInterface) {
                    $interpreter->setLogger($this->logger);
                }

                try {
                    $value = $interpreter->interpret(
                        $object,
                        $value,
                        $map,
                        $data,
                        $definition,
                        $params,
                        $map->getInterpreterConfig()
                    );
                }
                catch (UnexpectedValueException $ex) {
                    $this->logger->info(
                        sprintf(
                            'Unexpected Value from Interpreter "%s" with message "%s"',
                            $map->getInterpreter(),
                            $ex->getMessage()
                        )
                    );
                }

            } catch (DoNotSetException $ex) {
                return;
            }

        }

        if ($map->getToColumn() === 'type' && $map->getSetter() !== 'object_type') {
            throw new InvalidArgumentException('Type has to be used with ObjectType Setter!');
        }

        $shouldSetField = true;

        if ($runner instanceof SetterRunnerInterface) {
            if ($runner instanceof DataSetAwareInterface) {
                $runner->setDataSet($dataSet);
            }

            if ($runner instanceof LoggerAwareInterface) {
                $runner->setLogger($this->logger);
            }

            $shouldSetField = $runner->shouldSetField($object, $map, $value, $data, $definition, $params);
        }

        if (!$shouldSetField) {
            return;
        }

        if ($map->getSetter()) {
            $setter = $this->setterRegistry->get($map->getSetter());
            $blockDataArray = [];
            if (strpos($map->getToColumn(), 'featureBlock') !== false){
                $blockDataArray = explode('|',$value);
                $methodNameAndLanguageArray = explode('~',$map->getToColumn());
                $method = 'set'.ucfirst($methodNameAndLanguageArray[0]);
                foreach($blockDataArray as $blockData){
                    $fieldValueBlock[] = [
                        "Feature" => new BlockElement("Feature", 'input', $blockData)
                    ];
                }
                $object->$method($fieldValueBlock,$methodNameAndLanguageArray[1]);

            }
            elseif(strpos($map->getToColumn(), 'benefitBlock') !== false){
                $blockDataArray = explode('|',$value);
                $methodNameAndLanguageArray = explode('~',$map->getToColumn());
                $method = 'set'.ucfirst($methodNameAndLanguageArray[0]);
                foreach($blockDataArray as $blockData){
                    $fieldValueBlock[] = [
                        "Benefit" => new BlockElement("Benefit", 'input', $blockData)
                    ];
                }
                $object->$method($fieldValueBlock,$methodNameAndLanguageArray[1]);
            }
            elseif ($setter instanceof SetterInterface) {
                if ($setter instanceof DataSetAwareInterface) {
                    $setter->setDataSet($dataSet);
                }

                if ($setter instanceof LoggerAwareInterface) {
                    $setter->setLogger($this->logger);
                }
                if(!is_array($value) && (!is_numeric($value)) && empty(trim($value)) && (gettype($value) != 'boolean')){
                    $value = null;
                }
                $setter->set($object, $value, $map, $data);
            }
        } else {
            if((gettype($value) != 'boolean') && (!is_array($value)) && (!is_numeric($value) && empty(trim($value)))){
                $value = null;
            }
            if($definition->getClass()=='IFSEUProduct'){
                    $this->appServiceIFSEU->updateAttributeGroup($object, $map->getToColumn(), $value);
                    $object->setValue($map->getToColumn(), $value);
            }else{
                $this->appService->updateAttributeGroup($object, $map->getToColumn(), $value);
                $object->setValue($map->getToColumn(), $value);
            }
        }
    }

    /**
     * @param ImportDefinitionInterface     $definition
     * @param                               $data
     * @param ImportDataSetInterface|array $dataSet
     * @param                               $params
     * @return Concrete
     * @throws \Exception
     */
    private function getObject(ImportDefinitionInterface $definition, $data, $params): Concrete
    {
        $class = $definition->getClass();
        $classObject = '\Pimcore\Model\DataObject\\'.ucfirst($class);
        $classDefinition = ClassDefinition::getByName($class);
        $obj = null;

        if (!$classDefinition instanceof ClassDefinition) {
            throw new InvalidArgumentException(sprintf('Class not found %s', $class));
        }

        /**
         * @var $loader LoaderInterface
         */
        if ($definition->getLoader()) {
            $loader = $this->loaderRegistry->get($definition->getLoader());
        } else {
            $loader = $this->loaderRegistry->get('primary_key');
        }

        $obj = $loader->load($class, $data, $definition, $params);
        if(($class == 'Product' ||
            $class == 'PTGEUProduct' ||
            $class == 'IFSEUProduct')&&
            $definition->importLevel !== 'Fert' &&
            $obj->getParent()->getType() != 'object')
        {
                throw new \InvalidArgumentException(
                    $definition->importLevel.' does not exist for the particular object');
        }else{
            if($definition->importLevel == 'Skeleton'){
                $obj = $obj->getParent();
            }
            if($definition->importLevel == 'Base'){
                $obj = $obj->getParent()->getParent();
            }
        }
        if (null === $obj) {
            $classImplementation = $this->modelFactory->getClassNameFor($classObject) ?? $classObject;
            $obj = new $classImplementation();
        }

        $key = Service::getValidKey($this->createKey($definition, $data), 'object');

        if ($definition->getRelocateExistingObjects() || !$obj->getId()) {
            $obj->setParent(Service::createFolderByPath($this->createPath($definition, $data)));
        }

        if ($definition->getRenameExistingObjects() || !$obj->getId()) {
            if ($key && $definition->getKey()) {
                $obj->setKey($key);
            } else {
                $obj->setKey(File::getValidFilename(uniqid('', true)));
            }
        }

        if (!$obj->getKey()) {
            throw new InvalidArgumentException('No key set, please check your import-data');
        }

        $obj->setKey(Service::getUniqueKey($obj));

        return $obj;
    }

    private function createPath(ImportDefinitionInterface $definition, array $data): string
    {
        if (!$definition->getObjectPath()) {
            return '';
        }

        if (str_starts_with($definition->getObjectPath(), '@')) {
            return $this->expressionLanguage->evaluate(substr($definition->getObjectPath(), 1), $data);
        }

        return $definition->getObjectPath() ?? '';
    }

    private function createKey(ImportDefinitionInterface $definition, array $data): string
    {
        if (!$definition->getKey()) {
            return '';
        }

        if (str_starts_with($definition->getKey(), '@')) {
            return $this->expressionLanguage->evaluate(substr($definition->getKey(), 1), $data);
        }

        return $definition->getKey();
    }

    private function saveObject(Concrete $object, ImportDefinitionInterface $definition, array $params): void
    {
        $persister = null;

        if ($definition->getPersister()) {
            $persister = $this->persisterRegistry->get($definition->getPersister());
        }

        if (!$persister instanceof PersisterInterface) {
            $persister = $this->persisterRegistry->get('persister');
        }

        if ($persister instanceof LoggerAwareInterface) {
            $persister->setLogger($this->logger);
        }

        $persister->persist($object, $definition, $params);
    }
}
