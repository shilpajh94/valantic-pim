<?php

declare(strict_types=1);

namespace App\Elasticsearch\Index\ProductManagement;

use Pimcore\Model\DataObject\ProductCategory;
use Pimcore\Model\DataObject\UniBaseProduct;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\AbstractElement;
use Valantic\ElasticaBridgeBundle\Document\AbstractDocument;
use Valantic\ElasticaBridgeBundle\Document\DataObjectNormalizerTrait;
use Valantic\ElasticaBridgeBundle\Enum\DocumentType;

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
        return UniBaseProduct::class;
    }

    public function getNormalized(AbstractElement $element): array
    {
        return [
            ...$this->plainAttributes($element, [
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_BRAND_NAME => UniBaseProduct::FIELD_PRODUCT_BRAND_NAME,
                UniBaseProductIndex::ATTRIBUTE_GHP_FULL_CODE => UniBaseProduct::FIELD_GHP_FULL_CODE,
                UniBaseProductIndex::ATTRIBUTE_SAP_MATERIAL_NUMBER => UniBaseProduct::FIELD_SAP_MATERIAL_NUMBER,
            ]),
            ...$this->localizedAttributes($element, [
                UniBaseProductIndex::ATTRIBUTE_SAP_DESCRIPTION => UniBaseProduct::FIELD_SAP_DESCRIPTION,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_SUB_CATEGORY => UniBaseProduct::FIELD_PRODUCT_SUB_CATEGORY,
            ]),
            UniBaseProductIndex::ATTRIBUTE_INTERNAL_HIERARCHY => $this->getInternalHierarchy($element->getParent()),
            UniBaseProductIndex::ATTRIBUTE_EXTERNAL_HIERARCHY => $this->getExternalHierarchy($element),
            UniBaseProductIndex::ATTRIBUTE_EXTERNAL_HIERARCHY_FULL => $this->getExternalHierarchyFull($element),
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

    private function getExternalHierarchy(AbstractElement $element): array
    {
        if (!$element instanceof UniBaseProduct) {
            return [];
        }

        return [];
        //return array_map(fn(UniProductCategoryExternal $category): int => $category->getId(), $element->getExternalCategories());
    }

    private function getExternalHierarchyFull(AbstractElement $element, array $carry = []): array
    {
        if (!$element instanceof UniBaseProduct) {
            return [];
        }

        return [];
        //return array_map(fn(UniProductCategoryExternal $category): array => $this->getExternalHierarchyPart($category), $element->getExternalCategories());
    }

    private function getExternalHierarchyPart(UniProductCategoryExternal $category, array $carry = []): array
    {
        $carry[] = $category->getId();
        $next = $category->getParent();

        return $next instanceof UniProductCategoryExternal ? $this->getExternalHierarchyPart($next, $carry) : $carry;
    }
}
