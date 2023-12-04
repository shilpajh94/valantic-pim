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
        $cofigArray =  \Pimcore::getContainer()->get('app.config_provider_service')->getConfigFromYmlFile(PIMCORE_PROJECT_ROOT.'/bundles/RestApiBundle/Resources/config/config.yaml');
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

    public function getAvailableMappersAction(Request $request) {

        $aliasValueArray = [];
        $listing = new \Pimcore\Model\DataObject\VirtualCatalogApiMapper\Listing();
        $listing->setCondition("oo_id = ? ", [$request->get('objId')]);
        $listing = $listing->load();
        $selectedField = null;
        foreach($listing as $obj)
        {
            $selectedField = $obj->getGroupingField();

            if($selectedField == $request->get('table') && is_array($obj->getOriginalValues()) && !empty($obj->getOriginalValues()))
            {
                foreach($obj->getOriginalValues() as $values)
                {
                    $aliasValueArray[$values[0]] =  $values[2];
                }
            }
           
        }
        $storeData=array();
        $newData=array();
        $cofigArray =  \Pimcore::getContainer()->get('app.config_provider_service')->getConfigFromYmlFile(PIMCORE_PROJECT_ROOT.'/bundles/RestApiBundle/Resources/config/config.yaml');
        $type = $cofigArray['parameters']['grouping_fields'][$request->get('table')]['field_type'];
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
                $aliasText = '';
                if(isset($aliasValueArray[$option['value']]))
                {
                    $aliasText = $aliasValueArray[$option['value']];
                }
                $storeData[] = [$option['value'], $option['key'], $aliasText];
                $newData[] = [''];
            }
        } 

        $arrayVar = [
            "objectData" => $aliasValueArray,
            "brandData" => [],
            "columnData" => [
                [
                    "xtype" => "gridcolumn",
                    "name" => "ID",
                    "Text" => "ID",
                    "header" => "ID",
                    "dataIndex" => "ID",
                    "flex" => 1,
                ],
                [
                    "xtype" => "gridcolumn",
                    "name" => "Label",
                    "Text" => "Label",
                    "header" => "Label",
                    "dataIndex" => "Label",
                    "flex" => 1
                ],

                [
                    "xtype" => "gridcolumn",
                    "name" => "valueAlias",
                    "Text" => "Value Alias",
                    "header" => "Value Alias",
                    "dataIndex" => "valueAlias",
                    "flex" => 1,
                    "editor" =>  "textfield"
                ],
                
            ],
            "fieldData" => [
                "id" => "ID",
                "label" => "Label",
                "valueAlias" => "valueAlias"
            ],
            "data" =>  $storeData,
            "type" => $type
        ];   
        
        echo  json_encode($arrayVar); die();
    }
    
}
