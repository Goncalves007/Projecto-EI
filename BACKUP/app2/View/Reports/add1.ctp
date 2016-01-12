
<?php 
if ($this->Session->read('Auth.User.group_id')==2) {
	echo $this->element('nav_menu_Department');
}
?>

<?php echo $this->element('content_header'); ?>
<h1>Add invoice</h1>
<?php
if (empty($lastID)) {
	echo "Nao Ocorreu cadastro <br>";
}else{
	echo "<strong>Reference:</strong>  "."<em>".$ref."</em>";
	echo "<br>";
	echo "<strong>User id</strong>  "."<em>".$idUsr."</em>";
	echo "<br>";
}
echo "<div class='col-lg-6'>";
echo $this->Form->create('Report',array('enctype'=>'multipart/form-data'));
echo $this->Form->input('title', array('class' => 'form-control'));
echo $this->Form->input('description', array('class' => 'form-control'));
//echo "<div class='col-lg-12'>";
echo $this->Form->input('report', array('label' => 'Upload Invoice', 'class' => 'form-control','type' => 'file'));
echo "<br/>";
echo $this->Form->hidden('request_id', array('hiddenField' => true, 'value'=> $lastID));
echo $this->Form->hidden('request_reference', array('hiddenField' => true, 'value'=> $ref));
echo $this->Form->end('Send Request', array('class' => 'pure-button pure-button-active'));
echo "</div>";

echo "<div class='col-lg-6'>";
?>

<?php
echo "</div>";
?>
</div>
<?php echo $this->element('content_footer'); ?>