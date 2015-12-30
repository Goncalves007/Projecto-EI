<!-- start: RESPONSIVE TABLE PANEL -->
<?php
$idUsr = $this->Session->read('Auth.User.id');
$username = $this->Session->read('Auth.User.name');
$departmant_head = $this->Session->read('Auth.User.boss');
$department_id = $this->Session->read('Auth.User.department_id');
$group_id = $this->Session->read('Auth.User.group_id');
$who = 'nobody';
switch ($group_id) {
  case '6':
    $who ='Head_Department'; 
    break;
  case '7':
    $who ='Finacial_Maneger'; 
    break;
  case '8':
    $who ='Treasurer'; 
    break;
  case '9':
    $who ='Administration'; 
    break;
  default:
    # code...
    break;
}

if($group_id==2){ 
 echo $this->element('nav_menu_Register');
    }elseif ($group_id==7 || $group_id==8 || $group_id==9) {
        echo $this->element('nav_menu_other');
    }elseif ($group_id==6) {
       echo $this->element('nav_menu_Department');
    }
    //echo debug($Reports);

?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Sistema de Requisição de Fundo
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-bordered table-hover" id="sample-table-1">
									<div class="endorsements view">

<div class="panel-body">
<?php

$end[] = array();
$final[] = array();
for ($i=0; $i < sizeof($Endorsements) ; $i++) {
    $end[] = $Endorsements[$i]['Endorsement'];
  }
  $endorsement = array_filter($end);
  //$ya = array_diff($endorsement,$Reports);
   $removedKey[] = array();
   for ($i=0; $i <sizeof($Reports) ; $i++) { 
    for ($j=1; $j <=sizeof($endorsement) ; $j++) { 
        if ($Reports[$i]['id'] == $endorsement[$j]['request_id']) {
            $removedKey[] = $i;
        } 
    }
   }
  // echo debug($endorsement);
   //echo debug($Reports);
   $removeble = array_filter($removedKey);
  // echo debug($removeble);


for ($i=0; $i <sizeof($Reports) ; $i++) { 
  for ($j=1; $j <=sizeof($endorsement) ; $j++) { 
  //if(array_search($endorsement[$j]['request_id'], $Reports[$i])){
   $key = array_search($endorsement[$j]['request_id'], $Reports[$i]);
    if($key==true) {
    unset($Reports[$key]);
    $final[] = $Reports[$i];
    }
  }
}
//echo debug($final);
?>

<?php
if ($who=='Head_Department') {
 for ($i=0; $i < sizeof($Reports) ; $i++) { 
  $ref = $Reports[$i]['reference_application'];
if (substr($ref, 0,6)=='RefInt') {
       $controller = 'InternalRequests';
       }elseif (substr($ref, 0,6)=='RefExt') {
          $controller = 'ExternalRequests';
       }
// Listar somente os Nao tramitados!(Em Desenvolvimento)
       if ($Reports[$i]['id']!=0) {
           
?>
<div class="list-group">
<?php echo $this->Html->link($Reports[$i]['reference_application'].'  --> '.$Reports[$i]['payment_details'], array('controller' => $controller, 'action' =>'view', $Reports[$i]['id'],$Reports[$i]['department_id']),array('class' => 'list-group-item'));?>
<span class="pull-right text-muted small">
<em><?php echo $Reports[$i]['created'] ?></em>
</span>
</div>
<?php
   }
  } 
 }elseif ($who=='Finacial_Maneger') {
  $Reports = array_filter($final);
   for ($i=0; $i < sizeof($Reports) ; $i++) { 
  $ref = $Reports[$i]['reference_application'];
if (substr($ref, 0,6)=='RefInt') {
     $controller = 'InternalRequests';
       }elseif (substr($ref, 0,6)=='RefExt') {
          $controller = 'ExternalRequests';
       }
// Listar somente os Nao tramitados!(Em Desenvolvimento)
       if ($Reports[$i]['id']!=0) {
           
?>
<div class="list-group">
<?php echo $this->Html->link($Reports[$i]['reference_application'].'  --> '.$Reports[$i]['payment_details'], array('controller' => $controller, 'action' =>'view', $Reports[$i]['id'],$Reports[$i]['department_id']),array('class' => 'list-group-item'));?>
<span class="pull-right text-muted small">
<em><?php echo $Reports[$i]['created'] ?></em>
</span>
</div>
<?php
   }
  } 
 }
 if (!empty($Reports)) {
   $this->Html->link('Ver Todas', array('controller' => 'reports', 'action' => 'process_d',$department_id));
 }elseif (empty($Reports)) {
   echo "<a href='#' class='btn btn-default btn-block'>Lista Vazia </a>";
 }
 ?>
</div>
</table>
<?php echo $this->element('footer_user'); ?>
</div>
</div>
</div>
							<!-- end: RESPONSIVE TABLE PANEL -->