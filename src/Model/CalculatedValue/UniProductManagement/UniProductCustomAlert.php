<?php

declare(strict_types=1);

namespace App\Model\CalculatedValue\UniProductManagement;

use Pimcore\Model\DataObject\ClassDefinition\Layout\DynamicTextLabelInterface;
use Pimcore\Model\DataObject\Concrete;

class UniProductCustomAlert implements DynamicTextLabelInterface
{
    public function renderLayoutText(string $data, ?Concrete $object, array $params): string
    {
        [$type, $icon, $message] = explode(';', $data);

        return $this->renderAlert($type, $icon, $message);
    }

    protected function renderAlert(string $type, string $icon, string $message): string
    {
        $icon = sprintf(
            '<span class="x-tab-icon-el x-tab-icon-el-default" style="display: inline-block;width: 24px;height: 24px;margin: -6px 6px -3px 0;background-image:url(/bundles/pimcoreadmin/img/flat-color-icons/%s.svg);background-size: cover;"></span>',
            $icon,
        );

        return sprintf(
            '<div class="alert alert-%s" style="margin: 0">%s %s</div>',
            $type,
            $icon,
            $message,
        );
    }
}
