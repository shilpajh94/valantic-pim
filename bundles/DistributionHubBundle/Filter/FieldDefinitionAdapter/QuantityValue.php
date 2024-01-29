<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Db;
use DistributionHubBundle\Lib\DHubLogger;

class QuantityValue extends Numeric implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "quantityValue";

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

        if (is_array($fieldFilter->getFilterEntryData()['value'])) {
            $operator = array_keys($fieldFilter->getFilterEntryData()['value'])['0'];
            $unit = $fieldFilter->getFilterEntryData()['unit'];
            $value = array_values($fieldFilter->getFilterEntryData()['value'])['0'];
        } else {
            $operator = $fieldFilter->getOperator();
            $unit = $fieldFilter->getFilterEntryData()['unit'];
        }

        $fieldName = $fieldDefinition->getName();
        $valueField = $fieldName . "__value";
        $unitField = $fieldName . "__unit";

        $conditionParams = array();

        switch ($operator) {
            case $operator === self::DHUB_OPERATOR_MUST:
                $val = $fieldFilter->getFilterEntryData()['value'];
                $conditionParams['key'] = (empty($unit)) ?
                        " `" . $valueField . "` LIKE ? " :
                        " `" . $valueField . "` LIKE '" . $val . "' AND `" . $unitField . "` LIKE '" . $unit . "' ";
                $conditionParams['value'] = (empty($unit)) ? $val : null;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_LOWERTHAN:
                $conditionParams['key'] = (empty($unit)) ?
                        " `" . $valueField . "` < ? " :
                        " `" . $valueField . "` < '" . $value . "' AND `" . $unitField . "` LIKE '" . $unit . "' ";
                $conditionParams['value'] = (empty($unit)) ? $value : null;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_GREATERTHAN:
                $conditionParams['key'] = (empty($unit)) ?
                        " `" . $valueField . "` > ? " :
                        " `" . $valueField . "` > '" . $value . "' AND `" . $unitField . "` LIKE '" . $unit . "' ";
                $conditionParams['value'] = (empty($unit)) ? $value : null;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_LOWER_EQUAL_TO:
                $conditionParams['key'] = (empty($unit)) ?
                        " `" . $valueField . "` <= ? " :
                        " `" . $valueField . "` <= '" . $value . "' AND `" . $unitField . "` LIKE '" . $unit . "' ";
                $conditionParams['value'] = (empty($unit)) ? $value : null;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_GREATER_EQUAL_TO:
                $conditionParams['key'] = (empty($unit)) ?
                        " `" . $valueField . "` >= ? " :
                        " `" . $valueField . "` >= '" . $value . "' AND `" . $unitField . "` LIKE '" . $unit . "' ";
                $conditionParams['value'] = (empty($unit)) ? $value : null;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_EXISTS:
                $conditionParams['key'] = " `" . $valueField . "`  IS NOT NULL";
                $conditionParams['value'] = null;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_NOT_EXISTS:
                $conditionParams['key'] = " `" . $valueField . "`  IS NULL";
                $conditionParams['value'] = null;
                $conditionParams['concatenator'] = "AND";
                break;
        }

        return $conditionParams;
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
    public function getQueryForLocalized(array $details, $tableName)
    {

        $db = Db::get();
        // Use of queryBuilder for prepared statements
        $queryBuilder = $db->createQueryBuilder();
        try {
                $fieldName = $details['0'];
                $operator = $details['1'];
                $value = $details['2'];
                $unit = $details['3'];
                $lang = $details['4'];

                $valueColumn = $fieldName . "__value";
            switch ($operator) {
                case $operator === self::DHUB_OPERATOR_MUST:
                    $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->eq($valueColumn, '"' . $value . '"'),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
                    break;
                case $operator === self::DHUB_OPERATOR_LOWERTHAN:
                    $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->lt($valueColumn, '"' . $value . '"'),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
                    break;
                case $operator === self::DHUB_OPERATOR_GREATERTHAN:
                    $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->gt($valueColumn, '"' . $value . '"'),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
                    break;
                case $operator === self::DHUB_OPERATOR_LOWER_EQUAL_TO:
                    $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->lte($valueColumn, '"' . $value . '"'),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
                    break;
                case $operator === self::DHUB_OPERATOR_GREATER_EQUAL_TO:
                    $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->gte($valueColumn, '"' . $value . '"'),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
                    break;
                case $operator === self::DHUB_OPERATOR_EXISTS:
                    $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->isNotNull($valueColumn, '?'),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
                    break;
                case $operator === self::DHUB_OPERATOR_NOT_EXISTS:
                    $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->isNull($valueColumn, '?'),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
                    break;
            }

            return $queryBuilder->execute()->fetchAllAssociative();
        } catch (\Exception $ex) {
            DHubLogger::log("Issue in " . __METHOD__ . " Exception - " . $ex->getMessage(), DHubLogger::ERROR);
            throw new \Exception("Applied Filter for - QuantityValue is currently not supported. Please contact the administrator");
        }
    }

    public function getCollectionsData($fieldFilter)
    {

        $filterConditon = $fieldFilter['filterCondition'];
        $filterEntryData = $filterConditon['filterEntryData'];

        if (is_array($filterEntryData['value'])) {
            $operator = array_keys($filterEntryData['value'])['0'];
            $value = array_values($filterEntryData['value'])['0'];
        } else {
            $operator = $filterConditon["operator"];
            $value = $filterEntryData['value'];
        }

        $fieldName = $filterConditon["fieldname"] . "__value";

        switch ($operator) {
            case $operator === self::DHUB_OPERATOR_MUST:
                $conditon = " `" . $fieldName . "`  =  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_LOWERTHAN:
                $conditon = " `" . $fieldName . "`  <  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_GREATERTHAN:
                $conditon = " `" . $fieldName . "`  >  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_LOWER_EQUAL_TO:
                $conditon = " `" . $fieldName . "`  <=  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_GREATER_EQUAL_TO:
                $conditon = " `" . $fieldName . "`  >=  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_EXISTS:
                $conditon = " `" . $fieldName . "`  IS NOT NULL ";
                break;
            case $operator === self::DHUB_OPERATOR_NOT_EXISTS:
                $conditon = " `" . $fieldName . "`  IS NULL ";
                break;
        }

        return $conditon;
    }

    /**
     * returns selectable fields with their type information for filter frontend
     * @return FieldSelectionInformation[]
     */
    public function getFieldSelectionInformation()
    {
        return [new FieldSelectionInformation(
            $this->fieldDefinition->getName(),
            $this->fieldDefinition->getTitle(),
            $this->fieldType,
            [
                'operators' => ['lt', 'lte', 'eq', 'gte', 'gt', FilterEntry::EXISTS, FilterEntry::NOT_EXISTS],
                'classInheritanceEnabled' => $this->considerInheritance,
                'units' => $this->fieldDefinition->getValidUnits()
                    ]
        )];
    }
}
