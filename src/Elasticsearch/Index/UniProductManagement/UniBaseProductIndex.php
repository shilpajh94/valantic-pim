<?php

declare(strict_types=1);

namespace App\Elasticsearch\Index\UniProductManagement;

use App\Elasticsearch\SiteAwareTenantTrait;
use Valantic\ElasticaBridgeBundle\Index\AbstractIndex;

/**
 * Elasticsearch index definition for UniProductBase.
 *
 * Please refer to https://github.com/valantic/pimcore-elastica-bridge
 * for a detailed documentation of the Elastica Bridge bundle.
 */
class UniBaseProductIndex extends AbstractIndex
{
    use SiteAwareTenantTrait;

    final public const ATTRIBUTE_GHP_FULL_CODE = 'ghp_full_code';
    final public const ATTRIBUTE_SAP_MATERIAL_NUMBER = 'sap_material_number';
    final public const ATTRIBUTE_SAP_DESCRIPTION = 'sap_description';
    final public const ATTRIBUTE_INTERNAL_HIERARCHY = 'internal_hierarchy';
    final public const ATTRIBUTE_EXTERNAL_HIERARCHY = 'external_hierarchy';
    final public const ATTRIBUTE_EXTERNAL_HIERARCHY_FULL = 'external_hierarchy_full';
    final public const ATTRIBUTE_REGIONAL_AVAILABILITY = 'regional_availability';
    final public const ATTRIBUTE_PART_NUMBER = 'part_number';
    final public const ATTRIBUTE_OLD_MATERIAL_NUMBER = 'old_material_number';
    final public const ATTRIBUTE_TARIFF_CODES = 'tariff_codes';
    final public const ATTRIBUTE_EAN_CODE = 'ean_code';
    final public const ATTRIBUTE_WEIGHT_METRIC = 'weight_metric';
    final public const ATTRIBUTE_WEIGHT_IMPERIAL = 'weight_imperial';
    final public const ATTRIBUTE_COUNTRY_OF_ORIGIN = 'country_of_origin';
    final public const ATTRIBUTE_SAP_DESCRIPTION_LANGUAGE = 'sap_description_language';
    final public const ATTRIBUTE_PLANT_PRODUCED = 'plant_produced';
    final public const ATTRIBUTE_PRODUCT_DESCRIPTION_SHORT = 'product_description_short';
    final public const ATTRIBUTE_PRODUCT_DESCRIPTION_LONG = 'product_description_long';
    final public const ATTRIBUTE_PRODUCT_MARKING1 = 'product_marking1';
    final public const ATTRIBUTE_PRODUCT_MARKING2 = 'product_marking2';
    final public const ATTRIBUTE_PRODUCT_DESCRIPTION_EXTENDED = 'product_description_extended';
    final public const ATTRIBUTE_COMPETITOR_CROSS_REFERENCE = 'competitor_cross_reference';
    final public const ATTRIBUTE_CUSTOMER_REFERENCE = 'customer_reference';
    final public const ATTRIBUTE_OEM_CROSS_REFERENCE = 'oem_cross_reference';
    final public const ATTRIBUTE_PROP65 = 'prop65';
    final public const ATTRIBUTE_RO_HS = 'ro_hs';
    final public const ATTRIBUTE_GPRS = 'gprs';
    final public const ATTRIBUTE_B2B_FLAG = 'b2b_flag';
    final public const ATTRIBUTE_B2C_FLAG = 'b2c_flag';
    final public const ATTRIBUTE_PRINTED_CATALOGUE_FLAG = 'printed_catalogue_flag';
    final public const ATTRIBUTE_VIRTUAL_CATALOGUE_FLAG = 'virtual_catalogue_flag';
    final public const ATTRIBUTE_CUSTOMER_PORTAL_FLAG = 'customer_portal_flag';

    public function getName(): string
    {
        return 'uni_product';
    }

    public function getAllowedDocuments(): array
    {
        return [UniBaseProductIndexDocument::class];
    }

    public function getMapping(): array
    {
        $result = parent::getMapping();

        foreach ([
            UniBaseProductIndex::ATTRIBUTE_GHP_FULL_CODE,
            UniBaseProductIndex::ATTRIBUTE_SAP_MATERIAL_NUMBER,
        ] as $field) {
            $result['properties'][$field] = ['type' => 'keyword'];
        }

        return $result;
    }
}
