<?php

class RevisionBehavior extends ModelBehavior {

	public function setup($model, $config = array()) {
		$this->settings[$model->alias] = isset($this->settings[$model->alias]) ? $this->settings[$model->alias] : array();
		$this->settings[$model->alias] += array('revisionModel' => $model->name . 'Revision');
	}

	public function afterSave($model, $created) {
		$revisionModel = ClassRegistry::init($this->settings[$model->alias]['revisionModel']);
		$revisionModel->virtualFields = array('max_revision' => 'MAX(version)');
		$maxVersion = $revisionModel->find('first', array(
			'fields' => array('max_revision'),
			'conditions' => array(Inflector::underscore($model->name) . '_id' => $model->id)
		));
		$data = $model->find('first', array('conditions' => array($model->primaryKey => $model->id), 'recursive' => -1));
		$data = $data[$model->alias];
		unset($data[$model->primaryKey], $data['created'], $data['modified']);
		$data[Inflector::underscore($model->name) . '_id'] = $model->id;
		$data['version'] = $maxVersion[$revisionModel->alias]['max_revision'] + 1;
		$revisionModel->create($data);
		$revisionModel->save();
	}

}