<?php
/* WikiEntries Test cases generated on: 2011-09-02 11:02:22 : 1314961342*/
App::uses('WikiEntriesController', 'Wiki.Controller');

/**
 * TestWikiEntriesController 
 *
 */
class TestWikiEntriesController extends WikiEntriesController {
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
 * WikiEntriesController Test Case
 *
 */
class WikiEntriesControllerTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->WikiEntries = new TestWikiEntriesController();
		$this->WikiEntries->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WikiEntries);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
