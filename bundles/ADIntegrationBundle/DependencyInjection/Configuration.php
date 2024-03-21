<?php

namespace ADIntegrationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('ad_integration');
        // $rootNode = $treeBuilder->root('sso_login');
        $rootNode = $treeBuilder->getRootNode('ad_integration');
        $this->addDefaultSPNode($rootNode);

        return $treeBuilder;
    }

    /**
     * This adds a service provider node the tree builder
     *
     * @param ArrayNodeDefinition $rootNode
     */
    private function addDefaultSPNode(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
            ->arrayNode('default_sp')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('entityID')->defaultValue('')->end()
            ->scalarNode('NameIDFormat')->defaultValue('')->end()
            ->scalarNode('replyURL')->defaultValue('')->end()
            ->scalarNode('baseURLPath')->defaultValue('/')->end()
            ->scalarNode('defaultRole')->defaultValue('')->end()
            ->end()
            ->end()
            ->end();
    }
}
