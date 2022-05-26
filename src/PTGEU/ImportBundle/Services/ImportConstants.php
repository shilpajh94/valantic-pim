<?php

namespace PTGEU\ImportBundle\Services;

class ImportConstants
{
    const PTGEU_FOLDER = 'PTG_EU';
    const MASTER_LIST_FOLDER = self::PTGEU_FOLDER . '/Master List';
    const MASTER_LIST_PLANTS_FOLDER = self::MASTER_LIST_FOLDER .'/Plants';
    const MASTER_LIST_COUNTRY_FOLDER = self::MASTER_LIST_FOLDER .'/Countries';
    const MASTER_LIST_SALES_ORGANIZATIONS_FOLDER = self::MASTER_LIST_FOLDER .'/Sales Organizations';
    const MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER = self::MASTER_LIST_FOLDER .'/Distribution Channel';
    const PTGEU_MATERIAL_MASTER_FOLDER = self::PTGEU_FOLDER . '/MaterialMaster';
    const PTGEU_MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER = self::PTGEU_MATERIAL_MASTER_FOLDER .'/PlantMaterialMaster';
    const PTGEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER = self::PTGEU_MATERIAL_MASTER_FOLDER . '/SalesMaterialMaster';
    const IMPORT_TABLE_ID_SEPARATOR = '$';
    const OBJECT_KEY_SEPARATOR = '-';
    const IMPORT_BATCH_SIZE = 1000;
    
    /* Category Object Master */
    /*const MASTER_LIST_SIOP_MASTER_LIST_FOLDER = 'Master List/SIOP Master List';*/
    // const MASTER_LIST_SIOP_MASTER_LIST_SIOP_ENGINEERED_PRODUCTS_OBJECT = 'Master List/SIOP Master List/SIOP Engineered Products';
    /*const SIOP_ENGINEERED_PRODUCTS_NAME = 'SIOP Engineered Products';*/

    /* Product Master */
    const PRODUCTS_MASTER_FOLDER = 'Products Master';
    /* End */

    /* Category Object Master */
    const PTGEU_MASTERDATA_PRODUCT_HIERARCHY_FOLDER = self::MASTER_LIST_FOLDER . '/Product Hierarchy';
}