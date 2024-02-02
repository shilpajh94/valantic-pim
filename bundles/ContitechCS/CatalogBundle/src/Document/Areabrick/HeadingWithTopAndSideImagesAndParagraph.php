<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class HeadingWithTopAndSideImagesAndParagraph extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Heading With Top And Side Images And Paragraph';
    }

    public function getDescription(): string
    {
        return 'Heading With Top And Side Images And Paragraph';
        
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
