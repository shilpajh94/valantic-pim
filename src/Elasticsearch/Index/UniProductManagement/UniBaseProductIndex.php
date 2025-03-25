<?php

declare(strict_types=1);

namespace App\Elasticsearch\Index\UniProductManagement;

use App\Elasticsearch\SiteAwareTenantTrait;
use Valantic\ElasticaBridgeBundle\Index\AbstractIndex;

class UniBaseProductIndex extends AbstractIndex
{
    use SiteAwareTenantTrait;

    final public const ATTRIBUTE_PRODUCT_BRAND_NAME = 'product_brand_name';
    final public const ATTRIBUTE_GHP_FULL_CODE = 'ghp_full_code';
    final public const ATTRIBUTE_SAP_MATERIAL_NUMBER = 'sap_material_number';
    final public const ATTRIBUTE_SAP_DESCRIPTION = 'sap_description';
    final public const ATTRIBUTE_PRODUCT_SUB_CATEGORY = 'product_sub_category';
    final public const ATTRIBUTE_INTERNAL_HIERARCHY = 'internal_hierarchy';
    final public const ATTRIBUTE_EXTERNAL_HIERARCHY = 'external_hierarchy';
    final public const ATTRIBUTE_EXTERNAL_HIERARCHY_FULL = 'external_hierarchy_full';
    final public const ATTRIBUTE_REGIONAL_AVAILABILITY = 'regional_availability';

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

        // TODO: Add more?
        foreach ([
            UniBaseProductIndex::ATTRIBUTE_GHP_FULL_CODE,
            UniBaseProductIndex::ATTRIBUTE_SAP_MATERIAL_NUMBER,
        ] as $field) {
            $result['properties'][$field] = ['type' => 'keyword'];
        }

        return $result;
    }
}
