<?php
/* Student Test cases generated on: 2011-09-01 13:37:52 : 1314884272*/
App::uses('Student', 'Model');

/**
 * Student Test Case
 *
 */
class StudentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.student', 'app.user', 'app.instructor', 'app.course');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Student = ClassRegistry::init('Student');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Student);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
