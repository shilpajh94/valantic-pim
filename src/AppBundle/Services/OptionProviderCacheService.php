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

    /**
     * this is being used to store the already loaded option providers in memory
     * This will improve the performance of the listing in grid
     * 
     * It will only be effective if same option provider data is requested multiple times in a 
     * single request which is exactly what happens in grid loading
     */
    private $inMemoryOptionProviderData = [];

    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function setAllOptionsInCacheForClass(string $classKey, $data): bool
    {
        if($data)
        {
            $dataKeyArr =  array_column($data, 'key');
            $dataKeyArr = array_map('strtolower', $dataKeyArr);

            array_multisort ($dataKeyArr, SORT_ASC, SORT_STRING, $data);
        }
        
        $data = array_values($data);
        
        $result = \Pimcore\Cache::save($data, self::CACHE_KEY.$classKey, [], null, 0, true);
        if(MAINTAIN_OPTION_PROVIDER_DATA_IN_MEMORY && $result){
            $this->inMemoryOptionProviderData[self::CACHE_KEY.$classKey] = $data;
        }
        
        return $result;
    }

    /**
     * @param string $cacheKey
     * @return array
     */
    public function getCachedKeyData(string $cacheKey, bool $isFullKey = FALSE)
    {
        if($isFullKey)
            return $this->loadCacheData($cacheKey);
        else
            return $this->loadCacheData(self::CACHE_KEY.$cacheKey);
    }

    public function loadCacheData($cacheKey)
    {
        if(MAINTAIN_OPTION_PROVIDER_DATA_IN_MEMORY && array_key_exists($cacheKey,$this->inMemoryOptionProviderData)){
            $data =  $this->inMemoryOptionProviderData[$cacheKey];
        }else{
            $data = \Pimcore\Cache::load($cacheKey);
            if(MAINTAIN_OPTION_PROVIDER_DATA_IN_MEMORY && $data){
                $this->inMemoryOptionProviderData[$cacheKey] = $data;
            }
        }
        return $data;
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
            if($indexId !== false)
                $optionProviderClassCache[$indexId] = array("key"=>$valueName, "value" => $valueId);
            else
                $optionProviderClassCache[] = array("key"=>$valueName, "value" => $valueId);
                
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
            if($indexId !== false)
            {
                unset($optionProviderClassCache[$indexId]);
                // $optionProviderClassCache = array_values($optionProviderClassCache);
                $this->setAllOptionsInCacheForClass($classKey, $optionProviderClassCache);
            }
        }
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
        $result =  \Pimcore\Cache::save($optionProvidersKeys, self::CACHED_OPTION_PROVIDERS, [], null, 0, true);
        if(MAINTAIN_OPTION_PROVIDER_DATA_IN_MEMORY && $result){
            $this->inMemoryOptionProviderData[self::CACHED_OPTION_PROVIDERS] = $optionProvidersKeys;    
        }
        return $result;
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
                
                if($indexId !== false)
                {
                    unset($optionProvidersKeys[$indexId]);
                    $optionProvidersKeys = array_values($optionProvidersKeys);
                    $this->setCachedOptionProvidersKeys($optionProvidersKeys);
                }
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
