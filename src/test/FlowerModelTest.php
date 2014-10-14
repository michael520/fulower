<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Test;

use Flower\Model\FlowerModel;
use Windwalker\Database\DatabaseFactory;
use Windwalker\Database\Driver\DatabaseDriver;

/**
 * The FlowerModelTest class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class FlowerModelTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Property model.
	 *
	 * @var FlowerModel
	 */
	protected $model;

	/**
	 * Property db.
	 *
	 * @var DatabaseDriver
	 */
	protected static $db;

	/**
	 * setUpBeforeClass
	 *
	 * @return  void
	 */
	public static function setUpBeforeClass()
	{
		static::$db = DatabaseFactory::getDbo();
	}

	/**
	 * setUp
	 *
	 * @return  void
	 */
	public function setUp()
	{
		$this->model = new FlowerModel;
	}

	/**
	 * tearDown
	 *
	 * @return  void
	 */
	public function tearDown()
	{
		$this->model = null;
	}

	/**
	 * testGetItem
	 *
	 * @return  void
	 */
	public function testGetItem()
	{
		$item = $this->model->getItem(1);

		$this->assertInstanceOf('Windwalker\Data\Data', $item);

		$this->assertFalse($item->isNull());

		$this->assertEquals('Alstroemeria', $item->title);
	}

	/**
	 * testGetItemFromState
	 *
	 * @return  void
	 */
	public function testGetItemFromState()
	{
		$this->model->getState()->set('item.id', 2);

		$item = $this->model->getItem();

		$this->assertEquals('Amaryllis', $item->title);
	}

	/**
	 * testGetItems
	 *
	 * @return  void
	 */
	public function testGetItems()
	{
		$state = $this->model->getState();

		$items = $this->model->getItems();

		// Test Default setting
		$this->assertEquals(10, count($items));
		$this->assertEquals(1, $items[0]->id);

		// Test limit 20, start at 50
		$state->set('list.limit', 20);
		$state->set('list.start', 50);

		$items = $this->model->getItems();

		$this->assertEquals(20, count($items));
		$this->assertEquals(51, $items[0]->id);
	}
}
 