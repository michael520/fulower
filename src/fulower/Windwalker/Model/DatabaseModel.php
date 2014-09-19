<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Windwalker\Model;


use Joomla\Model\AbstractModel;
use Joomla\Registry\Registry;

class DatabaseModel extends AbstractModel
{
	protected $db;

	public function __construct($db, Registry $state = null)
	{
		$this->db = $db;

		parent::__construct($state);
	}

	/**
	 * getDb
	 *
	 * @return  mixed
	 */
	public function getDb()
	{
		return $this->db;
	}

	/**
	 * setDb
	 *
	 * @param   mixed $db
	 *
	 * @return  DatabaseModel  Return self to support chaining.
	 */
	public function setDb($db)
	{
		$this->db = $db;

		return $this;
	}

}
 