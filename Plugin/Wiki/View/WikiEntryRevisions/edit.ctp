<div class="wikiEntryRevisions form">
<?php echo $this->Form->create('WikiEntryRevision');?>
	<fieldset>
		<legend><?php echo __('Edit Wiki Entry Revision'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('wiki_entry_id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('version');
		echo $this->Form->input('course_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('WikiEntryRevision.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('WikiEntryRevision.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Wiki Entry Revisions'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Wiki Entries'), array('controller' => 'wiki_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry'), array('controller' => 'wiki_entries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
