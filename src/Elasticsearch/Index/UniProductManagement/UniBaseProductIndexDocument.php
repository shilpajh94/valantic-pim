<?php

declare(strict_types=1);

namespace App\Elasticsearch\Index\UniProductManagement;

use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
use Pimcore\Model\DataObject\Objectbrick\Data\AbstractData;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\AbstractElement;
use Valantic\ElasticaBridgeBundle\Document\AbstractDocument;
use Valantic\ElasticaBridgeBundle\Document\DataObjectNormalizerTrait;
use Valantic\ElasticaBridgeBundle\Document\DocumentInterface;
use Valantic\ElasticaBridgeBundle\Enum\DocumentType;

/**
 * Elasticsearch index document definition for UniProductBase.
 *
 * Please refer to https://github.com/valantic/pimcore-elastica-bridge
 * for a detailed documentation of the Elastica Bridge bundle.
 *
 * @extends AbstractDocument<UniProductBase>
 */
class UniBaseProductIndexDocument extends AbstractDocument
{
    /** @use DataObjectNormalizerTrait<UniProductBase> */
    use DataObjectNormalizerTrait;
    private const FINISHED_GOOD_PRODUCT_GROUP_SPECIFIC_PREFIX = 'fg_pgs_';

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
            ...$this->getNormalizedFinishedGood($element),
            ...$this->getNormalizedHierarchy($element),
        ];
    }

    public function shouldIndex(AbstractElement $element): bool
    {
        return $element->isPublished();
    }

    /**
     * @return array<string,mixed>
     *
     * @throws \Exception
     */
    private function getNormalizedFinishedGood(UniProductBase $element): array
    {
        $result = [[
            ...$this->plainAttributes($element, [
                UniBaseProductIndex::ATTRIBUTE_GHP_FULL_CODE => UniProductBase::FIELD_GHP_FULL_CODE,
                UniBaseProductIndex::ATTRIBUTE_SAP_MATERIAL_NUMBER => UniProductBase::FIELD_SAP_MATERIAL_NUMBER,
                UniBaseProductIndex::ATTRIBUTE_PART_NUMBER => UniProductBase::FIELD_PART_NUMBER,
                UniBaseProductIndex::ATTRIBUTE_OLD_MATERIAL_NUMBER => UniProductBase::FIELD_OLD_MATERIAL_NUMBER,
                UniBaseProductIndex::ATTRIBUTE_TARIFF_CODES => UniProductBase::FIELD_TARIFF_CODES,
                UniBaseProductIndex::ATTRIBUTE_EAN_CODE => UniProductBase::FIELD_EAN_CODE,
                UniBaseProductIndex::ATTRIBUTE_WEIGHT_METRIC => UniProductBase::FIELD_WEIGHT_METRIC,
                UniBaseProductIndex::ATTRIBUTE_WEIGHT_IMPERIAL => UniProductBase::FIELD_WEIGHT_IMPERIAL,
                UniBaseProductIndex::ATTRIBUTE_COUNTRY_OF_ORIGIN => UniProductBase::FIELD_COUNTRY_OF_ORIGIN,
                UniBaseProductIndex::ATTRIBUTE_COMPETITOR_CROSS_REFERENCE => UniProductBase::FIELD_COMPETITOR_CROSS_REFERENCE,
                UniBaseProductIndex::ATTRIBUTE_CUSTOMER_REFERENCE => UniProductBase::FIELD_CUSTOMER_REFERENCE,
                UniBaseProductIndex::ATTRIBUTE_OEM_CROSS_REFERENCE => UniProductBase::FIELD_OEM_CROSS_REFERENCE,
                UniBaseProductIndex::ATTRIBUTE_B2B_FLAG => UniProductBase::FIELD_B2B_FLAG,
                UniBaseProductIndex::ATTRIBUTE_B2C_FLAG => UniProductBase::FIELD_B2C_FLAG,
                UniBaseProductIndex::ATTRIBUTE_PRINTED_CATALOGUE_FLAG => UniProductBase::FIELD_PRINTED_CATALOGUE_FLAG,
                UniBaseProductIndex::ATTRIBUTE_VIRTUAL_CATALOGUE_FLAG => UniProductBase::FIELD_VIRTUAL_CATALOGUE_FLAG,
                UniBaseProductIndex::ATTRIBUTE_CUSTOMER_PORTAL_FLAG => UniProductBase::FIELD_CUSTOMER_PORTAL_FLAG,
                UniBaseProductIndex::ATTRIBUTE_CORPORATE_BRAND => UniProductBase::FIELD_CORPORATE_BRAND,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_GROUP_BRAND => UniProductBase::FIELD_PRODUCT_GROUP_BRAND,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_NAME => UniProductBase::FIELD_PRODUCT_NAME,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_NAME_VARIANT => UniProductBase::FIELD_PRODUCT_NAME_VARIANT,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_NAME_SUB_VARIANT => UniProductBase::FIELD_PRODUCT_NAME_SUB_VARIANT,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_DESIGN => UniProductBase::FIELD_PRODUCT_DESIGN,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_DESIGN_CODE => UniProductBase::FIELD_PRODUCT_DESIGN_CODE,
                UniBaseProductIndex::ATTRIBUTE_INDUSTRIAL_STANDARDS => UniProductBase::FIELD_INDUSTRIAL_STANDARDS,
                UniBaseProductIndex::ATTRIBUTE_AGENCY_COMPLIANCE => UniProductBase::FIELD_AGENCY_COMPLIANCE,
                UniBaseProductIndex::ATTRIBUTE_B2B_SUB_CATEGORY => UniProductBase::FIELD_B2B_SUB_CATEGORY,
                UniBaseProductIndex::ATTRIBUTE_REACH => UniProductBase::FIELD_REACH,
                UniBaseProductIndex::ATTRIBUTE_HAZARDOUS_SUBSTANCE_CLASSIFICATION => UniProductBase::FIELD_HAZARDOUS_SUBSTANCE_CLASSIFICATION,
                UniBaseProductIndex::ATTRIBUTE_FEATURES_AND_BENEFITS => UniProductBase::FIELD_FEATURES_AND_BENEFITS,
                UniBaseProductIndex::ATTRIBUTE_FULL_PRODUCT_NAME => UniProductBase::FIELD_FULL_PRODUCT_NAME,
            ]),
            ...$this->localizedAttributes($element, [
                UniBaseProductIndex::ATTRIBUTE_SAP_DESCRIPTION => UniProductBase::FIELD_SAP_DESCRIPTION,
                UniBaseProductIndex::ATTRIBUTE_SAP_DESCRIPTION_LANGUAGE => UniProductBase::FIELD_SAP_DESCRIPTION_LANGUAGE,
                UniBaseProductIndex::ATTRIBUTE_PLANT_PRODUCED => UniProductBase::FIELD_PLANT_PRODUCED,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_DESCRIPTION_SHORT => UniProductBase::FIELD_PRODUCT_DESCRIPTION_SHORT,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_DESCRIPTION_LONG => UniProductBase::FIELD_PRODUCT_DESCRIPTION_LONG,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_MARKING1 => UniProductBase::FIELD_PRODUCT_MARKING1,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_MARKING2 => UniProductBase::FIELD_PRODUCT_MARKING2,
                UniBaseProductIndex::ATTRIBUTE_PRODUCT_DESCRIPTION_EXTENDED => UniProductBase::FIELD_PRODUCT_DESCRIPTION_EXTENDED,
                UniBaseProductIndex::ATTRIBUTE_PROP65 => UniProductBase::FIELD_PROP65,
                UniBaseProductIndex::ATTRIBUTE_RO_HS => UniProductBase::FIELD_RO_HS,
                UniBaseProductIndex::ATTRIBUTE_GPRS => UniProductBase::FIELD_GPRS,
                UniBaseProductIndex::ATTRIBUTE_LEGAL_TEXT => UniProductBase::FIELD_LEGAL_TEXT,
                UniBaseProductIndex::ATTRIBUTE_DISCLAIMER => UniProductBase::FIELD_DISCLAIMER,
                UniBaseProductIndex::ATTRIBUTE_MARKETING_DESCRIPTION_SHORT => UniProductBase::FIELD_MARKETING_DESCRIPTION_SHORT,
                UniBaseProductIndex::ATTRIBUTE_MARKETING_DESCRIPTION_LONG => UniProductBase::FIELD_MARKETING_DESCRIPTION_LONG,
            ]),
            ...$this->relationAttributes($element, [
                UniBaseProductIndex::ATTRIBUTE_REGIONAL_AVAILABILITY => UniProductBase::FIELD_REGIONAL_AVAILABILITY,
            ]),
        ]];

        foreach ($element->getFinishedGoodProductGroupSpecific()?->getItems() ?? [] as $objectBrick) {
            $result[] = $this->getNormalizedObjectbrick($objectBrick, self::FINISHED_GOOD_PRODUCT_GROUP_SPECIFIC_PREFIX);
        }

        return array_merge_recursive(...$result);
    }

    /** @return array<string, mixed> */
    private function getNormalizedHierarchy(UniProductBase $element): array
    {
        return [
            UniBaseProductIndex::ATTRIBUTE_INTERNAL_HIERARCHY => $this->getInternalHierarchy($element->getParent()),
            UniBaseProductIndex::ATTRIBUTE_EXTERNAL_HIERARCHY => [],
            UniBaseProductIndex::ATTRIBUTE_EXTERNAL_HIERARCHY_FULL => [],
        ];
    }

    /**
     * @param array<int> $carry
     *
     * @return array<int>
     */
    private function getInternalHierarchy(?AbstractElement $parent, array $carry = []): array
    {
        if (!$parent instanceof UniProductCategoryInternal) {
            return $carry;
        }

        $carry[] = $parent->getId();
        $next = $parent->getParent();

        return $next instanceof UniProductCategoryInternal ? $this->getInternalHierarchy($next, $carry) : $carry;
    }

    /** @return array<string, mixed> */
    private function getNormalizedObjectbrick(AbstractData $objectBrick, string $prefix): array
    {
        $result = [];

        foreach ($objectBrick->getDefinition()->getFieldDefinitions() as $definition) {
            if (!$definition instanceof Localizedfields) {
                $name = $definition->getName();
                $result[$prefix . $this->getKey($name)] = $objectBrick->get($name);

                continue;
            }

            // TODO: Currently does not support using fallback values. Might become a requirement.
            foreach ($this->getLocales() as $locale) {
                foreach ($definition->getFieldDefinitions() as $fieldDefinition) {
                    $name = $fieldDefinition->getName();
                    $result[DocumentInterface::ATTRIBUTE_LOCALIZED][$locale][$prefix . $this->getKey($name)] = $objectBrick->get($name, $locale);
                }
            }
        }

        return $result;
    }

    /** Transforms any string into a string suited for use as key. */
    private function getKey(string $name): string
    {
        // Inspired by https://stackoverflow.com/a/19533226
        // TODO: Is it appropriate to just define the fitting constants once they are being used in code?
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
    }
}
