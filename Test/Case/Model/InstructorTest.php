<?php
/* Instructor Test cases generated on: 2011-09-01 13:37:04 : 1314884224*/
App::uses('Instructor', 'Model');

/**
 * Instructor Test Case
 *
 */
class InstructorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.instructor', 'app.user', 'app.student', 'app.course');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Instructor = ClassRegistry::init('Instructor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Instructor);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
