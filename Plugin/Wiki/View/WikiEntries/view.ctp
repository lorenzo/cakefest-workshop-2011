<div class="wikiEntries view">
<h2><?php  echo __('Wiki Entry');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($wikiEntry['WikiEntry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($wikiEntry['WikiEntry']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($wikiEntry['WikiEntry']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wikiEntry['Course']['name'], array('controller' => 'courses', 'action' => 'view', $wikiEntry['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($wikiEntry['WikiEntry']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($wikiEntry['WikiEntry']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Wiki Entry'), array('action' => 'edit', $wikiEntry['WikiEntry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Wiki Entry'), array('action' => 'delete', $wikiEntry['WikiEntry']['id']), null, __('Are you sure you want to delete # %s?', $wikiEntry['WikiEntry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Entries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Entry Revisions'), array('controller' => 'wiki_entry_revisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry Revision'), array('controller' => 'wiki_entry_revisions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Wiki Entry Revisions');?></h3>
	<?php if (!empty($wikiEntry['WikiEntryRevision'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Wiki Entry Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Version'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($wikiEntry['WikiEntryRevision'] as $wikiEntryRevision): ?>
		<tr>
			<td><?php echo $wikiEntryRevision['id'];?></td>
			<td><?php echo $wikiEntryRevision['wiki_entry_id'];?></td>
			<td><?php echo $wikiEntryRevision['title'];?></td>
			<td><?php echo $wikiEntryRevision['body'];?></td>
			<td><?php echo $wikiEntryRevision['version'];?></td>
			<td><?php echo $wikiEntryRevision['course_id'];?></td>
			<td><?php echo $wikiEntryRevision['created'];?></td>
			<td><?php echo $wikiEntryRevision['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'wiki_entry_revisions', 'action' => 'view', $wikiEntryRevision['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'wiki_entry_revisions', 'action' => 'edit', $wikiEntryRevision['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'wiki_entry_revisions', 'action' => 'delete', $wikiEntryRevision['id']), null, __('Are you sure you want to delete # %s?', $wikiEntryRevision['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Wiki Entry Revision'), array('controller' => 'wiki_entry_revisions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
