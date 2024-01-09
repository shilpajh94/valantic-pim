<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class HeadingWithParagraphBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Heading With Paragraph';
    }

    public function getDescription()
    {
        return 'Heading With Paragraph';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>