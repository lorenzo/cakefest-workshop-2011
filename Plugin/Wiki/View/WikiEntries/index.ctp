<div class="wikiEntries index">
	<h2><?php echo __('Course Topics');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($wikiEntries as $wikiEntry): ?>
	<tr>
		<td><?php echo $this->Html->link($wikiEntry['WikiEntry']['title'], array('action' => 'view', $wikiEntry['WikiEntry']['id'])); ?></td>
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
		<li><?php echo $this->Html->link(__('New Page'), array('action' => 'add', $this->request->params['pass'][0])); ?></li>
	</ul>
</div>
