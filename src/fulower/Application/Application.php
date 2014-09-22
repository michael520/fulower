<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Application;

use Fulower\Controller\Sakura\DisplayController;
use Fulower\Provider\ActionProvider;
use Fulower\Provider\ApplicationProvider;
use Fulower\Provider\ConfigProvider;
use Fulower\Provider\DataBaseProvider;
use Fulower\Provider\RouterProvider;
use Fulower\Provider\WhoopsProvider;
use Fulower\Sunflower\Action;
use Joomla\Application\AbstractApplication;
use Joomla\Application\AbstractWebApplication;
use Joomla\Application\Web;
use Joomla\DI\Container;
use Joomla\Input\Input;
use Joomla\Registry\Registry;

class Application extends AbstractWebApplication
{
	/**
	 * Property container.
	 *
	 * @var  \Joomla\DI\Container
	 */
	public $container;

	public function __construct(Input $input = null, Registry $config = null, Web\WebClient $client = null)
	{
		$this->container = new Container;

		parent::__construct($input, $config, $client);
	}

	protected function initialise()
	{
		$this->container->registerServiceProvider(new ConfigProvider($this->config));

		define('FULOWER_DEBUG', $this->get('system.debug'));

		$this->container
			->registerServiceProvider(new WhoopsProvider)
			->registerServiceProvider(new ApplicationProvider($this))
			->registerServiceProvider(new ActionProvider)
			->registerServiceProvider(new RouterProvider)
			->registerServiceProvider(new DataBaseProvider);

	}

	/**
	 * Method to run the application routines.  Most likely you will want to instantiate a controller
	 * and execute it, or perform some sort of task directly.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function doExecute()
	{
		$action = $this->container->get('sunflower.action');

		$config = $this->container->get('config');

		$controller = $this->getController();

		$controller
			->setContainer($this->container)
			->setApplication($this)
			->execute();

		return;
	}

	public function getController()
	{
		$router = $this->container->get('router');

		$route = $this->get('uri.route');

		$route = str_replace('index.php/', '', $route);

		return $router->getController($route);
	}
}
 