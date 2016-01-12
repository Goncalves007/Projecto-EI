<?php echo $this->element('content_header') ?>


	<?php $this->Html->script('/uploads/list_administration.js', array('inline' => FALSE)); ?>
  
  <div class="col-lg-3">
	<?php echo $this->Form->input('Offices', array('empty' => 'Select One', 'default' => $offices, 'id' => 'office-name','class' => 'form-control')); ?>
  </div>
  <div class="col-lg-6">
	<div id="office-administration" >
      <?php echo $this->Form->input('Administration.label', array('type' => 'select', 'id' => 'administration_office_name','class' => 'form-control')); ?>
    </div>
  </div>
<?php echo $this->element('constant_footer'); ?>
