<?php

include_once __DIR__ . '/../vendor/autoload.php';

Michael\Yoo::yoo();

define('FULOWER_WWW',      __DIR__);
define('FULOWER_ROOT',     realpath(__DIR__ . '/../'));
define('FULOWER_ETC',      FULOWER_ROOT . '/etc');
define('FULOWER_SRC',      FULOWER_ROOT . '/src');
define('FULOWER_VENDOR',   FULOWER_ROOT . '/vendor');
define('FULOWER_TEMPLATE', FULOWER_ROOT . '/template');

define('JPATH_ROOT', __DIR__);

(new \Fulower\Application\Application)->execute();
