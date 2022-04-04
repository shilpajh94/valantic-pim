<?php
/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 w-vision AG (https://www.w-vision.ch)
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

namespace Wvision\Bundle\DataDefinitionsBundle\Loader;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Listing;
use Wvision\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;

class PrimaryKeyLoader implements LoaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(string $class, $data, DataDefinitionInterface $definition, $params): ?Concrete
    {
        $this->db = \Pimcore\Db::get();
        $classObject = '\Pimcore\Model\DataObject\\'.ucfirst($class);
        $classList = '\Pimcore\Model\DataObject\\'.ucfirst($class).'\Listing';

        $list = new $classList();

        if ($list instanceof Listing && $class != 'CSProducts') {
            $mapping = $definition->getMapping();
            $condition = [];
            $conditionValues = [];
            foreach ($mapping as $map) {
                if ($map->getPrimaryIdentifier()) {
                    $condition[] = '`'.$map->getToColumn().'` = ?';
                    $conditionValues[] = $data[$map->getFromColumn()];
                }
            }

            if (\count($condition) === 0) {
                throw new \InvalidArgumentException('No primary identifier defined!');
            }

            $list->setUnpublished(true);
            $list->setCondition(implode(' AND ', $condition), $conditionValues);
            $list->setObjectTypes([
                Concrete::OBJECT_TYPE_VARIANT,
                Concrete::OBJECT_TYPE_OBJECT,
                Concrete::OBJECT_TYPE_FOLDER,
            ]);
            $list->load();
            $objectData = $list->getObjects();

            if (\count($objectData) > 1) {
                throw new \InvalidArgumentException('Object with the same primary key was found multiple times');
            }

            if (\count($objectData) === 1) {
                $obj = $objectData[0];

                if ($definition->getForceLoadObject()) {
                    $obj = DataObject::getById($obj->getId(), true);

                    if (!$obj instanceof $classObject) {
                        $obj = new $classObject();
                    }
                }

                return $obj; 
            }
        }else{
            $productFolderPath = '/Contitech_ConveyorSolution/Products/';
            $region = '';
            if($data['Region']){
                $regionArray = explode("|",$data['Region']);
                foreach($regionArray as $eachRegion){
                    $regionObj = DataObject\CSRegion::getByPath('/Contitech_ConveyorSolution/Master Data/Region/'.$eachRegion);
                    if($regionObj){
                        $region = $eachRegion;
                        break;
                    }
                }    
            }
            $path = $data['Product Hierarchy'];
            if($data['Product Flag'] == "0" || ($data['Product Flag'] == "1" && !$data['Region'])){
                $productName = str_replace("/", "-", $data['Product Name']);
                $path = $data['Product Hierarchy'].'/'.$productName;
            }elseif($data['Product Flag'] == "1" && $data['Region']){
                $productName = str_replace("/", "-", $data['Product Name']);
                $completepath = $data['Product Hierarchy'].'/'.$region.'/'.$productName;
                $obj = DataObject\CSProducts::getByPath($productFolderPath.$completepath);
                if(!$obj){
                    $pathWithoutProductName = $productFolderPath.$data['Product Hierarchy'].'/'.$region;
                    $pathWithoutRegion = $productFolderPath.$data['Product Hierarchy'];
                    $productName = trim(str_replace("/", "-", $data['Product Name']));
                    $parentId = DataObject\Service::createFolderByPath($pathWithoutProductName)->getId();
                    $query = "SELECT o_id from objects where concat(o_path,o_key) LIKE '%$pathWithoutRegion%$productName' and o_type='object'";
                    $result = $this->db->fetchCol($query);
                    DataImportLogger::log(json_encode($result));
                    $count = count($result);
                    if ($count > 0) {
                        $obj = DataObject\CSProducts::getById($result[0], true);
                        $obj->setParentId($parentId);
                        return $obj;
                    }
                }
                return $obj;
            }
            $obj = DataObject\CSProducts::getByPath($productFolderPath.$path);
            return $obj;
        }
        return null;
    }
}


