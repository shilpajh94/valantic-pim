<?php

namespace CatalogBundle\Controller;

use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use \Exception;
use Pimcore\Controller\FrontendController;
use CatalogBundle\Model\Catalog;
use Pimcore\Model\DataObject\Brand;


class BrandSortingController extends FrontendController
{

    /**
     * @Route("/catalog/get-inBrand-sorting-list")
    */
    public function getSortedList(Request $request): JsonResponse
    {   
        $objId = $request->get('id');
        $tableObj = DataObject\CatalogTables::getById($objId);
        $headerData = json_decode($tableObj->getHeaderData(), true); // true to get an associative array
        $tableData = $tableObj->getProductsData(); // this is an array of arrays

        // Get only the keys (preserve order)
        $headers = array_keys($headerData);

        // Merge headers with each row
        $mergedData = [];
        foreach ($tableData as $row) {
            $mergedData[] = array_combine($headers, $row);
        }
        // concatenate unique brandName-coverMaterial, sort them alphabetically
        $uniqueBrandIds = [];

        foreach ($mergedData as $item) {
            $brand = isset($item['brandName']) ? trim($item['brandName']) : '';
            $brandObj = DataObject\Brand::getByName($brand,1);
            if($brandObj){
                $brandId = $brandObj->getId();
                $groupingField = $brandObj->getGroupingFieldNameForInhHoseProductTemplate();
            }
            $group = isset($item[$groupingField]) ? trim($item[$groupingField]) : '';
            $group = ($group === false) ? 0 : $group;
            
            $key = $group ? $brand . '-' . $group : '';

            if (!in_array($key, $uniqueBrandIds)) {
                $uniqueBrandIds[] = $key;
            }
        }
        sort($uniqueBrandIds);   

        // Format the data as [value, label]
        $formattedStoreData = array_map(function($val) {
            return [$val, $val];
        }, $uniqueBrandIds);

        if (!empty($formattedStoreData)) { 
            $arr = [
                'storeData' => $formattedStoreData,
                'completeData' => $formattedStoreData,
                'success' => true
            ];
        } else {
            $arr = [
                'storeData' => [],
                'completeData' => [],
                'success' => true
            ];
        }

        echo json_encode($arr);
        die;

    }
}
