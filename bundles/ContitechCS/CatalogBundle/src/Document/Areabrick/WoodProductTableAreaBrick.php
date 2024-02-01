<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class WoodProductTableAreaBrick extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Wood Product Table Area Brick';
    }

    public function getDescription(): string
    {
        return 'Wood Product Table Area Brick';
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
