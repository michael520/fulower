<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Sunflower;

use Joomla\Input\Input;
use Joomla\Registry\Registry;

/**
 * The Action class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class Action
{
	/**
	 * Property config.
	 *
	 * @var  \Joomla\Registry\Registry
	 */
	protected $config;

	/**
	 * Property hour.
	 *
	 * @var int
	 */
	protected $hour;

	/**
	 * Property input.
	 *
	 * @var  SystemImmutable
	 */
	protected $input;

	/**
	 * Class init.
	 *
	 * @param Registry|array $config
	 */
	public function __construct($config = null, SystemImmutable $input = null)
	{
		$this->config = $config instanceof Registry ? $config : new Registry($config);
		$this->input = $input;
	}

	public function getRequest($name)
	{
		return $this->input->get($name);
	}

	/**
	 * go
	 *
	 * @return  mixed
	 */
	public function go()
	{
		return $this->config->get('where');
	}

	/**
	 * run
	 *
	 * @return  string
	 */
	public function run()
	{
		return 'Police come~~~!!!';
	}

	/**
	 * Method to get property Config
	 *
	 * @return  Registry
	 */
	public function getConfig()
	{
		return $this->config;
	}

	/**
	 * Method to set property config
	 *
	 * @param   Registry $config
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setConfig($config)
	{
		// $this->config = $config;

		// return $this;
	}

	/**
	 * count
	 *
	 * @param int $int
	 *
	 * @return  int
	 */
	public function count($int)
	{
		return $int % 3;
	}

	/**
	 * time
	 *
	 * @return  integer
	 */
	public function time()
	{
		return microtime();
	}

	/**
	 * go2
	 *
	 * @return  void
	 */
	public function go2()
	{
		echo $this->config->get('where');
	}

	/**
	 * sleep
	 *
	 * @return  void
	 */
	public function sleep()
	{
		$this->hour = 8;

		$this->config->set('hour', 8);
	}
}
 