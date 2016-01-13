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
                  <?php echo __($externalRequest['ExternalRequest']['reference_application']); ?>
                  <span> <?php echo __($externalRequest['ExternalRequest']['created']); ?> </span>
                </p>
                <strong> Payment details : </strong><span style="color:#606060"><em><?php echo h($externalRequest['ExternalRequest']['payment_details']); ?></em></span>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h4>Pro-Forma Details:</h4>
                <div class="well">
                  <address>
                   <strong><?php echo __('Proposal Value :'); ?></strong>
                    <br>
                     <?php
                     $Proformas_format_number = number_format($Proformas[0]['proposal_value'], 2, ',', ' ');
                      echo h($Proformas_format_number); ?>
                  </address>
                  <address>
                  <strong><?php echo __('Proposal Invoice Number :'); ?></strong>
                  <br>
                  <?php echo h($Proformas[0]['proposal_invoice_number']); ?>
                  </address>
                  
                </div>
              </div>
              <div class="col-sm-3">
                <h4>Applicant Details:</h4>
                <div class="well">
                  <address>
                    <strong><?php echo __('Full Name :'); ?></strong>
                    <br>
                     <?php echo h($externalRequest['User']['name']); ?>
                  </address>
                  <address>
                  <strong><?php echo __('E - mail :'); ?></strong>
                  <br>
                    <?php echo h($externalRequest['User']['email']); ?>
                  </address>
                  <address>
                    <?php
                      if ($head==2) {?>
                          <div class="form-group">
                      <strong><?php echo $this->Html->link('My Requests', array('controller' => 'reports', 'action' => 'index', $externalRequest['User']['id'], $externalRequest['User']['department_id']),array('class' => 'btn btn-light-grey btn-xs')); ?></strong>
                      </div>
                      <?php
                      }elseif ($head!=2) {?>
                          <div class="form-group">
                      <strong><?php echo $this->Html->link('Last Applicant Requests', array('controller' => 'reports', 'action' => 'index', $externalRequest['User']['id'], $externalRequest['User']['department_id']),array('class' => 'btn btn-light-grey btn-xs')); ?></strong>
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
                                    <h3><?php
                                    $budget_format_number = number_format($budget['Budget']['budget'], 2, ',', ' ');
                                     echo $budget_format_number ?> MZN</h3>
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
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],1,$externalRequest['ExternalRequest']['department_id'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],4,$externalRequest['ExternalRequest']['department_id'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],0,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                       <?php } ?>
                                       <?php if($head==6) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] ==0) {?>
                                       <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],1,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                       <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==1) { ?> 
                                       <em>Aguardando o Ger. Financeiro ...</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==5) { ?>
                                       <em>Aguarda Por Submissao</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==7) { ?>
                                       <em>Aguarda Pagamento</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==9) { ?>
                                        <a class="btn btn-teal show-tab">
                                        <em>Requisicao Paga</em>
                                      </a>
                                      <?php }else{ ?>
                                      <a class="btn btn-red show-tab">
                                       <em>Requisicao Indiferida</em>
                                      </a>
                                      <?php }} ?>
                                      <?php if ($head==7) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] ==1) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Accept Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],3,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==0) { ?> 
                                       <em>Aguardando Ch. Departamento ...</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==5) { ?>
                                       <em>Aguarda Por Submissao</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==7) { ?>
                                       <em>Aguarda Pagamento</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==9) { ?>
                                        <a class="btn btn-teal show-tab">
                                        <em>Requisicao Paga</em>
                                      </a>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==3) {?>
                                       <a class="btn btn-teal show-tab">
                                        <em>Aguarda Tesoreiro</em>
                                      </a>
                                     <?php }
                                      else{ ?>
                                      <a class="btn btn-red show-tab">
                                       <em>Requisicao Indiferida</em>
                                      </a>
                                      <?php }} ?>
                                      <?php if ($head==8) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] ==3) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Resource available', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],5,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==0) { ?>
                                        <em>Aguardando o Chef. Departamento ...</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==1) { ?> 
                                       <em>Aguardando o Ger. Financeiro ...</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==5) { ?>
                                       <em>Aguarda Por Submissao</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==7) { ?>
                                       <em>Aguarda Pagamento</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==9) { ?>
                                        <a class="btn btn-teal show-tab">
                                        <em>Requisicao Paga</em>
                                      </a>
                                      <?php }else{ ?>
                                      <a class="btn btn-red show-tab">
                                       <em>Requisicao Indiferida</em>
                                      </a>
                                      <?php }} ?>
                                      <?php if ($head==9) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] ==5) {?>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Submit Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],7,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                        <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==7) {?>
                                        <?php if (empty($externalRequest['Endorso'][0]['guia_entrega']) || empty($externalRequest['Endorso'][0]['n_factura']) || empty($externalRequest['Endorso'][0]['justificada'])){
                                          echo "<em>Dados incompletos para o pagamento;</em><br><br><strong>".
                                           $this->Html->link('Completar', array('action' =>'check_status'),array('class' => 'btn btn-light-grey btn-xs'))
                                           ."</strong>";
                                          }else{?>
                                         <div class="form-group">
                                        <?php echo $this->Html->link('Pay Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],9,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],1,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                         <?php } ?>
                                       
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==0) { ?>
                                        <em>Aguardando o Chef. Departamento ...</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==1) { ?>
                                       <em>Aguardando o Ger. Financeiro ...</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==3) { ?>
                                        <em>Aguardando a Tesoraria ...</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==7) { ?>
                                       <em>Aguarda Pagamento</em>
                                      <?php }elseif ($externalRequest['ExternalRequest']['request_status'] ==9) { ?>
                                      <a class="btn btn-teal show-tab">
                                        <em>Requisicao Paga</em>
                                      </a>
                                      <?php }else{ ?>
                                      <a class="btn btn-red show-tab">
                                       <em>Requisicao Indiferida</em>
                                      </a>
                                      <?php }} ?>
                                        <?php if ($head==6) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] ==0) {?>
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],2,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],0,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                        <?php }}elseif ($head==7) {?>
                                         <?php if ($externalRequest['ExternalRequest']['request_status'] ==1) {?> 
                                        <div class="form-group">
                                        <?php echo $this->Html->link('Dismiss Request', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],4,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],0,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
                                        </div>
                                      <?php }}elseif ($head==8) {?>
                                        <?php if ($externalRequest['ExternalRequest']['request_status'] ==3) {?>
                                           <div class="form-group">
                                        <?php echo $this->Html->link('Resource Unavailable', array('action' => 'Endorsement',$externalRequest['ExternalRequest']['id'],6,$externalRequest['ExternalRequest']['department_id'],$externalRequest['ExternalRequest']['reference_application'],$Budgets[0]['Budget']['id'],$Budgets[0]['Budget']['budget'],$externalRequest['ExternalRequest']['amount'],0,$externalRequest['User']['email']),array('class' => 'btn btn-default'));?>
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
                      <td class="hidden-480"> <?php echo h($externalRequest['Office']['nome']); ?> </td>
                      <td class="hidden-480"> <?php echo h($externalRequest['Administration']['label']); ?> </td>
                      <td class="hidden-480"> <?php echo h($externalRequest['Department']['label']); ?> </td>
                      <td class="hidden-480"> <?php echo h($externalRequest['ExternalBeneficiary']['name']); ?> </td>
                      <td class="hidden-480"> <?php echo h($externalRequest['Provider']['name']); ?> </td>
                      <td class="hidden-480"> <?php 
                      $amount_format_number = number_format($externalRequest['ExternalRequest']['amount'], 2, ',', ' ');
                      echo $amount_format_number; ?> </td>
                      <td class="hidden-480"> <?php echo h($externalRequest['Currency']['label']); ?> </td>
                      <td><?php if (!empty($externalRequest['Report']) ) {?>
   <div class="form-group">
   <?php echo $this->Html->link('<i class="fa fa-download"></i>', array('controller' => 'reports', 'action' => 'viewdown', $externalRequest['Report'][0]['id']), array('class' => 'btn btn-green btn-xs','escape'=>false));?>
   <?php echo $this->Html->link('<i class="fa clip-file-pdf"></i>', array('action' => 'pdf', $externalRequest['Report'][0]['id']), array('class' => 'btn btn-dark-grey btn-xs','escape'=>false));?>
</div>
<?php }elseif (empty($externalRequest['Report'])) {?>
    <em style="color:#800000"><b>Nenhum Ficheiro anexado.</b></em>
<?php } ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>
          <!-- end: PAGE CONTENT-->
          <?php echo debug($externalRequest) ?>