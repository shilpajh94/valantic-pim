<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class SingleImageBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Single Image';
    }

    public function getDescription()
    {
        return 'Single Image';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>