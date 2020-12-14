<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Model\DataObject\AbstractObject;

class ManyToManyObjectRelation extends ManyToOneRelation implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "manyToManyObjectRelation";
    
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
        $data = $fieldFilter->getFilterEntryData();
        $conditionParams = array();
        if(array_key_exists("id", $data)){ 
            if(!empty($data['id'])){
                $conditions = array();
                foreach ($data['id'] as $value) { 
                    $id = ",".$value.",";
                    $conditions[] = "`".$fieldName."`  LIKE '%".$id ."%'"; 
                }
                $conditonPrepare = implode(" OR ", $conditions);
                
                $conditionParams['key'] = $conditonPrepare;
                $conditionParams['value'] = NULL;
                $conditionParams['concatenator'] = "AND";
                
                return $conditionParams;  
            }
        } elseif(array_key_exists("filters", $data)){
            $relationClassId = $data['classId'];
            if(!empty($data['filters'])){
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
                        if ($fieldDefinitionAdapter instanceof \DistributionHubBundle\Filter\FieldDefinitionAdapter\Localizedfields) {
                            // localized context
                            $relationFieldConditions[] = $fieldDefinitionAdapter->getDataForLocalized($fieldFilter->getFilterEntryData()['filters']['0'], $fieldFilter->getFilterEntryData()['classId'], $selectedFieldType, $fieldFilter->getFilterEntryData()["type"]);
                            
                        } else {
                            // non-localized context
                            $relationFieldConditions[] = $fieldDefinitionAdapter->getRelatedFilterData($relFilter, $selectedFieldType, $relClassList);    
                        }
                    }
 
                } 
              
                $relatedConditions = array();
                if(!empty($relationFieldConditions)){
                
                    foreach ($relationFieldConditions as $cond) {
                        
                        if($cond['0'] && isset($cond['0']['ooo_id'])){
                            $relatedConditions[] = $cond['0']['ooo_id'];
                            $relObjects = null;
                        } else {
                            $relatedConditions[] = $cond['0'];
                            $relClassList->setCondition(implode(" OR ", $relatedConditions));
                
                            $relClassList->load();
                            $relObjects = $relClassList->getObjects();
                        }
                    }
                }

                //Todo: Handle the deadstate of filters in an alternative approach.
                if(strpos(implode(" OR ", $relatedConditions), "=  'Array'")){
                    throw new \Exception('Filters for current level -> relation inside a relation, are not supported.');
                }
                
                $relIds = array();
                $conditons = array();
                if (!empty($relObjects)) {
                    foreach ($relObjects as $relObj) { 
                        $id = ",".$relObj->getId().",";
                        $conditons[] = "`".$fieldName."`  LIKE '%".$id."%'";
                    }
                    $mergedConditions = implode(" OR ", $conditons);
                    
                } else {
                    foreach ($relatedConditions as $relatedCond) {
                        $id = ",".$relatedCond.",";
                        $conditons[] = "`".$fieldName."`  LIKE '%".$id ."%'";
                    }
                    $mergedConditions = implode(" OR ", $conditons);
                }

                if(!empty($conditons)){
                    $mergedConditions = implode(" OR ", $conditons);
                                    
                    //Todo: Handle the deadstate of filters in an alternative approach.
                    if(strpos($mergedConditions, "=  'Array'")){
                        throw new \Exception('Filters for current level -> relation inside a relation - is/are not supported.');
                    }
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
     * returns selectable fields with their type information for filter frontEnd
     * @return FieldSelectionInformation[]
     */
    public function getFieldSelectionInformation() {
        $allowedTypes = [];
        $allowedClasses = [];
        $allowedTypes[] = ["object", "object_ids"];
        $allowedTypes[] = ["object_filter", "object_filter"];

        foreach ($this->fieldDefinition->getClasses() as $class) {
            $allowedClasses[] = $class['classes'];
        }

        return [new FieldSelectionInformation(
                    $this->fieldDefinition->getName(), $this->fieldDefinition->getTitle(), $this->fieldType, [
                'operators' => [FilterEntry::MUST, FilterEntry::SHOULD, FilterEntry::MUST_NOT, FilterEntry::EXISTS, FilterEntry::NOT_EXISTS],
                'allowedTypes' => $allowedTypes,
                'allowedClasses' => $allowedClasses
                    ]
        )];
    }

    /**
     * @inheritDoc
     */
    protected function getDataValue($object, $ignoreInheritance = false) {
        $value = parent::getDataValue($object, $ignoreInheritance);

        //rewrite all types to 'object' since 'variants' are not supported yet.
        $filteredValues = array_map(function($item) {
            return [
                'id' => $item['id'],
                'type' => 'object'
            ];
        }, $value);

        return $filteredValues;
    }

}
 