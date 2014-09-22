<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Controller\Olive;


use Fulower\Helper\Container;
use Fulower\Model\OliveModel;
use Fulower\View\Olive\HtmlView;
use Fulower\Windwalker\Controller\Controller;
use Joomla\Controller\AbstractController;
use Joomla\Model\AbstractModel;
use Windwalker\Renderer\PhpRenderer;

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

		$input = $this->getInput();

		echo '<p> Olive is here !!!!</p>';

		echo sprintf(' ID: %s', $input->getint('id'));

		echo sprintf(' Alias: %s', $input->get('alias'));

		$item = $model->getItem();

		$paths = new \SplPriorityQueue;

		$paths->insert(FULOWER_TEMPLATE . '/_global', 128);
		$paths->insert(FULOWER_TEMPLATE . '/olive', 256);

		$view = new HtmlView(array('item' => $item), new PhpRenderer($paths));

		echo $view->setLayout('default')->render();

		return true;
	}
}
 