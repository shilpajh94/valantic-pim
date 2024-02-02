<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class TextileBeltApplicationsAreaBrick extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Textile Belt Applications';
    }

    public function getDescription(): string
    {
        return 'Textile Belt Applications';
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
