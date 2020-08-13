<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

class AdvancedManyToManyRelation extends ManyToOneRelation implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "advancedManyToManyRelation";

}
