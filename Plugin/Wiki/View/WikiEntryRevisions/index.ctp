<div class="wikiEntryRevisions index">
	<h2><?php echo __('Wiki Entry Revisions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('wiki_entry_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('version');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($wikiEntryRevisions as $wikiEntryRevision): ?>
	<tr>
		<td><?php echo h($wikiEntryRevision['WikiEntryRevision']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($wikiEntryRevision['WikiEntry']['title'], array('controller' => 'wiki_entries', 'action' => 'view', $wikiEntryRevision['WikiEntry']['id'])); ?>
		</td>
		<td><?php echo h($wikiEntryRevision['WikiEntryRevision']['title']); ?>&nbsp;</td>
		<td><?php echo h($wikiEntryRevision['WikiEntryRevision']['body']); ?>&nbsp;</td>
		<td><?php echo h($wikiEntryRevision['WikiEntryRevision']['version']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($wikiEntryRevision['Course']['name'], array('controller' => 'courses', 'action' => 'view', $wikiEntryRevision['Course']['id'])); ?>
		</td>
		<td><?php echo h($wikiEntryRevision['WikiEntryRevision']['created']); ?>&nbsp;</td>
		<td><?php echo h($wikiEntryRevision['WikiEntryRevision']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $wikiEntryRevision['WikiEntryRevision']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $wikiEntryRevision['WikiEntryRevision']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $wikiEntryRevision['WikiEntryRevision']['id']), null, __('Are you sure you want to delete # %s?', $wikiEntryRevision['WikiEntryRevision']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Wiki Entry Revision'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Wiki Entries'), array('controller' => 'wiki_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry'), array('controller' => 'wiki_entries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
