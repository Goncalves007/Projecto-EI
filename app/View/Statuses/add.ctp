<div class="statuses form">
<?php echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend><?php echo __('Add Status'); ?></legend>
	<?php
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Endorsements'), array('controller' => 'endorsements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Endorsement'), array('controller' => 'endorsements', 'action' => 'add')); ?> </li>
	</ul>
</div>
