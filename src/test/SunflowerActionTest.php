<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Test;

use Fulower\Sunflower\Action;
use Joomla\Registry\Registry;
use test\Stub\StubAction;

/**
 * Class SunflowerActionTest
 *
 * @since 1.0
 */
class SunflowerActionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Property instance.
	 *
	 * @var
	 */
	protected $instance;

	/**
	 * setUp
	 *
	 * @return  void
	 */
	public function setUp()
	{
		$this->instance = new Action(new Registry(array('where' => 'park')));
	}

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
		$this->assertEquals('hello!!', $this->instance->run());

		$this->assertTrue(is_string($this->instance->run()), 'Sunflower\\Action::run() should return number, string get. in line : ' . __LINE__);
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
			)
		);
	}

	/**
	 * testCount
	 *
	 * @param string $name
	 * @param int $input
	 * @param int $expected
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
			sprintf('%s fail', $name)
		);
	}

	/**
	 * testTime
	 *
	 * @return  void
	 */
	public function noneTime()
	{
		$action = new StubAction;

		$this->assertEquals($action->time(), $action->getTime());

		$config = new Registry;

		$action = new Action($config);

		$action->sleep();

		$this->assertEquals(8, $config->get($config));
	}
}