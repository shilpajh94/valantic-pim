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
            !$element instanceof UniBaseProduct &&
            !$element instanceof UniProductCategoryInternal &&
            !$element instanceof AbstractProductGroupSpecificData
        ) {
            return;
        }

        $this->elementIconClass = null;
        $template = '/bundles/pimcoreadmin/img/icon/tag_%s.png';

        if ($element instanceof UniBaseProduct) {
            $this->elementText = sprintf('%s - %s', $element->getSapMaterialNumber(), $element->getSapDescription());
            $this->elementIcon = sprintf($template, 'green');
            return;
        }

        if ($element instanceof AbstractProductGroupSpecificData) {
            $this->elementText = $element->getClass()->getTitle();
            $this->elementIcon = sprintf($template, 'blue_add');
            return;
        }

        $this->elementText = $element->getName();
        $this->elementIcon = match ($element->getLevel()) {
            ProductCategoryLevel::PRODUCT_LINE->value => sprintf($template, 'yellow'),
            ProductCategoryLevel::PRODUCT_VARIANT->value => sprintf($template, 'blue'),
            default => sprintf($template, 'orange'),
        };
    }
}
