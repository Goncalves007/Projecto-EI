<?php
$idUsr = $this->Session->read('Auth.User.id');
$username = $this->Session->read('Auth.User.name');
$departmant_head = $this->Session->read('Auth.User.boss');
$department_id = $this->Session->read('Auth.User.department_id');
$group_id = $this->Session->read('Auth.User.group_id');
$who = 'nobody';
$id = 0;
switch ($group_id) {
  case '2':
    $who ='Applicant'; 
    break;  
  case '1':
    $who ='Admin'; 
    break;  
  case '6':
    $who ='Head_Department'; 
    break;
  case '7':
    $who ='Finacial_Maneger'; 
    $id = 1;
    break;
  case '8':
    $who ='Treasurer'; 
    $id = 3;
    break;
  case '9':
    $who ='Administrations'; 
    $id =5;
    break;
  default:
    # code...
    break;
}
?>
<?php 
if ($who=='Admin'){
 ?>
<div class="col-lg-12">
<div class="col-lg-6">
<div class="pure-menu pure-menu-horizontal">
<div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $username; ?> </b>
 
                    </div>
    <ul class="pure-menu-list">
        <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
            <a href="#" id="menuLink1" class="pure-menu-link"> ADMINISTRATOR MENU </a>
            <ul class="pure-menu-children">
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'Administrations'), array('controller' => '../../administrations', 'action' => 'index')); ?></a>
                </li>
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'Beneficiaries'), array('controller' => '../../beneficiaries', 'action' => 'index')); ?></a>
                </li>
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'Currencies'), array('controller' => '../../currencies', 'action' => 'index')); ?></a>
                </li>
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'Departments'), array('controller' => '../../departments', 'action' => 'index')); ?></a>
                </li>
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'External_beneficiaries'), array('controller' => '../../external_beneficiaries', 'action' => 'index')); ?></a>
                </li>
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'External Requests'), array('controller' => '../../external_requests', 'action' => 'index')); ?></a>
                </li>
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'internal_requests'), array('controller' => '../../internal_requests', 'action' => 'index')); ?></a>
                </li>
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'Offices'), array('controller' => '../../offices', 'action' => 'index')); ?></a>
                </li>
                <li class="pure-menu-item">
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'Providers'), array('controller' => '../../providers', 'action' => 'index')); ?></a>
                </li>
            </ul>
        </li>
    </ul>
</div>
</div>

</div>
<?php
}elseif ($who=='Applicant') {
 ?>
 <div class="col-lg-12">
    <div class="col-lg-6">
        <div class="pure-menu pure-menu-horizontal">
        <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $this->Session->read('Auth.User.name'); ?> </b>
 
                    </div>
            <ul class="pure-menu-list">
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" id="menuLink1" class="pure-menu-link"> <h5>APPLICANT MENU</h5> </a>
                    <ul class="pure-menu-children">
                        <li class="pure-menu-item"><?php echo $this->Html->link(__d('admin', 'IN PROGRESS'), array('controller' => '../../reports', 'action' => 'progress', $idUsr, $department_id)); ?></li>
                        <li class="pure-menu-item"><?php echo $this->Html->link(__d('admin', 'ALL'), array('controller' => '../../reports', 'action' => 'index', $idUsr, $department_id)); ?></li>
                        <li class="pure-menu-item"><?php echo $this->Html->link(__d('admin', 'FINISHED'), array('controller' => '../../reports', 'action' => 'finished', $idUsr, $department_id)); ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="pure-menu pure-menu-horizontal pure-menu-scrollable">
            <a href="#" class="pure-menu-link pure-menu-heading"><?php echo $this->Html->link(__d('admin', 'INTERNAL REQUEST'), array('controller' => '../../Internal_requests', 'action' => 'add',$idUsr)); ?></a>
            <a href="#" class="pure-menu-link pure-menu-heading"><?php echo $this->Html->link(__d('admin', 'EXTERNAL REQUEST'), array('controller' => '../../External_requests', 'action' => 'add',$idUsr)); ?></a>
            <a href="#" class="pure-menu-link pure-menu-heading"><?php echo $this->Html->link(__d('admin', 'IN PROGRESS'), array('controller' => '../../reports', 'action' => 'progress', $idUsr, $department_id)); ?></a>
            <a href="#" class="pure-menu-link pure-menu-heading"><?php echo $this->Html->link(__d('admin', 'ALL'), array('controller' => '../../reports', 'action' => 'index', $idUsr, $department_id)); ?></a>
            <a href="#" class="pure-menu-link pure-menu-heading"><?php echo $this->Html->link(__d('admin', 'FINISHED'), array('controller' => '../../reports', 'action' => 'finished', $idUsr, $department_id)); ?></a>
        </div>
    </div>
</div>
<?php
}elseif ($who=='Head_Department' || $who=='Treasurer' || $who=='Administrations' || $who=='Finacial_Maneger') {?>
<div class="col-lg-12">
<div class="col-lg-6">
<div class="pure-menu pure-menu-horizontal">
<div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $this->Session->read('Auth.User.name'); ?> </b>
 
                    </div>
    <ul class="pure-menu-list">
        <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
            <a href="#" id="menuLink1" class="pure-menu-link">MENU FOR DEPARTMENT HEAD</a>
            <ul class="pure-menu-children">
                <li class="pure-menu-item">
       <?php if ($who=='Head_Department') {?>
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'PROCESSING OF REQUESTS'), array('controller' => '../../endorsements', 'action' => 'view',$this->Session->read('Auth.User.department_id'))); ?></a>
      <?php }elseif ($who=='Treasurer' || $who=='Administrations' || $who=='Finacial_Maneger') {?>
                  <a href="#" class="pure-menu-link"><?php echo $this->Html->link(__d('admin', 'PROCESSING OF REQUESTS'), array('controller' => '../../reports', 'action' => 'all')); ?></a>
      <?php }  ?>
                </li>
            </ul>
        </li>
    </ul>
</div>
</div>
<?php if ($who=='Head_Department') {?>
<div class="col-lg-6">
        <div class="pure-menu pure-menu-horizontal pure-menu-scrollable">
            <a href="#" class="pure-menu-link pure-menu-heading"><?php echo $this->Html->link(__d('admin', 'PROCESSING OF REQUESTS'), array('controller' => '../../endorsements', 'action' => 'view',$this->Session->read('Auth.User.department_id'))); ?></a>
        </div>
    </div>
<?php }elseif ($who=='Treasurer' || $who=='Administrations' || $who=='Finacial_Maneger') {?>
<div class="col-lg-6">
        <div class="pure-menu pure-menu-horizontal pure-menu-scrollable">
            <a href="#" class="pure-menu-link pure-menu-heading"><?php echo $this->Html->link(__d('admin', 'PROCESSING OF REQUESTS'), array('controller' => '../../reports', 'action' => 'all')); ?></a>
            <a href="#" class="pure-menu-link pure-menu-heading"><?php echo $this->Html->link(__d('admin', 'ALL REQUESTS'), array('controller' => '../../reports', 'action' => 'over_all')); ?></a>
        </div>
    </div>
<?php }  ?>    
</div>
<?php
}
?>
