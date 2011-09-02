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

	public function testEnrollNewStudent() {
		$course = $this->Course->read(null, 'course-1');
		$this->assertEquals(array('user-1'), Set::extract('/Student/user_id', $course));
		$this->Course->enroll($course, 'user-3');

		$course = $this->Course->read(null, 'course-1');
		$this->assertEquals(array('user-1', 'user-3'), Set::extract('/Student/user_id', $course));
	}

	/**
	 * A user cannot be enrolled twice
	 *
	 * @return void
	 * @expectedException DomainException
	 */
	public function testEnrollExistingStudent() {
		$course = $this->Course->read(null, 'course-1');
		$this->Course->enroll($course, 'user-1');
	}

	public function testAddInstructor() {
		$course = $this->Course->read(null, 'course-2');
		$this->Course->addInstructor($course, 'user-1');

		$course = $this->Course->read(null, 'course-2');
		$this->assertEquals(array('user-1', 'user-3'), Set::extract('/Instructor/user_id', $course));
	}
}
