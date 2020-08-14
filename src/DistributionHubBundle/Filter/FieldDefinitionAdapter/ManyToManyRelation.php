<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

class ManyToManyRelation extends ManyToOneRelation implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "manyToManyRelation";

}
