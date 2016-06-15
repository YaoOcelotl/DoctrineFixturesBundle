<?php
namespace Doctrine\Bundle\FixturesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
/**
 * 
 * @author Denumeris, Jun 15, 2016
 * @author Charles J. C. Elling, Jun 15, 2016
 *
 */
class DoctrineFixturesExtension extends Extension{
	
	/**
	 * {@inheritdoc}
	 */
	public function load(array $configs, ContainerBuilder $container)
	{
		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);
	
		$container->setParameter('doctrine.data-fixtures.orm.excluded', $config['orm']['excluded']);
		/*
		$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
		$loader->load('services.yml');
		*/
	}
}