<?php

declare(strict_types=1);

namespace App\Model\AdminStyle;

use App\Enum\UniProductHierarchyLevel;
use App\Model\DataObject\UniProductManagement\AbstractUniProductGroupSpecificData;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\AdminStyle;
use Pimcore\Model\Element\ElementInterface;

class UniProductStructureInternalStyle extends AdminStyle
{
    private const ICON_PATH_TEMPLATE = '/bundles/pimcoreadmin/img/icon/tag_%s.png';
    private const LEVEL_TEMPLATE = '<span style="color: gray;">[L%s]</span>';

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

        if ($element instanceof UniProductBase) {
            $this->elementText = $this->getText($element);
            $this->elementIcon = $this->getIcon($element);

            return;
        }

        $this->elementText = sprintf(self::LEVEL_TEMPLATE . ' %s', $element->getLevel(), $element->getHierarchyLevelDescription());
        $this->elementIcon = $this->getIcon($element);
    }

    private function getText(UniProductCategoryInternal|UniProductBase $element): string
    {
        $parent = $element->getParent();
        $level = $parent instanceof UniProductCategoryInternal || $parent instanceof UniProductBase ? $parent->getLevel() + 1 : 0;

        if ($element->getHierarchyLevel() !== UniProductHierarchyLevel::FINISHED_GOOD->value) {
            return sprintf(self::LEVEL_TEMPLATE, $level) . ' ' . $element->getHierarchyLevelDescription();
        }

        $text = [$element->getSapMaterialNumber(), $element->getSapDescription()];
        $text = array_filter($text);
        $text = implode(' - ', $text);
        $text = $text === '' ? $element->getKey() : $text;

        return sprintf(self::LEVEL_TEMPLATE, $level) . ' ' . $text;
    }

    private function getIcon(UniProductCategoryInternal|UniProductBase $element): string
    {
        return match ($element->getHierarchyLevel()) {
            UniProductHierarchyLevel::PRODUCT_LINE->value => sprintf(self::ICON_PATH_TEMPLATE, 'yellow'),
            UniProductHierarchyLevel::PRODUCT_VARIANT->value => sprintf(self::ICON_PATH_TEMPLATE, 'blue'),
            UniProductHierarchyLevel::FINISHED_GOOD->value => sprintf(self::ICON_PATH_TEMPLATE, 'green'),
            default => sprintf(self::ICON_PATH_TEMPLATE, 'orange'),
        };
    }
}
