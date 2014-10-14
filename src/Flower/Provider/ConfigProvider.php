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

/**
 * The ConfigProvider class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class ConfigProvider implements ServiceProviderInterface
{
	protected $config;

	public function __construct(Registry $config)
	{
		$this->config = $config;
	}

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
		$file = FLOWER_ETC . '/config.json';

		if (!is_file($file))
		{
			echo 'Please copy etc/config.dist.json to etc/config.json.';

			die;
		}

		$this->config->loadFile($file);

		$container->share('config', $this->config);
	}
}
 