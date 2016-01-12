<?php 
if ($this->Session->read('Auth.User.group_id')==2) {
	echo $this->element('nav_menu_Department');
}
?>
<?php echo $this->element('content_header') ?>
<h1>Add Proforma</h1>
<?php
if (empty($lastID)) {
	echo "Nao Ocorreu cadastro <br>";
}else{
	echo "<strong>Reference Application:</strong>  "."<em>".$ref."</em>";
	echo "<br>";
	echo "<br>";
}
echo "<div class='col-lg-6'>";
echo $this->Form->create('Proforma',array('enctype'=>'multipart/form-data'));
echo $this->Form->input('title', array('class' => 'form-control','value'=> $title));
echo $this->Form->input('proposal_value',array('class' => 'form-control'));
echo $this->Form->input('proposal_invoice_number',array('class' => 'form-control'));
echo $this->Form->input('description', array('class' => 'form-control','value'=> $desc));
echo "<div class='col-lg-12'>";
echo $this->Form->input('report', array('type' => 'file','class' => 'form-control'));
echo "</div><br>";
echo $this->Form->hidden('request_id', array('hiddenField' => true, 'value'=> $lastID));
echo $this->Form->hidden('request_reference', array('hiddenField' => true, 'value'=> $ref));
echo "</div>";
echo $this->Form->end('Save Proforma', array('class' => 'pure-button pure-button-active'));
echo "<div class='col-lg-6'>";


echo "</div>";
?>
<?php echo $this->element('content_footer'); ?>

