<?php

namespace ClassRelationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Model\User\Permission\Definition;
use Pimcore\Model\DataObject\ClassDefinition;

class ClassRelationBundle extends AbstractPimcoreBundle {

    /**
     *
     * @var string
     */
    public $classname = 'CategoryBrickMapping';
    public $parentClassFolder = "System Config";


    /**
     *
     * @var int
     */
    public $userId = 0;
    

    public function getInstaller() {
        $path = self::getInstallPath();

        if (!is_dir($path)) {
            $this->createClass();
            $this->importClass();

            mkdir($path);
        }
        
        $this->getJsPaths();
        $permissionDefinition = new Definition();
        $permissionDefinition->setKey("plugin_ClassRelation_access");
        $permissionDefinition->save();

    }
    
    public static function getInstallPath() {
        return PIMCORE_PROJECT_ROOT . "/src/ClassRelationBundle/install";
    }
    
    /**
     * Create CategoryBrickMapping class
     *
     * @return boolean
     */
    public function createClass() {
        $class = ClassDefinition::getByName($this->classname);
        
        if (empty($class)) {
            $class = ClassDefinition::create(
                            [
                                'name' => $this->classname,
                                'userOwner' => $this->userId,
                                'group' => $this->parentClassFolder
                            ]
            );
            $class->save();
        }

        return true;
    }
    
        /**
     * Import Mapping class
     *
     * @return boolean
     */
    public function importClass() {
        // Import class definition
        $class = ClassDefinition::getByName($this->classname);
        $json = file_get_contents(PIMCORE_PROJECT_ROOT . "/src/ClassRelationBundle/Resources/class/class_" . $this->classname . "_export.json");
        $array = json_decode($json, true);
        $array['layoutDefinitions']['childs'][0]['childs'][0]['classes'] = [];
        $json = json_encode($array);
        $success = ClassDefinition\Service::importClassDefinitionFromJson($class, $json);
        return true;
    }
    
    
    public static function uninstall() {
        $this->removeClass($this->classname);
        return true;
    }

    /**
     * Execute on uninstall plugin. 
     */
    public function removeClass($clsName) {
        $class = ClassDefinition::getByName($clsName);
        $class->delete();
    }
    

    public function getJsPaths() {
        return [
            '/bundles/classrelation/js/pimcore/startup.js'
        ];
    }

}
