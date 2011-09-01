<?php
/* User Fixture generated on: 2011-09-01 13:36:54 : 1314884214 */

/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'full_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 15, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'last_seen' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'admin' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 'user-1',
			'full_name' => 'Chuck Norris',
			'email' => 'chuck@norris.com',
			'username' => 'chuck',
			'password' => 'norris',
			'last_seen' => 0,
			'admin' => 1
		),
		array(
			'id' => 'user-2',
			'full_name' => 'Bruce Lee',
			'email' => 'bruce@lee.com',
			'username' => 'bruce',
			'password' => 'lee',
			'last_seen' => 0,
			'admin' => 0
		),
		array(
			'id' => 'user-3',
			'full_name' => 'Jackie Chan',
			'email' => 'jackie@chan.com',
			'username' => 'jackie',
			'password' => 'chan',
			'last_seen' => 0,
			'admin' => 0
		),
	);
}
