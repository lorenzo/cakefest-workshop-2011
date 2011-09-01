<?php
/* Course Test cases generated on: 2011-09-01 13:38:15 : 1314884295*/
App::uses('Course', 'Model');

/**
 * Course Test Case
 *
 */
class CourseTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.course', 'app.instructor', 'app.user', 'app.student');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Course = ClassRegistry::init('Course');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Course);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
