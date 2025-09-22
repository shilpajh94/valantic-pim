<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniPrNominalLengthPts: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case LD = 'Ld';
    case LI = 'Li';
    case LE = 'Le';
    case LPLW = 'LP / LW';
    case LR = 'Lr';

    public function getLabel(): string
    {
        return match ($this) {
            self::LD => 'Ld',
            self::LI => 'Li',
            self::LE => 'Le',
            self::LPLW => 'LP / LW',
            self::LR => 'Lr',
        };
    }
}
