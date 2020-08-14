<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

class Date extends Datetime implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "date";

}
