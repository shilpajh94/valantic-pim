<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniDssPrAirInletLocations: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case OffsetLocation = 'offsetLocation';
    case CenterAirLocation = 'centerAirLocation';

    public function getLabel(): string
    {
        return match ($this) {
            self::OffsetLocation => 'Offset location',
            self::CenterAirLocation => 'Center Air Location',
        };
    }
}
