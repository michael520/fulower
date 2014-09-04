<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Provider;


use Fulower\Sunflower\Action;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

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
		// TODO: Implement register() method.

		$container->get('config')->set('where', 'Taipei');

		$container->share(
		'sunflower.action',
		function($container)
		{
			return new Action($container->get('config'));
		});
	}
}
 