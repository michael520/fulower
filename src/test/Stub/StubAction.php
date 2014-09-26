<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace test\Stub;


use Fulower\Sunflower\Action;

/**
 * Class StubAction
 *
 * @since 1.0
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
		return $this->time = parent::time();
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
 