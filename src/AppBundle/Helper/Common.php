<?php

namespace AppBundle\Helper;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;

class Common
{
    public $config;
    public function loadConfig($file="commands.yml")
    {
        $this->config = new ContainerBuilder();
        $loader = new Loader\YamlFileLoader($this->config, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load($file);        
        return $this->config;
    }

    public function getParameter($key) {
        return $this->config->getParameter($key);        
    }

    public function getInstance($service) {
        return \Pimcore::getContainer()->get($service);
    }

    public function getParameterItem($key, $item) {
        return $this->config->getParameter($key)[$item];
    }
}
