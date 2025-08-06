<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniFhsPrResistance: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case High = 'high';
    case Low = 'low';
    case None = 'none';

    public function getLabel(): string
    {
        return match ($this) {
            self::High => 'High',
            self::Low => 'Low',
            self::None => 'None',
        };
    }
}
