<?php

namespace App\Model\AdminStyle;

use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Pimcore\Model\Element\AdminStyle;
use Pimcore\Model\Element\ElementInterface;

class UniProductStructureExternalStyle extends AdminStyle
{
    public function __construct(ElementInterface $element)
    {
        parent::__construct($element);

        if (!$element instanceof UniProductCategoryExternal) {
            return;
        }

        $this->elementText = $element->getName();
    }
}
