<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class HeadingWithParagraphAndImageBrick extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Heading With Paragraph And Image Brick';
    }

    public function getDescription(): string
    {
        return 'Heading With Paragraph And Image Brick';
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
