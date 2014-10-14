<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Windwalker\DataMapper\Adapter\DatabaseAdapter;
use Windwalker\DataMapper\Adapter\WindwalkerAdapter;

include_once __DIR__ . '/../vendor/autoload.php';

define('FLOWER_WWW',      __DIR__);
define('FLOWER_ROOT',     realpath(__DIR__ . '/../'));
define('FLOWER_ETC',      FLOWER_ROOT . '/etc');
define('FLOWER_SRC',      FLOWER_ROOT . '/src');
define('FLOWER_VENDOR',   FLOWER_ROOT . '/vendor');
define('FLOWER_TEMPLATE', FLOWER_ROOT . '/template');

define('JPATH_ROOT', FLOWER_ROOT);

$options = array(
	'driver'   => 'mysql',
	'host'     => 'localhost',
	'user'     => 'root',
	'password' => '1234',
	'database' => 'flower',
	'prefix'   => 'ww_'
);

$db = \Windwalker\Database\DatabaseFactory::getDbo('mysql', $options);

// For DataMapper
DatabaseAdapter::setInstance(new WindwalkerAdapter($db));
