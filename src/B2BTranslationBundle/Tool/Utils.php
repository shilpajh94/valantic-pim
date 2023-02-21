<?php


namespace B2BTranslationBundle\Tool;

use Symfony\Component\Yaml\Parser;

class Utils
{
    /**
     * function to get the yml file data as an array
     *
     * @param string $filePath
     * @return mixed
     */
    public static function getYmlConfig(string $filePath){
        $yaml = new Parser();
        return $yaml->parseFile($filePath);
    }
}