<?php

namespace App\Model\AdminStyle;

use App\Enum\ProductCategoryLevel;
use App\Model\DataObject\AbstractProductGroupSpecificData;
use Pimcore\Model\DataObject\UniBaseProduct;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\AdminStyle;
use Pimcore\Model\Element\ElementInterface;

class InternalStructureStyle extends AdminStyle
{
    public function __construct(ElementInterface $element)
    {
        parent::__construct($element);

        if (
            !$element instanceof UniBaseProduct
            && !$element instanceof UniProductCategoryInternal
            && !$element instanceof AbstractProductGroupSpecificData
        ) {
            return;
        }

        $this->elementIconClass = null;
        $iconPathTemplate = '/bundles/pimcoreadmin/img/icon/tag_%s.png';
        $levelTemplate = '<span style="color: gray;">[L%s]</span>';

        if ($element instanceof UniBaseProduct) {
            $parent = $element->getParent();
            $level = $parent instanceof UniProductCategoryInternal ? $parent->getLevel() + 1 : 0;
            $this->elementText = sprintf($levelTemplate . ' %s - %s', $level, $element->getSapMaterialNumber(), $element->getSapDescription());
            $this->elementIcon = sprintf($iconPathTemplate, 'green');

            return;
        }

        if ($element instanceof AbstractProductGroupSpecificData) {
            $this->elementText = $element->getClass()->getTitle();
            $this->elementIcon = sprintf($iconPathTemplate, 'blue_add');

            return;
        }

        $this->elementText = sprintf($levelTemplate . ' %s', $element->getLevel(), $element->getName());
        $this->elementIcon = match ($element->getLevel()) {
            ProductCategoryLevel::PRODUCT_LINE->value => sprintf($iconPathTemplate, 'yellow'),
            ProductCategoryLevel::PRODUCT_VARIANT->value => sprintf($iconPathTemplate, 'blue'),
            default => sprintf($iconPathTemplate, 'orange'),
        };
    }
}
