<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Controller\Fulower;

use Fulower\Model\FulowerModel;
use Fulower\View\Fulower\HtmlView;
use Fulower\Windwalker\Controller\Controller;
use Windwalker\Form\Form;

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
		$view = new HtmlView();
		$model = new FulowerModel;
		$form = $model->getForm();

		$view->set('uri', $this->getApplication()->get('uri'));

		$view->set('form', $form);

		echo $view;

		return true;
	}
}
 