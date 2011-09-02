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

}
