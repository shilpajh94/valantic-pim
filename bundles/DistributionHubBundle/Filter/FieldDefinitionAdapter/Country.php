<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

class Country extends Select implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "country";
}
