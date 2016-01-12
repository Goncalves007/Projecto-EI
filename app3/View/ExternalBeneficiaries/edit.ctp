<div class="externalBeneficiaries form">
<?php echo $this->Form->create('ExternalBeneficiary'); ?>
	<fieldset>
		<legend><?php echo __('Edit External Beneficiary'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExternalBeneficiary.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ExternalBeneficiary.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List External Beneficiaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List External Requests'), array('controller' => 'external_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Request'), array('controller' => 'external_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
