<?php

namespace DistributionHubBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

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
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('distribution_hub');
        $rootNode = $treeBuilder->getRootNode();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $rootNode
            ->children()
                ->arrayNode('field_definition_adapters')
                    ->info("Add mapping between data object type and service implementation for field definition adapter")
                    ->useAttributeAsKey('name')
                        ->prototype('scalar')
                    ->end()
                ->end()
                ->arrayNode('core_fields_configuration')
                    ->useAttributeAsKey('field')
                        ->prototype('scalar')
                    ->end()
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('type')
                                ->isRequired()
                            ->end()
                            ->scalarNode('title')
                                ->isRequired()
                            ->end()
                            ->scalarNode('fieldDefinition')->end()
                            ->arrayNode('values')
                                ->children()
                                    ->arrayNode('options')
                                        ->arrayPrototype()
                                            ->children()
                                                ->scalarNode('key')
                                                    ->isRequired()
                                                ->end()
                                                ->scalarNode('value')
                                                    ->isRequired()
                                                ->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
