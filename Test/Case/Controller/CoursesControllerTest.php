<?php
/* Courses Test cases generated on: 2011-09-01 13:38:15 : 1314884295*/
App::uses('CoursesController', 'Controller');

/**
 * CoursesController Test Case
 *
 */
class CoursesControllerTestCase extends ControllerTestCase {
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
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		ClassRegistry::flush();

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->controller = $this->generate('Courses', array(
			'components' => array('Auth' => array('user'))
		));
		$this->testAction('/courses/index', array('return' => 'contents'));
		$this->assertRegexp('#<h2>Courses</h2>#', $this->contents);
		$this->assertRegexp('#<td>CAKE-101&nbsp;</td>#', $this->contents);
		$this->assertRegexp('#<td>CAKE-201&nbsp;</td>#', $this->contents);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->controller = $this->generate('Courses', array(
			'components' => array('Auth' => array('user'))
		));
		$this->testAction('/courses/view/course-1', array('return' => 'contents'));
		$expected = array('tag' => 'h2', 'content' => 'Course');
		$this->assertTag($expected, $this->contents);

		$expected =  array(
			'tag' => 'dl',
			'child' => array(
				'tag' => 'dd',
				'content' => 'CAKE-101'
			),
			'children' => array(
				'count' => 10
			)
		);
		$this->assertTag($expected, $this->contents);

		$expected = array(
			'tag' => 'h3',
			'content' => 'Students',
			'ancestor' => array('tag' => 'div')
		);
		$this->assertTag($expected, $this->contents);

		$expected = array(
			'tag' => 'tr',
			'ancestor' => array(
				'tag' => 'table',
				'ancestor' => array('tag' => 'div', 'class' => 'related')
			),
			'child' => array(
				'tag' => 'td',
				'content' => 'Chuck Norris'
			)
		);
		$this->assertTag($expected, $this->contents);
	}

/**
 *
 * @return void
 * @expectedException NotFoundException
 */
	public function testViewNoCourse() {
		$this->controller = $this->generate('Courses', array(
			'components' => array('Auth' => array('user'), 'DebugKit.Toolbar')
		));
		$this->testAction('/courses/view/casdf');
	}

	public function testAddGET() {
		$this->controller = $this->generate('Courses', array(
			'components' => array('Auth' => array('user'))
		));
		$this->testAction('/courses/add', array('return' => 'contents', 'method' => 'GET'));
		$expected = array(
			'ancestor' => array(
				'tag' => 'form',
				'attributes' => array('id' => 'CourseAddForm', 'method' => 'post')
			),
			'child' => array(
				'tag' => 'input',
				'id' => 'CourseName',
				'attributes' => array('type' => 'text', 'value' => '', 'name' => 'data[Course][name]')
			)
		);
		$this->assertTag($expected, $this->contents);
		$expected = array('tag' => 'input', 'attributes' => array('type' => 'hidden', 'name' => 'data[Course][id]'));
		$this->assertNoTag($expected, $this->contents);
	}

	public function testAddPOST() {
		$this->controller = $this->generate('Courses', array(
			'methods' => array('redirect'),
			'components' => array(
				'Auth' => array('user'),
				'Session' => array('setFlash')
			)
		));
		$this->controller->expects($this->once())->method('redirect')->with(array('action' => 'index'));
		$this->controller->Session->expects($this->once())->method('setFlash')->with('The course has been saved');
		$this->testAction('/courses/add', array(
				'return' => 'contents',
				'method' => 'POST',
				'data' => array(
					'data' => array(
						'Course' => array(
							'name' => 'Another Course',
							'description' => 'Course description',
							'code' => 'ANTH-101'
						)
					)
				)
		));
		$course = $this->controller->Course->read();
		$this->assertEquals('ANTH-101', $course['Course']['code']);
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}

}
