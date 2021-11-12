<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class HeadingWithImageBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Heading With Image Brick';
    }

    public function getDescription()
    {
        return 'Heading With Image Brick';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>