<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Test\Stub;

use Flower\Sunflower\Action;

/**
 * The StubAction class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class StubAction extends Action
{
	protected $time;

	protected $go2;

	public function getTime()
	{
		return $this->time;
	}

	public function time()
	{
		return 123456;
	}

	public function go2()
	{
		$this->go2 = $this->config->get('where');
	}

	public function go2Echo()
	{
		ob_start();

		echo parent::go();

		$echo = ob_get_contents();

		ob_end_clean();

		return $echo;
	}
}
 