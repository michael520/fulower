<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Controller\Fulowers;

use Fulower\Model\FulowerModel;
use Fulower\View\Fulowers\HtmlView;
use Fulower\Windwalker\Controller\Controller;

class Get extends Controller
{

	/**
	 * Execute the controller.
	 *
	 * @return  boolean  True if controller finished execution, false if the controller did not
	 *                   finish execution. A controller might return false if some precondition for
	 *                   the controller to run has not been satisfied.
	 *
	 * @since   1.0
	 * @throws  \LogicException
	 * @throws  \RuntimeException
	 */
	public function execute()
	{
		$model = new FulowerModel($this->container->get('db'));
		$view = new HtmlView();

		$items = $model->getItems();

		$view->set('items', $items);

		$view->set('uri', $this->getApplication()->get('uri'));

		$session = $this->container->get('session');

		$flashs = '';

		echo $view;

		return true;
	}
}
 