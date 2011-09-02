<?php

class WikiAppController extends AppController {
	public $helpers = array('MarkupParsers.Parser');

	public function __construct($request, $response) {
		$this->components['Auth']['authorize'][] = 'Wiki.Wiki';
		parent::__construct($request, $response);
	}
}

?>