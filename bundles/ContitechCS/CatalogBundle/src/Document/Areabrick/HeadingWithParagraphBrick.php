<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class HeadingWithParagraphBrick extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Heading With Paragraph';
    }

    public function getDescription(): string
    {
        return 'Heading With Paragraph';
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
