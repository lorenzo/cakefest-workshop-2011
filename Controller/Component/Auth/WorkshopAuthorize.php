<?php
App::uses('BaseAuthorize', 'Controller/Component/Auth');
Configure::load('permissions', 'workshop_permission');

class WorkshopAuthorize extends BaseAuthorize {

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
		if (!$role) {
			return false;
		}
		if ($role === '*') {
			return true;
		}
		$models = explode(',', Inflector::camelize($role));
		foreach ($models as $model) {
			$exists = ClassRegistry::init($model)->find('count', array(
				'conditions' => array(
					'user_id' => $user['id'],
					'course_id' => $request->params['pass'][0]
				)
			));
			if ($exists) {
				return true;
			}
		}
		return false;
	}
}