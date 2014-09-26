<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Sunflower;

use Joomla\Registry\Registry;

class Action
{
	public $config;

	protected $hour;

	/**
	 * @param Registry|array $config
	 */
	public function __construct(Registry $config = null)
	{
		$this->config = $config instanceof Registry ? $config : new Registry($config);
	}

	/**
	 * getConfig
	 *
	 * @return  Registry
	 */
	public function getConfig()
	{
		return $this->config;
	}

	/**
	 * setConfig
	 *
	 * @param   Registry $config
	 *
	 * @return  Action  Return self to support chaining.
	 */
	public function setConfig($config)
	{
		$this->config = $config;

		return $this;
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
		return 'hello!!';
	}

	/**
	 * count
	 *
	 * @param $int
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

	public function sleep()
	{
		$this->hour = 8;

		$this->config->set('hour' ,8);
	}
}
 