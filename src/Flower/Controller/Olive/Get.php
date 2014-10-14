<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Controller\Olive;

use Flower\Model\OliveModel;
use Flower\View\Olive\HtmlView;
use Windwalker\Controller\Controller;
use Windwalker\Renderer\PhpRenderer;

/**
 * The DisplayController class.
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
		$model = new OliveModel($this->container->get('db'));

		$item = $model->getItem();

		$view = new HtmlView(array('item' => $item), new PhpRenderer);

		echo $view->setLayout('default')->render();

		return true;
	}
}
 