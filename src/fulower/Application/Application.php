<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Application;

use Fulower\Provider\ActionProvider;
use Fulower\Provider\ApplicationProvider;
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
		$this->loadConfig();

		define('FULOWER_DEBUG', $this->get('system.debug'));

		if(FULOWER_DEBUG)
		{
			$this->container->registerServiceProvider(new WhoopsProvider);
		}

		$this->container->share('config', $this->config);

		$this->container->registerServiceProvider(new ActionProvider);

		$this->container->registerServiceProvider(new ApplicationProvider($this))
			->registerServiceProvider(new ActionProvider());

	}

	protected function loadConfig()
	{
		$file = __DIR__ . '/../../../etc/config.json';
		$this->config->loadFile($file);
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
		echo $action->go();

		$config = $this->container->get('config');
		echo $config;
	}
}
 