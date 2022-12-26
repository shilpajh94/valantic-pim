<?php

namespace PimDataPostBundle\Model\Types;

class PimFieldType
{
    private const INPUT = "input";

    private const NUMERIC = "numeric";

    private const TEXTAREA = "textarea";

    private const WYSIWYG = "wysiwyg";

    private const SELECT = "select";

    private const MULTISELECT = "multiselect";

    private const CHECKBOX = "checkbox";

    private const MANY_TO_MANY_RELATION = "manyToManyRelation";

    private const MANY_TO_MANY_OBJECT_RELATION = "manyToManyObjectRelation";

    private const ADVANCED_MANY_TO_MANY_RELATION = "advancedManyToManyRelation";
    
    private const ADVANCED_MANY_TO_MANY_OBJECT_RELATION = "advancedManyToManyObjectRelation";

    private const BOOLEAN_SELECT = "booleanSelect";

    private const IMAGE = "image";

    private const VIDEO = "video";
    
    private const SALES_FORCE_ID ="salesForceId";

    private const B2C_SALES_FORCE_ID ="b2cSalesForceId";

    private $pimFieldType;

    private function __construct(string $pimFieldType)
    {
        $this->pimFieldType = $pimFieldType;
    }

    public function __toString()
    {
        return $this->pimFieldType;
    }

    public static function INPUT(): self
    {
        return new self(self::INPUT);
    }

    public static function NUMERIC(): self
    {
        return new self(self::NUMERIC);
    }

    public static function TEXTAREA(): self
    {
        return new self(self::TEXTAREA);
    }

    public static function WYSIWYG(): self
    {
        return new self(self::WYSIWYG);
    }

    public static function SELECT(): self
    {
        return new self(self::SELECT);
    }

    public static function MULTISELECT(): self
    {
        return new self(self::MULTISELECT);
    }

    public static function CHECKBOX(): self
    {
        return new self(self::CHECKBOX);
    }

    public static function MANY_TO_MANY_RELATION(): self
    {
        return new self(self::MANY_TO_MANY_RELATION);
    }

    public static function MANY_TO_MANY_OBJECT_RELATION(): self
    {
        return new self(self::MANY_TO_MANY_OBJECT_RELATION);
    }

    public static function ADVANCED_MANY_TO_MANY_RELATION(): self
    {
        return new self(self::ADVANCED_MANY_TO_MANY_RELATION);
    }
    
    public static function ADVANCED_MANY_TO_MANY_OBJECT_RELATION(): self
    {
        return new self(self::ADVANCED_MANY_TO_MANY_OBJECT_RELATION);
    }

    public static function BOOLEAN_SELECT(): self
    {
        return new self(self::BOOLEAN_SELECT);
    }

    public static function IMAGE(): self
    {
        return new self(self::IMAGE);
    }

    public static function VIDEO(): self
    {
        return new self(self::VIDEO);
    }

    
    public static function SALES_FORCE_ID(): self
    {
        return new self(self::SALES_FORCE_ID);
    }

    public static function B2C_SALES_FORCE_ID(): self
    {
        return new self(self::B2C_SALES_FORCE_ID);
    }
}
