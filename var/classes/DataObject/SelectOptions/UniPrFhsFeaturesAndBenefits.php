<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniPrFhsFeaturesAndBenefits: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case HIGHLY_FLEXIBLE = 'highlyFlexible';
    case EXTREME_RESISTANCE = 'extremeResistance';
    case DUST_PROOF = 'dustProof';

    public function getLabel(): string
    {
        return match ($this) {
            self::HIGHLY_FLEXIBLE => 'Highly Flexible',
            self::EXTREME_RESISTANCE => 'Extreme Resistance',
            self::DUST_PROOF => 'Dust Proof',
        };
    }
}
