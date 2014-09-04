<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

include_once __DIR__ . '/../vendor/autoload.php';

class MyConsole extends \Joomla\Application\AbstractCliApplication
{

	/**
	 * Method to run the application routines.  Most likely you will want to instantiate a controller
	 * and execute it, or perform some sort of task directly.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function doExecute()
	{
		// TODO: Implement doExecute() method.
		$answer = $this->out('What is your name? :', false)->in();

		$this->out($answer);
	}
}

$console = new MyConsole;

$console->execute();
