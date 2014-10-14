<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Controller;

use Joomla\Application;
use Joomla\Controller\AbstractController;
use Joomla\DI\Container;
use Joomla\DI\ContainerAwareInterface;
use Joomla\Input\Input;

/**
 * The Controller class.
 * 
 * @since  {DEPLOY_VERSION}
 */
abstract class Controller extends AbstractController implements ContainerAwareInterface
{
	/**
	 * Property container.
	 *
	 * @var Container
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
	 * @var Application\AbstractWebApplication
	 */
	public $app;

	/**
	 * Class init.
	 *
	 * @param Input                           $input
	 * @param Application\AbstractApplication $app
	 * @param Container                       $container
	 */
	public function __construct(Input $input = null, Application\AbstractApplication $app = null, Container $container = null)
	{
		$this->container = $container ? : new Container;

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
	 * @return  static
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
	public function redirect($url, $msg = '', $type = 'info')
	{
		$this->addFlash($msg, $type);

		$this->getApplication()->redirect($url);
	}

	/**
	 * addFlash
	 *
	 * @param string $msg
	 * @param string $type
	 *
	 * @return  void
	 */
	public function addFlash($msg, $type = 'info')
	{
		/** @var \Symfony\Component\HttpFoundation\Session\Session $session */
		$session = $this->container->get('session');

		$session->getFlashBag()->add($type, $msg);
	}
}
