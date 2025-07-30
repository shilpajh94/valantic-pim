<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniDssPrMaterialOptions: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case Plastic = 'plastic';
    case Aluminum = 'aluminum';
    case Steel = 'steel';

    public function getLabel(): string
    {
        return match ($this) {
            self::Plastic => 'Plastic',
            self::Aluminum => 'Aluminum',
            self::Steel => 'Steel',
        };
    }
}
