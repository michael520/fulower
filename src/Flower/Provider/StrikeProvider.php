<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Provider;

use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Strike\Router;

/**
 * The StrikeProvider class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class StrikeProvider implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container $container The DI container.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function register(Container $container)
	{
		$closure = function($container)
		{
			$router = new Router;

			$router->add(
				'/sakura/{id}/{alias}',
				array(
					'id' => 'olive',
					'methods' => array('GET'),
					'extra' => array(
						'controller' => 'Flower\\Controller\\Sakura\\Get',
						'action' => 'execute'
					),
					'requirements' => array('id' => '\d+')
				)
			);

			$router->add(
				'/flower/olive/{id}',
				array(
					'defaults' => array('id' => 100),
					'extra' => array(
						'controller' => 'Flower\\Controller\\Olive\\Get',
						'action' => 'execute'
					),
				)
			);

			return $router;
		};

		$container->share('router', $closure);
	}
}
 