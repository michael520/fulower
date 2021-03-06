<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

include_once __DIR__ . '/../vendor/autoload.php';

define('FLOWER_WWW',      __DIR__);
define('FLOWER_ROOT',     realpath(__DIR__ . '/../'));
define('FLOWER_ETC',      FLOWER_ROOT . '/etc');
define('FLOWER_SRC',      FLOWER_ROOT . '/src');
define('FLOWER_VENDOR',   FLOWER_ROOT . '/vendor');
define('FLOWER_TEMPLATE', FLOWER_ROOT . '/template');

define('JPATH_ROOT', FLOWER_ROOT);

(new \Flower\Application\Application)->execute();
