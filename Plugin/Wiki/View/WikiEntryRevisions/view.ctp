<div class="wikiEntries view">
<h2><?php  echo h($wikiEntryRevision['WikiEntryRevision']['title']) ?></h2>
<div class="content">
	<?php echo current($this->Parser->parse($wikiEntryRevision['WikiEntryRevision']['body'])); ?>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postlink(__('Revert to this version'), array('action' => 'revert', $wikiEntryRevision['WikiEntryRevision']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Entries'), array('action' => 'index', $wikiEntryRevision['WikiEntryRevision']['course_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry'), array('action' => 'add', $wikiEntryRevision['WikiEntryRevision']['course_id'])); ?> </li>
	</ul>
</div>
