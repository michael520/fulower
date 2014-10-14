<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

include_once realpath(__DIR__ . '/../../') . '/vendor/autoload.php';

define('FULOWER_WWW',      __DIR__);
define('FULOWER_ROOT',     realpath(__DIR__ . '/../'));
define('FULOWER_ETC',      FULOWER_ROOT . '/etc');
define('FULOWER_SRC',      FULOWER_ROOT . '/src');
define('FULOWER_VENDOR',   FULOWER_ROOT . '/vendor');
define('FULOWER_TEMPLATE', FULOWER_ROOT . '/template');

define('JPATH_ROOT', __DIR__);

$options = array(
	'driver' => 'mysql',
	'host' => '127.0.0.1',
	'user' => 'root',
	'password' => 'mysql',
	'database' => 'fulower_db',
	'prefix' => 'ww_'
);

$db = \Windwalker\Database\DatabaseFactory::getDbo('mysql', $options);

\Windwalker\DataMapper\Adapter\DatabaseAdapter::setInstance(new \Windwalker\DataMapper\Adapter\WindwalkerAdapter());

