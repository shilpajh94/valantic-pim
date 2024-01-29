<?php

/**
 * File Path: Your File path on system
 * Command: b2c:product <filePath>
 * Des: Region data import script.
 */

namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PimDataPostBundle\Lib\Constants;
use Pimcore\Db;
use PimDataPostBundle\AttributeConfigProvider\B2C\B2CProductAttributeConfigProvider;
use PimDataPostBundle\AttributeConfigProvider\B2C\B2CCategoryAttributeConfigProvider;

class CreateB2CTableCommand extends AbstractCommand
{
    private $commonHelper;
    private $db;

    protected function configure()
    {
        $this->setName('conti:datapost:create-b2c-table')
            ->setDescription('Create B2C Temp Master tables.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();

        $this->commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $B2CProductAttributeConfigProvider = new B2CProductAttributeConfigProvider();
        $productAttributes = $B2CProductAttributeConfigProvider->getCompleteAttributeConfig();
        $this->createTable($productAttributes, Constants::B2C_PRODUCT_TEMP_TABLE_NAME, 'o_id');
        $this->createTable($productAttributes, Constants::B2C_PRODUCT_MASTER_TABLE_NAME, 'o_id');

        $B2CCategoryAttributeConfigProvider = new B2CCategoryAttributeConfigProvider();
        $categoryAttributes = $B2CCategoryAttributeConfigProvider->getCompleteAttributeConfig();
        $this->createTable($categoryAttributes, Constants::B2C_CATEGORY_TEMP_TABLE_NAME, 'o_id');
        $this->createTable($categoryAttributes, Constants::B2C_CATEGORY_MASTER_TABLE_NAME, 'o_id');

        $this->createTableB2cApiRequestEntities();
        $this->createTableB2cEntityEnforce();
        $this->createTableB2cProductRelationChange();
        $this->createTableSalesforceIntegrationPimcoreFailedRecord();

    }

    public function createTable($fields, $tableName, $uniqueIndexKey)
    {
        if($fields)
        {
            $fieldsArray = [];
            $fieldsString = '';
            $uniqueKeyIndexRequired = false;
            foreach ($fields as $key => $value) {
                if(isset($value['temp_master_table_attr']) && $value['temp_master_table_attr'])
                {
                    $temp_master_table_column_type = $value['temp_master_table_column_type'];
                    $fieldsArray[] = "{$key} {$temp_master_table_column_type}";
                }

                if($uniqueIndexKey == $key)
                {
                    $uniqueKeyIndexRequired = true;
                }
            }

            if(trim($uniqueIndexKey) && $uniqueKeyIndexRequired)
            {
                $fieldsArray[] = "UNIQUE KEY unique_pim_id ({$uniqueIndexKey})";
            }

            $fieldsString = implode(', ', $fieldsArray);

            $sql = "CREATE TABLE IF NOT EXISTS {$tableName} (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                {$fieldsString}
                )";

            $this->db->executeQuery($sql);

            echo "\n {$tableName} - table created.";
        }
    }


    private function createTableB2cApiRequestEntities()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `".\PimDataPostBundle\Model\PersistantModel\B2CAPIRequestEntity\Dao::TABLE_NAME."` (
            `id` int NOT NULL AUTO_INCREMENT,
            `body` longtext DEFAULT NULL,
            `SFObjectType` varchar(151) NOT NULL,
            `responseStatus` varchar(255) DEFAULT NULL,
            `responseMsg` text ,
            `referenceId` varchar(55) NOT NULL,
            `operationType` varchar(151) DEFAULT NULL COMMENT 'CREATE/UPDATE/DELETE',
            `externalID` varchar(99) DEFAULT NULL,
            `pimId` varchar(1024) DEFAULT NULL,
            `responseTimestamp` int UNSIGNED DEFAULT NULL,
            `creationDate` int UNSIGNED DEFAULT NULL,
            `businessUnit` varchar(55) DEFAULT NULL,
             INDEX (`externalID`),
             PRIMARY KEY (`id`)
            ) ENGINE=InnoDB";
        $this->db->executeQuery($sql);
        echo "\n ".\PimDataPostBundle\Model\PersistantModel\B2CAPIRequestEntity\Dao::TABLE_NAME." - table created.";
    }

    private function createTableB2cEntityEnforce()
    {
        $sql = "CREATE TABLE  IF NOT EXISTS `".\PimDataPostBundle\Model\PersistantModel\B2CEntityEnforcedToPush\Dao::TABLE_NAME."` (
            `id` int NOT NULL AUTO_INCREMENT,
            `objectId` varchar(1024) DEFAULT NULL,
            `operationType` varchar(151) DEFAULT NULL COMMENT 'CREATE/UPDATE/DELETE',
            `SFObjectType` varchar(151) NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB";
        $this->db->executeQuery($sql);
        echo "\n ".\PimDataPostBundle\Model\PersistantModel\B2CEntityEnforcedToPush\Dao::TABLE_NAME." - table created.";
    }

    private function createTableB2cProductRelationChange()
    {
        $sql = "CREATE TABLE  IF NOT EXISTS `".\PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange\Dao::TABLE_NAME."` (
            `id` int NOT NULL AUTO_INCREMENT,
            `productId` varchar(100) DEFAULT NULL,
            `attributeName` varchar(100) DEFAULT NULL,
            `oldValue` varchar(512) DEFAULT NULL,
            `newValue` varchar(512) DEFAULT NULL,
            `businessUnit` varchar(55) DEFAULT NULL,
             PRIMARY KEY (`id`)
            ) ENGINE=InnoDB";
        $this->db->executeQuery($sql);
        echo "\n ".\PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange\Dao::TABLE_NAME." - table created.";
    }

    private function createTableSalesforceIntegrationPimcoreFailedRecord()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `".\PimDataPostBundle\Model\PersistantModel\B2CPimFailureRecord\Dao::TABLE_NAME."` (
            `id` int NOT NULL AUTO_INCREMENT,
            `pimId` varchar(1024) NOT NULL,
            `SFObjectType` varchar(55) NOT NULL,
            `failureMessage` text   ,
            `status` enum('FIXED','NON-FIXED') NOT NULL,
            `timestamp` int DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB";
        $this->db->executeQuery($sql);
        echo "\n ".\PimDataPostBundle\Model\PersistantModel\B2CPimFailureRecord\Dao::TABLE_NAME." - table created.";
    }
}
