<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class ParagraphAndDiagonalImage extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Paragraph And Diagonal Image';
    }

    public function getDescription(): string
    {
        return 'Paragraph And Diagonal Image';
        
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
