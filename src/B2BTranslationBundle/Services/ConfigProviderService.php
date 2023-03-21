<?php

/**
 * User: Mahesh Lakher
 * Date: 26/07/2021
 * Time: 11:00 AM
 */

namespace B2BTranslationBundle\Services;

use B2BTranslationBundle\Tool\Utils;

class ConfigProviderService
{
    /**
     * get unit conversion file 
     */
    public function getBusinessUnitTranslationConfig($filePath)
    {
        try {
            $fileNamefullPath = B2BTRANSLATIONBUNDLE_CONFIG_DIRECTORY."/bu_translation_config/".$filePath.".yml";
            return Utils::getYmlConfig($fileNamefullPath);
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
        
    }
}
