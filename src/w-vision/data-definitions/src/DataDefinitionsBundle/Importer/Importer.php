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
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

namespace Wvision\Bundle\DataDefinitionsBundle\Importer;

use CoreShop\Component\Registry\ServiceRegistryInterface;
use Pimcore\File;
use Pimcore\Mail;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Service;
use Pimcore\Model\Document;
use Pimcore\Model\Asset;
use Pimcore\Model\Factory;
use Pimcore\Model\Version;
use Pimcore\Placeholder;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Wvision\Bundle\DataDefinitionsBundle\Event\EventDispatcherInterface;
use Wvision\Bundle\DataDefinitionsBundle\Exception\DoNotSetException;
use Wvision\Bundle\DataDefinitionsBundle\Exception\UnexpectedValueException;
use Wvision\Bundle\DataDefinitionsBundle\Filter\FilterInterface;
use Wvision\Bundle\DataDefinitionsBundle\Loader\LoaderInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportDefinitionInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportMapping;
use Wvision\Bundle\DataDefinitionsBundle\Model\ParamsAwareInterface;
use Wvision\Bundle\DataDefinitionsBundle\Provider\ImportDataSetInterface;
use Wvision\Bundle\DataDefinitionsBundle\Provider\ImportProviderInterface;
use Wvision\Bundle\DataDefinitionsBundle\Runner\RunnerInterface;
use Wvision\Bundle\DataDefinitionsBundle\Runner\SaveRunnerInterface;
use Wvision\Bundle\DataDefinitionsBundle\Runner\SetterRunnerInterface;
use Wvision\Bundle\DataDefinitionsBundle\Setter\SetterInterface;
use Wvision\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataDefinitionImport;
use Wvision\Bundle\DataDefinitionsBundle\Lib\Constants;
use Pimcore\Model\Element;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Data\BlockElement;

final class Importer implements ImporterInterface
{
    /**
     * @var ServiceRegistryInterface
     */
    private $providerRegistry;

    /**
     * @var ServiceRegistryInterface
     */
    private $filterRegistry;

    /**
     * @var ServiceRegistryInterface
     */
    private $runnerRegistry;

    /**
     * @var ServiceRegistryInterface
     */
    private $interpreterRegistry;

    /**
     * @var ServiceRegistryInterface
     */
    private $setterRegistry;

    /**
     * @var ServiceRegistryInterface
     */
    private $cleanerRegistry;

    /**
     * @var ServiceRegistryInterface
     */
    private $loaderRegistry;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /** @var Factory */
    private $modelFactory;

    /**
     * @var bool
     */
    private $shouldStop = false;

    /**
     * Importer constructor.
     * @param ServiceRegistryInterface $providerRegistry
     * @param ServiceRegistryInterface $filterRegistry
     * @param ServiceRegistryInterface $runnerRegistry
     * @param ServiceRegistryInterface $interpreterRegistry
     * @param ServiceRegistryInterface $setterRegistry
     * @param ServiceRegistryInterface $cleanerRegistry
     * @param ServiceRegistryInterface $loaderRegistry
     * @param EventDispatcherInterface $eventDispatcher
     * @param LoggerInterface $logger
     * @param Factory $modelFactory
     */
    public function __construct(
        ServiceRegistryInterface $providerRegistry,
        ServiceRegistryInterface $filterRegistry,
        ServiceRegistryInterface $runnerRegistry,
        ServiceRegistryInterface $interpreterRegistry,
        ServiceRegistryInterface $setterRegistry,
        ServiceRegistryInterface $cleanerRegistry,
        ServiceRegistryInterface $loaderRegistry,
        EventDispatcherInterface $eventDispatcher,
        LoggerInterface $logger,
        Factory $modelFactory
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
    }

    /**
     * {@inheritdoc}
     */
    public function doImport(ImportDefinitionInterface $definition, $params)
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
            $filter = $this->filterRegistry->get($filterType);
        }

        /** @var ImportDataSetInterface|array $data */
        $data = $this->getData($definition, $params);

        if ((is_array($data) || $data instanceof \Countable) && \count($data) > 0) {
            $this->eventDispatcher->dispatch($definition, 'data_definitions.import.total', \count($data), $params);
        }
        $totalRowsWithData = count($data);

        // update total rows for the respective data definition import id
        $importDataId   = $params['importDataId'];
        $dataImport     = DataDefinitionImport::getById($importDataId);
        $dataImport->setTotalReocrds($totalRowsWithData);
        $dataImport->save();

        list($objectIds, $exceptions, $logResult) = $this->runImport($definition, $params, $totalRowsWithData, $filter, $data);

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
    public function processSuccessfullImport(ImportDefinitionInterface $definition, $params, $objectIds, $exceptions, $logResult)
    {
        $this->sendDocument($definition, Document::getById($definition->getSuccessNotificationDocument()),
            $objectIds, $exceptions, $params, $logResult);
        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.success', $params);
    }

    /**
     * @param ImportDefinitionInterface $definition
     * @param                           $params
     * @param                           $objectIds
     * @param                           $exceptions
     * @throws \Exception
     */
    public function processFailedImport(ImportDefinitionInterface $definition, $params, $objectIds, $exceptions, $logResult)
    {
        $this->sendDocument($definition, Document::getById($definition->getFailureNotificationDocument()),
            $objectIds, $exceptions, $params, $logResult);
        $this->eventDispatcher->dispatch($definition, 'data_definitions.import.failure', $params);
    }

    /**
     * @return void
     */
    public function stop() : void
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
    private function sendDocument(ImportDefinitionInterface $definition, $document, $objectIds, $exceptions, $importDataParams =[], $logResult=[])
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
        $templateParam['tableContent'] = $definition->getName();
        $documentEmail = Document\Email::getByPath(Constants::BULK_PRODUCT_IMPORT_REPORT);
        if ($documentEmail instanceof Document\Email) {
            $mail = new Mail();
            $mail->setDocument($documentEmail);
            $mail->addto('tehreempervez959@gmail.com');
            $mail->setSubject("Import Log");
            $mail->setParams($templateParam);

            $mail->send();
        } elseif (is_a($document, "\\Pimcore\\Model\\Document\\Pushover")) {
            $document->send($params);
        }
    }

    public function CreateLogsFilesForImport($params)
    {   
        $rows = [];
        $rows = $params['logResult'];

        $data[]  = ['Primary Key','Non Imported Attributes','Status Code','Failure Reason'];


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
        $provider = $this->providerRegistry->get($definition->getProvider());

        return $provider->getData($definition->getConfiguration(), $definition, $params);
    }

    /**
     * @param ImportDefinitionInterface    $definition
     * @param                              $params
     * @param null                         $filter
     * @param ImportDataSetInterface|array $dataSet
     * @return array
     * @throws \Exception
     */
    private function runImport(ImportDefinitionInterface $definition, $params, $totalRowsWithData, $filter = null, $dataSet = null)
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
                $primaryKey = $row['Sap Number'];

            }elseif($definition->getClass() == 'CSProducts'){
                $primaryKey = $row['Product Hierarchy'];
                if($row['Product Flag'] == 0 || ($row['Product Flag'] == 1 && !$row['Region'])){
                    $productName = str_replace("/", "-", $row['Product Name']);
                    $primaryKey = $row['Product Hierarchy'].'/'.$productName;

                }elseif($row['Product Flag'] == 1 && $row['Region']){
                    $productName = str_replace("/", "-", $row['Product Name']);
                    $region = explode("|",$row['Region']);
                    $primaryKey = $row['Product Hierarchy'].'/'.$region[0].'/'.$productName;
                }
            }
            
            try {
                list($object, $nonImportedAttributes) = $this->importRow($definition, $row, $dataSet, array_merge($params, ['row' => $count]), $filter);
                $nonImportedAttributesString =  implode(", ",$nonImportedAttributes);
                if ($object instanceof Concrete) {
                    $objectIds[] = $object->getId();
                }
                else{
                    if($definition->getClass() == 'Product'){
                        $failedReason = 'Article Number does not exist';
                        $status = 'Failure';
                    }
                    elseif($definition->getClass() == 'CSProduct'){
                        $failedReason  = 'Path does not exist';
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

                $logResult[] = ['Primary Key' => $primaryKey, 'Non Imported Attributes' => $nonImportedAttributesString, 'Status Code' => $status, 'Reason' => $failedReason];            } catch (\Throwable $ex) {
                $this->logger->error($ex);

                $exceptions[] = $ex;

                // $logResult[] = ['primaryKey' => $primaryKey, 'primaryKeyValue' => $primaryKeyValue,  'className' => $className, 'statusCode' => 'Failed', 'Reason' => $ex->getMessage()];

                $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
                    sprintf('Error: %s', $ex->getMessage()), $params);

                if ($definition->getStopOnException()) {
                    throw $ex;
                }
            }

            $this->eventDispatcher->dispatch($definition, 'data_definitions.import.progress', '', $params);

            if ($this->shouldStop) {
                $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status',
                    'Process has been stopped.');
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
    private function importRow(ImportDefinitionInterface $definition, $data, $dataSet, $params, $filter = null)
    {
        $nonImportedAttributes = [];
        if (null === $data) {
            return [null, $nonImportedAttributes];
        }
        $runner = null;


        $object = $this->getObject($definition, $data, $params);

        if (null !== $object && !$object->getId()) {
            if ($definition->getSkipNewObjects()) {
                $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status', 'Ignoring new Object',
                    $params);

                    return [null, $nonImportedAttributes];
            }
        } else {
            if ($definition->getSkipExistingObjects()) {
                $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status', 'Ignoring existing Object',
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
                $this->eventDispatcher->dispatch($definition, 'data_definitions.import.status', 'Filtered Object', $params);

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

        /**
         * @var $mapItem ImportMapping
         */
        foreach ($definition->getMapping() as $mapItem) {
            $value = null;
            if ((array_key_exists($mapItem->getFromColumn(), $data) && $mapItem->getToColumn() != $definition->primaryKey) || $mapItem->getFromColumn() === "custom") {
                $value = $data[$mapItem->getFromColumn()];
                if (strpos($mapItem->getToColumn(), 'objectbrick') !== false) {
                    $list = new DataObject\Objectbrick\Definition\Listing();
                    $list = $list->load();
                    $objectBrickName = explode('~',$mapItem->getToColumn());
                    $objectBrickFieldName = end($objectBrickName);
                    foreach($list as $brickDef){
                        $fieldDefs = $brickDef->getFieldDefinitions();
                        foreach($fieldDefs as $fieldName => $field){
                            if($fieldName == $objectBrickFieldName && $field->getFieldtype() == 'numeric' && !is_numeric($value)){
                                array_push($nonImportedAttributes,$mapItem->getFromColumn());
                            }
                        }

                    }
                }else{
                    $classDefinition = ClassDefinition::getByName($definition->getClass());
                    foreach($classDefinition->getFieldDefinitions() as $field){
                        if($field->getName() == $mapItem->getToColumn() && $field->fieldtype == 'numeric' && !is_numeric($value)){
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
            $object->save();

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
        $data,
        $dataSet,
        ImportDefinitionInterface $definition,
        $params,
        RunnerInterface $runner = null
    ) {
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
                    $this->logger->info(sprintf('Unexpected Value from Interpreter "%s" with message "%s"', $map->getInterpreter(), $ex->getMessage()));
                }

            } catch (DoNotSetException $ex) {
                return;
            }

        }

        if ($map->getToColumn() === 'o_type' && $map->getSetter() !== 'object_type') {
            throw new \InvalidArgumentException('Type has to be used with ObjectType Setter!');
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
                DataImportLogger::log(json_encode($methodNameAndLanguageArray[1]));
                $object->$method($fieldValueBlock,$methodNameAndLanguageArray[1]);
            }
            elseif ($setter instanceof SetterInterface) {
                if ($setter instanceof DataSetAwareInterface) {
                    $setter->setDataSet($dataSet);
                }

                if ($setter instanceof LoggerAwareInterface) {
                    $setter->setLogger($this->logger);
                }

                $setter->set($object, $value, $map, $data);
            }
        } else {
            $object->setValue($map->getToColumn(), $value);
        }
    }

    /**
     * @param ImportDefinitionInterface     $definition
     * @param                               $data
     * @param                               $params
     * @return Concrete
     * @throws \Exception
     */
    private function getObject(ImportDefinitionInterface $definition, $data, $params)
    {
        $class = $definition->getClass();
        $classObject = '\Pimcore\Model\DataObject\\'.ucfirst($class);
        $classDefinition = ClassDefinition::getByName($class);
        $obj = null;

        if (!$classDefinition instanceof ClassDefinition) {
            throw new \InvalidArgumentException(sprintf('Class not found %s', $class));
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
        if($class == 'Product' && $definition->importLevel !== 'Fert' && $obj->getParent()->getType() != 'object'){
            throw new \InvalidArgumentException($definition->importLevel.' does not exist for the particular object');
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
                $obj->setKey(File::getValidFilename(uniqid()));
            }
        }

        if (!$obj->getKey()) {
            throw new \InvalidArgumentException('No key set, please check your import-data');
        }

        $obj->setKey(Service::getUniqueKey($obj));
       
        return $obj;
    }

    /**
     * @param ImportDefinitionInterface $definition
     * @param array                     $data
     * @return string
     */
    private function createPath(ImportDefinitionInterface $definition, $data)
    {
        $placeholderHelper = new Placeholder();

        return $placeholderHelper->replacePlaceholders($definition->getObjectPath(), $data);
    }

    /**
     * @param ImportDefinitionInterface $definition
     * @param array                     $data
     * @return string
     */
    private function createKey(ImportDefinitionInterface $definition, $data)
    {
        $placeholderHelper = new Placeholder();

        return $placeholderHelper->replacePlaceholders($definition->getKey(), $data);
    }
}


