<?php

/**
 * User: Mahesh Lakher
 * Date: 26/07/2021
 * Time: 11:00 AM
 */

namespace ContitechCS\CatalogUIApiBundle\Services;
use Pimcore\Model\DataObject;
use \Exception;


class ProductApiService
{
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
                return Rest::output(false, self::RECORDS_NOT_FOUND);
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
            $response = [
                'backAndFrontCoverPDF' => [
                  'frontCoverPDF' => 'https://cdn.pim.conti.de/sampleFrontCover.pdf',
                  'backCoverPDF' => 'https://cdn.pim.conti.de/sampleBackCover.pdf',
                ],
                'catalogs' => [
                  0 => [
                    'id' => 12345,
                    'name' => 'Fortress XP',
                    'tableOfContentPageInfo' => [
                      0 => [
                        'title' => 'Fortress XP Features',
                      ],
                    ],
                    'pdfLink' => 'https://cdn.pim.conti.de/sample.pdf',
                  ],
                ],
            ];
            return $response;
        }
        catch (Exception $e) 
        {  
            throw new Exception($e->getMessage());
        }
    }
}

