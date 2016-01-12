<?php
$head = $this->Session->read('Auth.User.group_id');
$status = $this->Session->read('Auth.User.boss');
$userID = $this->Session->read('Auth.User.id');
?>
<?php 

if($head==2){ 
 echo $this->element('nav_menu_Register');
    }elseif ($head==7 || $head==8 || $head==9) {
      echo $this->element('nav_menu_other');
    }elseif ($head==6) {
      echo $this->element('nav_menu_Department');
    }

 ?>

<?php //echo debug($externalRequest) ?>
<?php echo $this->element('content_header'); ?>

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h5><?php echo __("Reference Number:  ".$externalRequest['ExternalRequest']['reference_application']); ?></h5>
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
			<?php echo h($externalRequest['Office']['nome']); ?>
</div>
<div class="form-group">
<strong><?php echo __('Administration :'); ?></strong>
			<?php echo h($externalRequest['Administration']['label']); ?>		
</div>
<div class="form-group">
<strong><?php echo __('Department :'); ?></strong>
			<?php echo h($externalRequest['Department']['label']); ?>
</div>			
<div class="form-group">
<strong><?php echo __('External Beneficiary'); ?></strong>	
			<?php echo h($externalRequest['ExternalBeneficiary']['name']); ?>
</div>
<div class="form-group">
<strong><?php echo __('Provider :'); ?></strong>
			<?php echo h($externalRequest['Provider']['name']); ?>
</div>
<div class="form-group">
<strong><?php echo __('Payment Details :'); ?></strong>
			<?php echo h($externalRequest['ExternalRequest']['payment_details']); ?>
</div>
<div class="col-lg-8">
<div class="col-lg-6">
<div class="form-group">
<strong><?php echo __('Amount:'); ?></strong>
			<?php echo h($externalRequest['ExternalRequest']['amount']); ?>	
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<strong><?php echo __('Currency:'); ?></strong>
			<?php echo h($externalRequest['Currency']['label']); ?>
</div>
</div>
</div>
<div style="clear: both"></div>
<div class="form-group">
<strong><?php echo __('Amount In Words :'); ?></strong>
			<?php echo h($externalRequest['ExternalRequest']['amount_in_words']); ?>	
</div>
<?php if (!empty($externalRequest['Report']) ) {?>
   <div class="form-group">
   <?php echo $this->Html->link('Download Invoice', array('controller' => 'reports', 'action' => 'viewdown', $externalRequest['Report'][0]['id']));?>
</div>
<?php }elseif (empty($externalRequest['Report'])) {?>
    <em style="color:#800000"><b>Nenhum Ficheiro anexado.</b></em>
<?php } ?>
</div>
</div>
<div class="col-lg-3"> 
<div class="well well-lg">
<h4><strong>PROFORMA DETAILS</strong></h4>
<hr>
<div class="form-group">
<strong><?php echo __('Proposal Value :'); ?></strong>
			<?php echo h($Proformas[0]['proposal_value']); ?>
</div>
<div class="form-group">
<strong><?php echo __('Proposal Invoice Number :'); ?></strong>
			<?php echo h($Proformas[0]['proposal_invoice_number']); ?>
</div>
<div class="form-group">
<strong><?php echo __('Created :'); ?></strong>
			<?php echo h($externalRequest['ExternalRequest']['created']); ?>
</div>
<div class="form-group">
<?php echo $this->Html->link('Download Proforma Invoice', array('controller' => 'Proformas', 'action' => 'viewdown', $Proformas[0]['id']));?>
</div>
<div style="clear: both"></div>

<div class="form-group">
<?php echo $this->Html->link('', array('controller' => 'Proformas', 'action' => 'viewdown', $Proformas[0]['id']));?>
</div>
</div>
<div class="well well-lg">
<h4><strong>APPLICANT DETAILS</strong></h4>
<hr>
<div class="form-group">
<strong><?php echo __('Full Name :'); ?></strong>
            <?php echo h($externalRequest['User']['name']); ?>
</div>
<div class="form-group">
<strong><?php echo __('E - mail :'); ?></strong>
            <?php echo h($externalRequest['User']['email']); ?>
</div>
<?php
if ($status==0) {?>
    <div class="form-group">
<strong><?php echo $this->Html->link('My Requests', array('controller' => 'reports', 'action' => 'index', $externalRequest['User']['id'], $externalRequest['User']['department_id'])); ?></strong>
</div>
<?php
}elseif ($status==1) {?>
    <div class="form-group">
<strong><?php echo $this->Html->link('Last Applicant Requests', array('controller' => 'reports', 'action' => 'index', $externalRequest['User']['id'], $externalRequest['User']['department_id'])); ?></strong>
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
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],1,$externalRequest['ExternalRequest']['department_id'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],4,$externalRequest['ExternalRequest']['department_id'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],0),array('class' => 'pure-button'));?>
                                        </div>
                                       <?php } ?>
                                       <?php if($head==6) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] !=1 && $externalRequest['ExternalRequest']['request_status'] !=3 && $externalRequest['ExternalRequest']['request_status'] !=5 && $externalRequest['ExternalRequest']['request_status'] !=7 && $externalRequest['ExternalRequest']['request_status'] !=4 && $externalRequest['ExternalRequest']['request_status'] !=6 && $externalRequest['ExternalRequest']['request_status'] !=8) {?>
                                       <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],1,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                       <?php }}elseif ($head==7) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] !=3 && $externalRequest['ExternalRequest']['request_status'] !=5 && $externalRequest['ExternalRequest']['request_status'] !=7 && $externalRequest['ExternalRequest']['request_status'] !=6 && $externalRequest['ExternalRequest']['request_status'] !=8) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],3,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }}elseif ($head==8) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] !=1 && $externalRequest['ExternalRequest']['request_status'] !=5 && $externalRequest['ExternalRequest']['request_status'] !=7 && $externalRequest['ExternalRequest']['request_status'] !=8) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Resource available', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],5,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }}elseif ($head==9) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] !=1 && $externalRequest['ExternalRequest']['request_status'] !=3 && $externalRequest['ExternalRequest']['request_status'] !=7 && $externalRequest['ExternalRequest']['request_status'] !=8) {?>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Submit Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],7,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Pay Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],9,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }} ?>
                                        <?php if ($head==6) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] !=1 && $externalRequest['ExternalRequest']['request_status'] !=3 && $externalRequest['ExternalRequest']['request_status'] !=5 && $externalRequest['ExternalRequest']['request_status'] !=7 && $externalRequest['ExternalRequest']['request_status'] !=4 && $externalRequest['ExternalRequest']['request_status'] !=6 && $externalRequest['ExternalRequest']['request_status'] !=8) {?>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],2,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],0),array('class' => 'pure-button'));?>
                                        </div>
                                        <?php }}elseif ($head==7) {?>
                                         <?php if ($externalRequest['ExternalRequest']['request_status'] !=3 && $externalRequest['ExternalRequest']['request_status'] !=5 && $externalRequest['ExternalRequest']['request_status'] !=7 && $externalRequest['ExternalRequest']['request_status'] !=6 && $externalRequest['ExternalRequest']['request_status'] !=8) {?> 
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],4,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],0),array('class' => 'pure-button'));?>
                                        </div>
                                      <?php }}elseif ($head==8) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] !=1 && $externalRequest['ExternalRequest']['request_status'] !=5 && $externalRequest['ExternalRequest']['request_status'] !=7 && $externalRequest['ExternalRequest']['request_status'] !=8) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Resource Unavailable', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],6,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],0),array('class' => 'pure-button'));?>
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