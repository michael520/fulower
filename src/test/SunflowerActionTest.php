<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Test;

use Flower\Sunflower\Action;
use Joomla\Registry\Registry;
use Test\Mock\MockSystem;
use Test\Stub\StubAction;

/**
 * The SunflowerActionTest class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class SunflowerActionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Property instance.
	 *
	 * @var Action
	 */
	protected $instance;

	/**
	 * setUp
	 *
	 * @return  void
	 */
	public function setUp()
	{
		$this->instance = new Action(array('where' => 'park'));
	}

	/**
	 * test__construct
	 *
	 * @return  void
	 */
	public function test__construct()
	{
		$this->assertInstanceOf('Joomla\\Registry\\Registry', $this->instance->getConfig());
	}

	/**
	 * testRun
	 *
	 * @return  void
	 */
	public function testRun()
	{
		$this->assertEquals('Police come~~~!!!', $this->instance->run());

		$this->assertTrue(
			is_string($this->instance->run()),
			'Sunflower\\Action::run() should return string. Line:' . __LINE__
		);
	}

	/**
	 * testGo
	 *
	 * @return  void
	 */
	public function testGo()
	{
		$this->assertEquals('park', $this->instance->go());

		$this->instance->getConfig()->set('where', 'home');

		$this->assertEquals('home', $this->instance->go());

		$action = new Action;

		$this->assertNull($action->go());
	}

	/**
	 * countCases
	 *
	 * @return  array
	 */
	public function countCases()
	{
		return array(
			array(
				'case1',
				1,
				1
			),
			array(
				'case2',
				2,
				2
			),
			array(
				'case3',
				3,
				0
			),
			array(
				'case4',
				4,
				1
			),
			array(
				'case5',
				5,
				2
			),
		);
	}

	/**
	 * testCount
	 *
	 * @param string $name
	 * @param int    $input
	 * @param int    $expected
	 *
	 * @return  void
	 *
	 * @dataProvider countCases
	 */
	public function testCount($name, $input, $expected)
	{
		$this->assertEquals(
			$expected,
			$this->instance->count($input),
			sprintf('%s fail.', $name)
		);
	}

	/**
	 * testTime
	 *
	 * @return  void
	 */
	public function testTime()
	{
		$action = new StubAction;

		// $this->assertEquals($action->time(), $action->getTime());
	}

	/**
	 * testSleep
	 *
	 * @return  void
	 */
	public function testSleep()
	{
		$config = new Registry;

		$action = new Action($config);

		$action->sleep();

		$this->assertEquals(8, $config->get('hour'));
	}

	/**
	 * testMock
	 *
	 * @return  void
	 */
	public function testGetRequest()
	{
		$aciotn = new Action(array(), new MockSystem);

		$this->assertEquals('YA', $aciotn->getRequest('kjrfie'));
	}
}
