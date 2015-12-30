
<?php echo $this->element('content_header') ?>

<div class="col-lg-3">
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Beneficiaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Internal Requests'), array('controller' => 'internal_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Internal Request'), array('controller' => 'internal_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>

<div class="col-lg-6">
<div class="beneficiaries form">
<?php echo $this->Form->create('Beneficiary'); ?>
	
		<legend><?php echo __('Add Beneficiary'); ?></legend>
	<div class="col-lg-6">
	<?php echo $this->Form->input('department_id',  array('empty' => 'No Administration Selected','class' => 'form-control'));?>
    <br>
	</div>

    <br>
    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => '', 'placeholder'=>'Nome do Beneficiario')); ?>
    <br>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>

<?php echo $this->element('content_footer'); ?>