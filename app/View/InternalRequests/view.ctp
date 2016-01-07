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
<!-- start: PAGE CONTENT -->
          <div class="invoice">
            <div class="row invoice-logo">
              <div class="col-sm-6">
              <?php
              //echo debug($Budgets);
              
              ?>
              </div>
              <div class="col-sm-6">
                <p>
                  <?php echo __($internalRequest['InternalRequest']['reference_application']); ?>
                  <span> <?php echo __($internalRequest['InternalRequest']['created']); ?> </span>
                </p>
                <strong> Payment details : </strong><span style="color:#606060"><em><?php echo h($internalRequest['InternalRequest']['payment_details']); ?></em></span>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h4>Applicant Details:</h4>
                <div class="well">
                  <address>
                    <strong><?php echo __('Full Name :'); ?></strong>
                    <br>
                     <?php echo h($internalRequest['User']['name']); ?>
                  </address>

                  <address>
                  <strong><?php echo __('E - mail :'); ?></strong>
                  <br>
                    <?php echo h($internalRequest['User']['email']); ?>
                  </address>
                  <hr>
                  <address>
                  <strong><?php echo __('Beneficiary Name :'); ?></strong>
                  <br>
                    <?php echo h($internalRequest['InternalRequest']['name']); ?>
                  </address>
                  <address>
                    <?php
                      if ($head==2) {?>
                          <div class="form-group">
                      <strong><?php echo $this->Html->link('My Requests', array('controller' => 'reports', 'action' => 'index', $internalRequest['User']['id'], $internalRequest['User']['department_id']),array('class' => 'btn btn-light-grey btn-xs')); ?></strong>
                      </div>
                      <?php
                      }elseif ($head!=2) {?>
                          <div class="form-group">
                      <strong><?php echo $this->Html->link('Last Applicant Requests', array('controller' => 'reports', 'action' => 'index', $internalRequest['User']['id'], $internalRequest['User']['department_id']),array('class' => 'btn btn-light-grey btn-xs')); ?></strong>
                      </div>
                      <?php
                      }
                      ?>
                  </address>
                </div>
              </div>
              <div class="col-sm-4 pull-right">
               
                <?php if (($head!=2 && $head!=3)) { ?>
                      <div class="tabbable tabs-left">
                        <div class="panel-heading">
                            Endorsements Systerm
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                              <?php if($head == 6 || $head == 8 || $head == 7){  ?>
                                <li class="active"><a href="#home" data-toggle="tab">Available Budget</a>
                                </li>
                              <?php } ?>
                                <li><a href="#profile" data-toggle="tab">Endorsement</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                            <?php if($head == 6 || $head == 8 || $head == 7){  ?>
                               <div class="tab-pane fade in active" id="home">
                               <?php foreach ($Budgets as $budget): ?>
                                    <h4>Available Budget</h4>
                                    <?php
                                         if (isset($sms)) {
                                           echo "<em style='color:red'>$sms</em>";
                                         }else{
                                          $sms="";
                                         }
                                     ?>
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
                                    
                                    <p>
                                      <fieldset class="col-lg-7">
                                       <?php if ($head == 1) { ?>                       
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],1,$internalRequest['InternalRequest']['department_id'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],4,$internalRequest['InternalRequest']['department_id'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],0,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                       <?php } ?>
                                       <?php if($head==6) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] ==0) {?>
                                       <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],1,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                       <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==1) { ?> 
                                       <em>Aguardando o Ger. Financeiro ...</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==5) { ?>
                                       <em>Aguarda Por Submissao</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==7) { ?>
                                       <em>Aguarda Pagamento</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==9) { ?>
                                        <a class="btn btn-teal show-tab">
                                        <em>Requisicao Paga</em>
                                      </a>
                                      <?php }else{ ?>
                                      <a class="btn btn-red show-tab">
                                       <em>Requisicao Indiferida</em>
                                      </a>
                                      <?php }} ?>
                                      <?php if ($head==7) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] ==1) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],3,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==0) { ?> 
                                       <em>Aguardando Ch. Departamento ...</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==5) { ?>
                                       <em>Aguarda Por Submissao</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==7) { ?>
                                       <em>Aguarda Pagamento</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==9) { ?>
                                        <a class="btn btn-teal show-tab">
                                        <em>Requisicao Paga</em>
                                      </a>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==3) {?>
                                       <a class="btn btn-light-grey btn-xs">
                                        <em>Aguarda Tesoreiro</em>
                                      </a>
                                     <?php }
                                      else{ ?>
                                      <a class="btn btn-red show-tab">
                                       <em>Requisicao Indiferida</em>
                                      </a>
                                      <?php }} ?>
                                      <?php if ($head==8) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] ==3) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Resource available', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],5,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==0) { ?>
                                        <em>Aguardando o Chef. Departamento ...</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==1) { ?> 
                                       <em>Aguardando o Ger. Financeiro ...</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==5) { ?>
                                       <em>Aguarda Por Submissao</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==7) { ?>
                                       <em>Aguarda Pagamento</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==9) { ?>
                                        <a class="btn btn-teal show-tab">
                                        <em>Requisicao Paga</em>
                                      </a>
                                      <?php }else{ ?>
                                      <a class="btn btn-red show-tab">
                                       <em>Requisicao Indiferida</em>
                                      </a>
                                      <?php }} ?>
                                      <?php if ($head==9) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] ==5) {?>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Submit Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],7,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                        <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==7) {?>
                                       <div class="form-group">
                                        <?php echo $this->Html->link('Pay Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],9,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],1,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==0) { ?>
                                        <em>Aguardando o Chef. Departamento ...</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==1) { ?>
                                       <em>Aguardando o Ger. Financeiro ...</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==3) { ?>
                                        <em>Aguardando a Tesoraria ...</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==7) { ?>
                                       <em>Aguarda Pagamento</em>
                                      <?php }elseif ($internalRequest['InternalRequest']['request_status'] ==9) { ?>
                                      <a class="btn btn-teal show-tab">
                                        <em>Requisicao Paga</em>
                                      </a>
                                      <?php }else{ ?>
                                      <a class="btn btn-red show-tab">
                                       <em>Requisicao Indiferida</em>
                                      </a>
                                      <?php }} ?>
                                        <?php if ($head==6) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] ==0) {?>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],2,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],0,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                        <?php }}elseif ($head==7) {?>
                                         <?php if ($internalRequest['InternalRequest']['request_status'] ==1) {?> 
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],4,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],0,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                      <?php }}elseif ($head==8) {?>
                                        <?php if ($internalRequest['InternalRequest']['request_status'] ==3) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Resource Unavailable', array('action' => 'Endorsement',$internalRequest['InternalRequest']['id'],6,$internalRequest['InternalRequest']['department_id'],$internalRequest['InternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$internalRequest['InternalRequest']['amount'],0,$internalRequest['User']['email']),array('class' => 'btn btn-default'));?>
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
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th class="hidden-480"> Office </th>
                      <th class="hidden-480"> Administration </th>
                      <th class="hidden-480"> Department </th>
                      <th class="hidden-480"> Beneficiary </th>
                      <th class="hidden-480"> Provider </th>
                      <th class="hidden-480"> Amount </th>
                      <th class="hidden-480"> Currency </th>
                      <th class="hidden-480"> File </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="hidden-480"> <?php echo h($internalRequest['Office']['nome']); ?> </td>
                      <td class="hidden-480"> <?php echo h($internalRequest['Administration']['label']); ?> </td>
                      <td class="hidden-480"> <?php echo h($internalRequest['Department']['label']); ?> </td>
                      <td class="hidden-480"> <?php echo h($internalRequest['Beneficiary']['name']); ?> </td>
                      <td class="hidden-480"> <?php echo h($internalRequest['Provider']['name']); ?> </td>
                      <td class="hidden-480"> <?php echo h($internalRequest['InternalRequest']['amount']); ?> </td>
                      <td class="hidden-480"> <?php echo h($internalRequest['Currency']['label']); ?> </td>
                      <td><?php if (!empty($internalRequest['Report']) ) {?>
   <div class="form-group">
   <?php echo $this->Html->link('<i class="fa fa-download"></i>', array('controller' => 'reports', 'action' => 'viewdown', $internalRequest['Report'][0]['id']), array('class' => 'btn btn-green btn-xs','escape'=>false));?>
   <?php echo $this->Html->link('<i class="fa clip-file-pdf"></i>', array('action' => 'pdf', $internalRequest['Report'][0]['id']), array('class' => 'btn btn-dark-grey btn-xs','escape'=>false));?>
</div>
<?php }elseif (empty($internalRequest['Report'])) {?>
    <em style="color:#800000"><b>Nenhum Ficheiro anexado.</b></em>
<?php } ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>
          <!-- end: PAGE CONTENT-->