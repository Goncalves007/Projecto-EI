<?php
$username = $this->Session->read('Auth.User.name');
$departmant_head = $this->Session->read('Auth.User.boss');
$department_id = $this->Session->read('Auth.User.department_id');
$group_id = $this->Session->read('Auth.User.group_id');
$department_name = null;
switch ($department_id) {
	case '1':
		$department_name ='IT'; 
		break;
	
	default:
		# code...
		break;
}
?>
<div class="row">
  <div class="wrapper_requests">
                 <!-- Form Elements -->
   <div class="panel panel-primary">
      <div class="panel-heading">
        <em><b>Sistema de Requisi&ccedil;&atilde;o de Fundo</b><em>
      </div>
      <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                    <center>
                        <i class="fa fa-folder-open"></i><em> Notificationa Systerm</em>
                    </center>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
       <div class="panel-body">
       <div class="row">
<div class="col-lg-12">