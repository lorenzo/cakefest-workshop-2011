<div class="wikiEntries form">
<?php echo $this->Form->create('WikiEntry');?>
	<fieldset>
		<legend><?php echo __('Add Wiki Entry'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Wiki Entries'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Entry Revisions'), array('controller' => 'wiki_entry_revisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry Revision'), array('controller' => 'wiki_entry_revisions', 'action' => 'add')); ?> </li>
	</ul>
</div>
