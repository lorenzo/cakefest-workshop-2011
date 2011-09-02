<?php
/* WikiEntryRevision Test cases generated on: 2011-09-02 10:58:36 : 1314961116*/
App::uses('WikiEntryRevision', 'Wiki.Model');

/**
 * WikiEntryRevision Test Case
 *
 */
class WikiEntryRevisionTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->WikiEntryRevision = ClassRegistry::init('WikiEntryRevision');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WikiEntryRevision);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
