<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\View\Flower;

/**
 * The HtmlView class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class HtmlView extends \Windwalker\View\HtmlView
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
		// Paths
		$this->paths = new \SplPriorityQueue;

		$this->paths->insert(FLOWER_TEMPLATE . '/_global', 128);
		$this->paths->insert(FLOWER_TEMPLATE . '/flower', 256);

		return parent::render();
	}
}
 