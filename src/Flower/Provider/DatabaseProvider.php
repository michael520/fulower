<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Provider;

use Joomla\Database\DatabaseFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Session\Tests\Storage\WincacheTest;
use Windwalker\DataMapper\Adapter\DatabaseAdapter;
use Windwalker\DataMapper\Adapter\WindwalkerAdapter;

/**
 * The DatabaseProvider class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class DatabaseProvider implements ServiceProviderInterface
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
				'driver'   => 'mysql',
				'host'     => 'localhost',
				'user'     => 'root',
				'password' => '1234',
				'name'     => 'flower',
				'prefix'   => 'ww_'
			);

			$db = \Windwalker\Database\DatabaseFactory::getDbo('mysql', $options);

			// For DataMapper
			DatabaseAdapter::setInstance(new WindwalkerAdapter($db));

			// Fix a little bug that not auto select db.
			$db->select('flower');

			return $db;
		};

		$container->share('db', $closure);
	}
}
 