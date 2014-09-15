<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Controller\Olive;


use Joomla\Controller\AbstractController;

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

		echo '<p> Olive is Update !!!!</p>';

		echo sprintf(' ID: %s', $input->getint('id'));

		echo sprintf(' Alias: %s', $input->get('alias'));
	}
}
 