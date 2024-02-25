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
 * @copyright  Copyright (c) 2016-2019 instride AG (https://www.instride.ch)
 * @license    https://github.com/instride/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace Instride\Bundle\DataDefinitionsBundle\Loader;

use InvalidArgumentException;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Listing;
use Instride\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;
use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;

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

        if ($list instanceof Listing && $class != 'CSProducts' && (!empty($data['SAP Code / Material Number']) || !empty($data['SAPMaterialCode']) || !empty($data['Material']) )) {
            $condition = [];
            $conditionValues = [];
            if($class == 'PTGEUProduct'){
                $conditionValues[] = $data['SAPMaterialCode'];
                $condition[] = '`articleNumber` = ?';
            }
            elseif($class == 'Product'){
                $conditionValues[] = $data['SAP Code / Material Number'];
                $condition[] = '`articleNumber` = ?';
            }
            elseif($class == 'IFSEUProduct'){
                $conditionValues[] = $data['Material'];
                $condition[] = '`materialNumber` = ?';
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

            if (count($objectData) > 1) {
                throw new InvalidArgumentException('Object with the same primary key was found multiple times');
            }

            if (count($objectData) === 1) {
                $obj = $objectData[0];

                if ($definition->getForceLoadObject()) {
                    $obj = DataObject::getById($obj->getId(), true);

                    if (!$obj instanceof $classObject) {
                        $obj = new $classObject();
                    }
                }
                return $obj;
            }
        }elseif($class == 'CSProducts'){

            $productFolderPath = '/Contitech_ConveyorSolution/Products/';
            $region = '';

            // If multiple regions given to get the first region that exists in master
            if($data['Region']){
                $regionArray = explode("|",$data['Region']);
                foreach($regionArray as $eachRegion){
                    $regionObj = DataObject\CSRegion::getByPath('/Contitech_ConveyorSolution/Master Data/Region/'.trim($eachRegion));
                    if($regionObj){
                        $region = trim($eachRegion);
                        break;
                    }
                }
            }
            // If only Product Hierarchy has data for product
            $path = trim($data['Product Hierarchy']);

            // If condition to set path for product groups or products with no region
            if($data['Product Flag'] == "0" || ($data['Product Flag'] == "1" && !$data['Region'])){
                $productName = str_replace("/", "-", $data['Product Name']);
                $path = trim($data['Product Hierarchy']).'/'.trim($productName);
            }
            // Condition for products with region
            elseif($data['Product Flag'] == "1" && $data['Region']){

                // When there is no updation of region folder for products
                $productName = str_replace("/", "-", $data['Product Name']);
                $completepath = trim($data['Product Hierarchy']).'/'.$region.'/'.trim($productName);
                $obj = DataObject\CSProducts::getByPath($completepath);
                // Condition is region is updated for products to be moved to new folder
                if(!$obj){
                    $hierarchyobjPath = '/Contitech_ConveyorSolution/Master Data/Product Hierarchy/';
                    $pathWithoutProductName = $hierarchyobjPath.trim($data['Product Hierarchy']);
                    $hierarchyObj = DataObject\CSHierarchy::getByPath($pathWithoutProductName);

                    if($hierarchyObj){
                        $pathWithoutRegion = $productFolderPath.trim($data['Product Hierarchy']);
                        $productName = trim(str_replace("/", "-", trim($data['Product Name'])));
                        $parentId = DataObject\Service::createFolderByPath($pathWithoutRegion.'/'.$region)->getId();
                        $query = "SELECT o_id from objects where concat(o_path,o_key) LIKE '%$pathWithoutRegion%$productName' and o_type='object'";
                        $result = $this->db->fetchFirstColumn($query);
                        $count = count($result);

                        if ($count > 0) {
                            $obj = DataObject\CSProducts::getById($result[0], true);
                            $obj->setParentId($parentId);
                            return $obj;
                        }

                    }
                }
                return $obj;
            }
            return DataObject\CSProducts::getByPath($path);
        }

        return null;
    }
}
