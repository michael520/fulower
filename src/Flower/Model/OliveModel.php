<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Model;

use Windwalker\DataMapper\DataMapper;
use Windwalker\Model\DatabaseModel;

/**
 * The OliveModel class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class OliveModel extends DatabaseModel
{
	public function getItem()
	{
		return (new DataMapper('ww_flower'))->findOne(1);
	}
}
