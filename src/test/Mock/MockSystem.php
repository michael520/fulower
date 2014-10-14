<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Test\Mock;

use Flower\Sunflower\SystemImmutable;

/**
 * The MockSystem class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class MockSystem extends SystemImmutable
{
	public function get($name)
	{
		return 'YA';
	}
}
 