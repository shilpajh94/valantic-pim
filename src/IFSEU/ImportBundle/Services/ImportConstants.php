<?php

namespace IFSEU\ImportBundle\Services;

class ImportConstants
{
    const IFSEU_FOLDER = 'Contitech_IFSEU';
    const MASTER_LIST_FOLDER = self::IFSEU_FOLDER . '/Master List';
    const MASTER_LIST_PLANTS_FOLDER = self::MASTER_LIST_FOLDER .'/Delivering Plant';
    const MASTER_LIST_COUNTRY_FOLDER = self::MASTER_LIST_FOLDER .'/Country of Origin';
    const MASTER_LIST_SALES_ORGANIZATIONS_FOLDER = self::MASTER_LIST_FOLDER .'/Sales Organization';
    const MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER = self::MASTER_LIST_FOLDER .'/Distribution Channel';
    const IFSEU_MATERIAL_MASTER_FOLDER = self::IFSEU_FOLDER . '/MaterialMaster';
    const IFSEU_MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER = self::IFSEU_MATERIAL_MASTER_FOLDER .'/PlantMaterialMaster';
    const IFSEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER = self::IFSEU_MATERIAL_MASTER_FOLDER . '/SalesMaterialMaster';
    const IMPORT_TABLE_ID_SEPARATOR = '$';
    const OBJECT_KEY_SEPARATOR = '-';
    const IMPORT_BATCH_SIZE = 1000;

    /* Product Master */
    const PRODUCTS_MASTER_FOLDER = 'Master List';
    /* End */

    /* Category Object Master */
    const IFSEU_MASTERDATA_PRODUCT_CATEGORY_FOLDER = self::MASTER_LIST_FOLDER . '/Product Category';
}