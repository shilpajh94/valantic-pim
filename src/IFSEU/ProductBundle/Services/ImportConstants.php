<?php

namespace IFSEU\ProductBundle\Services;
class ImportConstants
{
    const IFS_EU_FOLDER = '/Contitech_IFS_EMEA';
    const IFS_EU_MASTERDATA_FOLDER = self::IFS_EU_FOLDER . '/Master Data';
    const IFS_EU_CATEGORY_MASTERDATA_FOLDER = self::IFS_EU_MASTERDATA_FOLDER . '/Category';
    const IFS_EU_COUNTRY_MASTERDATA_FOLDER = self::IFS_EU_MASTERDATA_FOLDER . '/Countries';
    const IFS_EU_APPLICATIONS_MASTERDATA_FOLDER = self::IFS_EU_MASTERDATA_FOLDER . '/Applications';
    const IFS_EU_MEDIUM_MASTERDATA_FOLDER = self::IFS_EU_MASTERDATA_FOLDER . '/Flow Medium';
    const IFS_EU_PROPERTIES_MASTERDATA_FOLDER = self::IFS_EU_MASTERDATA_FOLDER . '/Properties';
    const IFS_EU_NORM_MASTERDATA_FOLDER = self::IFS_EU_MASTERDATA_FOLDER . '/Norm';
}