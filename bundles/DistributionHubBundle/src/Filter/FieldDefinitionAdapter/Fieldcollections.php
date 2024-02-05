<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Fieldcollection;
use Pimcore\Db;
use DistributionHubBundle\Lib\DHubLogger;

class Fieldcollections extends DefaultAdapter implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "fieldcollections";

    /**
     * @var Data\Fieldcollections
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
    public function getQueryPart($fieldFilter, $fieldDefinition, $listing)
    {
        $db = Db::get();
        $fieldCollectionType = $fieldFilter->getFilterEntryData()['type'];
        $filterCondition = $fieldFilter->getFilterEntryData()['filterCondition'];
        $fieldName = $filterCondition['fieldname'];
        $collectionDefinition = \Pimcore\Model\DataObject\Fieldcollection\Definition::getByKey($fieldCollectionType);

        $collFieldDefinition = $collectionDefinition->getFieldDefinition($fieldName);

        $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($collFieldDefinition, false);
        $conditionParams = array();
        try {
            if ($collFieldDefinition->getFieldtype() === "localizedfields") {
                $filteredResults = $fieldDefinitionAdapter->getDataForLocalized($fieldFilter->getFilterEntryData(), $listing->getClassId(), $collFieldDefinition, $fieldDefinition->getFieldType());

                if (!empty($filteredResults)) {
                    $resultsIds = array();

                    foreach ($filteredResults as $val) {
                        $val = array_key_exists("src_id", $val) ? $val['src_id'] : $val = $val['ooo_id'];
                        $resultsIds[] = " `o_id` = '" . $val . "' ";
                    }
                    $conditonPrepare = implode(' OR ', $resultsIds);
                    $conditionParams['key'] = $conditonPrepare;
                    $conditionParams['value'] = null;
                    $conditionParams['concatenator'] = "OR";

                    return $conditionParams;
                }
            } else {
                $filteredResults = $fieldDefinitionAdapter->getCollectionsData($fieldFilter->getFilterEntryData());

                $tableName = "object_collection_" . $fieldCollectionType . "_" . $listing->getClassId();

                $query = "SELECT `o_id` FROM `" . $tableName . "` WHERE     " . $filteredResults;

                $results = $db->fetchAllAssociative($query);

                if (!empty($results)) {
                    $resultsIds = array();

                    foreach ($results as $val) {
                        $val = $val['o_id'];
                        $resultsIds[] = " `o_id` = '" . $val . "' ";
                    }

                    $conditonPrepare = implode(' OR ', $resultsIds);
                    $conditionParams['key'] = $conditonPrepare;
                    $conditionParams['value'] = null;
                    $conditionParams['concatenator'] = "OR";

                    return $conditionParams;
                }
            }
        } catch (\Exception $ex) {
            DHubLogger::log("Issue in ".__METHOD__." Exception - ". $ex->getMessage(), DHubLogger::ERROR);
            throw new \Exception("Applied Filter for FieldCollections is currently not supported. Please contact the administrator");
        }
    }

    /**
     * @param Concrete $object
     * @return array
     */
    public function getDataValue($object)
    {

        $data = [];

        $getter = "get" . ucfirst($this->fieldDefinition->getName());
        $fieldCollectionItems = $object->$getter();

        if ($fieldCollectionItems) {
            //deactivate inheritance since within field collections there is no inheritance
            $inheritanceBackup = AbstractObject::getGetInheritedValues();
            AbstractObject::setGetInheritedValues(false);

            foreach ($fieldCollectionItems->getItems() as $item) {
                /**
                 * @var $item \Pimcore\Model\DataObject\Fieldcollection\Data\AbstractData
                 */
                $definition = Fieldcollection\Definition::getByKey($item->getType());

                $fieldCollectionData = [];

                foreach ($definition->getFieldDefinitions() as $key => $field) {
                    $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($field, false);
                    $fieldCollectionData[$key] = $fieldDefinitionAdapter->getIndexData($item);
                }

                $data[$item->getType()][] = $fieldCollectionData;
            }

            //reset inheritance
            AbstractObject::setGetInheritedValues($inheritanceBackup);
        }

        return $data;
    }

    /**
     * @inheritdoc
     */
    public function getFieldSelectionInformation()
    {

        $allowedTypes = [];
        foreach ($this->fieldDefinition->getAllowedTypes() as $allowedType) {
            $allowedTypes[] = [$allowedType];
        }

        return [new FieldSelectionInformation(
            $this->fieldDefinition->getName(),
            $this->fieldDefinition->getTitle(),
            $this->fieldType,
            [
                'allowedTypes' => $allowedTypes,
                    ]
        )];
    }
}
