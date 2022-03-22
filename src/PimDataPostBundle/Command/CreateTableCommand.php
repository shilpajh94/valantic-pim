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
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BCategoryAttributeConfigProvider;

class CreateTableCommand extends AbstractCommand
{
    private $commonHelper;
    private $db;

    protected function configure()
    {
        $this->setName('conti:datapost:create-table')
            ->setDescription('Create B2B & B2C Temp Master tables.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();

        $this->commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $B2BProductAttributeConfigProvider = new B2BProductAttributeConfigProvider();
        $productAttributes = $B2BProductAttributeConfigProvider->getCompleteAttributeConfig();
        // $productAttributes = $this->commonHelper->getParameter($B2BProductAttributeConfig, 'Attribute');
        $this->createTable($productAttributes, Constants::B2B_PRODUCT_TEMP_TABLE_NAME, 'o_id');
        $this->createTable($productAttributes, Constants::B2B_PRODUCT_MASTER_TABLE_NAME, 'o_id');

        $B2BCategoryAttributeConfigProvider = new B2BCategoryAttributeConfigProvider();
        $categoryAttributes = $B2BCategoryAttributeConfigProvider->getCompleteAttributeConfig();
        // $categoryAttributes = $this->commonHelper->getParameter($B2BCategoryAttributeConfig, 'Attribute');
        $this->createTable($categoryAttributes, Constants::B2B_CATEGORY_TEMP_TABLE_NAME, 'oo_id');
        $this->createTable($categoryAttributes, Constants::B2B_CATEGORY_MASTER_TABLE_NAME, 'oo_id');
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
            // Create B2C/B2C temp table
            $sql = "CREATE TABLE IF NOT EXISTS {$tableName} (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                {$fieldsString}
                )";

            $this->db->query($sql);

            echo "\n {$tableName} - table created.";
        }
    }
}
