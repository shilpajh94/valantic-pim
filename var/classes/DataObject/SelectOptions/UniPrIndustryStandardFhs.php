<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniPrIndustryStandardFhs: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case EN_853 = 'EN 853';
    case ISO9001 = 'ISO9001';
    case DIN_2215 = 'DIN 2215';

    public function getLabel(): string
    {
        return match ($this) {
            self::EN_853 => 'EN 853',
            self::ISO9001 => 'ISO9001',
            self::DIN_2215 => 'DIN 2215',
        };
    }
}
