<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace test;

use Fulower\Model\FulowerModel;

class FulowerModelTest extends \PHPUnit_Framework_TestCase
{
	protected $model;

	public function setUp()
	{
		$this->model = new FulowerModel();
	}

	public function tearDown()
	{
		$this->model = null;
	}

	public function testGetItem()
	{
		$item = $this->model->getItem(1);

		$this->assertInstanceOf('Windwalker\Data\Data', $item);

		$this->assertFalse($item->isNull());

		$this->assertEquals('Alstroemeria', $item->title);
	}

	public function testGetItemFromState()
	{
		$this->model->getState()->set('item.id', 2);

		$item = $this->model->getItem();

		$this->assertEquals('Amaryllis', $item->title);
	}

	public function testGetItems()
	{
		$state = $this->model->getState();

		$items = $this->model->getItems();

		$this->assertEquals(10, count($items));
		$this->assertEquals(1, $items[0]->id);

		$items = $this->model->getItems();

		$state->set('list.limit', 20);
		$state->set('list.start', 50);

		$items = $this->model->getItems();

		$this->assertEquals(20, count($items));
	}
}
 