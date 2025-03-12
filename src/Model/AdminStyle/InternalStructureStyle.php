<?php

namespace App\Model\AdminStyle;

use App\Enum\ProductCategoryLevel;
use Pimcore\Model\DataObject\UniBaseProduct;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\AdminStyle;
use Pimcore\Model\Element\ElementInterface;

class InternalStructureStyle extends AdminStyle
{
    public function __construct(ElementInterface $element)
    {
        parent::__construct($element);

        if (!in_array(get_class($element), [UniBaseProduct::class, UniProductCategoryInternal::class])) {
            return;
        }

        $this->elementIconClass = null;
        $template = '/bundles/pimcoreadmin/img/icon/tag_%s.png';

        if ($element instanceof UniBaseProduct) {
            $this->elementIcon = sprintf($template, 'green');
            $this->elementText = sprintf('%s - %s', $element->getSapMaterialNumber(), $element->getSapDescription());
            return;
        }

        $this->elementIcon = match ((int) $element->getLevel()) {
            ProductCategoryLevel::PRODUCT_LINE->value => sprintf($template, 'yellow'),
            ProductCategoryLevel::PRODUCT_VARIANT->value => sprintf($template, 'blue'),
            default => sprintf($template, 'orange'),
        };
    }
}
