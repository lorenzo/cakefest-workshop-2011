<?php
/* WikiEntry Test cases generated on: 2011-09-02 10:58:28 : 1314961108*/
App::uses('WikiEntry', 'Wiki.Model');

/**
 * WikiEntry Test Case
 *
 */
class WikiEntryTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->WikiEntry = ClassRegistry::init('WikiEntry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WikiEntry);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
