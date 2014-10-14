<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Provider;

use Flower\Sunflower\Action;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * The ActionProvider class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class ActionProvider implements ServiceProviderInterface
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
		$container->get('config')->set('where', 'Taipei');

		$container->share(
			'sunflower.action',
			function($container)
			{
				$action = new Action($container->get('config'));

				return $action;
			}
		);
	}
}
 