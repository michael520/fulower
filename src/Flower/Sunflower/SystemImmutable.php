<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Sunflower;

/**
 * The SystemImmutable class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class SystemImmutable
{
	private $os = 'mac';

	private $browser = 'Chrome';

	private $path = '';

	public function get($name)
	{
		return $this->$name;
	}
}
 