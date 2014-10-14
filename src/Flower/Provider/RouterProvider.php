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
use Joomla\Registry\Registry;
use Joomla\Router\RestRouter;
use Joomla\Router\Router;

/**
 * The RouterProvider class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class RouterProvider implements ServiceProviderInterface
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
		/**
		 * Raise router.
		 *
		 * @param Container $container
		 *
		 * @return  Router
		 */
		$closure = function($container)
		{
			$input = $container->get('app')->input;

			$router = new RestRouter($input);

			$router->setMethodInPostRequest(true);

			$maps = new Registry;
			$maps->loadFile(FLOWER_ETC . '/routing.json');

			$router->addMaps($maps->toArray());

			return $router;
		};

		$container->share('router', $closure);
	}
}
 