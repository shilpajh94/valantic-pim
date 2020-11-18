<?php

namespace AppBundle\Services;

/**
 * 
 * Class OptionProviderCacheService
 * @package AppBundle\Services]
 */
class OptionProviderCacheService
{
    CONST CACHE_KEY = 'option_provider_';
    CONST CACHED_OPTION_PROVIDERS = 'cached_option_providers';

    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function setAllOptionsInCacheForClass(string $classKey, $data)
    {
        \Pimcore\Cache::save($data, self::CACHE_KEY.$classKey, [], null, 0, true);
        return true;
    }

    /**
     * @param string $cacheKey
     * @return array
     */
    public function getCachedKeyData(string $cacheKey)
    {
        $cachedData = \Pimcore\Cache::load($cacheKey);
        return $cachedData;
    }

    /**
     * @param string $attrubuteGroupName
     * @return array
     */
    public function getAllOptionsByClassKeyCache(string $classKey)
    {
        $returnValue = \Pimcore\Cache::load(self::CACHE_KEY.$classKey);
        return $returnValue;
    }
    
    /**
     * @throws \Exception
     */
    public function createUpdateOptionProviderMapCache(string $classKey, int $valueId, $valueName): bool
    {
        $optionProviderClassCache = $this->getAllOptionsByClassKeyCache($classKey);
        
        if($optionProviderClassCache)
        {
            $indexId = array_search($valueId, array_column($optionProviderClassCache, 'value')); 

            if($indexId)
                $optionProviderClassCache[$indexId] = array("key"=>$valueName, "value" => $valueId);
            else
                $optionProviderClassCache[] = array("key"=>$valueName, "value" => $valueId);
            
            \Pimcore\Cache::save($optionProviderClassCache, self::CACHE_KEY.$classKey, [], null, 0, true);
        }

        return true;
    }

    public function clearOptionProviderMapCache($classKey, $valueId)
    {
        $optionProviderClassCache = $this->getAllOptionsByClassKeyCache($classKey);
        
        if($optionProviderClassCache)
        {
            $indexId = array_search($valueId, array_column($optionProviderClassCache, 'value')); 
            unset($optionProviderClassCache[$indexId]);
            \Pimcore\Cache::save($optionProviderClassCache, self::CACHE_KEY.$classKey, [], null, 0, true);
        }
    }

    public function isCacheAvailableForClass(string $classKey): bool
    {
        $map = \Pimcore\Cache::load(self::CACHE_KEY.$classKey);
        return ($map && !empty($map))? true : false;
    }

    public function setCachedOptionProviders(string $classKey): bool
    {
        $cachedOptionProviders = \Pimcore\Cache::load(self::CACHED_OPTION_PROVIDERS);

        if(!$cachedOptionProviders)
            $cachedOptionProviders = [];

        if(!in_array(self::CACHE_KEY.$classKey, $cachedOptionProviders))
        {
            $cachedOptionProviders[] = self::CACHE_KEY.$classKey;
            \Pimcore\Cache::save($cachedOptionProviders, self::CACHED_OPTION_PROVIDERS, [], null, 0, true);
        }
        return true;
    }

    public function getCachedOptionProvidersKeys()
    {
        $returnValue = \Pimcore\Cache::load(self::CACHED_OPTION_PROVIDERS);
        return $returnValue;
    }

    public function getCachedOptionProvidersData($cacheKey)
    {
        $data = array();

        if($cacheKey)
        {
            $data = \Pimcore\Cache::load($cacheKey);
        }
        else
        {
            $optionProvidersKeys = \Pimcore\Cache::load(self::CACHED_OPTION_PROVIDERS);
            if($optionProvidersKeys)
            {
                foreach ($optionProvidersKeys as $okey => $ovalue) {
                    $data[$ovalue] = $this->getCachedKeyData($ovalue);
                }
            }
        }
        

        return $data;
    }

    public function unsetAllOptionProviderCache($cacheKey): bool
    {
        if($cacheKey)
        {
            
            $optionProvidersKeys = \Pimcore\Cache::load(self::CACHED_OPTION_PROVIDERS);
            
            if($optionProvidersKeys)
            {
                $indexId = array_search($cacheKey, $optionProvidersKeys); 
                unset($optionProvidersKeys[$indexId]);
                \Pimcore\Cache::save($optionProvidersKeys, self::CACHED_OPTION_PROVIDERS, [], null, 0, true);
            }

            \Pimcore\Cache::remove($cacheKey);

        }
        else
        {
            $optionProvidersKeys = \Pimcore\Cache::load(self::CACHED_OPTION_PROVIDERS);
            $data = array();
            if($optionProvidersKeys)
            {
                foreach ($optionProvidersKeys as $okey => $ovalue) {
                    \Pimcore\Cache::remove($ovalue);
                }
            }

            \Pimcore\Cache::remove(self::CACHED_OPTION_PROVIDERS);
        }

        return true;
    }
}
