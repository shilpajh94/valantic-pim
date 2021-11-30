<?php

/**
 * User: Mahesh Lakher
 * Date: 26/07/2021
 * Time: 11:00 AM
 */

namespace ContitechCS\CatalogUIApiBundle\Services;
use ContitechCS\CatalogUIApiBundle\Services\DBModelService;
use Pimcore\Model\DataObject;
use ContitechCS\CatalogUIApiBundle\Interfaces\ConstantsInterface;
use \Exception;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use Symfony\Component\HttpFoundation\Request;



class ProductApiService implements ConstantsInterface
{ 

    protected $dbModelService;
    protected $ConfigProviderService;

    public function __construct()
    {
      $this->dbModelService = new DBModelService();
      $this->ConfigProviderService = new ConfigProviderService();
    }
    /**
     * Get cs products
     * @return array
     */
    public function getCSProducts()
    {   
        try
        {   
            $result = [];
            $entries = new DataObject\CSProducts\Listing();
            $entries->setOrderKey("Name");
            $entries->load();

            if(!count($entries))
            { 
              throw new Exception(self::RECORDS_NOT_FOUND);
            }
            
            foreach($entries as $obj)
            {
                $result[] =['name' => $obj->getName(),'id' => $obj->getId()]; 
            }

            return $result;
        }
        catch (Exception $e) 
        {  
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get product group catalogs
     * @return array
     */
    public function getProductGroupCatalogs()
    {   
        try
        {   
            /* $response = [
                'backAndFrontCoverPDF' => [
                  'frontCoverPDF' => 'https://cdn.pim.conti.de/sampleFrontCover.pdf',
                  'backCoverPDF' => 'https://cdn.pim.conti.de/sampleBackCover.pdf',
                ],
                'catalogs' => [
                  0 => [
                    'id' => 12345, // product Gruop id
                    'name' => 'Fortress XP', product group name
                    'tableOfContentPageInfo' => [
                      0 => [
                        'title' => 'Fortress XP Features',
                      ],
                    ],
                    'pdfLink' => 'https://cdn.pim.conti.de/sample.pdf', //links
                  ],
                ],
            ];
            return $response; */

            $result = $this->dbModelService->getProductgroupCatalogs();

            if(!$result)
            {
              throw new Exception(self::RECORDS_NOT_FOUND);
            }

            $config = $this->ConfigProviderService->getCatalogApiConfig();
            
            $data = [];
            foreach($result as $val)
            {   
                $containerId  = $val['ContainerId'];
                $arr          = [];
                $object       = \Pimcore\Model\DataObject::getById($val['ProductgGroupId']);
                if(method_exists($object,'getName'))
                {
                  $arr['name'] = $object->getName();
                }
                else
                {
                  $arr['name'] = '';
                }

                $arr['id']    = $object->getId();
                $objContainer = \Pimcore\Model\Document::getById($containerId);

                if(method_exists($objContainer,'getAllChildren') && $objContainer->getAllChildren())
                {
                  foreach($objContainer->getAllChildren() as $objDoc)
                  {
                    $templateName = $objDoc->getTemplate();
                    if(isset($config['CatalogTemplateEditable'][$templateName]))
                    {
                      $conflig_arr = $config['CatalogTemplateEditable'][$templateName];

                      $editables = [];
                      foreach($conflig_arr as $config_val)
                      { 

                        if(method_exists($objDoc,'getElement'))
                        {
                          $editables[$config_val] = $objDoc->getElement($config_val)->getData();
                        }
                      }  
                      $arr['tableOfContentPageInfo'][] = $editables;
                    }
                  }
                }
                $data[] = $arr;
              }
              $response['backAndFrontCoverPDF'] =   $this->getCoverPagePdfLink();
              $response['catalog']              =   $data;
            
            return $response;
        }
        catch (Exception $e) 
        {  
            throw new Exception($e->getMessage());
        }
    }

    private function getCoverPagePdfLink()
    {    
        try
        {
          $req            = Request::createFromGlobals();
          $language       = $req->get('language');

          $parentPath = $this->ConfigProviderService->getWebSiteSetting('CS_cover_page_assets_folder');
          $parentPath = $parentPath ? $parentPath.'/'.$language : 'Contitech_ConveyorSolution/container_pdf/cover_page/'.$language;
          
          $obj   = \Pimcore\Model\Asset\Service::createFolderByPath("/$parentPath"); 
          
          $pdfArr = [];
          if($obj)
          {
            $listing = new \Pimcore\Model\Asset\Listing(); 
            $listing->setCondition("parentId = ".$obj->getId());
            
            if(count($listing))
            {
              foreach($listing as $key => $objAsset)
              {
                if($key == 0)
                {
                  $pdfArr['frontCoverPDF'] = $objAsset->getPath().$objAsset->getFileName();
                }
                else
                {
                  $pdfArr['backCoverPDF'] = $objAsset->getPath().$objAsset->getFileName();
                }
              }
            }
          }
          return $pdfArr;
        }
        catch (Exception $e) 
        {  
            throw new Exception($e->getMessage());
        }
    } 
}

