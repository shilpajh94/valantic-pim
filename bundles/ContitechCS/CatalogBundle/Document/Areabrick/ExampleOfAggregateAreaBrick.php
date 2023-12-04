<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class ExampleOfAggregateAreaBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Example of Aggregate';
    }

    public function getDescription()
    {
        return 'Example of Aggregate, Hard Rock Mining, Sand and Gravel Process';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>