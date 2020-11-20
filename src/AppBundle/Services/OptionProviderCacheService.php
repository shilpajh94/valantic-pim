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
    public function setAllOptionsInCacheForClass(string $classKey, $data): bool
    {
        return \Pimcore\Cache::save($data, self::CACHE_KEY.$classKey, [], null, 0, true);
    }

    /**
     * @param string $cacheKey
     * @return array
     */
    public function getCachedKeyData(string $cacheKey, bool $isFullKey = FALSE)
    {
        if($isFullKey)
            return \Pimcore\Cache::load($cacheKey);
        else
            return \Pimcore\Cache::load(self::CACHE_KEY.$cacheKey);
    }

    /**
     */
    public function createUpdateOptionProviderMapCache(string $classKey, int $valueId, $valueName): bool
    {
        $this->setCachedOptionProviders($classKey);
        $optionProviderClassCache = $this->getCachedKeyData($classKey);
        
        if($optionProviderClassCache)
        {
            $indexId = array_search($valueId, array_column($optionProviderClassCache, 'value')); 
            if($indexId === FALSE)
                $optionProviderClassCache[] = array("key"=>$valueName, "value" => $valueId);
            else
                $optionProviderClassCache[$indexId] = array("key"=>$valueName, "value" => $valueId);
        }
        else
        {
            $optionProviderClassCache[] = array("key"=>$valueName, "value" => $valueId);
        }

        $this->setAllOptionsInCacheForClass($classKey, $optionProviderClassCache);

        return true;
    }

    public function clearOptionProviderMapCache($classKey, $valueId)
    {
        $optionProviderClassCache = $this->getCachedKeyData($classKey);
        
        if($optionProviderClassCache)
        {
            $indexId = array_search($valueId, array_column($optionProviderClassCache, 'value')); 
            unset($optionProviderClassCache[$indexId]);
            $this->setAllOptionsInCacheForClass($classKey, $optionProviderClassCache);
        }
    }

    public function isCacheAvailableForClass(string $classKey): bool
    {
        $map = $this->getCachedKeyData($classKey);
        return ($map && !empty($map))? true : false;
    }

    public function setCachedOptionProviders(string $classKey): bool
    {
        $cachedOptionProviders = $this->getCachedOptionProvidersKeys();

        if(!$cachedOptionProviders)
            $cachedOptionProviders = [];

        if(!in_array(self::CACHE_KEY.$classKey, $cachedOptionProviders))
        {
            $cachedOptionProviders[] = self::CACHE_KEY.$classKey;
            $this->setCachedOptionProvidersKeys($cachedOptionProviders);
        }
        return true;
    }

    public function getCachedOptionProvidersKeys()
    {
        return $this->getCachedKeyData(self::CACHED_OPTION_PROVIDERS, TRUE);
    }

    public function setCachedOptionProvidersKeys($optionProvidersKeys)
    {
        return \Pimcore\Cache::save($optionProvidersKeys, self::CACHED_OPTION_PROVIDERS, [], null, 0, true);
    }

    public function getCachedOptionProvidersData($cacheKey)
    {
        $data = array();

        if($cacheKey)
        {
            $data = $this->getCachedKeyData($cacheKey, TRUE);
        }
        else
        {
            $optionProvidersKeys = $this->getCachedOptionProvidersKeys();
            if($optionProvidersKeys)
            {
                foreach ($optionProvidersKeys as $okey => $ovalue) {
                    $data[$ovalue] = $this->getCachedKeyData($ovalue, TRUE);
                }
            }
        }
        return $data;
    }

    public function unsetAllOptionProviderCache($cacheKey): bool
    {
        $optionProvidersKeys = $this->getCachedOptionProvidersKeys();

        if($cacheKey)
        {
            if($optionProvidersKeys)
            {
                $indexId = array_search($cacheKey, $optionProvidersKeys); 
                unset($optionProvidersKeys[$indexId]);
                $this->setCachedOptionProvidersKeys($optionProvidersKeys);
            }

            $this->removeCacheData($cacheKey);
        }
        else
        {
            $data = array();
            if($optionProvidersKeys)
            {
                foreach ($optionProvidersKeys as $okey => $ovalue) {
                    $this->removeCacheData($ovalue);
                }
            }

            $this->removeCacheData(self::CACHED_OPTION_PROVIDERS);
        }

        return true;
    }

    public function removeCacheData($cacheKey){
        \Pimcore\Cache::remove($cacheKey);
    }
}
