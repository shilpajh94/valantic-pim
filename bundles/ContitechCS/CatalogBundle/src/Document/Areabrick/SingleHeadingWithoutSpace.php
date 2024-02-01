<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class SingleHeadingWithoutSpace extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Single Heading Without Space';
    }

    public function getDescription(): string
    {
        return 'Single Heading Without Space';
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
