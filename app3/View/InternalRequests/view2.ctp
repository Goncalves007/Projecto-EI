<?php
$department_id = $this->Session->read('Auth.User.department_id');
$status = $this->Session->read('Auth.User.boss');
$userID = $this->Session->read('Auth.User.id');
$head = $this->Session->read('Auth.User.group_id');


if($head==2){ 
 echo $this->element('nav_menu_Register');
    }elseif ($head==7 || $head==8 || $head==9) {
      echo $this->element('nav_menu_other');
    }elseif ($head==6) {
      echo $this->element('nav_menu_Department');
    }

?>

<?php echo $this->element('content_header'); ?>
<?php 
//echo debug($internalRequest);
//echo debug($Budgets);
 ?>
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h5><?php echo __("Reference Number:  ".$internalRequest['InternalRequest']['reference_application']); ?></h5>
                </div>
                <!--End Page Header -->
            </div>
<div class="col-lg-12">
<div class="col-lg-4">
<div class="well">
<h4><strong>REQUEST DETAILS</strong></h4>
<hr>
<div class="form-group">
<strong><?php echo __('Office :'); ?></strong>
			<?php echo h($internalRequest['Office']['nome']); ?>
</div>
<div class="form-group">
<strong><?php echo __('Administration :'); ?></strong>
			<?php echo h($internalRequest['Administration']['label']); ?>		
</div>
<div class="form-group">
<strong><?php echo __('Department :'); ?></strong>
			<?php echo h($internalRequest['Department']['label']); ?>
</div>			
<div class="form-group">
<strong><?php echo __('Beneficiary'); ?></strong>	
			<?php echo h($internalRequest['Beneficiary']['name']); ?>
</div>
<div class="form-group">
<strong><?php echo __('Provider :'); ?></strong>
			<?php echo h($internalRequest['Provider']['name']); ?>
</div>
<div class="form-group">
<strong><?php echo __('Payment Details :'); ?></strong>
			<?php echo h($internalRequest['InternalRequest']['payment_details']); ?>
</div>
<div class="col-lg-8">
<div class="col-lg-6">
<div class="form-group">
<strong><?php echo __('Amount:'); ?></strong>
			<?php echo h($internalRequest['InternalRequest']['amount']); ?>	
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<strong><?php echo __('Currency:'); ?></strong>
			<?php echo h($internalRequest['Currency']['label']); ?>
</div>
</div>
</div>
<div style="clear: both"></div>
<div class="form-group">
<strong><?php echo __('Amount In Words :'); ?></strong>
			<?php echo h($internalRequest['InternalRequest']['amount_in_words']); ?>	
</div>

<?php if (!empty($internalRequest['Report']) ) {?>
   <div class="form-group">
   <?php echo $this->Html->link('Download Invoice', array('controller' => 'reports', 'action' => 'viewdown', $internalRequest['Report'][0]['id']));?>
</div>
<?php }elseif (empty($internalRequest['Report'])) {?>
    <em style="color:#800000"><b>Nenhum Ficheiro anexado.</b></em>
<?php } ?>
</div>
</div>
<div class="col-lg-3"> 
<div class="well well-lg">
<h4><strong>APPLICANT DETAILS</strong></h4>
<hr>
<div class="form-group">
<strong><?php echo __('Full Name :'); ?></strong>
            <?php echo h($internalRequest['User']['name']); ?>
</div>
<div class="form-group">
<strong><?php echo __('E - mail :'); ?></strong>
            <?php echo h($internalRequest['User']['email']); ?>
</div>
<?php
if ($head==2) {?>
    <div class="form-group">
<strong><?php echo $this->Html->link('My Requests', array('controller' => 'reports', 'action' => 'index', $internalRequest['User']['id'], $internalRequest['User']['department_id'])); ?></strong>
</div>
<?php
}elseif ($head!=2) {?>
    <div class="form-group">
<strong><?php echo $this->Html->link('Last Applicant Requests', array('controller' => 'reports', 'action' => 'index', $internalRequest['User']['id'], $internalRequest['User']['department_id'])); ?></strong>
</div>
<?php
}
?>

<div style="clear: both"></div>
</div>
</div>
<div class="col-lg-4">
<?php if (($head!=2 && $head!=3)) { ?>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Endorsements Systerm
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Available Budget</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Endorsement</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                            <?php if($head == 6 || $head == 8){  ?>
                               <div class="tab-pane fade in active" id="home">
                               <?php foreach ($Budgets as $budget): ?>
                                    <h4>Available Budget</h4>
                                    <p>
                                      <div class="panel panel-primary text-center no-boder">
				                        <div class="panel-body green">
				                            <i class="fa fa fa-floppy-o fa-3x"></i>
				                            <h3><?php echo $budget['Budget']['budget'] ?> MZN</h3>
				                        </div>
				                        <div class="panel-footer">
				                        <span class="panel-eyecandy-title">
                                <em>
                                <?php 
                                 if (empty($budget['Budget']['modified'])) {
                                   echo "any Reqest was Done yet!";
                                 }elseif(!empty($budget['Budget']['modified'])){
                                  echo "Last Reqest ".$budget['Budget']['modified'];
                                 }
                                
                                ?>
                                </em>
				                            </span>
				                        </div>
                                      </div>
                                    </p>
                               <?php endforeach; ?>
                             </div>
                            <?php }  ?>
                           
                                <div class="tab-pane fade" id="profile">
                                    <h4>Endorsement</h4>
                                    <p>
                                      <fieldset class="col-lg-7">
                                       <?php if ($head == 1) { ?>                       
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],1,$internalRequest['InternalRequest']['department_id'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],4,$internalRequest['InternalRequest']['department_id'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],0),array('class' => 'pure-button'));?>
                                        </div>
                                       <?php } ?>
                                       <?php if($head==6) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] !=1 && $internalRequest['InternalRequest']['request_status'] !=3 && $internalRequest['InternalRequest']['request_status'] !=5 && $internalRequest['InternalRequest']['request_status'] !=7 && $internalRequest['InternalRequest']['request_status'] !=4 && $internalRequest['InternalRequest']['request_status'] !=6 && $internalRequest['InternalRequest']['request_status'] !=8) {?>
                                       <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],1,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                       <?php }}elseif ($head==7) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] !=3 && $internalRequest['InternalRequest']['request_status'] !=5 && $internalRequest['InternalRequest']['request_status'] !=7 && $internalRequest['InternalRequest']['request_status'] !=6 && $internalRequest['InternalRequest']['request_status'] !=8) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],3,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }}elseif ($head==8) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] !=1 && $internalRequest['InternalRequest']['request_status'] !=5 && $internalRequest['InternalRequest']['request_status'] !=7 && $internalRequest['InternalRequest']['request_status'] !=8) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Resource available', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],5,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }}elseif ($head==9) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] !=1 && $internalRequest['InternalRequest']['request_status'] !=3 && $internalRequest['InternalRequest']['request_status'] !=7 && $internalRequest['InternalRequest']['request_status'] !=8) {?>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Submit Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],7,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Pay Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],9,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }} ?>
                                        <?php if ($head==6) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] !=1 && $internalRequest['InternalRequest']['request_status'] !=3 && $internalRequest['InternalRequest']['request_status'] !=5 && $internalRequest['InternalRequest']['request_status'] !=7 && $internalRequest['InternalRequest']['request_status'] !=4 && $internalRequest['InternalRequest']['request_status'] !=6 && $internalRequest['InternalRequest']['request_status'] !=8) {?>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],2,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],0),array('class' => 'pure-button'));?>
                                        </div>
                                        <?php }}elseif ($head==7) {?>
                                         <?php if ($internalRequest['InternalRequest']['request_status'] !=3 && $internalRequest['InternalRequest']['request_status'] !=5 && $internalRequest['InternalRequest']['request_status'] !=7 && $internalRequest['InternalRequest']['request_status'] !=6 && $internalRequest['InternalRequest']['request_status'] !=8) {?> 
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],4,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],0),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }}elseif ($head==8) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] !=1 && $internalRequest['InternalRequest']['request_status'] !=5 && $internalRequest['InternalRequest']['request_status'] !=7 && $internalRequest['InternalRequest']['request_status'] !=8) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Resource Unavailable', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],6,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],0),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }}?>
                                      </fieldset>
                                    </p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--End Basic Tabs   -->
<?php } ?>

</div>
</div>		
<?php echo $this->element('content_footer'); ?>