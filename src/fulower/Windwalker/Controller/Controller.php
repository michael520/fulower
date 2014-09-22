<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Windwalker\Controller;


use Joomla\Application;
use Joomla\Controller\AbstractController;
use Joomla\DI\Container;
use Joomla\DI\ContainerAwareInterface;
use Joomla\Input\Input;

abstract class Controller extends AbstractController implements ContainerAwareInterface
{
	/**
	 * Property container.
	 *
	 * @var  Container
	 */
	protected $container;

	/**
	 * Property input.
	 *
	 * @var Input
	 */
	public $input;

	/**
	 * Property app.
	 *
	 * @var Application\AbstractApplication
	 */
	public $app;

	public function __construct(Input $input = null, Application\AbstractApplication $app = null,Container $container = null)
	{
		$this->container = $container? : new Container;

		parent::__construct($input, $app);
	}

	/**
	 * Get the DI container.
	 *
	 * @return  Container
	 *
	 * @since   1.0
	 *
	 * @throws  \UnexpectedValueException May be thrown if the container has not been set.
	 */
	public function getContainer()
	{
		return $this->container;
	}

	/**
	 * Set the DI container.
	 *
	 * @param   Container $container The DI container.
	 *
	 * @return  mixed
	 *
	 * @since   1.0
	 */
	public function setContainer(Container $container)
	{
		$this->container = $container;

		return $this;
	}

	/**
	 * redirect
	 *
	 * @param string $url
	 * @param string $msg
	 * @param string $type
	 *
	 * @return  void
	 */
	public function redirect($url, $msg = '', $type = 'message')
	{
		$this->app->redirect($url);
	}
}
 