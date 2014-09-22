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

class WhoopsProvider implements ServiceProviderInterface
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
		if (!FULOWER_DEBUG)
		{
			return;
		}

		$whoops = new \Whoops\Run;
		$handler = new \Whoops\Handler\PrettyPageHandler;

		$whoops->pushHandler($handler);
		$whoops->register();

		$container->share('whoops', $whoops);
		$container->share('whoops.handler', $handler);
	}
}
 