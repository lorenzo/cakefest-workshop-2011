<?php
	$status = 'success';
	$message = '';
	if ($this->Session->check('Message.flash')) {
		$status = $this->Session->read('Message.element');
		$message = $this->Session->read('Message.message');
		$this->Session->flash();
	}
	$errors = array();
?>
{
	"status" : <?php echo json_encode($status); ?>,
	"response": <?php echo $content_for_layout; ?>,
	"errors": <?php echo json_encode($errors); ?>,
	"message": <?php echo json_encode($message); ?>
}