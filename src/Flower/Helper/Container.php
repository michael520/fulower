<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Helper;

/**
 * The Container class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class Container
{
	protected static $instance;

	public static function __callStatic($name, $args)
	{
		$container = static::getContainer();

		return call_user_func_array(array($container, $name), $args);
	}

	public static function getContainer()
	{
		if (!static::$instance)
		{
			static::$instance = new \Joomla\DI\Container;
		}

		return static::$instance;
	}

	public static function setContainer($container)
	{
		static::$instance = $container;
	}
}
 