<?php
namespace Doctrine\Bundle\FixturesBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * 
 * @author Denumeris, Jun 15, 2016
 * @author Charles J. C. Elling, Jun 15, 2016
 *
 */
class Configuration implements ConfigurationInterface{
	/**
	 * {@inheritdoc}
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('data_fixtures','array');
		$rootNode
		->addDefaultChildrenIfNoneSet()
		->children()
			->arrayNode('orm')
				->addDefaultChildrenIfNoneSet()
				->children()
					->arrayNode('excluded')
						->treatNullLike(array())
						->defaultValue(array())
						->prototype('scalar')->end()
					->end()
				->end()
			->end()
		->end();
	
		// Here you should define the parameters that are allowed to
		// configure your bundle. See the documentation linked above for
		// more information on that topic.
	
		return $treeBuilder;
	}
}