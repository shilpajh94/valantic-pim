<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick\Definition;
use Pimcore\Db;

class Objectbricks extends DefaultAdapter implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "objectbricks";

    /**
     * @var Data\Objectbricks
     */
    protected $fieldDefinition;
    
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
        $db = Db::get();

        $fieldCollectionType = $fieldFilter->getFilterEntryData()['type'];
        $filterCondition = $fieldFilter->getFilterEntryData()['filterCondition'];
        $fieldName = $filterCondition['fieldname'];
        $collectionDefinition = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($fieldCollectionType);

        $collFieldDefinition = $collectionDefinition->getFieldDefinition($fieldName);

        $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($collFieldDefinition, false);
        $conditionParams = array();
        if ($collFieldDefinition->getFieldtype() === "localizedfields") {
            $filteredResults = $fieldDefinitionAdapter->getDataForLocalized($fieldFilter->getFilterEntryData(), $listing->getClassId(), $collFieldDefinition, $fieldDefinition->getFieldType());

            if (!empty($filteredResults)) {
                $resultsIds = array();

                foreach ($filteredResults as $val) {
                    $val = $val['ooo_id'];
                    $resultsIds[] = " `o_id` = '" . $val . "' ";
                }
                $conditonPrepare = implode(' OR ', $resultsIds);
                $conditionParams['key'] = $conditonPrepare;
                $conditionParams['value'] = NULL;
                $conditionParams['concatenator'] = "AND";

                return $conditionParams;
            }
        } else {

            $filteredResults = $fieldDefinitionAdapter->getCollectionsData($fieldFilter->getFilterEntryData());

            $tableName = "object_brick_store_" . $fieldCollectionType . "_" . $listing->getClassId();

            $query = "SELECT `o_id` FROM `" . $tableName . "` WHERE     " . $filteredResults;

            $results = $db->fetchAll($query);

            if (!empty($results)) {
                $resultsIds = array();

                foreach ($results as $val) {
                    $val = $val['o_id'];
                    $resultsIds[] = " `o_id` = '" . $val . "' ";
                }

                $conditonPrepare = implode(' OR ', $resultsIds);
                $conditionParams['key'] = $conditonPrepare;
                $conditionParams['value'] = NULL;
                $conditionParams['concatenator'] = "AND";

                return $conditionParams;
            }
        }
    }

    /**
     * @param Concrete $object
     * @return array
     */
    public function getDataValue($object) {

        $data = [];

        $getter = "get" . ucfirst($this->fieldDefinition->getName());
        $objectBrickContainer = $object->$getter();

        if ($objectBrickContainer) {


            foreach ($objectBrickContainer->getItems() as $item) {
                $definition = Definition::getByKey($item->getType());

                $brickData = [];

                foreach ($definition->getFieldDefinitions() as $key => $field) {
                    $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($field, $this->considerInheritance);
                    $brickData[$key] = $fieldDefinitionAdapter->getIndexData($item);
                }

                $data[$item->getType()][] = $brickData;
            }
        }

        return $data;
    }

    /**
     * @inheritdoc
     */
    public function getFieldSelectionInformation() {

        $allowedTypes = [];
        foreach ($this->fieldDefinition->getAllowedTypes() as $allowedType) {
            $allowedTypes[] = [$allowedType];
        }

        return [new FieldSelectionInformation(
                    $this->fieldDefinition->getName(), $this->fieldDefinition->getTitle(), $this->fieldType, [
                'allowedTypes' => $allowedTypes,
                    ]
        )];
    }

}
