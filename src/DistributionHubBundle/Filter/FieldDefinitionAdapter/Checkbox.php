<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use DistributionHubBundle\Filter\FilterEntry;
use Pimcore\Db;

class Checkbox extends DefaultAdapter implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "checkbox";

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

        $fieldName = $fieldDefinition->getName();
        $conditionParams = array();
        if ($fieldName === "o_published") {
            if ($fieldFilter->getFilterEntryData() === self::DHUB_OPERATOR_TRUE) {
                $conditionParams['key'] = " `" . $fieldName . "`  = ? ";
                $conditionParams['value'] = '1';
                $conditionParams['concatenator'] = "AND";
            } elseif ($fieldFilter->getFilterEntryData() === self::DHUB_OPERATOR_FALSE) {
                $conditionParams['key'] = " `" . $fieldName . "`  = ? ";
                $conditionParams['value'] = '0';
                $conditionParams['concatenator'] = "AND";
            }
        } else {
            if ($fieldFilter->getFilterEntryData() === self::DHUB_OPERATOR_TRUE) {
                $conditionParams['key'] = " `" . $fieldName . "`  = ? ";
                $conditionParams['value'] = '1';
                $conditionParams['concatenator'] = "AND";
            } elseif ($fieldFilter->getFilterEntryData() === self::DHUB_OPERATOR_FALSE) {
                $conditionParams['key'] = " `" . $fieldName . "`  IS NULL OR `" . $fieldName . "` = '0' ";
                $conditionParams['value'] = null;
                $conditionParams['concatenator'] = "AND";
            }
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
            $value = $details['2'];
            $lang = $details['3'];

            if ($value === self::DHUB_OPERATOR_TRUE) {
                $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->eq($fieldName, $value),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
            } elseif ($value === self::DHUB_OPERATOR_FALSE) {
                $queryBuilder
                        ->select('ooo_id')
                        ->from($tableName)
                        ->where(
                            $queryBuilder->expr()->andX(
                                $queryBuilder->expr()->isNull($fieldName, '?'),
                                $queryBuilder->expr()->eq('language', '"' . $lang . '"')
                            )
                        );
            }

            return $queryBuilder->execute()->fetchAll();
        } catch (Exception $ex) {
            DHubLogger::log("Issue in " . __METHOD__ . " Exception - " . $ex->getMessage(), DHubLogger::ERROR);
            throw new \Exception("Applied Filter for - CheckBox is currently not supported. Please contact the administrator");
        }
    }

    public function getRelatedFilterData($fieldFilter, $selectedFieldType, $relClassList)
    {

        $value = $fieldFilter["filterEntryData"];
        $fieldName = $fieldFilter["fieldname"];

        $conditons = array();
        if ($value === self::DHUB_OPERATOR_TRUE) {
            $conditons[] = " `" . $fieldName . "`  =  '" . $value . "' ";
        } elseif ($value === self::DHUB_OPERATOR_FALSE) {
            $conditons[] = " `" . $fieldName . "`  IS NULL  ";
        }

        return $conditons;
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
                'operators' => [FilterEntry::SELECTED, FilterEntry::NOT_SELECTED],
                'classInheritanceEnabled' => $this->considerInheritance
                    ]
        )];
    }
}
