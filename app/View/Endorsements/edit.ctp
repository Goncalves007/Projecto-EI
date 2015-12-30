<div class="endorsements form">
<?php echo $this->Form->create('Endorsement'); ?>
	<fieldset>
		<legend><?php echo __('Edit Endorsement'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('request_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('status_id');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Endorsement.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Endorsement.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Endorsements'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Internal Requests'), array('controller' => 'internal_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Internal Request'), array('controller' => 'internal_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List External Requests'), array('controller' => 'external_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Request'), array('controller' => 'external_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
