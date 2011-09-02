<div class="wikiEntryRevisions index">
	<h2><?php echo __('Wiki Entry Revisions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('version');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($wikiEntryRevisions as $wikiEntryRevision): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($wikiEntryRevision['WikiEntryRevision']['version'], array('action' => 'view', $wikiEntryRevision['WikiEntryRevision']['id'])); ?>
		</td>
		<td><?php echo h($wikiEntryRevision['WikiEntryRevision']['created']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('List Wiki Entries'), array('controller' => 'wiki_entries', 'action' => 'index', $wikiEntryRevision['WikiEntryRevision']['course_id'])); ?> </li>
	</ul>
</div>
