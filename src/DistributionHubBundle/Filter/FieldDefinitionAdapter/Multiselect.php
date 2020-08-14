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

class Multiselect extends Select implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "multiselect";
    
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
        $value = $fieldFilter->getFilterEntryData();
        $conditionParams = array();
        switch ($operator) {
            case $operator == self::DHUB_OPERATOR_MUST:
                $conditionParams['key'] = " `" . $fieldName . "` LIKE ? ";
                $conditionParams['value'] = $value;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator == self::DHUB_OPERATOR_SHOULD:
                $conditionParams['key'] = " `" . $fieldName . "`  LIKE ? ";
                $conditionParams['value'] = "%" . $value . "%";
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator == self::DHUB_OPERATOR_NOT:
                $conditionParams['key'] = " `" . $fieldName . "` !=  ?";
                $conditionParams['value'] = $value;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator == self::DHUB_OPERATOR_EXISTS:
                $conditionParams['key'] = " `" . $fieldName . "`  IS NOT NULL";
                $conditionParams['value'] = NULL;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator == self::DHUB_OPERATOR_NOT_EXISTS:
                $conditionParams['key'] = " `" . $fieldName . "`  IS NULL ";
                $conditionParams['value'] = NULL;
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
    public function getQueryForLocalized(array $details, $tableName) {

        $db = Db::get();
        // Use of queryBuilder for prepared statements
        $queryBuilder = $db->createQueryBuilder();
        
        $fieldName = $details['0'];
        $operator = $details['1'];
        $value = $details['2'];
        $lang = $details['3'];

        switch ($operator) {
            case $operator == self::DHUB_OPERATOR_MUST:
                $queryBuilder
                    ->select('ooo_id')
                    ->from($tableName)
                    ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->eq($fieldName, '"'.$value.'"'),
                                $queryBuilder->expr()->eq('language', '"'.$lang.'"')
                            ) 
                        );
                break;
            case $operator == self::DHUB_OPERATOR_SHOULD:
                $queryBuilder
                    ->select('ooo_id')
                    ->from($tableName)
                    ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->like($fieldName, '"%'.$value.'%"'),
                                $queryBuilder->expr()->eq('language', '"'.$lang.'"')
                            ) 
                        );
                break;
            case $operator == self::DHUB_OPERATOR_NOT:
                $queryBuilder
                    ->select('ooo_id')
                    ->from($tableName)
                    ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->neq($fieldName, '"'.$value.'"'),
                                $queryBuilder->expr()->eq('language', '"'.$lang.'"')
                            ) 
                        );
                break;
            case $operator == self::DHUB_OPERATOR_EXISTS:
                $queryBuilder
                    ->select('ooo_id')
                    ->from($tableName) 
                    ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->isNotNull($fieldName, '?'),
                                $queryBuilder->expr()->eq('language', '"'.$lang.'"')
                            ) 
                        ); 
                break;
            case $operator == self::DHUB_OPERATOR_NOT_EXISTS:
                $queryBuilder
                    ->select('ooo_id')
                    ->from($tableName) 
                    ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->isNull($fieldName, '?'),
                                $queryBuilder->expr()->eq('language', '"'.$lang.'"')
                            ) 
                        ); 
                break;
        }

        try {
            return $queryBuilder->execute()->fetchAll();
        } catch (Exception $ex) {
            DHubLogger::log("Issue in ".__METHOD__." Exception - ". $ex->getMessage(), DHubLogger::ERROR);
        }
    }

    public function getRelatedFilterData($fieldFilter) {

        $operator = $fieldFilter["operator"];
        $value = $fieldFilter["filterEntryData"];
        $fieldName = $fieldFilter["fieldname"];

        $conditons = array();
        switch ($operator) {
            case $operator == self::DHUB_OPERATOR_MUST:
                $conditons[] = " `" . $fieldName . "`  =  '" . $value . "' ";
                break;
            case $operator == self::DHUB_OPERATOR_SHOULD:
                $conditons[] = " `" . $fieldName . "`  LIKE  '%" . $value . "%' ";
                break;
            case $operator == self::DHUB_OPERATOR_NOT:
                $conditons[] = " `" . $fieldName . "`  !=  '" . $value . "' ";
                break;
            case $operator == self::DHUB_OPERATOR_EXISTS:
                $conditons[] = " `" . $fieldName . "`  IS NOT NULL ";
                break;
            case $operator == self::DHUB_OPERATOR_NOT_EXISTS:
                $conditons[] = " `" . $fieldName . "`  IS NULL ";
                break;
        }

        return $conditons;
    }

}
