<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\View\Fulower;

use Fulower\Windwalker\View\HtmlView as WindwalkerHtmlView;

class HtmlView extends WindwalkerHtmlView
{

	/**
	 * Method to render the view.
	 *
	 * @return  string  The rendered view.
	 *
	 * @since   1.0
	 * @throws  \RuntimeException
	 */
	public function render()
	{
		$this->paths = new \SplPriorityQueue;

		$this->paths->insert(FULOWER_TEMPLATE . '/_global', 128);
		$this->paths->insert(FULOWER_TEMPLATE . '/fulower', 256);

		$this->renderer->setPaths($this->paths);

		return parent::render();
	}
}
 