<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Services\OptionProviderCacheService;

class DefaultController extends FrontendController
{
    /**
     * @Route("/test")
     *
     * @param Request $request
     */
    public function defaultAction(Request $request)
    {

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
