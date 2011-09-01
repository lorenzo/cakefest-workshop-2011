<?php
/**
 * Instructors Controller
 *
 * @property Instructor $Instructor
 */
class InstructorsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Instructor->recursive = 0;
		$this->set('instructors', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Instructor->id = $id;
		if (!$this->Instructor->exists()) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		$this->set('instructor', $this->Instructor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Instructor->create();
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'));
			}
		}
		$users = $this->Instructor->User->find('list');
		$courses = $this->Instructor->Course->find('list');
		$this->set(compact('users', 'courses'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Instructor->id = $id;
		if (!$this->Instructor->exists()) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Instructor->read(null, $id);
		}
		$users = $this->Instructor->User->find('list');
		$courses = $this->Instructor->Course->find('list');
		$this->set(compact('users', 'courses'));
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
		$this->Instructor->id = $id;
		if (!$this->Instructor->exists()) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		if ($this->Instructor->delete()) {
			$this->Session->setFlash(__('Instructor deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Instructor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
