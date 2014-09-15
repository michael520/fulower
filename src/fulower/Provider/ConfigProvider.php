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

class ConfigProvider implements ServiceProviderInterface
{
	protected $config;

	function __construct(Registry $config)
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
		$file = __DIR__ . '/../../../etc/config.json';

		if (!is_file($file))
		{
			echo 'no config';

			die;
		}

		$this->config->loadFile($file);

		$container->share('config', $this->config);
	}

}
 