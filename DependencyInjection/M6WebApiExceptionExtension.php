<?php

namespace Prokl\ApiExceptionBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Prokl\ApiExceptionBundle\Manager\ExceptionManager;
use Prokl\ApiExceptionBundle\EventListener\ExceptionListener;

/**
 * This is the class that loads and manages your bundle configuration
 */
class M6WebApiExceptionExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) : void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->loadExceptionManager($container, $config);
        $this->loadExceptionListener($container, $config);
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function getAlias()
    {
        return 'm6web_api_exception';
    }

    /**
     * Load service exception manager
     *
     * @param ContainerBuilder $container
     * @param array            $config
     */
    protected function loadExceptionManager(ContainerBuilder $container, array $config): void
    {
        $definition = new Definition(
            ExceptionManager::class,
            [
                $config['default'],
                $config['exceptions'],
            ]
        );
        $definition->setPublic(true);

        $container->setDefinition($this->getAlias().'.manager.exception', $definition);
    }

    /**
     * Load service exception listener
     *
     * @param ContainerBuilder $container
     * @param array            $config
     */
    protected function loadExceptionListener(ContainerBuilder $container, array $config): void
    {
        $definition = new Definition(
            ExceptionListener::class,
            [
                new Reference($this->getAlias().'.manager.exception'),
                $config['match_all'],
                $config['default'],
                $config['stack_trace'],
            ]
        );

        $definition->setPublic(true);

        $definition->addTag(
            'kernel.event_listener',
            [
                'event' => 'kernel.exception',
                'method' => 'onKernelException',
                'priority' => '-100' // as the setResponse stop the exception propagation,
                // this listener has to pass in last position
            ]
        );

        $container->setDefinition($this->getAlias().'.listener.exception', $definition);
    }
}
