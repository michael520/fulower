<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace test;


use PHPHtmlParser\Dom;

class FulowerViewTest extends \PHPUnit_Framework_TestCase
{
	public function testFindPath()
	{
		try
		{
			$this->view->render();
		}
		catch (\Exception $e)
		{
			// No Action
		}

		$paths = $this->view->getPaths();

		$paths = iterator_to_array($paths);

		$this->assertEquals(FULOWER_ROOT, '/template/fulowers', array_shift($paths));
	}

	public function testRender()
	{
		$html = $this->view->render();

		$dom = new Dom();

		$dom->load($html);

		$table = $dom->find('table.table');

		$this->assertEquals(1, count($table));
	}
}
 