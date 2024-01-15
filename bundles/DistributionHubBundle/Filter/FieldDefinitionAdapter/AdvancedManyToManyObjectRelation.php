<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

class AdvancedManyToManyObjectRelation extends ManyToManyObjectRelation implements FieldDefinitionAdapterInterface
{

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "advancedManyToManyObjectRelation";
}
