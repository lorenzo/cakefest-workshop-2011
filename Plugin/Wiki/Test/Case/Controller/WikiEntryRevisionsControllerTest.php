<?php
/* WikiEntryRevisions Test cases generated on: 2011-09-02 11:05:07 : 1314961507*/
App::uses('WikiEntryRevisionsController', 'Wiki.Controller');

/**
 * TestWikiEntryRevisionsController 
 *
 */
class TestWikiEntryRevisionsController extends WikiEntryRevisionsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * WikiEntryRevisionsController Test Case
 *
 */
class WikiEntryRevisionsControllerTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->WikiEntryRevisions = new TestWikiEntryRevisionsController();
		$this->WikiEntryRevisions->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WikiEntryRevisions);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
