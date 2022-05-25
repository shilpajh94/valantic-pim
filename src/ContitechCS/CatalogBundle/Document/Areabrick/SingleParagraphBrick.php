<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class SingleParagraphBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Single Paragraph';
    }

    public function getDescription()
    {
        return 'Single Paragraph';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>