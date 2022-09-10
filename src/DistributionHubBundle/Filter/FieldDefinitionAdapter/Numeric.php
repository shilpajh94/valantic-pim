<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Db;
use DistributionHubBundle\Lib\DHubLogger;

class Numeric extends DefaultAdapter implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "numeric";

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

        if (is_array($fieldFilter->getFilterEntryData())) {
            $operator = array_keys($fieldFilter->getFilterEntryData())['0'];
            $value = array_values($fieldFilter->getFilterEntryData())['0'];
        } else {
            $operator = $fieldFilter->getOperator();
        }

        $fieldName = $fieldDefinition->getName();
        $conditionParams = array();

        switch ($operator) {
            case $operator === self::DHUB_OPERATOR_MUST:
                $conditionParams['key'] = "`" . $fieldName . "` = '" . $fieldFilter->getFilterEntryData() . "' ";
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_LOWERTHAN:
                $conditionParams['key'] = " `" . $fieldName . "`  < ? ";
                $conditionParams['value'] = $value;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_GREATERTHAN:
                $conditionParams['key'] = " `" . $fieldName . "`  > ? ";
                $conditionParams['value'] = $value;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_LOWER_EQUAL_TO:
                $conditionParams['key'] = " `" . $fieldName . "`  <= ? ";
                $conditionParams['value'] = $value;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_GREATER_EQUAL_TO:
                $conditionParams['key'] = " `" . $fieldName . "`  >= ? ";
                $conditionParams['value'] = $value;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_EXISTS:
                $conditionParams['key'] = " `" . $fieldName . "`  IS NOT NULL";
                $conditionParams['value'] = null;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_NOT_EXISTS:
                $conditionParams['key'] = " `" . $fieldName . "`  IS NULL";
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
        try {
            $queryBuilder = $db->createQueryBuilder();

            $fieldName = $details['0'];
            $operator = $details['1'];
            $value = $details['2'];
            $lang = $details['3'];
            switch ($operator) {
                case $operator === self::DHUB_OPERATOR_MUST:
                    $queryBuilder
                            ->select('ooo_id')
                            ->from($tableName)
                            ->where(
                                $queryBuilder->expr()->andX(
                                    $queryBuilder->expr()->eq($fieldName, '"' . $value . '"'),
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
                                    $queryBuilder->expr()->lt($fieldName, '"' . $value . '"'),
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
                                    $queryBuilder->expr()->gt($fieldName, '"' . $value . '"'),
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
                                    $queryBuilder->expr()->lte($fieldName, '"' . $value . '"'),
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
                                    $queryBuilder->expr()->gte($fieldName, '"' . $value . '"'),
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
                                    $queryBuilder->expr()->isNotNull($fieldName, '?'),
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
                                    $queryBuilder->expr()->isNull($fieldName, '?'),
                                    $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                                )
                            );
                    break;
            }

            return $queryBuilder->execute()->fetchAll();
        } catch (Exception $ex) {
            DHubLogger::log("Issue in " . __METHOD__ . " Exception - " . $ex->getMessage(), DHubLogger::ERROR);
            throw new \Exception("Applied Filter for - CheckBox is currently not supported. Please contact the administrator");
        }
    }

    public function getRelatedFilterData($fieldFilter, $selectedFieldType, $relClassList)
    {


        if (is_array($fieldFilter['filterEntryData'])) {
            $operator = array_keys($fieldFilter['filterEntryData'])['0'];
            $value = array_values($fieldFilter['filterEntryData'])['0'];
        } else {
            $operator = $fieldFilter["operator"];
            $value = $fieldFilter["filterEntryData"];
        }

        $fieldName = $fieldFilter["fieldname"];

        $conditons = array();
        switch ($operator) {
            case $operator === self::DHUB_OPERATOR_MUST:
                $conditons[] = " `" . $fieldName . "`  =  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_LOWERTHAN:
                $conditons[] = " `" . $fieldName . "`  <  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_GREATERTHAN:
                $conditons[] = " `" . $fieldName . "`  >  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_LOWER_EQUAL_TO:
                $conditons[] = " `" . $fieldName . "`  <=  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_GREATER_EQUAL_TO:
                $conditons[] = " `" . $fieldName . "`  >=  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_EXISTS:
                $conditons[] = " `" . $fieldName . "`  IS NOT NULL ";
                break;
            case $operator === self::DHUB_OPERATOR_NOT_EXISTS:
                $conditons[] = " `" . $fieldName . "`  IS NULL ";
                break;
        }

        return $conditons;
    }

    public function getCollectionsData($fieldFilter)
    {

        $filterConditon = $fieldFilter['filterCondition'];

        if (is_array($filterConditon['filterEntryData'])) {
            $operator = array_keys($filterConditon['filterEntryData'])['0'];
            $value = array_values($filterConditon['filterEntryData'])['0'];
        } else {
            $operator = $filterConditon["operator"];
            $value = $filterConditon["filterEntryData"];
        }

        $fieldName = $filterConditon["fieldname"];

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
     *
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
                'classInheritanceEnabled' => $this->considerInheritance
                    ]
        )];
    }
}
