<?php

declare(strict_types=1);

namespace App\Model\AdminStyle;

use App\Enum\UniProductCategoryLevel;
use App\Model\DataObject\UniProductManagement\AbstractUniProductGroupSpecificData;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\AdminStyle;
use Pimcore\Model\Element\ElementInterface;

class UniProductStructureInternalStyle extends AdminStyle
{
    public function __construct(ElementInterface $element)
    {
        parent::__construct($element);

        if (
            !$element instanceof UniProductBase
            && !$element instanceof UniProductCategoryInternal
            && !$element instanceof AbstractUniProductGroupSpecificData
        ) {
            return;
        }

        $this->elementIconClass = null;
        $iconPathTemplate = '/bundles/pimcoreadmin/img/icon/tag_%s.png';
        $levelTemplate = '<span style="color: gray;">[L%s]</span>';

        if ($element instanceof UniProductBase) {
            $parent = $element->getParent();
            $level = $parent instanceof UniProductCategoryInternal ? $parent->getLevel() + 1 : 0;
            $this->elementText = sprintf($levelTemplate . ' %s - %s', $level, $element->getSapMaterialNumber(), $element->getSapDescription());
            $this->elementIcon = sprintf($iconPathTemplate, 'green');

            return;
        }

        if ($element instanceof AbstractUniProductGroupSpecificData) {
            $this->elementText = $element->getClass()->getTitle();
            $this->elementIcon = sprintf($iconPathTemplate, 'blue_add');

            return;
        }

        $this->elementText = sprintf($levelTemplate . ' %s', $element->getLevel(), $element->getName());
        $this->elementIcon = match ($element->getCategoryLevel()) {
            UniProductCategoryLevel::PRODUCT_LINE->value => sprintf($iconPathTemplate, 'yellow'),
            UniProductCategoryLevel::PRODUCT_VARIANT->value => sprintf($iconPathTemplate, 'blue'),
            default => sprintf($iconPathTemplate, 'orange'),
        };
    }
}
