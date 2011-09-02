<?php
App::uses('BaseAuthorize', 'Controller/Component/Auth');
Configure::load('permissions', 'wiki_permission');

class WikiAuthorize extends BaseAuthorize {

/**
 * Returns whether a user is authorized to access an action
 *
 * @param array $user 
 * @param CakeRequest $request 
 * @return boolean
 */
	public function authorize($user, CakeRequest $request) {
		if ($user['admin']) {
			return true;
		}
		$role = Configure::read('Permissions.' . $this->action($request));
		if (!$role || empty($request->params['pass'][0])) {
			return false;
		}
		if ($role === '*') {
			return true;
		}

		$hasCourseInURL = Configure::read('CourseMap.' . $this->action($request));
		if ($hasCourseInURL){
			$course = $request->params['pass'][0];
		} else {
			$controller = $this->controller();
			$course = $controller->{$controller->modelClass}->field('course_id', array(
				'id' => $request->params['pass'][0]
			));
		}

		$models = explode(',', Inflector::camelize($role));
		foreach ($models as $model) {
			$exists = ClassRegistry::init($model)->find('count', array(
				'conditions' => array(
					'user_id' => $user['id'],
					'course_id' => $course
				)
			));
			if ($exists) {
				return true;
			}
		}
		return false;
	}
}