<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use Carbon\Carbon;
use DistributionHubBundle\Lib\DHubLogger;
use Pimcore\Db;

class Datetime extends Numeric implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "datetime";

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
            foreach ($fieldFilter->getFilterEntryData() as $value) {
                $datetime = new \DateTime($value);
                $value = $datetime->format(\DateTime::ISO8601);
            }
        } else {
            $datetime = new \DateTime($fieldFilter->getFilterEntryData());
            $value = $datetime->format(\DateTime::ISO8601);
        }

        if (is_array($fieldFilter->getFilterEntryData())) {
            $operator = array_keys($fieldFilter->getFilterEntryData())['0'];
        } else {
            $operator = $fieldFilter->getOperator();
        }

        $fieldName = $fieldDefinition->getName();

        $conditionParams = array();

        switch ($operator) {
            case $operator === self::DHUB_OPERATOR_MUST:
                $conditionParams['key'] = " `" . $fieldName . "` LIKE ? ";
                $conditionParams['value'] = strtotime($fieldFilter->getFilterEntryData());
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_LOWERTHAN:
                $conditionParams['key'] = " `" . $fieldName . "`  < ? ";
                $conditionParams['value'] = strtotime($value);
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_GREATERTHAN:
                $conditionParams['key'] = " `" . $fieldName . "`  > ? ";
                $conditionParams['value'] = strtotime($value);
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_LOWER_EQUAL_TO:
                $conditionParams['key'] = " `" . $fieldName . "`  <= ? ";
                $conditionParams['value'] = strtotime($value);
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_GREATER_EQUAL_TO:
                $conditionParams['key'] = " `" . $fieldName . "`  >= ? ";
                $conditionParams['value'] = strtotime($value);
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
        try {
            $db = Db::get();
            // Use of queryBuilder for prepared statements
            $queryBuilder = $db->createQueryBuilder();

            $fieldName = $details['0'];
            $operator = $details['1'];
            $datetime = new \DateTime($details['2']);
            $value = strtotime($datetime->format(\DateTime::ISO8601));
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

            return $queryBuilder->execute()->fetchAllAssociative();
        } catch (Exception $ex) {
            DHubLogger::log("Issue in " . __METHOD__ . " Exception - " . $ex->getMessage(), DHubLogger::ERROR);
            throw new \Exception("Applied Filter for - DateTime is currently not supported. Please contact the administrator");
        }
    }

    public function getRelatedFilterData($fieldFilter, $selectedFieldType, $relClassList)
    {

        if (is_array($fieldFilter['filterEntryData'])) {
            $operator = array_keys($fieldFilter['filterEntryData'])['0'];
            $val = array_values($fieldFilter['filterEntryData'])['0'];
            $datetime = new \DateTime($val);
            $value = strtotime($datetime->format(\DateTime::ISO8601));
        } else {
            $operator = $fieldFilter["operator"];
            $val = $fieldFilter["filterEntryData"];
            $datetime = new \DateTime($val);
            $value = strtotime($datetime->format(\DateTime::ISO8601));
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

    /**
     * @param Concrete $object
     * @param bool $ignoreInheritance
     */
    protected function getDataValue($object, $ignoreInheritance = false)
    {
        $value = null;

        $getter = "get" . $this->fieldDefinition->getName();
        $valueObject = $object->$getter();
        if ($valueObject) {
            $value = $valueObject->format(\DateTime::ISO8601);
        }

        if ($ignoreInheritance) {
            AbstractObject::setGetInheritedValues($inheritanceBackup);
        }

        return $value;
    }
}
