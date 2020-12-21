<?php

namespace DistributionHubBundle\Services;

use DistributionHubBundle\Filter\FieldDefinitionAdapter\FieldDefinitionAdapterInterface;
use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Bundle\AdminBundle\Security\User\TokenStorageUserResolver;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Fieldcollection\Definition;
use Pimcore\Model\User;
use Pimcore\Translation\Translator;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use DistributionHubBundle\Installer;
use Pimcore\Model\DataObject;
use DistributionHubBundle\Lib\Constants;

class FilterService
{

    /**
     * @var User
     */
    protected $user;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ContainerInterface
     */
    protected $filterLocator;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var Translator
     */
    protected $translator;

    /**
     * @var array
     */
    protected $coreFieldsConfig;

    /**
     * Service constructor.
     * @param LoggerInterface $logger
     * @param TokenStorageUserResolver $userResolver
     * @param ContainerInterface $filterLocator
     * @param EventDispatcherInterface $eventDispatcher
     * @param Translator $translator
     */
    public function __construct(
        LoggerInterface $logger,
        TokenStorageUserResolver $userResolver,
        ContainerInterface $filterLocator,
        EventDispatcherInterface $eventDispatcher,
        Translator $translator
    ) {
        $this->user = $userResolver->getUser();
        $this->logger = $logger;
        $this->filterLocator = $filterLocator;
        $this->eventDispatcher = $eventDispatcher;
        $this->translator = $translator;
    }


    /**
     * returns all fields for the selected class
     *
     * @param ClassDefinition|Definition $definition
     * @return FieldSelectionInformation[]
     */
    public function getFieldSelectionInformationForClassDefinition($definition, $allowInheritance = false, $fieldTypes)
    {

        $fieldSelectionInformationEntries = [];

        if ($fieldTypes === Constants::SIMPLE_ATTRIBUTE_TYPES) {
            $fieldDefinitions = $definition->getFieldDefinitions();
            $AllowedDataComponants = Constants::FLAT_ATTRIBUTE_TYPES;
        } else {
            $fieldDefinitions = array_merge(
                $this->getCoreFieldDefinitions(),
                $definition->getFieldDefinitions()
            );
            $AllowedDataComponants = Constants::SUPPORTED_ATTRIBUTE_TYPES;
        }

        foreach ($fieldDefinitions as $fieldDefinition) {
            if (in_array($fieldDefinition->getFieldtype(), $AllowedDataComponants)) {
                $fieldDefinitionAdapter = $this->getFieldDefinitionAdapter($fieldDefinition, $allowInheritance);
                $fieldSelectionInformationEntries = array_merge($fieldSelectionInformationEntries, $fieldDefinitionAdapter->getFieldSelectionInformation());
            }
        }

        return $fieldSelectionInformationEntries;
    }

    /**
     * returns showInGrid attributes mapping for Preview screen
     *
     * @param JSON mapping data from columnConfig
     * @return gridConfig[]
     */
    public function getShowInGridMapping($mappingData)
    {
        $channel = \DistributionHubBundle\Model\Channel::getById($mappingData['objectId']);
        $classId = $channel->getPimcoreClassId();

        if (!empty($mappingData)) {
            $columnsMapping = json_decode($mappingData['mappingJson']);
            $showInGrid = $columnsMapping->showInGrid;
            $selectedGridColumns = $columnsMapping->selectedGridColumns;
            $templateColumns = $columnsMapping->templateAttribute;
            if (!empty($showInGrid) && !empty($selectedGridColumns)) {
                $showInGridCols = self::showInGridCols($showInGrid['0'], $selectedGridColumns, $templateColumns);

                return self::createGridConfig($showInGridCols, $classId);
            }
        } else {
            return false;
        }
    }

    /**
     * Prepare showInGrid mapping for Preview screen
     *
     * @param array $showInGridCols
     * @param (int) class_id
     * @return prepareGridConfig[]
     *
     * @throws Exception
     */
    public function createGridConfig($showInGridCols, $classId)
    {

        $classDefinition = \Pimcore\Model\DataObject\ClassDefinition::getById($classId);

        $gridConfigPrepare = array();

        $predefinedCols = \DistributionHubBundle\Lib\Constants::PREDEFINED_COLUMNS;

        $gridConfigPrepare['columns'] = $predefinedCols;

        if (empty($showInGridCols)) {
            return $gridConfigPrepare;
        } else {
            unset($gridConfigPrepare['columns']['3']);
            unset($gridConfigPrepare['columns']['4']);

            // start adding selectd show in grid columns from 4th index
            $i = 4;
            $index = 3;
            foreach ($showInGridCols as $key => $GridCols) {
                $attrInfo = $GridCols->attributes;

                if ($attrInfo->type === "operator") {
                    continue;
                }

                if (empty($classDefinition->getFieldDefinition($attrInfo->attribute)) && empty($classDefinition->getFieldDefinition('localizedfields'))) {
                    continue;
                }

                if (!empty($classDefinition->getFieldDefinition($attrInfo->attribute))) {
                    $gridConfigPrepare['columns'][$index] = [
                        'key' => $attrInfo->attribute,
                        'type' => $attrInfo->dataType,
                        'label' => $attrInfo->label,
                        'config' => [
                            'width' => 150
                        ],
                        'layout' => $classDefinition->getFieldDefinition($attrInfo->attribute),
                        'position' => $i
                    ];
                } elseif ($classDefinition->getFieldDefinition('localizedfields')) {
                    $locfieldsDef = $classDefinition->getFieldDefinition('localizedfields');

                    if($locfieldsDef->getFieldDefinition($attrInfo->attribute)){
                        $gridConfigPrepare['columns'][$index] = [
                            'key' => $attrInfo->attribute,
                            'type' => $attrInfo->dataType,
                            'label' => $attrInfo->label,
                            'config' => [
                                'width' => 150
                            ],
                            'layout' => $locfieldsDef->getFieldDefinition($attrInfo->attribute),
                            'position' => $i
                        ];
                    }

//                    $localizedTypes = $classDefinition->getFieldDefinition('localizedfields')->getChildren();

//                    if (!empty($localizedTypes)) {
//                        foreach ($localizedTypes as $child) {
//                            if ($child->fieldtype === "fieldcontainer" || $child->fieldtype === "fieldset" || $child->fieldtype === "accordian") {
//                                if (!empty($child->getChilds())) {
//                                    foreach ($child->getChilds() as $child1stLevel) {
//                                        if ($child1stLevel->fieldtype === "fieldcontainer" || $child1stLevel->fieldtype === "fieldset" || $child1stLevel->fieldtype === "accordian") {
//                                            if (!empty($child1stLevel->getChilds())) {
//                                                foreach ($child1stLevel->getChilds() as $child2ndLevel) {
//                                                    if ($child2ndLevel->fieldtype === $attrInfo->dataType) {
//                                                        $gridConfigPrepare['columns'][$index] = self::prepareGridConfig($child2ndLevel, $attrInfo, $i);
//                                                    }
//                                                }
//                                            }
//                                        } else {
//                                            if ($child1stLevel->fieldtype === $attrInfo->dataType) {
//                                                $gridConfigPrepare['columns'][$index] = self::prepareGridConfig($child1stLevel, $attrInfo, $i);
//                                            }
//                                        }
//                                    }
//                                }
//                            } else {
//                                if ($child->fieldtype === $attrInfo->dataType) {
//                                    $gridConfigPrepare['columns'][$index] = self::prepareGridConfig($child, $attrInfo, $i);
//                                }
//                            }
//                        }
//                    }
                } else {
                    throw new \Exception("Show in Grid Error - '" . $attrInfo->attribute . "' is not supported in grid Preview, Please select other field types");
                }
                $i++;
                $index++;
            }

            return $gridConfigPrepare;
        }
    }

    public function prepareGridConfig($child, $attrInfo, $i)
    {

        return [
            'key' => $attrInfo->attribute,
            'type' => $child->getFieldtype(),
            'label' => $attrInfo->label,
            'config' => [
                'width' => 150
            ],
            'layout' => $child,
            'position' => $i
        ];
    }

    /**
     * Compares and Creates a new array for showInGrid config
     *
     * @param array $showInGrid
     * @param array $selectedGridColumns
     * @param array $templateColumns
     * @return array
     */
    public function showInGridCols($showInGrid, $selectedGridColumns, $templateColumns)
    {

        // typecast an object into array
        $showInGrid = json_decode(json_encode($showInGrid), true);

        // get indexes for selected grid columns
        $indexes = array();
        foreach (array_values($showInGrid) as $key => $value) {
            if ($value == 1) {
                $indexes[] = $key;
            }
        }
        // get Column details for which show in grid is selected
        $templateCols = array();

        foreach ($indexes as $val) {
            foreach ($templateColumns as $key => $temp) {
                if ($val == $key) {
                    $templateCols[$val] = $temp;
                }
            }
        }

        // get Column details for which show in grid is selected
        $showInGridCols = array();
        foreach ($selectedGridColumns as $key => $column) {
            foreach ($indexes as $val) {
                if ($val == $key) {
                    // ignore structured inside structured for show in grid. to be handled in js itself
                    if (!empty($column->attributes->attribute)) {
                        if (strpos($column->attributes->attribute, "?{" ) == "false") {
                            continue;
                        }
                        $column->attributes->label = $templateCols[$val];
                        $showInGridCols[] = $column;
                    }
                }
            }
        }
        return $showInGridCols;
    }

    /**
     * @return array
     */
    public function getCoreFieldDefinitions()
    {
        $coreConfig = $this->getCoreFieldsConfig();

        $fieldDefinitions = [];

        foreach ($coreConfig as $fieldName => $properties) {
            if (!isset($properties['fieldDefinition'])) {
                continue;
            }

            $fieldDefinitions[$fieldName] = $this->getCoreFieldDefinition($fieldName, $properties);
        }

        return $fieldDefinitions;
    }

    /**
     * @param array $coreFieldsConfig
     */
    public function setCoreFieldsConfig(array $coreFieldsConfig)
    {
        $this->coreFieldsConfig = $coreFieldsConfig;
    }

    /**
     * @param null $fieldName
     * @return array
     */
    public function getCoreFieldsConfig($fieldName = null)
    {
        if ($fieldName !== null && array_key_exists($fieldName, $this->coreFieldsConfig)) {
            return $this->coreFieldsConfig[$fieldName];
        }

        return $this->coreFieldsConfig;
    }

    /**
     * @param $name
     * @param array $data
     * @return ClassDefinition\Data
     */
    public function getCoreFieldDefinition($name, array $data)
    {
        $title = $this->translator->trans($data['title'], [], 'admin');
        $values = isset($data['values']) ? $data['values'] : [];

        /** @var ClassDefinition\Data $fieldDefinition */
        $fieldDefinition = new $data['fieldDefinition']();

        $fieldDefinition->setName($name);
        $fieldDefinition->setTitle($title);
        $fieldDefinition->setValues($values);

        return $fieldDefinition;
    }

    /**
     * returns field definition adapter for given field definition
     *
     * @param ClassDefinition\Data $fieldDefinition
     * @param bool $considerInheritance
     * @return FieldDefinitionAdapterInterface
     */
    public function getFieldDefinitionAdapter(ClassDefinition\Data $fieldDefinition, bool $considerInheritance)
    {
        $adapter = null;

        if ($this->filterLocator->has($fieldDefinition->fieldtype)) {
            $adapter = $this->filterLocator->get($fieldDefinition->fieldtype);
        } else {
            $adapter = $this->filterLocator->get('default');
        }

        $adapter->setConsiderInheritance($considerInheritance);
        $adapter->setFieldDefinition($fieldDefinition);

        return $adapter;
    }

    /**
     * Returns FIltered results based on -
     * FieldType adapter
     * FilterConditions from filter frontend
     *
     * @param ClassDefinition\Listing $listingClass
     * @param Request $data
     * @return ClassDefinition\Listing $listingClass
     *
     * @throws Exception
     */
    public function getFilteredList($data, $listingClass)
    {

        $classId = $data['classId'];
        $filters = $data['conditions']['filters'];

        if ($data['type'] === DataObject\AbstractObject::OBJECT_TYPE_OBJECT) {
            $listingClass->setObjectTypes([DataObject\AbstractObject::OBJECT_TYPE_OBJECT, DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);
        } elseif ($data['type'] === DataObject\AbstractObject::OBJECT_TYPE_VARIANT) {
            $listingClass->setObjectTypes([DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);
        }

        $conditionParams = array();

        // results based on filter conditions
        if (!$data['filterByList']) {
            if (!empty($filters)) {
                $classDefinition = \Pimcore\Model\DataObject\ClassDefinition::getById($classId);

                foreach ($filters as $filterEntry) {
                    $filterEntryObject = $this->buildFilterEntryObject($filterEntry);
                    $fieldDefinition = $classDefinition->getFieldDefinition($filterEntryObject->getFieldname());
                    $considerInheritance = $classDefinition->getAllowInherit();

                    // filters adapters for core columns
                    if (empty($fieldDefinition)) {
                        $coreDefinitions = $this->getCoreFieldDefinitions();
                        $fName = $filterEntryObject->getFieldname();

                        if (array_key_exists($fName, $coreDefinitions)) {
                            $fDefinition = $coreDefinitions[$fName];
                            $conditionParams[] = $this->getFilteredResults($fDefinition, $filterEntryObject, $listingClass);
                        }
                    } else {
                        // filters adapters for non-core columns
                        $conditionParams[] = $this->getFilteredResults($fieldDefinition, $filterEntryObject, $listingClass);
                    }
                }

                // addConditionParams to listing class
                foreach ($conditionParams as $condition) {
                    if (!empty($condition)) {
                        $listingClass->addConditionParam($condition['key'], $condition['value'], $condition['concatenator']);
                    } else {
                        $listingClass->setCondition("`o_id` IS NULL");
                    }
                }

                return $listingClass;
            } else {
                return $listingClass;
            }
        } else {
            // results based on uploaded List
            if (empty($data['listFileAssetId'])) {
                return $listingClass;
            }

            $listDataConditions = $this->getSheetData($data['listFileAssetId'], $data['filterByAttribute']);

            if (empty($listDataConditions)) {
                return $listingClass;
            }

            $listingClass->setCondition(implode(" OR ", $listDataConditions));

            return $listingClass;
        }
    }

    /**
     * @param $assetId
     * @return array[]
     */
    public static function getSheetData(int $assetId, string $attribute)
    {
        $assetObject = \Pimcore\Model\Asset::getById($assetId);
        if (!$assetObject instanceof \Pimcore\Model\Asset\Text) {
            throw new \Exception('Filter by List : Only csv file type supported');
        }

        //$fullPath = PIMCORE_ASSET_DIRECTORY . $assetObject->getPath() . $assetObject->getFilename();
        // path with s3 protocol
        $fullPath = $assetObject->getFileSystemPath();
        $csvData = array_map('str_getcsv', file($fullPath));

        // Remove header info from csv data
        unset($csvData['0']);

        $conditonForList = [];
        if (!empty($csvData)) {
            foreach ($csvData as $val) {
                $conditonForList[] = " `" . $attribute . "` LIKE '%" . $val['0'] . "%' ";
            }
        }

        return $conditonForList;
    }

    /**
     * return conditions applied in listing,
     * based on fieldType adapter
     * @param $fieldDefinition
     * @param $filterEntryObject
     * @param $listingClass
     *
     * @return $conditions
     * @throws \Exception
     */
    public function getFilteredResults($fieldDefinition, $filterEntryObject, $listingClass)
    {
        $fieldDefinitionAdapter = $this->getFieldDefinitionAdapter($fieldDefinition, false);
        return $fieldDefinitionAdapter->getQueryPart($filterEntryObject, $fieldDefinition, $listingClass);
    }

    /**
     * checks filter entry and creates FilterEntry object if necessary
     *
     * @param $filterEntry
     * @return FilterEntry
     * @throws \Exception
     */
    public function buildFilterEntryObject($filterEntry)
    {
        if (is_array($filterEntry)) {
            //apply default values
            $filterEntry = array_merge(['operator' => null, 'ignoreInheritance' => null], $filterEntry);
            return new FilterEntry($filterEntry['fieldname'], $filterEntry['filterEntryData'], $filterEntry['operator'], $filterEntry['ignoreInheritance']);
        } elseif ($filterEntry instanceof FilterEntry) {
            return $filterEntry;
        } else {
            throw new \Exception("invalid filter entry: " . print_r($filterEntry, true));
        }
    }
}
