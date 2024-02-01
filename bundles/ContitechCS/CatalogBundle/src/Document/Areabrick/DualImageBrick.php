<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class DualImageBrick extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Dual Image';
    }

    public function getDescription(): string
    {
        return 'Dual Image';
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}
