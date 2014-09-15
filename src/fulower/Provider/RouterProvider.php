<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Provider;


use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Registry\Registry;
use Joomla\Router\Router;

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
		$closure = function($container)
		{
			$input = $container->get('app')->imput;

			$router = new Router($input);

			$maps = new Registry;
			$file = __DIR__ . '/../../../etc/routing.json';
			$maps->loadFile($file);

			$router->addMaps($maps->toArray());

			return $router;
		};

		$container->share('router' ,$closure);
	}
}
 