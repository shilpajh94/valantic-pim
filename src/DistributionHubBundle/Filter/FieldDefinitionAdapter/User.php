<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

class User extends Select implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "user";
}
