<?php

namespace App\Model\CalculatedValue\ProductManagement;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\ClassDefinition\Data\Image;
use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
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

        $objectBricks = $this->resolveObjectBricks($object, $data);

        if ($objectBricks === []) {
            return '';
        }

        // TODO: How to add support for tabs and other layout options?
        $values = array_reduce($objectBricks, fn(?array $carry, AbstractData $objectBrick): array => array_merge($carry ?? [], $this->getValues($objectBrick)));
        $table = array_map(fn(array $row): string => $this->renderRow($row), $values);
        $table = array_reduce($table, fn(?string $carry, string $row): string => $carry . $row);
        $link = $this->renderLink($objectBricks[0]->getObject()->getId(), 'pimcore_icon_right', 'Go to object');

        return sprintf('<table>%s</table><br>%s', $table, $link);
    }

    private function resolveObjectBricks(UniBaseProduct|UniProductCategoryInternal $object, string $objectBrickClass): array
    {
        $parent = $object->getParent();

        if (!$parent instanceof UniProductCategoryInternal) {
            return [];
        }

        $result = [];

        foreach ($parent->getLevelSpecificData()->getItems() as $objectBrick) {
            if ($objectBrick instanceof $objectBrickClass) {
                $result[] = $objectBrick;
            }
        }

        // Note: This returns all Objectbricks from a parent that Match the given abstract class.
        //       If there are instances on multiple levels, only the on the closest parent are returned.

        return $result === [] ? $this->resolveObjectBricks($parent, $objectBrickClass) : $result;
    }

    private function getValues(AbstractData $dataObject): array
    {
        return $this->getValuesImpl($dataObject, $dataObject->getDefinition()?->getFieldDefinitions() ?? []);
    }

    private function getValuesImpl(AbstractData $brandData, array $definitions): array
    {
        $result = []; // TODO: (anonymous) Class?

        foreach ($definitions as $definition) {
            if ($definition instanceof Localizedfields) {
                $result = array_merge($result, $this->getValuesImpl($brandData, $definition->getFieldDefinitions() ?? []));
            } else {
                $name = $definition->getName();
                $accessor = sprintf('get%s', ucfirst($name));
                $result[] = [
                    'key' => $name,
                    'title' => $definition->getTitle(),
                    'value' => $brandData->$accessor(),
                    'type' => $definition::class,
                ];
            }
        }

        return $result;
    }

    private function renderRow(array $row): string
    {
        return sprintf(
            '<tr id="row-%s" class="x-form-item-default x-form-readonly">' .
                '<td class="x-form-item-label x-form-item-label-default x-unselectable" style="width: 250px;">' .
                    '<span class="x-form-item-label-text">%s <span class="pimcore_object_label_icon pimcore_icon_gray_lock"></span>:</span>' .
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
        return match ($row['type']) {
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
            '<div class="x-panel-body pimcore_image_container x-panel-body-default x-noborder-t x-panel-default-outer-border-rbl" style="width: 300px; height: 253px; border-top-width: 1px !important;">' .
                '<div class="x-autocontainer-outerCt" role="presentation" style="width: 100%%; table-layout: fixed; height: 100%%;">' .
                    '<div style="background-image: url(%s); background-position: center center; background-repeat: no-repeat;" role="presentation" class="x-autocontainer-innerCt"></div>' .
                '</div>' .
            '</div>',
            $url
        );
    }

    private function renderLink(int $objectId, string $icon, string $text): string
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
