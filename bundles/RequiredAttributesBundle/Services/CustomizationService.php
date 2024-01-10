<?php

namespace RequiredAttributesBundle\Services;

use Pimcore\Model\DataObject;

class CustomizationService
{
    /**
     * config for the attributes to be shown with the customization
     */
    const CONFIG = [
        "NomenClature" => [
            ["key" => "partialPartNumber", "type" => "input", "label" => "Partial Part Number"],
            ["key" => "FittingFamily", "type" => "advancedManyToManyObjectRelation" , "className" => "FittingFamily",
                "config" => [
                    ["key" => "Name", "type" => "input", "label" => "Fitting Family Name" ],
                    ["key" => "Description", "type" => "textarea", "label" => "Fitting Family Description"]
                ]
            ],
            ["key" => "Thread", "type" => "advancedManyToManyObjectRelation" , "className" => "Thread",
                "config" => [
                    ["key" => "Name", "type" => "input", "label" => "Thread Name" ],
                    ["key" => "Description", "type" => "textarea", "label" => "Thread Description"]
                ]
            ],
            ["key" => "nomenClatureType", "type" => "select", "label" => "Type"],
            ["key" => "swivel", "type" => "select", "label" => "Swivel"],
            ["key" => "comments", "type" => "textarea", "label" => "Comments"],
            ["key" => "attributeCode", "type" => "input", "label" => "Attribute (Code)"],
            ["key" => "AdapterAttributeType", "type" => "input", "label" => "Adapter Attribute Type"],
            ["key" => "assemblyMaterialCode", "type" => "input", "label" => "Assembly Material Code"],
            ["key" => "assemblyMaterialDescription", "type" => "input", "label" => "Assembly Material Description"],
            ["key" => "markettingShortDescription", "type" => "textarea", "label" => "Marketting Short Description"],
            ["key" => "gender1", "type" => "select", "label" => "Gender1"],
            ["key" => "gender2", "type" => "select", "label" => "Gender2"],
            ["key" => "elbowYN", "type" => "booleanSelect", "label" => "Elbow Y/N"],
            ["key" => "numberOfElbows", "type" => "input", "label" => "Number of Elbows"],
            ["key" => "elbowType", "type" => "input", "label" => "Elbow Type"],
            ["key" => "elbowAngle1", "type" => "input", "label" => "Elbow Angle 1"],
            ["key" => "elbowAngle2", "type" => "input", "label" => "Elbow Angle 2"],
            ["key" => "attributeDescription", "type" => "input", "label" => "Attribute Description"],
            ["key" => "styleCode", "type" => "input", "label" => "Style Code"],
            ["key" => "styleDescription", "type" => "input", "label" => "Style Description"],
            ["key" => "valve", "type" => "input", "label" => "Valve"],
        ],
    ];

    /**
     * a utility function to get the data of the object according to the config
     *
     * this is being used to show the nomenclature data on the product panel
     *
     * @param string $id
     */
    public function getLabelValueDataForObjectId(string $id) : array
    {
       $object = \Pimcore\Model\DataObject::getById($id);
       if($object){
            $className = $object->getClassName();
            $config = $this->getConfigForClass($className);
            if(count($config) > 0){
                return $this->getLabelValueDataForConfig($object, $config, $className);
            }

       }
        return array();
    }

    /**
     * @param DataObject $object
     * @param array $config
     * @param string $className
     * @return array
     */
    private function getLabelValueDataForConfig(DataObject $object, array $config,string $className ): array
    {
        $labelValue = array();
        if($object->getClassName() == $className){
            foreach($config as $fieldConfig ){
                switch ($fieldConfig["type"]){
                    case "input" :
                        $labelValue[] = $this->getLabelValueDataForInput($object,$fieldConfig);
                        break;
                    case "textarea" :
                        $labelValue[] = $this->getLabelValueDataForInput($object,$fieldConfig);
                        break;
                    case "booleanSelect" :
                        $labelValue[] = $this->getLabelValueDataForBooleanSelect($object,$fieldConfig);
                        break;
                    case "select" :
                        $labelValue[] = $this->getLabelValueDataForInput($object,$fieldConfig);
                        break;
                    case "advancedManyToManyObjectRelation":
                        $result = $this->getLabelValueDataForAdvancedManyToManyObjectRelation($object,$fieldConfig);
                        if(count($result) > 0){
                            $labelValue = array_merge($labelValue, $result);
                        }
                        break;
                }
            }
        }
        return $labelValue;
    }

    /**
     * @param DataObject $object
     * @param array $config
     * @return array
     */
    private function getLabelValueDataForInput(DataObject $object, array $config): array
    {
        $getter  = "get".ucfirst($config["key"]);
        $value = $object->$getter() ?? '' ;
        return ["label" => $config["label"], "value" => $value];
    }

    /**
     * @param DataObject $object
     * @param array $config
     * @return array
     */
    private function getLabelValueDataForBooleanSelect(DataObject $object, array $config): array
    {
        $getter  = "get".ucfirst($config["key"]);
        $value = $object->$getter() === true ? "YES" : ( $object->$getter() === false ? "NO" : "" ) ;

        return ["label" => $config["label"], "value" => $value ];
    }

    /**
     * @param DataObject $object
     * @param array $config
     * @return array
     */
    private function getLabelValueDataForAdvancedManyToManyObjectRelation(DataObject $object, array $config): array
    {
        $returnValue = array();
        $getter  = "get".ucfirst($config["key"]);

        $relatedObjectsMeta = $object->$getter();

        $innerConfig = $config['config'];
        foreach($relatedObjectsMeta as $objectMeta){
            $rObject = $objectMeta->getObject();
            if(count($returnValue) > 0){
                $returnValue = array_merge($returnValue, $this->getLabelValueDataForConfig($rObject,$innerConfig,
                $config["className"]));
            }else{
                $returnValue = $this->getLabelValueDataForConfig($rObject,$innerConfig, $config["className"]);
            }
        }
        return $returnValue;
    }

    /**
     * @param string $className
     * @return array
     */
    private function getConfigForClass(string $className): array
    {
        if(array_key_exists($className,self::CONFIG)){
            return self::CONFIG[$className];
        }
        return array();
    }

}
