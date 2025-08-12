<?php

namespace Pimcore\Model\DataObject\SelectOptions;

enum UniPrRatingsFhs: string implements \Pimcore\Model\DataObject\SelectOptionsInterface
{
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumGetValuesTrait;
    use \Pimcore\Model\DataObject\SelectOptions\Traits\EnumTryFromNullableTrait;

    case zero = '0';
    case one = '1';
    case two = '2';
    case three = '3';
    case four = '4';
    case five = '5';

    public function getLabel(): string
    {
        return match ($this) {
            self::zero => '0',
            self::one => '1',
            self::two => '2',
            self::three => '3',
            self::four => '4',
            self::five => '5',
        };
    }
}
