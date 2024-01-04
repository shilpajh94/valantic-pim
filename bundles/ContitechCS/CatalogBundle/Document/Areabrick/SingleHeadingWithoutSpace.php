<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class SingleHeadingWithoutSpace extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Single Heading Without Space';
    }

    public function getDescription()
    {
        return 'Single Heading Without Space';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>