<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Model;

use Fulower\Helper\Container;
use Fulower\Windwalker\Model\DatabaseModel;
use Joomla\Model\AbstractDatabaseModel;
use Joomla\Model\AbstractModel;
use Windwalker\DataMapper\DataMapper;

class OliveModel extends DatabaseModel
{
	public function getItem()
	{
		return (new DataMapper('ww_flower'))->findOne(1);
	}
}
 