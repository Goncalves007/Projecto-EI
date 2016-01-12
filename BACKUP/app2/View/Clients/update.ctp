<?php
$department_id = $this->Session->read('Auth.User.department_id');
$status = $this->Session->read('Auth.User.boss');
$userID = $this->Session->read('Auth.User.id');
$head = $this->Session->read('Auth.User.group_id');

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
                  <?php echo __($Reports[0]['Client']['client_name']); ?>
                  <span> 
                  <?php
                       if($Reports[0]['Client']['status'] == 1){
                          if(($data_actual) > ($Extends[0]['Extend']['new_end_date'])){
                            echo "<em style='color:red'>Contrato expirou</em> na data: ".$Extends[0]['Extend']['new_end_date'];
                          }else{
                      echo $Reports[0]['Client']['contract_name'];
                     }

                       }elseif($Reports[0]['Client']['status'] == 0){
                        if(($data_actual) > ($Reports[0]['Client']['end_date'])) {
                      echo "<em style='color:red'>Contrato expirou</em> na data: ".$Reports[0]['Client']['end_date'];
                     }else{
                      echo $Reports[0]['Client']['contract_name'];
                    }
                    }
                   ?>
                  </span>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <h4>Detalhes:</h4>
                <div class="col-sm-4">
                  <address>
                  <strong><?php echo __('Nome do Cliente :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['Client']['client_name']); ?>
                  </address>
                  <address>
                  <strong><?php echo __('Nome do Contrato :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['Client']['contract_name']); ?>
                  </address>
                  <address>
                  <strong><?php echo __('Tipo de Contrato :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['ContractType']['name']); ?>
                  </address>
                  <address>
                  <strong><?php echo __('Area do Contrato :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['Area']['nome']); ?>
                  </address>
                  <address>
                  <strong><?php echo __('Renovavel :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['Renewable']['name']); ?>
                  </address>
                  <address>
                  <strong><?php echo __('Data de Inicio :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['Client']['start_date']); ?>
                  </address>
                  <?php if($Reports[0]['Client']['status'] == 1){ ?>
                  <address>
                  <strong><?php echo __('Data prorrogada para :'); ?></strong>
                  <br>
                    <?php echo __($Extends[0]['Extend']['new_end_date']); ?>
                  </address>
                  <?php }elseif ($Reports[0]['Client']['status'] == 0) { ?>
                  <address>
                  <strong><?php echo __('Data Fim :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['Client']['end_date']); ?>
                  </address>
                  <?php } ?>
                  <?php if($Reports[0]['Client']['status'] == 0){ ?>
                  <address>
                    <?php echo $this->Html->link("<div class='label label-sm label-primary'><i class='fa fa-edit'></i></div> Editar ", array('controller' => 'clients', 'action' =>'edit',$Reports[0]['Client']['id']),array('escape' => false)); ?>
                  </address>
                  <?php } ?>
                  </div>
                 
                  <div class="col-sm-4">
                  <h4>Dados do Parceiro:</h4>
                  <?php if(!empty($Reports[0]['Partner']['name'])){ ?>
                  <address>
                  <strong><?php echo __('Nome :'); ?></strong>
                  <br>
                   <?php  echo __($Reports[0]['Partner']['name']); ?>
                   
                  </address>
                  <address>
                  <strong><?php echo __('Representante :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['Partner']['name_contact']); ?>
                  </address>
                  <address>
                  <strong><?php echo __('Contacto :'); ?></strong>
                  <br>
                    <?php echo __($Reports[0]['Partner']['contact']); ?>
                  </address>
                  <?php }else{
                    echo __('Sem Parceria');
                    } ?>
                  </div>

                  <div class="col-sm-4">
                  <address>
                  <strong><?php echo __('Objecto do Contrato :'); ?></strong>
                  <br>
                  <div class="well">
                   <?php echo __($Reports[0]['Client']['contract_subject']); ?>
                  </div> 
                  </address>
                  </div>

                <div class="col-sm-6">
                <h4>Facturacoes Mensais</h4>
                <?php if(!empty($UpdateBudgets)){ ?>
                  <table border="1">
                      <tr>
                        <th>Data da Actualizacao</th>
                        <th>Valor Usado</th>
                      </tr>
                    <?php foreach($UpdateBudgets as $UpdateBudget){ ?>
                      <tr>
                        <td style="text-align: center"><?php echo $UpdateBudget['UpdateBudget']['date_update'] ?></td>
                        <td style="text-align: center"><?php echo $UpdateBudget['UpdateBudget']['used_budget'] ?></td>
                      </tr>
                    <?php } ?>
                  </table>
                <?php }elseif (empty($UpdateBudgets)) {
                 echo __('Sem facturacao mensal!'); 
                } ?>
                </div>


                <div class="col-sm-6">
                <h4>Actulizacoes do Budget</h4>
                <?php if(isset($RenewBudgets)){ ?>
                  <table border="1">
                      <tr>
                        <th>Valor anterior</th>
                        <th>Valor posterior</th>
                        <th>Data da Actualizacao</th>
                      </tr>
                    <?php foreach($RenewBudgets as $RenewBudget){ ?>
                      <tr>
                        <td style="text-align: center"><?php echo $RenewBudget['RenewBudget']['old_budget'] ?></td>
                        <td style="text-align: center"><?php echo $RenewBudget['RenewBudget']['actual_budget'] ?></td>
                        <td style="text-align: center"><?php echo $RenewBudget['RenewBudget']['created'] ?></td>
                      </tr>
                    <?php } ?>
                  </table>
                <?php }elseif (!isset($RenewBudgets)) {
                 echo __('Nenhuma actulizacao foi feita'); 
                } ?>
                </div>

                </div>
                <div class="col-sm-4 pull-right">
                
                      <div class="tabbable tabs-left">
                        <div class="panel-heading">
                            Actualizacoes
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Budget Disponiveis</a>
                                </li>
                                <li><a href="#facturacao" data-toggle="tab">Facturacao</a>
                                </li>
                                <?php if($Reports[0]['Renewable']['id'] == 1){ ?>
                                <li><a href="#prorogacao" data-toggle="tab">Renovacao</a>
                                </li>
                                <?php }?>
                            </ul>

                            <div class="tab-content">
                               <div class="tab-pane fade in active" id="home">
                                    <h4>Budget actual</h4>
                                    <p>
                                      <div class="panel panel-primary text-center no-boder">
                                <div class="panel-body green">
                                    <i class="fa fa fa-floppy-o fa-3x"></i>
                                    <h3><?php echo $Reports[0]['Client']['balance'] ?> MZN</h3>
                                </div>
                                <div class="panel-footer">
                                <span class="panel-eyecandy-title">
                                <em>
                                <?php
                                   echo'Budget total :'.$Reports[0]['Client']['budget'].' MZN';
                                ?>
                                </em>
                                    </span>
                                </div>
                                      </div>
                                    </p>
                              </div>
                              <div class="tab-pane fade" id="facturacao">
                                    <p>
                                      <fieldset class="col-lg-8">
                                      <?php echo $this->Form->create('Client'); ?>
                                      <div class="form-group">
                                      <?php  
                                        echo $this->Form->input('used_budget',array('class' => 'form-control','placeholder'=>'Facturacao mensal','label'=>false));
                                        ?>
                                     </div>
                                    <label>Na data</label>
                                     <?php  
                                          echo $this->Form->input('date_update',array('type' => 'date','label' =>false));
                                         ?>
                                    <br>
                                   <?php
                                    echo $this->Form->hidden('valor1', array('hiddenField' => true, 'value'=>$Reports[0]['Client']['balance']));
                                    echo $this->Form->hidden('valor2', array('hiddenField' => true, 'value'=>$Reports[0]['Client']['used_budget']));
                                    ?>
                                       <?php echo $this->Form->end(array('label' => __d('admin', 'Registar'), 'class' => 'btn btn-success')); ?>
                                      </fieldset>
                                    </p>
                              </div>
                              <div class="tab-pane fade" id="prorogacao">
                                <p>
                                      <fieldset class="col-lg-8">
                                      <?php echo $this->Form->create('Client',array('action' => 'prorrogar')); ?>
                                      
                                    <label>Para a data</label>
                                     <?php  
                                          echo $this->Form->input('new_end_dateU',array('type' => 'date','label' =>false));
                                         ?>
                                     <?php
                                      echo $this->Form->hidden('idU', array('hiddenField' => true, 'value'=>$Reports[0]['Client']['id']));
                                      echo $this->Form->hidden('start_dateU', array('hiddenField' => true, 'value'=>$Reports[0]['Client']['start_date']));
                                      echo $this->Form->hidden('prorrogar', array('hiddenField' => true, 'value'=>1));
                                      ?>
                                    <br>
                                       <?php echo $this->Form->end(array('label' => __d('admin', 'Renovar'), 'class' => 'btn btn-success')); ?>
                                       <hr>
                                       <?php echo $this->Form->create('Client',array('action' => 'renew_budget',$Reports[0]['Client']['id']));

                                        echo $this->Form->hidden('id', array('hiddenField' => true, 'value'=>$Reports[0]['Client']['id']));
                                        ?>

                                       <?php echo $this->Form->input('new_budget'); ?>
                                       <br>
                                       <?php echo $this->Form->end(array('label' => __d('admin', 'Atualizar'), 'class' => 'btn btn-success')); ?>
                                      </fieldset>
                                </p>

                              </div>
                               
                            </div>
                        </div>
                    </div>
              </div>
            </div>
<?php if($Reports[0]['Client']['status'] == 1){ ?>
            <div class="row">
              <div class="col-sm-12">
              <h4>Historico:</h4>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th class="hidden-480"> Contrato </th>
                      <th class="hidden-480"> Data de Inicio </th>
                      <th class="hidden-480"> Data Fim </th>
                      <th class="hidden-480"> Data Prorrogacao </th>
                      <th class="hidden-480"> Criado: </th>
                      <th class="hidden-480"> Modificado </th>
                      <th class="hidden-480"> Acoes </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="hidden-480"> <?php echo $Reports[0]['Client']['contract_name'] ?> </td>
                      <td class="hidden-480"> <?php echo $Reports[0]['Client']['start_date'] ?> </td>
                      <td class="hidden-480"> <?php echo $Reports[0]['Client']['end_date'] ?> </td>
                      <td class="hidden-480"> <?php echo $Extends[0]['Extend']['new_end_date'] ?> </td>
                      <td class="hidden-480"> <?php echo $Reports[0]['Client']['created'] ?> </td>
                      <td class="hidden-480"> <?php echo $Extends[0]['Extend']['created'] ?> </td>
                      <td>
                      <?php echo $this->Html->link("<div class='label label-sm label-primary'><i class='fa fa-edit'></i></div>", array('controller' => 'clients', 'action' =>'edit',$Reports[0]['Client']['id']),array('escape' => false)); ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
<?php } ?> 
          </div>
          <!-- end: PAGE CONTENT-->
          <?php //echo debug($RenewBudgets) ?>