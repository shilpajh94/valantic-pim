<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class WoodProductTableAreaBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Wood Product Table Area Brick';
    }

    public function getDescription()
    {
        return 'Wood Product Table Area Brick';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>