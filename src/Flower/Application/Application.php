<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Application;

use Flower\Provider\ActionProvider;
use Flower\Provider\ApplicationProvider;
use Flower\Provider\ConfigProvider;
use Flower\Provider\DatabaseProvider;
use Flower\Provider\RouterProvider;
use Flower\Provider\SessionProvider;
use Flower\Provider\WhoopsProvider;
use Joomla\Application\AbstractWebApplication;
use Joomla\Application\Web;
use Joomla\DI\Container;
use Joomla\Input\Input;
use Joomla\Registry\Registry;

/**
 * The Application class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class Application extends AbstractWebApplication
{
	/**
	 * Property container.
	 *
	 * @var  \Joomla\DI\Container
	 */
	public $container;

	/**
	 * Constructor.
	 *
	 * @param Input         $input
	 * @param Registry      $config
	 * @param Web\WebClient $client
	 */
	public function __construct(Input $input = null, Registry $config = null, Web\WebClient $client = null)
	{
		$this->container = new Container;

		// \Flower\Helper\Container::getContainer();

		parent::__construct($input, $config, $client);
	}

	/**
	 * initialise
	 *
	 * @return  void
	 */
	protected function initialise()
	{
		$this->container->registerServiceProvider(new ConfigProvider($this->config));

		define('FLOWER_DEBUG', $this->get('system.debug'));

		$this->container
			->registerServiceProvider(new WhoopsProvider)
			->registerServiceProvider(new ApplicationProvider($this))
			->registerServiceProvider(new ActionProvider)
			->registerServiceProvider(new RouterProvider)
			->registerServiceProvider(new SessionProvider)
			->registerServiceProvider(new DatabaseProvider);
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
		/** @var \Windwalker\Controller\Controller $controller */
		$controller = $this->getController();

		$controller
			->setContainer($this->container)
			->setApplication($this)
			->execute();

		return;
	}

	public function getController()
	{
		/** @var $router \Joomla\Router\RestRouter */
		$router = $this->container->get('router');

		$router->setDefaultController('Sakura\\');

		$router->setControllerPrefix('Flower\\Controller\\');

		$route = $this->get('uri.route');

		$route = str_replace('index.php', '', $route);

		return $router->getController($route);
	}
}
 