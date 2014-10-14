<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Test;

use Flower\View\Flowers\HtmlView;
use PHPHtmlParser\Dom;

/**
 * The FlowersViewTest class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class FlowersViewTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Property view.
	 *
	 * @var HtmlView
	 */
	protected $view;

	/**
	 * setUp
	 *
	 * @return  void
	 */
	public function setUp()
	{
		$this->view = new HtmlView;
	}

	/**
	 * testFindPath
	 *
	 * @return  void
	 */
	public function testFindPath()
	{
		try
		{
			$this->view->render();
		}
		catch (\Exception $e)
		{
			// No action
		}

		$paths = $this->view->getPaths();

		$paths = iterator_to_array($paths);

		$this->assertEquals(FLOWER_ROOT . '/template/flowers', array_shift($paths));
	}

	/**
	 * testRender
	 *
	 * @return  void
	 */
	public function testRender()
	{
		$html = $this->view->render();

		$dom = new Dom;

		$dom->load($html);

		$table = $dom->find('table.table');

		// Table exists
		$this->assertEquals(1, count($table));

		// H1 exists
		$h1 = $dom->find('h1.page-header');

		$this->assertEquals('Flowers', trim($h1[0]->text));

		// Toolbar exists
		$this->assertEquals(1, count($dom->find('.toolbar')));

		// Yes we can extends the global/html tmpl
		$this->assertEquals(1, count($dom->find('html body')));
	}
}
 