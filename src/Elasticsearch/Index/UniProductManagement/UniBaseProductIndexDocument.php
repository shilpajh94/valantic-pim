<?php

declare(strict_types=1);

namespace App\Elasticsearch\Index\UniProductManagement;

use Pimcore\Model\DataObject\ProductCategory;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\AbstractElement;
use Valantic\ElasticaBridgeBundle\Document\AbstractDocument;
use Valantic\ElasticaBridgeBundle\Document\DataObjectNormalizerTrait;
use Valantic\ElasticaBridgeBundle\Enum\DocumentType;

/**
 * @extends AbstractDocument<UniProductBase>
 */
class UniBaseProductIndexDocument extends AbstractDocument
{
    /** @use DataObjectNormalizerTrait<ProductCategory> */
    use DataObjectNormalizerTrait;

    public function getType(): DocumentType
    {
        return DocumentType::DATA_OBJECT;
    }

    public function getSubType(): ?string
    {
        return UniProductBase::class;
    }

    public function getNormalized(AbstractElement $element): array
    {
        return [
            ...$this->plainAttributes($element, [
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_BRAND_NAME => UniProductBase::FIELD_PRODUCT_BRAND_NAME,
                UniBaseProductIndex::ATTRIBUTE_GHP_FULL_CODE => UniProductBase::FIELD_GHP_FULL_CODE,
                UniBaseProductIndex::ATTRIBUTE_SAP_MATERIAL_NUMBER => UniProductBase::FIELD_SAP_MATERIAL_NUMBER,
            ]),
            ...$this->localizedAttributes($element, [
                UniBaseProductIndex::ATTRIBUTE_SAP_DESCRIPTION => UniProductBase::FIELD_SAP_DESCRIPTION,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_SUB_CATEGORY => UniProductBase::FIELD_PRODUCT_SUB_CATEGORY,
            ]),
            UniBaseProductIndex::ATTRIBUTE_INTERNAL_HIERARCHY => $this->getInternalHierarchy($element->getParent()),
            UniBaseProductIndex::ATTRIBUTE_EXTERNAL_HIERARCHY => [],
            UniBaseProductIndex::ATTRIBUTE_EXTERNAL_HIERARCHY_FULL => [],
            // TODO: Add more fields
            // TODO: Make dynamic for product group specific data?
        ];
    }

    public function shouldIndex(AbstractElement $element): bool
    {
        return $element->isPublished();
    }

    private function getInternalHierarchy(AbstractElement $parent, array $carry = []): array
    {
        if (!$parent instanceof UniProductCategoryInternal) {
            return $carry;
        }

        $carry[] = $parent->getId();
        $next = $parent->getParent();

        return $next instanceof UniProductCategoryInternal ? $this->getInternalHierarchy($next, $carry) : $carry;
    }
}
