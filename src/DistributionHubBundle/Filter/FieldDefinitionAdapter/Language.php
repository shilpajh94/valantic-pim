<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

class Language extends Select implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "language";

}
