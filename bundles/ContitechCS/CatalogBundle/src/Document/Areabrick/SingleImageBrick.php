<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class SingleImageBrick extends AbstractAreabrick
{
    public function getName(): string
    {
        return 'Single Image';
    }

    public function getDescription(): string
    {
        return 'Single Image';
    }

    // public function getTemplateLocation(): string
    // {
    //     return static::TEMPLATE_LOCATION_BUNDLE;
    // }
}
