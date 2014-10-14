<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Controller\Olive;

use Joomla\Controller\AbstractController;

/**
 * The DisplayController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class Update extends AbstractController
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

		echo 'Olive Update.';

		echo sprintf(' ID: %s', $input->getInt('id'));
	}
}
 