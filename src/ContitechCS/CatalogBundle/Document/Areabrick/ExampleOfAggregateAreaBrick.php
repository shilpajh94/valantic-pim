<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class ExampleOfAggregateAreaBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Textile Belt Applications';
    }

    public function getDescription()
    {
        return 'Textile Belt Applications';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_GLOBAL;
    }
}

?>