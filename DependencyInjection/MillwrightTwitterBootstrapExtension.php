<?php
namespace Millwright\TwitterBootstrapBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class MillwrightTwitterBootstrapExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $yamlloader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $yamlloader->load('form/extensions.yml');
        $yamlloader->load('twig.yml');
        $yamlloader->load('menu.yml');

        if (isset($config['form'])) {
            foreach ($config['form'] as $key => $value) {
                if (is_array($value)) {
                    foreach ($config['form'][$key] as $subkey => $subvalue) {
                        $container->setParameter(
                            'millwright_bootstrap.form.' . $key . '.' . $subkey,
                            $subvalue
                        );
                    }
                } else {
                    $container->setParameter(
                        'millwright_bootstrap.form.' . $key,
                        $value
                    );
                }
            }
        }
    }
}
