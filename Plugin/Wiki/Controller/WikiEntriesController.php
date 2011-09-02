<?php
App::uses('WikiAppController', 'Wiki.Controller');

/**
 * WikiEntries Controller
 *
 * @property WikiEntry $WikiEntry
 */
class WikiEntriesController extends WikiAppController {

	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index($courseId) {
		$this->WikiEntry->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('WikiEntry.course_id' => $courseId)
		);
		$this->set('wikiEntries', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->WikiEntry->id = $id;
		if (!$this->WikiEntry->exists()) {
			throw new NotFoundException(__('Invalid wiki entry'));
		}
		$this->set('wikiEntry', $this->WikiEntry->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($courseId) {
		if ($this->request->is('post')) {
			$this->WikiEntry->create();
			if ($this->WikiEntry->save($this->request->data)) {
				$this->request->data['WikiEntry']['course_id'] = $courseId;
				$this->Session->setFlash(__('The wiki entry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wiki entry could not be saved. Please, try again.'));
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
		$this->WikiEntry->id = $id;
		if (!$this->WikiEntry->exists()) {
			throw new NotFoundException(__('Invalid wiki entry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WikiEntry->save($this->request->data)) {
				$this->Session->setFlash(__('The wiki entry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wiki entry could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->WikiEntry->read(null, $id);
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
		$this->WikiEntry->id = $id;
		if (!$this->WikiEntry->exists()) {
			throw new NotFoundException(__('Invalid wiki entry'));
		}
		if ($this->WikiEntry->delete()) {
			$this->Session->setFlash(__('Wiki entry deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Wiki entry was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
