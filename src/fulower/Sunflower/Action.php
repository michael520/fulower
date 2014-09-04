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

	public function __construct(Registry $config = null)
	{
		$this->config = $config ? : new Registry;
	}

	public function go()
	{
		return $this->config->get('where');
	}
}
 