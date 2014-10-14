<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Controller\Flowers;

use Flower\Model\FlowerModel;
use Flower\View\Flowers\HtmlView;
use Windwalker\Controller\Controller;

/**
 * The Get class.
 * 
 * @since  {DEPLOY_VERSION}
 */
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
		$model = new FlowerModel($this->container->get('db'));
		$view = new HtmlView;

		$items = $model->getItems();

		$view->set('items', $items);

		$view->set('uri', $this->getApplication()->get('uri'));

		$session = $this->container->get('session');

		$flashes = $session->getFlashBag()->all();

		$view->set('flashes', $flashes);

		echo $view;

		return true;
	}
}
