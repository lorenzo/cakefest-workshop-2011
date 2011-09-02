<div class="wikiEntries index">
	<h2><?php echo __('Wiki Entries');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($wikiEntries as $wikiEntry): ?>
	<tr>
		<td><?php echo h($wikiEntry['WikiEntry']['id']); ?>&nbsp;</td>
		<td><?php echo h($wikiEntry['WikiEntry']['title']); ?>&nbsp;</td>
		<td><?php echo h($wikiEntry['WikiEntry']['body']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($wikiEntry['Course']['name'], array('controller' => 'courses', 'action' => 'view', $wikiEntry['Course']['id'])); ?>
		</td>
		<td><?php echo h($wikiEntry['WikiEntry']['created']); ?>&nbsp;</td>
		<td><?php echo h($wikiEntry['WikiEntry']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $wikiEntry['WikiEntry']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $wikiEntry['WikiEntry']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $wikiEntry['WikiEntry']['id']), null, __('Are you sure you want to delete # %s?', $wikiEntry['WikiEntry']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Wiki Entry'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Entry Revisions'), array('controller' => 'wiki_entry_revisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Entry Revision'), array('controller' => 'wiki_entry_revisions', 'action' => 'add')); ?> </li>
	</ul>
</div>
