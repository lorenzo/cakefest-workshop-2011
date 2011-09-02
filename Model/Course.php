<?php
/**
 * Course Model
 *
 * @property Instructor $Instructor
 * @property Student $Student
 * @property WikiEntry $WikiEntry
 * @property WikiEntryRevision $WikiEntryRevision
 */
class Course extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'required' => true,
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'required' => true,
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Instructor' => array(
			'className' => 'Instructor',
			'foreignKey' => 'course_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'course_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function enroll($course, $userId) {
		$exists = $this->Student->field('id', array('course_id' => $course['Course']['id'], 'user_id' => $userId));
		if ($exists) {
			throw new DomainException(__('You are already enrolled in this course'));
		}
		if (!$this->Student->save(array('course_id' => $course['Course']['id'], 'user_id' => $userId))) {
			throw new Exception(__('An unexpected error happened, please try again'));
		}
	}

	public function addInstructor($course, $userId) {
		$exists = $this->Instructor->field('id', array('course_id' => $course['Course']['id'], 'user_id' => $userId));
		if ($exists) {
			throw new DomainException(__('This instructor is already added'));
		}
		if (!$this->Instructor->save(array('course_id' => $course['Course']['id'], 'user_id' => $userId))) {
			throw new Exception(__('An unexpected error happened, please try again'));
		}
	}
}
