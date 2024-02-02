<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @package    PTGEUCatalogBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace PTGEU\CatalogBundle\Services;

use AppBundle\Tool\Utils;
use Pimcore\Cache;


class ConfigProviderService
{

    public function getCatalogConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_CATALOGBUNDLE_CONFIG_FILE_PATH);
    }
    
    public function getAttributeImagesConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_CATALOGBUNDLE_ATTRIBUTE_IMAGE_CONFIG_FILE_PATH);
    }

    public function getPriceListTableConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_CATALOGBUNDLE_PRICE_LIST_TABLE_CONFIG_FILE_PATH);
    }

    /**
     * get yml config for the given file
     * caching the file data if environment is not dev
     *
     * @param $filePath
     * @return mixed
     */
    public function getConfigFromYmlFile($filePath)
    {
        $env = \Pimcore\Config::getEnvironment();
        $cacheKey = Utils::getCacheKeyForFilePath($filePath);

        if ($env != "dev") {

            $con = Cache::load($cacheKey);
            if ($con) {
                $config =  $con;
            } else {
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config, $cacheKey);
            }
        } else {
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config, $cacheKey);
        }
        return $config;
    }

}
