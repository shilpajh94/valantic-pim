<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B;

use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorHelper;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao\B2BProductTempTablePopulatorDao;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BCategoryAttributeConfigProvider;
use PimDataPostBundle\Lib\Constants;

class B2BTempTablePopulatorHelper extends TempTablePopulatorHelper
{
    private $dao;
    private $commonHelper;
    private $b2bProductAttributeConfigProvider;
    private $b2bCategoryAttributeConfigProvider;

    public function __construct()
    {
        $this->dao = new B2BProductTempTablePopulatorDao();
        $this->commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        $this->b2bProductAttributeConfigProvider = new B2BProductAttributeConfigProvider();
        $this->b2bCategoryAttributeConfigProvider = new B2BCategoryAttributeConfigProvider();
    }

    public function truncateTempTable(string $tableName)
    {
        $this->dao->truncate($tableName);
    }

    public function getPimModifiedRecordIds()
    {
        $salesMaterialProductIDs = $this->dao->getTodaysSaleMasterModifiedRecords();
        $materialProductIDs = $this->dao->getTodaysProductModifiedRecords();

        $resultSet = [];

        if($salesMaterialProductIDs || $materialProductIDs)
        {
            $resultSet = \array_unique(array_merge($salesMaterialProductIDs, $materialProductIDs));
        }

        return $resultSet;
    }

    public function getTodaysCategoryPimModifiedRecordIds()
    {
        return $this->dao->getTodaysCategoryPimModifiedRecordIds();
    }

    public function getTempTableDataForIds($pimIds)
    {
        $attributeConfig = $this->b2bProductAttributeConfigProvider->getCompleteConfig();
        $attribute = $this->commonHelper->getParameter($attributeConfig, 'Attribute');
        return $this->dao->prepareQueryAndFetchDbData($attribute, $pimIds);
    }

    public function getCategoryTempTableDataForIds($pimIds)
    {
        $attributeConfig = $this->b2bCategoryAttributeConfigProvider->getCompleteConfig();
        $attribute = $this->commonHelper->getParameter($attributeConfig, 'Attribute');
        return $this->dao->prepareCategoryQueryAndFetchDbData($attribute, $pimIds);
    }

    public function addHashesToTempTableData($resultSet)
    {
        $attributeConfig = $this->b2bProductAttributeConfigProvider->getCompleteConfig();
        $attribute = $this->commonHelper->getParameter($attributeConfig, 'Attribute');
        $relationalFields = $this->b2bProductAttributeConfigProvider->getPIMRelationalAttributeConfig($attribute);
        return $this->dao->createHashData($resultSet, $relationalFields);
    }

    public function addCategoryHashesToTempTableData($resultSet)
    {
        $attributeConfig = $this->b2bCategoryAttributeConfigProvider->getCompleteConfig();
        $attribute = $this->commonHelper->getParameter($attributeConfig, 'Attribute');
        $relationalFields = $this->b2bCategoryAttributeConfigProvider->getPIMRelationalAttributeConfig($attribute);
        return $this->dao->createHashData($resultSet, $relationalFields);
    }

    public function insertDataInTempTable($resultSet)
    {
        $this->dao->insertDataInTemp($resultSet, Constants::B2B_PRODUCT_TEMP_TABLE_NAME);
    }

    public function insertCategoriesDataInTempTable($resultSet)
    {
        $this->dao->insertDataInTemp($resultSet, Constants::B2B_CATEGORY_TEMP_TABLE_NAME);
    }
    
}