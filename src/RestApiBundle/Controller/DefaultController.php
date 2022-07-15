<?php

namespace RestApiBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    private $classDefinition;

    /**
     * @Route("/rest_api")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from rest_api');
    }

    /**
     * @Route("/virtual_catalog/get_available_headers")
     */
    public function getAvailableHeadersAction(Request $request) {

        $storeData=array();
        $completeData=array();
        $cofigArray =  \Pimcore::getContainer()->get('app.config_provider_service')->getConfigFromYmlFile(PIMCORE_PROJECT_ROOT.'/src/RestApiBundle/Resources/config/config.yml');
        if(isset($cofigArray['parameters']['grouping_fields'][$request->get('table')]) && $cofigArray['parameters']['grouping_fields'][$request->get('table')]['field_type'] == 'Select')
        {
            \Pimcore::setAdminMode();
            $className = $cofigArray['parameters']['grouping_fields'][$request->get('table')]['container_name'];
            $definiion = $this->getClassDefinition($className);
            $fieldName = $request->get('table');
            $fieldDefinition = $definiion->getFieldDefinition($fieldName);
            \Pimcore::unsetAdminMode();
            $options = $fieldDefinition->getOptions();
            foreach ($options as $option) {
                $storeData[] = [$option['value'], $option['key']];
                $completeData[$option['value']] = array(
                                                "fieldLevel" => "class", 
                                                "fieldType" => "Select", 
                                                "fieldLabel" => $option['key'],
                                                );
            }
        }
        $type = $cofigArray['parameters']['grouping_fields'][$request->get('table')]['field_type'];
        $arr = [
          "storeData" => $storeData,
          "completeData" =>  $completeData,
          "type" => $type,
          "success" => true 
       ]; 


       echo json_encode($arr);
       die();
 
    }

    public function getClassDefinition($className) {
        if (empty($this->classDefinition[$className])) {
            $def = \Pimcore\Model\DataObject\ClassDefinition::getByName($className);
            if($def === null){
                $def = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($className);
            }
            $this->classDefinition[$className] = $def;
        }
        return $this->classDefinition[$className];
    }
    
}
