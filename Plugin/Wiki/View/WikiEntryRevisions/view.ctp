<div class="wikiEntryRevisions view">
<h2><?php  echo __('Wiki Entry Revision');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($wikiEntryRevision['WikiEntryRevision']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wiki Entry'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wikiEntryRevision['WikiEntry']['title'], array('controller' => 'wiki_entries', 'action' => 'view', $wikiEntryRevision['WikiEntry']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($wikiEntryRevision['WikiEntryRevision']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($wikiEntryRevision['WikiEntryRevision']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version'); ?></dt>
		<dd>
			<?php echo h($wikiEntryRevision['WikiEntryRevision']['version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wikiEntryRevision['Course']['name'], array('controller' => 'courses', 'action' => 'view', $wikiEntryRevision['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($wikiEntryRevision['WikiEntryRevision']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($wikiEntryRevision['WikiEntryRevision']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Wiki Entry Revision'), array('action' => 'edit', $wikiEntryRevision['WikiEntryRevision']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Wiki Entry Revision'), array('action' => 'delete', $wikiEntryRevision['WikiEntryRevision']['id']), null, __('Are you sure you want to delete # %s?', $wikiEntryRevision['WikiEntryRevision']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Entry Revisions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry Revision'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Entries'), array('controller' => 'wiki_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry'), array('controller' => 'wiki_entries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
