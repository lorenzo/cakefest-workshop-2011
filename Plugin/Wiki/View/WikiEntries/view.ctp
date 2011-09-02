<div class="wikiEntries view">
<h2><?php  echo h($wikiEntry['WikiEntry']['title']) ?></h2>
<div class="content">
	<?php echo current($this->Parser->parse($wikiEntry['WikiEntry']['body'])); ?>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Wiki Entry'), array('action' => 'edit', $wikiEntry['WikiEntry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('History'), array('controller' => 'wiki_entry_revisions', 'action' => 'index', $wikiEntry['WikiEntry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Wiki Entry'), array('action' => 'delete', $wikiEntry['WikiEntry']['id']), null, __('Are you sure you want to delete # %s?', $wikiEntry['WikiEntry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Entries'), array('action' => 'index', $wikiEntry['WikiEntry']['course_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry'), array('action' => 'add', $wikiEntry['WikiEntry']['course_id'])); ?> </li>
	</ul>
</div>
