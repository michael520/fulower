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

/**
 * The WhoopsProvider class.
 * 
 * @since  {DEPLOY_VERSION}
 */
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
		if (! FLOWER_DEBUG)
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
 