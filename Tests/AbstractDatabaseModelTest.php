<?php
/**
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Model\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the Joomla\Model\AbstractDatabaseModel class.
 *
 * @since  1.0
 */
class AbstractDatabaseModelTest extends TestCase
{
	/**
	 * @var    \Joomla\Model\AbstractDatabaseModel
	 * @since  1.0
	 */
	private $instance;

	/**
	 * Tests the __construct method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Model\AbstractDatabaseModel::__construct
	 * @since   1.0
	 */
	public function test__construct()
	{
		$this->assertInstanceOf('Joomla\Database\DatabaseDriver', $this->instance->getDb());
	}

	/**
	 * Tests the setDb method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Model\AbstractDatabaseModel::getDb
	 * @covers  Joomla\Model\AbstractDatabaseModel::setDb
	 * @since   1.0
	 */
	public function testSetDb()
	{
		$db = $this->getMockBuilder('Joomla\\Database\\DatabaseDriver')
			->disableOriginalConstructor()
			->getMockForAbstractClass();

		$this->instance->setDb($db);

		$this->assertSame($db, $this->instance->getDb());
	}

	/**
	 * Setup the tests.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function setUp()
	{
		parent::setUp();

		$db = $this->getMockBuilder('Joomla\\Database\\DatabaseDriver')
			->disableOriginalConstructor()
			->getMockForAbstractClass();

		$this->instance = $this->getMockBuilder('Joomla\\Model\\AbstractDatabaseModel')
			->setConstructorArgs(array($db))
			->getMockForAbstractClass();
	}
}
