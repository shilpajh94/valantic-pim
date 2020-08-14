<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Services\FilterService;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Db;
use DistributionHubBundle\Lib\DHubLogger;

class ManyToOneRelation extends DefaultAdapter implements FieldDefinitionAdapterInterface {

    /**
     * @var Data\Localizedfields
     */
    protected $fieldDefinition;

    public function __construct(FilterService $service) {
        parent::__construct($service);
    }

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "manyToOneRelation";
    
    /**
     * Get query based on applied filter, use pimcore addConditionParams() method 
     * $key, $value = null, $concatenator = 'AND'
     *
     * @param ClassDefinition\Listing
     * @param filterConditionData
     * @param appliedFilterDataType
     *
     * @return $conditonParams
     *
     * @throws Exception
     */
    public function getQueryPart($fieldFilter, $fieldDefinition, $listing) {

        $operator = $fieldFilter->getOperator();
        $fieldName = $fieldDefinition->getName();

        if (is_array($fieldFilter)) {
            $data = $fieldFilter['filterCondition']['filterEntryData'];
        } else {
            $data = $fieldFilter->getFilterEntryData();
        }

        $conditionParams = array();
        if (array_key_exists("id", $data)) {

            if (array_key_exists("type", $data)) {
                return $this->getHrefConditions($data, $fieldName);
            }
            if (!empty($data['id'])) {
                $conditions = array();
                foreach ($data['id'] as $value) {
                    $id = "," . $value . ",";
                    $conditions[] = "`" . $fieldName . "`  LIKE '%" . $id . "%'";
                }
                $conditonPrepare = implode(" OR ", $conditions);
                $conditionParams['key'] = $conditonPrepare;
                $conditionParams['value'] = NULL;
                $conditionParams['concatenator'] = "AND";

                return $conditionParams;
            }
        } elseif (array_key_exists("filters", $data)) {
            $relationClassId = $data['classId'];
            if (!empty($data['filters'])) {
                $relClassDef = \Pimcore\Model\DataObject\ClassDefinition::getById($relationClassId);

                $relClass = "\\Pimcore\\Model\\DataObject\\" . ucfirst($relClassDef->getName()) . "\\Listing";
                $relClassList = new $relClass();

                $relationFieldConditions = array();
                foreach ($data['filters'] as $relFilter) {

                    $selectedFieldType = $relClassDef->getFieldDefinition($relFilter['fieldname']);
                    if(empty($selectedFieldType)){
                        $coreDefinitions = $this->service->getCoreFieldDefinitions();
                        $fName = $relFilter['fieldname'];
                        if(array_key_exists($fName, $coreDefinitions)){
                            $fDefinition = $coreDefinitions[$fName];
                            
                            $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($fDefinition, $this->considerInheritance);
                            $relationFieldConditions[] = $fieldDefinitionAdapter->getRelatedFilterData($relFilter, $selectedFieldType, $relClassList); 
                        } 
                    } else {
                        
                        $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($selectedFieldType, $this->considerInheritance);
                        $relationFieldConditions[] = $fieldDefinitionAdapter->getRelatedFilterData($relFilter, $selectedFieldType, $relClassList);
                    }
                }

                $relatedConditions = array();
                if (!empty($relationFieldConditions)) {

                    foreach ($relationFieldConditions as $cond) {
                        $relatedConditions[] = $cond['0'];
                    }
                }

                $relClassList->setCondition(implode(" OR ", $relatedConditions));

                $relClassList->load();
                $relObjects = $relClassList->getObjects();

                $conditons = array();
                if (!empty($relObjects)) {
                    foreach ($relObjects as $relObj) {
                        $id = array_key_exists("type", $data) ? $relObj->getId() : "," . $relObj->getId() . ",";
                        if (array_key_exists("type", $data)) {
                            $hrefFieldName = $fieldName . "__id";
                            $hrefFieldType = $fieldName . "__type";
                            $type = $data['type'];
                            $conditons[] = "`" . $hrefFieldName . "`  = '" . $id . "' AND `" . $hrefFieldType . "` = '" . $type . "' ";
                        } else {
                            $conditons[] = "`" . $fieldName . "`  LIKE '%" . $id . "%'";
                        }
                    }
                    $mergedConditions = implode(" OR ", $conditons);
                }


                if (!empty($conditons)) {

                    $conditionParams['key'] = $mergedConditions;
                    $conditionParams['value'] = NULL;
                    $conditionParams['concatenator'] = "AND";

                    return $conditionParams;
                } else {
                    return $conditionParams;
                }
            } else {
                return $conditionParams;
            }
        }
    }
    
    /**
     * Get localized query based on applied filter, 
     * use queryBuilder prepared statements 
     *
     * @param array [$fieldName, $value, $lang]
     * @param tableName for queryBuilder 
     *
     * @return $conditonParams
     *
     * @throws Exception
     */ 
    // ToDo: Revisit the logic and use prepared statements
    public function getQueryForLocalized($fieldFilter, $tableName) {

        $db = Db::get();
        
        if ($fieldFilter->getFilterEntryData()) {
            $data = $fieldFilter->getFilterEntryData();
        } else {
            $data = $fieldFilter['filterCondition']['filterEntryData'];
        }

        $lang = array_keys($data)['0'];
        $fieldName = $data[$lang]['0']['fieldname'];
        $fieldData = $data[$lang]['0']['filterEntryData'];
        $type = $fieldData['type'];
        $conditions = array();
        if (array_key_exists("type", $fieldData) && array_key_exists("id", $fieldData)) {
            if (!empty($fieldData['id'])) {
                foreach ($fieldData['id'] as $value) {
                    $conditions[] = "`dest_id` = '" . $value . "' AND `fieldname` = '" . $fieldName . "' AND `position` = '" . $lang . "' AND `type` = '" . $type . "'";
                }
                $mergedConditions = implode(" OR ", $conditions);
            }
            $query = "SELECT `src_id` FROM `" . $tableName . "` WHERE " . $mergedConditions;
            
            try {
                $results = $db->fetchAll($query);
            } catch (Exception $ex) {
                DHubLogger::log("Issue in ".__METHOD__." Exception - ". $ex->getMessage(), DHubLogger::ERROR);    
            }
            
            $resultsIds = array();

            if (!empty($results)) {

                foreach ($results as $val) {
                    $val = $val['src_id'];
                    $resultsIds[] = " `o_id` = '" . $val . "' ";
                }
                $conditonPrepare = implode(' OR ', $resultsIds);

                $conditionParams = array();
                $conditionParams['key'] = $conditonPrepare;
                $conditionParams['value'] = NULL;
                $conditionParams['concatenator'] = "AND";
                return $conditionParams;
            } else {
                return false;
            }
        } elseif (array_key_exists("type", $fieldData)) {

            $relationClassId = $fieldData['classId'];
            if (!empty($fieldData['filters'])) {
                $relClassDef = \Pimcore\Model\DataObject\ClassDefinition::getById($relationClassId);

                $relClass = "\\Pimcore\\Model\\DataObject\\" . ucfirst($relClassDef->getName()) . "\\Listing";
                $relClassList = new $relClass();

                $relationFieldConditions = array();
                foreach ($fieldData['filters'] as $relFilter) {

                    $selectedFieldType = $relClassDef->getFieldDefinition($relFilter['fieldname']); 
                    
                    if(empty($selectedFieldType)){
                        $coreDefinitions = $this->service->getCoreFieldDefinitions();
                        $fName = $relFilter['fieldname'];
                        if(array_key_exists($fName, $coreDefinitions)){
                            $fDefinition = $coreDefinitions[$fName];
                            
                            $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($fDefinition, $this->considerInheritance);
                            $relationFieldConditions[] = $fieldDefinitionAdapter->getRelatedFilterData($relFilter, $selectedFieldType, $relClassList); 
                        } 
                    } else {
                        
                        $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($selectedFieldType, $this->considerInheritance);
                        $relationFieldConditions[] = $fieldDefinitionAdapter->getRelatedFilterData($relFilter, $selectedFieldType, $relClassList);
                    }
                }

                $relatedConditions = array();
                if (!empty($relationFieldConditions)) {

                    foreach ($relationFieldConditions as $cond) {
                        $relatedConditions[] = $cond['0'];
                    }
                }

                $relClassList->setCondition(implode(" OR ", $relatedConditions));

                $relClassList->load();
                $relObjects = $relClassList->getObjects();

                $conditions = array();
                if (!empty($relObjects)) {
                    foreach ($relObjects as $relObj) {
                        $conditions[] = "`dest_id` = '" . $relObj->getId() . "' AND `fieldname` = '" . $fieldName . "' AND `position` = '" . $lang . "' AND `type` = '" . $type . "'";
                    }
                    $mergedConditions = implode(" OR ", $conditions);

                    $query = "SELECT `src_id` FROM `" . $tableName . "` WHERE " . $mergedConditions;
                    try {
                        $results = $db->fetchAll($query);
                    } catch (Exception $ex) {
                        DHubLogger::log("Issue in ".__METHOD__." Exception - ". $ex->getMessage(), DHubLogger::ERROR);    
                    }
                }

                $resultsIds = array();

                if (!empty($results)) {

                    foreach ($results as $val) {
                        $val = $val['src_id'];
                        $resultsIds[] = " `o_id` = '" . $val . "' ";
                    }
                    $conditonPrepare = implode(' OR ', $resultsIds);

                    $conditionParams = array();
                    $conditionParams['key'] = $conditonPrepare;
                    $conditionParams['value'] = NULL;
                    $conditionParams['concatenator'] = "AND";

                    return $conditionParams;
                }
            }
        }
    }

    /**
     * returns manyToOne conditions
     * @return $conditionParams[]
     */
    public function getHrefConditions($data, $fieldName) {
        if (!empty($data['id'])) {
            $hrefFieldName = $fieldName . "__id";
            $hrefFieldType = $fieldName . "__type";
            $type = $data['type'];

            foreach ($data['id'] as $value) {
                $conditions = "`" . $hrefFieldName . "`  = '" . $value . "' AND `" . $hrefFieldType . "` = '" . $type . "' ";
            }
            $conditionParams['key'] = $conditions;
            $conditionParams['value'] = NULL;
            $conditionParams['concatenator'] = "AND";

            return $conditionParams;
        }
    }
    
    /**
     * Get localized query for Bricks & collections
     *
     * @param array [$fieldFilter]
     * @param tableName for queryBuilder 
     *
     * @return $conditonParams
     * @throws Exception
     */ 
    
    // ToDo: use prepared statements
    public function getLocalizedStructuredResults($fieldFilter, $tableName, $fieldType) {

        $db = Db::get();
        if (is_array($fieldFilter['filterCondition'])) {
            $data = $fieldFilter['filterCondition']['filterEntryData'];
        } else {
            $data = $fieldFilter->getFilterEntryData();
        } 

        $lang = array_keys($data)['0'];
        $fieldName = $data[$lang]['0']['fieldname'];
        $fieldData = $data[$lang]['0']['filterEntryData'];
        $type = $fieldData['type'];
        $conditions = array();
        $hrefFieldName = $fieldName . "__id";
        $hrefFieldType = $fieldName . "__type";

        if (array_key_exists("type", $fieldData) && array_key_exists("id", $fieldData)) {
            if (!empty($fieldData['id'])) {
                foreach ($fieldData['id'] as $value) {
                    if ($fieldType === "objectbricks") {
                        $conditions[] = " `language` = '" . $lang . "' AND `" . $hrefFieldName . "` = '" . $value . "'AND `" . $hrefFieldType . "` = '" . $type . "' ";
                    } elseif ($fieldType === "fieldcollections") {
                        $conditions[] = "`dest_id` = '" . $value . "' AND `fieldname` = '" . $fieldName . "' AND `position` = '" . $lang . "' AND `type` = '" . $type . "'";
                    }
                }
                $mergedConditions = implode(" OR ", $conditions);
            }

            if ($fieldType === "objectbricks") {
                $query = "SELECT `ooo_id` FROM `" . $tableName . "` WHERE " . $mergedConditions;
            } elseif ($fieldType === "fieldcollections") {
                $query = "SELECT `src_id` FROM `" . $tableName . "` WHERE " . $mergedConditions;
            }

            $results = $db->fetchAll($query);
            $resultsIds = array();

            if (!empty($results)) {
                return $results;
            } else {
                return false;
            }
        } elseif (array_key_exists("type", $fieldData)) {

            $relationClassId = $fieldData['classId'];
            if (!empty($fieldData['filters'])) {
                $relClassDef = \Pimcore\Model\DataObject\ClassDefinition::getById($relationClassId);

                $relClass = "\\Pimcore\\Model\\DataObject\\" . ucfirst($relClassDef->getName()) . "\\Listing";
                $relClassList = new $relClass();

                $relationFieldConditions = array();
                foreach ($fieldData['filters'] as $relFilter) {

                    $selectedFieldType = $relClassDef->getFieldDefinition($relFilter['fieldname']);

                    $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($selectedFieldType, $this->considerInheritance);

                    $relationFieldConditions[] = $fieldDefinitionAdapter->getRelatedFilterData($relFilter, $selectedFieldType, $relClassList);
                }

                $relatedConditions = array();
                if (!empty($relationFieldConditions)) {

                    foreach ($relationFieldConditions as $cond) {
                        $relatedConditions[] = $cond['0'];
                    }
                }

                $relClassList->setCondition(implode(" OR ", $relatedConditions));

                $relClassList->load();
                $relObjects = $relClassList->getObjects();

                $conditions = array();
                if (!empty($relObjects)) {
                    foreach ($relObjects as $relObj) {
                        if ($fieldType === "objectbricks") {
                            $conditions[] = " `language` = '" . $lang . "' AND `" . $hrefFieldName . "` = '" . $relObj->getId() . "'AND `" . $hrefFieldType . "` = '" . $type . "' ";
                        } elseif ($fieldType === "fieldcollections") {
                            $conditions[] = "`dest_id` = '" . $relObj->getId() . "' AND `fieldname` = '" . $fieldName . "' AND `position` = '" . $lang . "' AND `type` = '" . $type . "'";
                        }
                    }
                    $mergedConditions = implode(" OR ", $conditions);

                    if ($fieldType === "objectbricks") {
                        $query = "SELECT `ooo_id` FROM `" . $tableName . "` WHERE " . $mergedConditions;
                    } elseif ($fieldType === "fieldcollections") {
                        $query = "SELECT `src_id` FROM `" . $tableName . "` WHERE " . $mergedConditions;
                    }

                    $results = $db->fetchAll($query);
                }
                if (!empty($results)) {
                    return $results;
                } else {
                    return false;
                }
            }
        }
    }

    /**
     * returns selectable fields with their type information for filter frontEnd
     * @return FieldSelectionInformation[]
     */
    public function getFieldSelectionInformation() {
        $allowedTypes = [];
        $allowedClasses = [];
        if ($this->fieldDefinition->getAssetsAllowed()) {
            $allowedTypes[] = ["asset", "asset_id"];
        }
        if ($this->fieldDefinition->getDocumentsAllowed()) {
            $allowedTypes[] = ["document", "document_id"];
        }
        if ($this->fieldDefinition->getObjectsAllowed()) {
            $allowedTypes[] = ["object", "object_id"];
            $allowedTypes[] = ["object_filter", "object_filter"];

            foreach ($this->fieldDefinition->getClasses() as $class) {
                $allowedClasses[] = $class['classes'];
            }
        }

        return [new FieldSelectionInformation(
                    $this->fieldDefinition->getName(), $this->fieldDefinition->getTitle(), $this->fieldType, [
                'operators' => [FilterEntry::MUST, FilterEntry::SHOULD, FilterEntry::MUST_NOT, FilterEntry::EXISTS, FilterEntry::NOT_EXISTS],
                'allowedTypes' => $allowedTypes,
                'allowedClasses' => $allowedClasses,
                'classInheritanceEnabled' => $this->considerInheritance
                    ]
        )];
    }

    /**
     * @param Concrete $object
     * @param bool $ignoreInheritance
     */
    protected function getDataValue($object, $ignoreInheritance = false) {
        $inheritanceBackup = null;
        if ($ignoreInheritance) {
            $inheritanceBackup = AbstractObject::getGetInheritedValues();
            AbstractObject::setGetInheritedValues(false);
        }

        $value = $this->fieldDefinition->getForWebserviceExport($object);

        if ($ignoreInheritance) {
            AbstractObject::setGetInheritedValues($inheritanceBackup);
        }

        return $value;
    }

}
