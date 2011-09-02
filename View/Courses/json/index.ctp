<?php
	$total = $this->Paginator->counter(array('format' => '%count%'));
	$page = (int) $this->Paginator->counter(array('format' => '%page%'));
	$nextPage = max($page + 1, $this->Paginator->counter(array('format' => '%pages%')));
	echo json_encode(compact('courses', 'total', 'page', 'nextPage'));
?>