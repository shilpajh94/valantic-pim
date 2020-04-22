<?php

namespace DistributionHubBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Pimcore\Extension\Bundle\Installer\InstallerInterface;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use \Pimcore\Model\User\Permission\Definition;

class DistributionHubBundle extends AbstractPimcoreBundle {

    /**
     *
     * @var object 
     */
    protected $db;

    /**
     *
     * @var string
     */
    public $className1 = 'Mapping';
    public $className2 = 'Channel';

    /**
     *
     * @var int
     */
    public $userId = 0;

    public function getNiceName() {
        return "DistributionHub";
    }

    public function getInstaller() {
        $path = self::getInstallPath();
        $tmpPath = self::getTempPath();

        $xmlPath = PIMCORE_PROJECT_ROOT . '/web/var/TempXmlFileFolder';
        if (!is_dir($path)) {
            $this->createMappingClass();
            $this->importMappingClass();

            $this->createChannelClass();
            $this->importChannelClass();
            mkdir($path);
            if (!is_dir($tmpPath)) {
                mkdir($tmpPath);
            }
        }
        if (!is_dir($xmlPath)) {
            mkdir($xmlPath);
        }
        $this->getJsPaths();
        $this->getCssPaths();
        $permissionDefinition = new Definition();
        $permissionDefinition->setKey("plugin_DistributionHub_access");
        $permissionDefinition->save();

        $mappermissionDefinition = new Definition();
        $mappermissionDefinition->setKey("plugin_DistributionHub_mapping");
        $mappermissionDefinition->save();

        $chapermissionDefinition = new Definition();
        $chapermissionDefinition->setKey("plugin_DistributionHub_channel");
        $chapermissionDefinition->save();
    }

    public static function getInstallPath() {
        return PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/install";
    }

    public static function getTempPath() {
        return PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp";
    }

    /**
     * Create Mapping class
     *
     * @return boolean
     */
    public function createMappingClass() {
        $class = \Pimcore\Model\DataObject\ClassDefinition::getByName($this->className1);
        if (empty($class)) {
            $class = \Pimcore\Model\DataObject\ClassDefinition::create(
                            [
                                'name' => $this->className1,
                                'userOwner' => $this->userId
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
    public function importMappingClass() {
        // Import class definition
        $class = \Pimcore\Model\DataObject\ClassDefinition::getByName($this->className1);
        $json = file_get_contents(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/Resources/class/class_" . $this->className1 . "_export.json");
        $array = json_decode($json, true);
        $array['layoutDefinitions']['childs'][0]['childs'][0]['classes'] = [];
        $json = json_encode($array);
        $success = \Pimcore\Model\DataObject\ClassDefinition\Service::importClassDefinitionFromJson($class, $json);
        return true;
    }

    public function createChannelClass() {
        $class = \Pimcore\Model\DataObject\ClassDefinition::getByName($this->className2);
        if (empty($class)) {
            $class = \Pimcore\Model\DataObject\ClassDefinition::create(
                            [
                                'name' => $this->className2,
                                'userOwner' => $this->userId
                            ]
            );
            $class->save();
        }

        return true;
    }

    /**
     * Channel class import
     *
     * @return boolean
     */
    public function importChannelClass() {
        // Import class definition
        $class = \Pimcore\Model\DataObject\ClassDefinition::getByName($this->className2);
        $json = file_get_contents(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/Resources/class/class_" . $this->className2 . "_export.json");
        $array = json_decode($json, true);
        $array['layoutDefinitions']['childs'][0]['childs'][0]['classes'] = [];
        $json = json_encode($array);
        $success = \Pimcore\Model\DataObject\ClassDefinition\Service::importClassDefinitionFromJson($class, $json);
        return true;
    }

    public static function uninstall() {
        $this->removeClass($this->className1);
        $this->removeClass($this->className2);
        return true;
    }

    /**
     * Execute on uninstall plugin. 
     */
    public function removeClass($clsName) {
        $class = \Pimcore\Model\DataObject\ClassDefinition::getByName($clsName);
        $class->delete();
    }

    public function getJsPaths() {
        return [
            '/bundles/distributionhub/js/pimcore/startup.js',
            '/bundles/distributionhub/js/pimcore/mappingtoolbar.js',
            '/bundles/distributionhub/js/pimcore/dataconnector.js',
            '/bundles/distributionhub/js/pimcore/columnConfigDialog.js',
            '/bundles/distributionhub/js/pimcore/channelstoolbar.js',
            '/bundles/distributionhub/js/pimcore/channelspanel.js',
            '/bundles/distributionhub/js/pimcore/connector/channels/item.js',
            '/bundles/distributionhub/js/pimcore/connector/channels/panel.js',
            '/bundles/distributionhub/js/pimcore/connector/channels/helpers/grid.js',
            '/bundles/distributionhub/js/pimcore/connector/mapping/item.js',
            '/bundles/distributionhub/js/pimcore/connector/mapping/panel.js',
        ];
    }

    public function getCssPaths() {
        return array(
            '/bundles/distributionhub/css/example.css',
        );
    }

    public function getConfig() {

        $path = PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/plugin.xml";
        $obj = new \Symfony\Component\Serializer\Encoder\XmlEncoder();
        $data = $obj->decode(file_get_contents($path), 'XML');
        return $data['plugin'];
    }

}
