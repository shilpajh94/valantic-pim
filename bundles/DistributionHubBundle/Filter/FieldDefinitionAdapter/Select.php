<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Db;
use DistributionHubBundle\Lib\DHubLogger;

class Select extends DefaultAdapter implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "select";

    /**
     * Get query based on applied filter, use pimcore addConditionParams() method
     * $key, $value = null, $concatenator = 'AND'
     *
     * @param ClassDefinition\Listing $listingClass
     * @param filterConditionData $fieldFilter
     * @param appliedFilterDataType $fieldDefinition
     *
     * @return $conditonParams
     *
     * @throws Exception
     */
    public function getQueryPart($fieldFilter, $fieldDefinition, $listing)
    {

        $operator = $fieldFilter->getOperator();
        $fieldName = $fieldDefinition->getName();
        $value = $fieldFilter->getFilterEntryData();
        $conditionParams = array();
        switch ($operator) {
            case $operator === self::DHUB_OPERATOR_MUST:
                $conditionParams['key'] = " `" . $fieldName . "` LIKE ? ";
                $conditionParams['value'] = $value;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_SHOULD:
                $conditionParams['key'] = " `" . $fieldName . "`  LIKE ? ";
                $conditionParams['value'] = "%" . $value . "%";
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_NOT:
                $conditionParams['key'] = " `" . $fieldName . "` !=  ?";
                $conditionParams['value'] = $value;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_EXISTS:
                $conditionParams['key'] = " `" . $fieldName . "`  IS NOT NULL";
                $conditionParams['value'] = null;
                $conditionParams['concatenator'] = "AND";
                break;
            case $operator === self::DHUB_OPERATOR_NOT_EXISTS:
                $conditionParams['key'] = " `" . $fieldName . "`  IS NULL ";
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
        try {
            // Use of queryBuilder for prepared statements
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
                case $operator === self::DHUB_OPERATOR_SHOULD:
                    $queryBuilder
                            ->select('ooo_id')
                            ->from($tableName)
                            ->where(
                                $queryBuilder->expr()->andX(
                                    $queryBuilder->expr()->like($fieldName, '"%' . $value . '%"'),
                                    $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                                )
                            );
                    break;
                case $operator === self::DHUB_OPERATOR_NOT:
                    $queryBuilder
                            ->select('ooo_id')
                            ->from($tableName)
                            ->where(
                                $queryBuilder->expr()->andX(
                                    $queryBuilder->expr()->neq($fieldName, '"' . $value . '"'),
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
        } catch (\Exception $ex) {
            DHubLogger::log("Issue in " . __METHOD__ . " Exception - " . $ex->getMessage(), DHubLogger::ERROR);
            throw new \Exception("Applied Filter for - Select is currently not supported. Please contact the administrator");
        }
    }

    public function getRelatedFilterData($fieldFilter, $selectedFieldType, $relClassList)
    {

        $operator = $fieldFilter["operator"];
        $value = $fieldFilter["filterEntryData"];
        $fieldName = $fieldFilter["fieldname"];

        $conditons = array();
        switch ($operator) {
            case $operator === self::DHUB_OPERATOR_MUST:
                $conditons[] = " `" . $fieldName . "`  =  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_SHOULD:
                $conditons[] = " `" . $fieldName . "`  LIKE  '%" . $value . "%' ";
                break;
            case $operator === self::DHUB_OPERATOR_NOT:
                $conditons[] = " `" . $fieldName . "`  !=  '" . $value . "' ";
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
        $operator = $filterConditon["operator"];
        $value = $filterConditon["filterEntryData"];
        $fieldName = $filterConditon["fieldname"];

        switch ($operator) {
            case $operator === self::DHUB_OPERATOR_MUST:
                $conditon = " `" . $fieldName . "`  =  '" . $value . "' ";
                break;
            case $operator === self::DHUB_OPERATOR_SHOULD:
                $conditon = " `" . $fieldName . "`  LIKE  '%" . $value . "%' ";
                break;
            case $operator === self::DHUB_OPERATOR_NOT:
                $conditon = " `" . $fieldName . "`  !=  '" . $value . "' ";
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
     * @inheritdoc
     */
    public function getFieldSelectionInformation()
    {
        return [new FieldSelectionInformation(
            $this->fieldDefinition->getName(),
            $this->fieldDefinition->getTitle(),
            $this->fieldType,
            [
                'operators' => [FilterEntry::MUST, FilterEntry::MUST_NOT, FilterEntry::EXISTS, FilterEntry::NOT_EXISTS],
                'classInheritanceEnabled' => $this->considerInheritance,
                'options' => $this->fieldDefinition->getOptions()
                    ]
        )];
    }
}
