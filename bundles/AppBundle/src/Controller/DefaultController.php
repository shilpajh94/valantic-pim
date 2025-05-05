<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FrontendController
{
    /**
     * @Route("/check")
     *
     * @param Request $request
     */
    public function defaultAction(Request $request)
    {
        $db = \Pimcore\Db::get();
        $sql = "SELECT count(*) from object_brick_store_HoseBase_1
WHERE tubeMaterial = 1 OR tubeCharacteristic = 1 OR tubeColor = 1 OR StandardMetCover = 1 OR standardMetHose = 1 OR coverMaterial = 1 OR coverCharacteristic = 1 OR coverColor = 1 OR agencyCompliance = 1 OR safetyFactor = 1 OR acceptableHoseMedia = 1 OR StandardMetTube = 1;


SELECT count(*) from object_brick_query_HoseBase_1
WHERE tubeMaterial = 1 OR tubeCharacteristic = 1 OR tubeColor = 1 OR StandardMetCover = 1 OR standardMetHose = 1 OR coverMaterial = 1 OR coverCharacteristic = 1 OR coverColor = 1 OR agencyCompliance = 1 OR safetyFactor = 1 OR acceptableHoseMedia = 1 OR StandardMetTube = 1;
 

SELECT count(*) from object_brick_query_AccessoriesFert_1
where Color = 1 OR MaterialType = 1;


-- 18
SELECT count(*) from object_brick_store_AccessoriesFert_1
where Color = 1 OR MaterialType = 1;

SELECT count(*) from object_brick_query_PTGBase_1
where material = 1;


SELECT count(*) from object_brick_store_PTGBase_1
where material = 1;

-- 1
SELECT count(*) from object_store_1
where brandName = 1 OR brandConstruction = 1 OR californiaProposition65ChemicalName1 =1 OR californiaProposition65ChemicalName2 = 1 OR californiaProposition65ChemicalName3 = 1 OR reinforcement = 1;

-- 1
SELECT count(*) from object_query_1
where brandName = 1 OR brandConstruction = 1 OR californiaProposition65ChemicalName1 =1 OR californiaProposition65ChemicalName2 = 1 OR californiaProposition65ChemicalName3 = 1 OR reinforcement = 1;";
        $records = $db->fetchAllAssociative($sql);
        dd($records);
        return new Response('Hello world from app');
    }

    /**
     * http://contitechdev.com.local/show-cached-option-provider-keys
     *
     * @Route("/show-cached-option-provider-keys")
     *
     * @param Request $request
     */
    public function showCachedOptionProviderAction(Request $request)
    {
        // echo "here";
        $optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $op = $optionProvider->getCachedOptionProvidersKeys();
        p_r($op);
        die;
    }

    /**
     * http://contitechdev.com.local/show-cached-option-provider-data?cacheKey=option_provider_Features
     *
     * @Route("/show-cached-option-provider-data")
     *
     * @param Request $request
     */
    public function showCachedOptionProviderDataAction(Request $request)
    {
        $cacheKey = $request->get('cacheKey');
        $optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $op = $optionProvider->getCachedOptionProvidersData($cacheKey);
        p_r($op);
        die;
    }

    /**
     * http://contitechdev.com.local/delete-cached-option-provider-keys?cacheKey=option_provider_Features
     *
     * @Route("/delete-cached-option-provider-keys")
     *
     * @param Request $request
     */
    public function deleteCachedOptionProviderAction(Request $request)
    {
        $cacheKey = $request->get('cacheKey');
        echo "Deleting cache option provider keys and data";
        $optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $optionProvider->unsetAllOptionProviderCache($cacheKey);
        die;
    }


}
