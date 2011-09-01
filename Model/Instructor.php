<?php
/**
 * Instructor Model
 *
 * @property User $User
 * @property Course $Course
 */
class Instructor extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'course_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $findMethods = array('available' => true);
	
	protected function _findAvailable($state, $query, $results = array()) {
		if ($state == 'before') {
			$query['conditions']['course_id'] = $query['course'];
			return $query;
		}
		$students = $this->Course->Student->find('all', array(
			'fields' => array('Student.user_id'),
			'conditions' => array('Student.course_id' => $query['course'])
		));
		$unavailble = array_merge(Set::extract('/Instructor/id', $results), Set::extract('/Student/user_id', $students));
		return $this->User->find('list', array(
			'conditions' => array('NOT' => array('User.id' => $unavailble))
		));
	}
}
