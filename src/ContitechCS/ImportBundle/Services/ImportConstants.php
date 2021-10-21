<?php

namespace ContitechCS\ImportBundle\Services;

class ImportConstants
{
    const CONTITECH_CS_FOLDER = 'Contitech_ConveyorSolution';
    const CONTITECH_CS_MASTERDATA_FOLDER = self::CONTITECH_CS_FOLDER . '/Master Data';
    const CONTITECH_CS_MASTERDATA_CSAPPLICATIONS_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Applications';
    const CONTITECH_CS_MASTERDATA_CSINDUSTRIES_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Industries';
    const CONTITECH_CS_MASTERDATA_CSFEATURESANDBENEFITS_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Features and Benefits';
    const CONTITECH_CS_MASTERDATA_SEGMENT_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Segment';
    const CONTITECH_CS_MASTERDATA_REGION_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Region';
    const CONTITECH_CS_MASTERDATA_INDUSTRIES_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Industries';
    const CONTITECH_CS_MASTERDATA_APPLICATION_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Applications';
    const CONTITECH_CS_MASTERDATA_PERFORMANCE_CATEGORIES_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Performance Categories';
    // const CONTITECH_CS_MASTERDATA_CSFeaturesAndBenefits_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Features and Benefits';
    const CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER = self::CONTITECH_CS_MASTERDATA_FOLDER . '/Product Hierarchy';
    const CONTITECH_CS_PRODUCT_FOLDER = self::CONTITECH_CS_FOLDER . '/Products';

    // Assets

    const CONTITECH_CS_ASSET_FOLDER = self::CONTITECH_CS_FOLDER . '/Product Assets';

    function getDynamicConstant($className)
    {
        $constant = "self::CONTITECH_CS_MASTERDATA_" . strtoupper($className) . "_FOLDER";
        if (defined($constant)) {
            return constant($constant);
        } else {
            return false;
        }
    }
}
