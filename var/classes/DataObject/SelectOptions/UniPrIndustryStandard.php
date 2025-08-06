<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniPrIndustryStandard: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case EN_853 = 'EN 853';

    public function getLabel(): string
    {
        return match ($this) {
            self::EN_853 => 'EN 853',
        };
    }
}
