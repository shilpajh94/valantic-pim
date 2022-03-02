<?php

namespace PimDataPostBundle\Model;

class ShopType
{
    const B2B = "B2B";

    const B2C = "B2C";

    private $shopType;

    private function __construct(string $shopType)
    {
        $this->shopType = $shopType;
    }

    public function __toString()
    {
        return $this->shopType;
    }

    public static function B2B(): self
    {
        return new self(self::B2B);
    }

    public static function B2C(): self
    {
        return new self(self::B2C);
    }

}