<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class HeadingWithParagraphAndImageBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Heading With Paragraph And Image Brick';
    }

    public function getDescription()
    {
        return 'Heading With Paragraph And Image Brick';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>