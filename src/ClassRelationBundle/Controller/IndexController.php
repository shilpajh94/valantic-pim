<?php
namespace ClassRelationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Parser;

class IndexController extends FrontendController
{
     public function indexAction() {
                  
    }
    
    /**
     * @Route("/admin/ClassRelation/index/get-parameters")
    */
    public function getParametersAction(Request $request) {
                        
//        $classname = $this->container->getParameter( 'classname' );        
        
        $yamlFieldData = new Parser();

        $yamlFilePath = PIMCORE_PROJECT_ROOT . "/src/ClassRelationBundle/Resources/config/categorySpecificBrick.yml";

        $yamlFileData = $yamlFieldData->parse(file_get_contents($yamlFilePath));

        if (array_key_exists('Parameters', $yamlFileData)) {

            $paratemertersArray = $yamlFileData['Parameters'];
            $parametersArray = array();
            $parametersArray['Classname'] = $paratemertersArray['Classname'];
            $parametersArray['CategoryClassname'] = $paratemertersArray['CategoryClassname'];
            $parametersArray['CategoryFieldnameInClass'] = $paratemertersArray['CategoryFieldnameInClass'];
            $parametersArray['ObjectbrickFieldnameInClass'] = $paratemertersArray['ObjectbrickFieldnameInClass'];
            $parametersArray['BuildCategoryFieldnameInClass'] = $paratemertersArray['BuildCategoryFieldnameInClass'];
            $parametersArray['BuildObjectbrickFieldnameInClass'] = $paratemertersArray['BuildObjectbrickFieldnameInClass'];
            
            
            return new Response(json_encode($parametersArray));
           
        }
    }

    /**
     * @Route("/get-allowed-bricks")
    */
    public function getAllowedBricksAction(Request $request) {
        $cIds = $request->request->get('fields');
        if (!empty($cIds)) {
            $cIdArr = array();
            $cIds = json_decode($cIds);
            foreach ($cIds as $cId) {
                $cId = strip_tags($cId);
                $cIdArr = array_merge($cIdArr, $this->getClassificationIds($cId));
            }
            $mapping = new \Pimcore\Model\DataObject\CategoryBrickMapping\Listing();
            $condition = [];
            foreach ($cIdArr as $cId) {
                $condition[] = "(Category = $mapping->quote(\",$cId,\"))";
            }
            try {
                if (count($condition)>0) {
                    $condition = implode(' OR ', $condition);
                    $mapping->setCondition($condition);
                    $mapping->load();

                    $list = new \Pimcore\Model\DataObject\Objectbrick\Definition\Listing();
                    $list = $list->load();
                    $result = array();
                    $newArr = array();
                    if ($mapping != null) {
                        $entries = (array) $mapping->getObjects();
                        foreach ($entries as $data) {
                            $newArr[$data->getBrickName()] = true;
                        }
                        foreach ($list as $type) {
                            /** @var  $type Object\Objectbrick\Definition */
                           if (array_key_exists($type->key, $newArr)) {
                               $result[] = $type;
                           }
                        }
                    } else {
                        $result = false;
                    }
                } else {
                    $result = false;
                }  
                return new Response(json_encode($result));
            } catch (Exception $exc) {
                $logger->error($exc->getMessage());
                return $this->json(false);
            }
        } else {
            return $this->json(false);
        }
    }

    private function getClassificationTypes($cId) {
        $cIdArr = [];
        if (!$cIdArr = \Pimcore\Cache::load("classification_types_{$cId}_cache")) {
            $cIdArr = $this->getClassificationIds($cId);
            \Pimcore\Cache::save($cIdArr, "classification_types_{$cId}_cache");
        }
        return $cIdArr;
    }
    private function getClassificationIds($cId) {
        $cIdArr = [];
        if (!empty($cId)) {
            $obj = \Pimcore\Model\DataObject\Concrete::getById($cId);
            if (is_object($obj) && ($obj->getType()=='object')) {
                if ($obj->getClassName() == 'ProductCategory') {
                    $cIdArr = array_merge($cIdArr, [$cId]);
                    $cIdP = $obj->getParentId();
                    $cIdArr = array_merge($cIdArr, $this->getClassificationIds($cIdP));
                }
            }
        }
        
        return $cIdArr;
    }
}
