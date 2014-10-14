<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Provider;

use Flower\Application\Application;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * The ApplicationProvider class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class ApplicationProvider implements ServiceProviderInterface
{
	/**
	 * Property app.
	 *
	 * @var  \Flower\Application\Application
	 */
	protected $app;

	/**
	 * Class init.
	 *
	 * @param Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
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
		$container->protect('app', $this->app);
		$container->protect('input', $this->app->input);
	}
}
 