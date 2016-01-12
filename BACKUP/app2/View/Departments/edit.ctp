<div class="departments form">
<?php echo $this->Form->create('Department'); ?>
	<fieldset>
		<legend><?php echo __('Edit Department'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('label');
		echo $this->Form->input('administration_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Department.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Department.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Administrations'), array('controller' => 'administrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Administration'), array('controller' => 'administrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Beneficiaries'), array('controller' => 'beneficiaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Beneficiary'), array('controller' => 'beneficiaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List External Requests'), array('controller' => 'external_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Request'), array('controller' => 'external_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Internal Requests'), array('controller' => 'internal_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Internal Request'), array('controller' => 'internal_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
