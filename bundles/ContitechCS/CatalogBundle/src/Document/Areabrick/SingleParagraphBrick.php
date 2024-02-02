<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class SingleParagraphBrick extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Single Paragraph';
    }

    public function getDescription(): string
    {
        return 'Single Paragraph';
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
