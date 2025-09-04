<?php

declare(strict_types=1);

namespace App\Model\CalculatedValue\UniProductManagement;

use App\Model\DataObject\AbstractUniProductBase;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class UniProductCategoryLink extends UniProductCustomAlert
{
    public function renderLayoutText(string $data, ?Concrete $object, array $params): string
    {
        if (!$object instanceof AbstractUniProductBase) {
            return $this->renderAlert('danger', 'warning', 'Dynamic text label applied to unsupported data class!');
        }

        $category = $object->resolveAncestorCategoryByObjectBrick($data);

        if (!$category instanceof UniProductCategoryInternal) {
            return '';
        }

        // TODO: Localization!
        return $this->renderLink($category->getId(), 'pimcore_icon_right', sprintf('Edit data for %s', $category->getName()));
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
            $text,
        );
    }
}
