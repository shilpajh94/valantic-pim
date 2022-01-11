<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Tag\Area\Info;
use CatalogBundle\Helper\CatalogTemplatingHelper;

class DualImageBrick extends AbstractTemplateAreabrick
{
    private $catalogTemplatingHelper;
    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper) {
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
    }
    
    public function action(Info $info) {
        $info->getView()->helper = $this->catalogTemplatingHelper;
        $info->getView()->imageWidth = $info->getParam('imageWidth');
    }
    
    
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