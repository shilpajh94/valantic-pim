<?php

namespace App\Model\CalculatedValue\ProductManagement;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\ClassDefinition\Data\Image;
use Pimcore\Model\DataObject\ClassDefinition\Layout\DynamicTextLabelInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick\Data\AbstractData;
use Pimcore\Model\DataObject\UniBaseProduct;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class ProductInternalHierarchyData implements DynamicTextLabelInterface
{
    public function renderLayoutText(string $data, ?Concrete $object, array $params): string
    {
        if (!$object instanceof UniBaseProduct) {
            return 'Unsupported data object... 🤷🏼‍♂️';
        }

        $brandData = $this->resolveObjectBrick($object, $data);
        $values = $brandData instanceof AbstractData ? $this->getBrandDataValues($brandData) : [];

        $table = array_map(fn(array $row): string => $this->renderRow($row), $values);
        $table = array_reduce($table, fn(?string $carry, string $row) => $carry . $row);
        $link = $this->renderLink($brandData->getObject()->getId(), 'pimcore_icon_right', 'Go to object');

        // TODO: How to add support for tabs?

        return sprintf('<table>%s</table><br>%s', $table, $link);
    }

    private function resolveObjectBrick(UniBaseProduct|UniProductCategoryInternal $object, string $objectBrickClass): ?AbstractData
    {
        $parent = $object->getParent();

        if (!$parent instanceof UniProductCategoryInternal) {
            return null;
        }

        // Note: max. items of Objectbricks container must be set to 1.
        $objectBrick = $parent->getLevelSpecificData()->getItems()[0] ?? null;

        return $objectBrick instanceof $objectBrickClass ? $objectBrick : $this->resolveObjectBrick($parent, $objectBrickClass);
    }

    private function getBrandDataValues(AbstractData $brandData): array
    {
        $result = []; // TODO: (anonymous) Class?

        foreach ($brandData->getDefinition()?->getFieldDefinitions() ?? [] as $definition) {
            $name = $definition->getName();
            $accessor = sprintf('get%s', $name);
            $result[] = [
                'key' => $name,
                'title' => $definition->getTitle(),
                'value' => $brandData->$accessor(),
                'type' => get_class($definition),
            ];
        }

        return $result;
    }

    private function renderRow(array $row): string
    {
        return sprintf(
            '<tr id="row-%s" class="x-form-item-default x-form-readonly">' .
                '<td class="x-form-item-label x-form-item-label-default x-unselectable">' .
                    '<span class="x-form-item-label-text">' . '%s <span class="pimcore_object_label_icon pimcore_icon_gray_lock"></span>:</span>' .
                '</td>' .
                '<td>%s</td>' .
            '</tr>',
            $row['key'] ?? '🤷🏼‍♂️',
            $row['title'] ?? '🤷🏼‍♂️',
            $this->renderValue($row),
        );
    }

    private function renderValue(array $row): string
    {
        return match($row['type']) {
            Image::class => $this->renderValueImage($row['value']),
            default => $this->renderValueString($row['value'] ?? ''),
        };
    }

    private function renderValueString(string $value): string
    {
        return sprintf('<div class="x-form-trigger-wrap-default x-form-text-default">%s</div>', $value);
    }

    private function renderValueImage(?Asset $value): string
    {
        if (!$value instanceof Asset) {
            return '<em>No asset selected.</em>';
        }

        $url = sprintf('/admin/asset/get-image-thumbnail?id=%s&amp;width=290&amp;height=240&amp;contain=true', $value->getId());

        return sprintf(
            '<div class="x-panel-body pimcore_image_container x-panel-body-default x-noborder-t x-panel-default-outer-border-rbl" style="width: 300px; height: 253px; left: 0; top: 37px;border-top-width: 1px !important;">'.
                '<div class="x-autocontainer-outerCt" role="presentation" style="width: 100%%; table-layout: fixed; height: 100%%;">'.
                    '<div style="background-image: url(%s); background-position: center center; background-repeat: no-repeat;" role="presentation" class="x-autocontainer-innerCt"></div>'.
                '</div>'.
            '</div>',
            $url
        );
    }

    public function renderLink(int $objectId, string $icon, string $text): string
    {
        return sprintf(
            '<a href="#" data-pimcore-open-id="%s" data-pimcore-open-type="object" class="x-btn x-unselectable x-btn-default-small" style="min-width: 75px;" hidefocus="on" unselectable="on" role="button" aria-hidden="false" aria-disabled="false">' .
                '<span data-ref="btnWrap" role="presentation" unselectable="on" class="x-btn-wrap x-btn-wrap-default-small" style="pointer-events: none">' .
                    '<span data-ref="btnEl" role="presentation" unselectable="on" class="x-btn-button x-btn-button-default-small x-btn-text x-btn-icon x-btn-icon-left x-btn-button-center " style="pointer-events: none">' .
                        '<span data-ref="btnIconEl" role="presentation" unselectable="on" class="x-btn-icon-el x-btn-icon-el-default-small %s" style="pointer-events: none"></span>' .
                        '<span data-ref="btnInnerEl" unselectable="on" class="x-btn-inner x-btn-inner-default-small" style="pointer-events: none">%s</span>' .
                    '</span>' .
                '</span>' .
            '</a>',
            $objectId,
            $icon,
            $text
        );
    }
}
