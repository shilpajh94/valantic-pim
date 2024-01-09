<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use CatalogBundle\Helper\CatalogTemplatingHelper;
// use Pimcore\Model\Document\Tag\Area\Info;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class ParagraphAndDiagonalImage extends AbstractTemplateAreabrick
{
    private $catalogTemplatingHelper;
    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper) {
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
    }
    
    public function action(Info $info) {
        // $info->getView()->helper = $this->catalogTemplatingHelper;
        // $info->getView()->imageWidth = $info->getParam('imageWidth');
    }
    
    public function getName()
    {
        return 'Paragraph And Diagonal Image';
    }

    public function getDescription()
    {
        return 'Paragraph And Diagonal Image';
        
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
}

?>