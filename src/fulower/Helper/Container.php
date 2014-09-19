<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Helper;


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
 