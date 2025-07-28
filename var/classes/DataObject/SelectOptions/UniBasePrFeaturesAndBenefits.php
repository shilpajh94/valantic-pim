<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniBasePrFeaturesAndBenefits: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case HighlyFlexible = 'highlyFlexible';
    case ExtremeResistance = 'extremeResistance';
    case DustProof = 'dustProof';

    public function getLabel(): string
    {
        return match ($this) {
            self::HighlyFlexible => 'Highly Flexible',
            self::ExtremeResistance => 'Extreme Resistance',
            self::DustProof => 'Dust Proof',
        };
    }
}
