<div class="instructors view">
<h2><?php  echo __('Instructor');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instructor['User']['id'], array('controller' => 'users', 'action' => 'view', $instructor['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instructor['Course']['name'], array('controller' => 'courses', 'action' => 'view', $instructor['Course']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Instructor'), array('action' => 'edit', $instructor['Instructor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Instructor'), array('action' => 'delete', $instructor['Instructor']['id']), null, __('Are you sure you want to delete # %s?', $instructor['Instructor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instructor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
