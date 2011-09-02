<?php
App::uses('WikiAppController', 'Wiki.Controller');
/**
 * WikiEntryRevisions Controller
 *
 * @property WikiEntryRevision $WikiEntryRevision
 */
class WikiEntryRevisionsController extends WikiAppController {


/**
 * index method
 *
 * @return void
 */
	public function index($wikiEntry) {
		$this->paginate = array(
			'conditions' => array('WikiEntry.id' => $wikiEntry)
		);
		$this->WikiEntryRevision->recursive = 0;
		$this->set('wikiEntryRevisions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->WikiEntryRevision->id = $id;
		if (!$this->WikiEntryRevision->exists()) {
			throw new NotFoundException(__('Invalid wiki entry revision'));
		}
		$this->set('wikiEntryRevision', $this->WikiEntryRevision->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WikiEntryRevision->create();
			if ($this->WikiEntryRevision->save($this->request->data)) {
				$this->Session->setFlash(__('The wiki entry revision has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wiki entry revision could not be saved. Please, try again.'));
			}
		}
		$wikiEntries = $this->WikiEntryRevision->WikiEntry->find('list');
		$courses = $this->WikiEntryRevision->Course->find('list');
		$this->set(compact('wikiEntries', 'courses'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->WikiEntryRevision->id = $id;
		if (!$this->WikiEntryRevision->exists()) {
			throw new NotFoundException(__('Invalid wiki entry revision'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WikiEntryRevision->save($this->request->data)) {
				$this->Session->setFlash(__('The wiki entry revision has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wiki entry revision could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->WikiEntryRevision->read(null, $id);
		}
		$wikiEntries = $this->WikiEntryRevision->WikiEntry->find('list');
		$courses = $this->WikiEntryRevision->Course->find('list');
		$this->set(compact('wikiEntries', 'courses'));
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
		$this->WikiEntryRevision->id = $id;
		if (!$this->WikiEntryRevision->exists()) {
			throw new NotFoundException(__('Invalid wiki entry revision'));
		}
		if ($this->WikiEntryRevision->delete()) {
			$this->Session->setFlash(__('Wiki entry revision deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Wiki entry revision was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
