<?php

namespace Nbobtc\Bundle\BitcoindBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bitcoind');

        $rootNode->children()
            ->scalarNode('schema')
                ->defaultValue('https')
                ->info('schema used to connect to bitcoind')
                ->validate()
                    ->ifNotInArray(array('http', 'https'))
                    ->thenInvalid('Must be http or https')
                ->end()
            ->end()
            ->scalarNode('username')
                ->info('username used to connect to bitcoind')
            ->end()
            ->scalarNode('password')
                ->info('')
            ->end()
            ->scalarNode('host')
                ->defaultValue('127.0.0.1')
                ->info('')
            ->end()
            ->scalarNode('port')
                ->defaultValue(8332)
                ->info('')
            ->end()
        ;

        return $treeBuilder;
    }
}
