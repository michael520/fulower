<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\View\Olive;

class HtmlView extends \Joomla\View\AbstractView
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
		$item = $this->model->getItem();

		echo '<pre>';
		print_r($item);
		echo '</pre>';

		return 'olive view !!!!';
	}
}
 