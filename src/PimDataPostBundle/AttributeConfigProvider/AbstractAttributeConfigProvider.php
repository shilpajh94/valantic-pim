<?php

namespace PimDataPostBundle\AttributeConfigProvider;

abstract class AbstractAttributeConfigProvider
{

    public abstract function getCompleteConfig(): array;

    protected abstract function getConfigFileName(): string;

}