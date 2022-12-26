<?php

namespace PimDataPostBundle\AttributeConfigProvider;

interface IAttributeConfigProvider
{
    public function getCompleteConfig(): array;
}