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
use Windwalker\DataMapper\Adapter\DatabaseAdapter;
use Windwalker\DataMapper\Adapter\WindwalkerAdapter;

class DataBaseProvider implements ServiceProviderInterface
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
			$options = array(
				'driver' => 'mysql',
				'host' => '127.0.0.1',
				'user' => 'root',
				'password' => 'mysql',
				'database' => 'fulower_db',
				'prefix' => 'ww_'
			);

			$db = \Windwalker\Database\DatabaseFactory::getDbo('mysql', $options);

			DatabaseAdapter::setInstance(new WindwalkerAdapter($db));

			$db->select('fulower_db');

			return $db;
		};

		$container->share('db', $closure);
	}
}
 