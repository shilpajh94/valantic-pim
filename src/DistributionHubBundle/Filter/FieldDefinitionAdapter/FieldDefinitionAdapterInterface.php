<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use DistributionHubBundle\Filter\FieldSelectionInformation;
use DistributionHubBundle\Services\FilterService;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;

interface FieldDefinitionAdapterInterface {

    const DHUB_MAPPING_PROPERTY_STANDARD = "standard";
    const DHUB_MAPPING_PROPERTY_NOT_INHERITED = "notInherited";
    const DHUB_OPERATOR_TRUE = true;
    const DHUB_OPERATOR_FALSE = false;
    const DHUB_OPERATOR_MUST = "must";
    const DHUB_OPERATOR_SHOULD = "should";
    const DHUB_OPERATOR_NOT = "must_not";
    const DHUB_OPERATOR_EXISTS = "exists";
    const DHUB_OPERATOR_NOT_EXISTS = "not_exists";
    const DHUB_OPERATOR_LOWERTHAN = "lt";
    const DHUB_OPERATOR_GREATERTHAN = "gt";
    const DHUB_OPERATOR_LOWER_EQUAL_TO = "lte";
    const DHUB_OPERATOR_GREATER_EQUAL_TO = "gte";
    const DHUB_TYPE_IMAGE = "image";
    const DHUB_ASSETS_TABLE = "assets";
    const DHUB_TYPE_OBJECT = "object";
    const DHUB_TYPE_ASSET = "asset";
    const DHUB_TYPE_DOCUMENT = "document";
    const DHUB_TYPE_RELATIONS = ["manyToManyObjectRelation",
        "manyToOneRelation",
        "advancedManyToManyRelation",
        "advancedManyToManyObjectRelation"];

    /**
     * FieldDefinitionAdapterInterface constructor.
     * @param Service $service
     */
    public function __construct(FilterService $service);

    /**
     * @param Data $fieldDefinition
     */
    public function setFieldDefinition(Data $fieldDefinition);

    /**
     * @param bool $considerInheritance
     */
    public function setConsiderInheritance(bool $considerInheritance);

    /**
     * @param $fieldFilter - see concrete implementations for format
     * @param string $path - sub path for nested objects (only needed internally)
     * @param bool $ignoreInheritance - if true inheritance is not considered during query
     * @return BuilderInterface
     */
    public function getQueryPart($fieldFilter, $fieldDefinition, $listing);

    /**
     * @param $fieldFilter - see concrete implementations for format
     * @param bool $ignoreInheritance - if true inheritance is not considered during query
     * @param string $path - sub path for nested objects (only needed internally)
     * @return ExistsQuery
     */
    public function getExistsFilter($fieldFilter, $ignoreInheritance = false, $path = "");

    /**
     * returns selectable fields with their type information for frontend
     *
     * @return FieldSelectionInformation[]
     */
    public function getFieldSelectionInformation();
}
