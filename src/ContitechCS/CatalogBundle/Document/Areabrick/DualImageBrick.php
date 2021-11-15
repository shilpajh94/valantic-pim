<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class DualImageBrick extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Dual Image';
    }

    public function getDescription()
    {
        return 'Dual Image';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>