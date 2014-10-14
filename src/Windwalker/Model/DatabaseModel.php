<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Model;

use Joomla\Model\AbstractModel;
use Joomla\Registry\Registry;
use Windwalker\Database\Driver\DatabaseDriver;

/**
 * The DatabaseModel class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class DatabaseModel extends AbstractModel
{
	/**
	 * Property db.
	 *
	 * @var  Registry
	 */
	protected $db;

	/**
	 * Class init.
	 *
	 * @param DatabaseDriver $db
	 * @param Registry       $state
	 */
	public function __construct($db = null, Registry $state = null)
	{
		$this->db = $db;

		parent::__construct($state);
	}

	/**
	 * Method to get property Db
	 *
	 * @return  Registry
	 */
	public function getDb()
	{
		return $this->db;
	}

	/**
	 * Method to set property db
	 *
	 * @param   Registry $db
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setDb($db)
	{
		$this->db = $db;

		return $this;
	}
}
