<?php
/**
 * Courses Controller
 *
 * @property Course $Course
 */
class CoursesController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Course->recursive = 0;
		$this->set('courses', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$course = $this->Course->find('first', array(
			'conditions' => array('Course.id' => $id),
			'contain' => array('Student' => 'User', 'Instructor' => 'User')
		));
		$this->set('course', $course);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'), 'error');
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this->request->data = $this->Course->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->Course->delete()) {
			$this->Session->setFlash(__('Course deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Course was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function enroll($id) {
		$course = $this->Course->read(null, $id);
		if (!$course) {
			throw new NotFoundException(__('Invalid Course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			try {
				$this->Course->enroll($course, $this->Auth->user('id'));
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage());
			}
		}
		$this->redirect(array('action' => 'view', $id));
	}

	public function add_instructor($id) {
		$course = $this->Course->read(null, $id);
		if (!$course) {
			throw new NotFoundException(__('Invalid Course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			try {
				$this->Course->addInstructor($course, $this->request->data['Course']['instructor']);
				$this->redirect(array('action' => 'view', $id));
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage());
			}
		}
		$users = $this->Course->Instructor->find('available', array('course' => $id));
		$this->set(compact('users'));
	}
}
