<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Filter\FilterEntry;
use DistributionHubBundle\Services\FilterService;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Localization\LocaleServiceInterface;
use Pimcore\Tool;
use Pimcore\Db;
use DistributionHubBundle\Lib\DHubLogger;

class Localizedfields extends DefaultAdapter implements FieldDefinitionAdapterInterface
{

    /**
     * @var Data\Localizedfields
     */
    protected $fieldDefinition;

    /**
     * @var Locale
     */
    protected $localeService;

    public function __construct(FilterService $service, LocaleServiceInterface $locale = null)
    {
        parent::__construct($service);

        $this->localeService = $locale;
        if (!$locale) {
            throw new \Exception("Locale not set");
        }
    }

    /**
     * @param Concrete $object
     * @return array
     */
    public function getDataValue($object)
    {

        $localeBackup = $this->localeService->getLocale();

        $validLanguages = Tool::getValidLanguages();

        $localizedFieldData = [];

        if ($validLanguages) {
            foreach ($validLanguages as $language) {
                foreach ($this->fieldDefinition->getFieldDefinitions() as $key => $fieldDefinition) {
                    $this->localeService->setLocale($language);

                    $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($fieldDefinition, $this->considerInheritance);
                    $localizedFieldData[$language][$key] = $fieldDefinitionAdapter->getIndexData($object);
                }
            }
        }

        $this->localeService->setLocale($localeBackup);

        return $localizedFieldData;
    }

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

        $validLanguages = Tool::getValidLanguages();

        $classId = $listing->getClassId();

        $lang = array_keys($fieldFilter->getFilterEntryData())['0'];
        if (empty($lang)) {
            $lang = $validLanguages['0'];
        }
        $data = $fieldFilter->getFilterEntryData()[$lang]['0'];

        $fieldName = $data['fieldname'];
        $fieldType = $this->getLocalizedFieldType($fieldDefinition, $fieldName);
        $conditionParams = array();
        if (!empty($fieldType)) {
            if (is_array($data['filterEntryData'])) {
                $operator = array_keys($data['filterEntryData'])['0'];
                $value = $data['filterEntryData'][$operator];
            } else {
                $value = $data['filterEntryData'];
                $operator = $data['operator'];
            }

            $tableName = "object_localized_query_" . $classId."_".$lang;

            $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($fieldType, $this->considerInheritance);

            if ($fieldType->getFieldType() === "quantityValue") {
                $operator = $data['operator'];
                $value = $data['filterEntryData']['value'];
                $unit = $data['filterEntryData']['unit'];
                $filteredResults = $fieldDefinitionAdapter->getQueryForLocalized([$fieldName, $operator, $value, $unit, $lang], $tableName);
            } elseif (in_array($fieldType->getFieldType(), self::DHUB_TYPE_RELATIONS)) {
                $relationsTable = "object_relations_" . $classId;
                return $fieldDefinitionAdapter->getQueryForLocalized($fieldFilter, $relationsTable);
            } else {
                $filteredResults = $fieldDefinitionAdapter->getQueryForLocalized([$fieldName, $operator, $value, $lang,], $tableName);
            }

            $resultsIds = array();

            if (!empty($filteredResults)) {
                foreach ($filteredResults as $val) {
                    $val = $val['ooo_id'];
                    $resultsIds[] = " `id` = '" . $val . "' ";
                }
                $conditonPrepare = implode(' OR ', $resultsIds);

                $conditionParams['key'] = $conditonPrepare;
                $conditionParams['value'] = null;
                $conditionParams['concatenator'] = "AND";

                return $conditionParams;
            }
        } else {
            return $conditionParams;
        }
    }

     /**
     * Get DataForLocalized for Bricks & Collections,
     * use queryBuilder prepared statements
     *
     * @param mixed
     * @return mixed
     *
     * @throws Exception
     */
    public function getDataForLocalized($fieldFilter, $classId, $fieldDefinition, $fieldType)
    {

        $validLanguages = Tool::getValidLanguages();

        if ($fieldType === "objectbricks") {
            $tableName = "object_brick_localized_" . $fieldFilter['type'] . "_" . $classId;
            $lang = array_keys($fieldFilter['filterCondition']['filterEntryData'])['0'];
            $data = $fieldFilter['filterCondition']['filterEntryData'][$lang]['0'];
        } elseif ($fieldType === "fieldcollections") {
            $tableName = "object_collection_" . $fieldFilter['type'] . "_localized_" . $classId;
            $lang = array_keys($fieldFilter['filterCondition']['filterEntryData'])['0'];
            $data = $fieldFilter['filterCondition']['filterEntryData'][$lang]['0'];
        } elseif ($fieldType === "object") {
            $tableName = "object_localized_data_". $classId;
            $lang = array_keys($fieldFilter['filterEntryData'])['0'];
            $data = $fieldFilter['filterEntryData'][$lang]['0'];
        }
        if (empty($lang)) {
            $lang = $validLanguages['0'];
        }

        $fieldName = $data['fieldname'];
        $childFieldType = $this->getLocalizedFieldType($fieldDefinition, $fieldName);

        if (!empty($childFieldType)) {
            if (is_array($data['filterEntryData'])) {
                $operator = array_keys($data['filterEntryData'])['0'];
                $value = $data['filterEntryData'][$operator];
            } else {
                $value = $data['filterEntryData'];
                $operator = $data['operator'];
            }

            try {
                $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($childFieldType, $this->considerInheritance);
                if ($childFieldType->getFieldType() === "quantityValue") {
                    $operator = $data['operator'];
                    $value = $data['filterEntryData']['value'];
                    $unit = $data['filterEntryData']['unit'];
                    return $fieldDefinitionAdapter->getQueryForLocalized([$fieldName, $operator, $value, $unit, $lang], $tableName);
                } elseif (in_array($childFieldType->getFieldType(), self::DHUB_TYPE_RELATIONS)) {
                    if ($fieldType === "objectbricks") {
                        $relationsTable = "object_brick_localized_query_" . $fieldFilter['type'] . "_" . $classId . "_" . $lang;
                    } elseif ($fieldType === "fieldcollections") {
                        $relationsTable = "object_relations_" . $classId;
                    }
                    return $fieldDefinitionAdapter->getLocalizedStructuredResults($fieldFilter, $relationsTable, $fieldType);
                } else {
                    return $fieldDefinitionAdapter->getQueryForLocalized([$fieldName, $operator, $value, $lang,], $tableName);
                }
            } catch (Exception $ex) {
                DHubLogger::log("Issue in ".__METHOD__." Exception - ". $ex->getMessage(), DHubLogger::ERROR);
            }
        } else {
            return false;
        }
    }

    /**
     * returns child fieldTypes of localized type
     * @return childDefiniton/object
     */
    public function getLocalizedFieldType($fieldDefinition, $fieldName)
    {
        foreach ($fieldDefinition->getChildren() as $childDefiniton) {
            // handling of feild containers if used under localized fields.
            if ($childDefiniton instanceof \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer) {
                foreach ($childDefiniton->getChildren() as $childDefiniton1stLevel) {
                    if ($childDefiniton1stLevel instanceof \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer) {
                        foreach ($childDefiniton1stLevel->getChildren() as $childDefiniton2ndLevel) {
                            if ($childDefiniton2ndLevel->getName() === $fieldName) {
                                return $childDefiniton2ndLevel;
                            }
                        }
                    }

                    if ($childDefiniton1stLevel->getName() === $fieldName) {
                        return $childDefiniton1stLevel;
                    }
                }
            }


            if ($childDefiniton->getName() === $fieldName) {
                return $childDefiniton;
            }
        }
    }

    /**
     * returns selectable fields with their type information for frontEnd
     * @return FieldSelectionInformation[]
     */
    public function getFieldSelectionInformation()
    {
        $fieldSelectionInformationEntries = [];

        $children = $this->fieldDefinition->getFieldDefinitions();
        foreach ($children as $child) {
            if ($child->getFieldtype() === "image") {
                continue;
            }
            $fieldDefinitionAdapter = $this->service->getFieldDefinitionAdapter($child, $this->considerInheritance);

            $subEntries = $fieldDefinitionAdapter->getFieldSelectionInformation();
            foreach ($subEntries as $subEntry) {
                $context = $subEntry->getContext();
                $context['subType'] = $subEntry->getFieldType();
                $context['languages'] = Tool::getValidLanguages();
                $subEntry->setContext($context);

                $subEntry->setFieldType("localizedfields");
            }

            $fieldSelectionInformationEntries = array_merge($fieldSelectionInformationEntries, $subEntries);
        }

        return $fieldSelectionInformationEntries;
    }
}
