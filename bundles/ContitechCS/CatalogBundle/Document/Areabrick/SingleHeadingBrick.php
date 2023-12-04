<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class SingleHeadingBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Single Heading';
    }

    public function getDescription()
    {
        return 'Single Heading';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>