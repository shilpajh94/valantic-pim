<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

class Slider extends Numeric implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "slider";

}