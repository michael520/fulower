<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Controller\Flower;

use Flower\Model\FlowerModel;
use Windwalker\Controller\Controller;

/**
 * The DisplayController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class Create extends Controller
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
		$input = $this->getInput();

		$data = $input->getVar('windwalker');

		$model = new FlowerModel($this->container->get('db'));

		$data = $model->save($data);

		if (!$data->id)
		{
			throw new \Exception('Save fail');
		}

		$this->redirect($this->getApplication()->get('uri')->base->path . 'flowers', 'Save Success', 'success');

		return true;
	}
}
 