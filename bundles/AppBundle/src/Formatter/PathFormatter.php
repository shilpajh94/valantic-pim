<?php

namespace AppBundle\Formatter;

use Pimcore\Model\Asset;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\DataObject\BlogArticle;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\PathFormatterInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\News;

class PathFormatter implements PathFormatterInterface
{
    /**
     * @param $result array containing the nice path info. Modify it or leave it as it is. Pass it out afterwards!
     * @param ElementInterface $source the source object
     * @param $targets list of nodes describing the target elements
     * @param $params optional parameters. may contain additional context information in the future. to be defined.
     * @return mixed list of display names.
     */
    public function formatPath(array $result, ElementInterface $source, array $targets, array $params): array
    {
        /** @var  $fd Data */
        $fd = $params["fd"];
        $context = $params["context"];
        $result = $targets;
        foreach ($targets as $key => $item) {
            if ($item["type"] == "object") {
                $object = \Pimcore\Model\DataObject::getById($item['id']);
                if ($item['subtype'] == 'Plant') {
                    $result[$key] = $object->getPlant();
                } elseif ($item['subtype'] == 'Product') {
                    $result[$key] = $object->getArticleNumber();
                } elseif ($item['subtype'] == 'Country') {
                    $result[$key] = $object->getCode()."-".$object->getName();
                } elseif ($item['subtype'] == 'SalesOrganisation') {
                    $result[$key] = $object->getCode()."-".$object->getName();
                } elseif ($item['subtype'] == 'DistributionChannel') {
                    $result[$key] = $object->getCode()."-".$object->getName();
                }
            }   
        }
        return $result;
    }
}