<?php if($this->Session->read('Auth.User.group_id')==2 || $this->Session->read('Auth.User.group_id')==6){ ?>
<div class="row">
                <!--quick info section -->
                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'REQUISICOES EM ANDAMENTO'), array('controller' => 'reports', 'action' => 'progress', $this->Session->read('Auth.User.id'), $this->Session->read('Auth.User.department_id'))); ?></b>
                    </div>
                </div></a>

                <a href="arqReq.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa fa-floppy-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'REQUISICOES TERMINADAS'), array('controller' => 'reports', 'action' => 'finished', $this->Session->read('Auth.User.id'), $this->Session->read('Auth.User.department_id'))); ?></b>  
                    </div>
                </div></a>

                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'VER TODAS'), array('controller' => 'reports', 'action' => 'index',$this->Session->read('Auth.User.id'), $this->Session->read('Auth.User.department_id'))); ?></b>
                      </div>
                    </div></a>
                
                <!--end quick info section -->
            </div>
<?php } ?>
 <?php echo $this->element('content_header'); ?> 
                              <?php echo '' ?>
                                <?php echo $this->Form->create('ExternalRequest', array('enctype' => 'multipart/form-data')); ?>
                              
                                  <legend><?php echo __('Add External Request'); ?></legend>
                                <div class="col-lg-6">
                                <div class="col-lg-6">
                                <?php
                                  echo $this->Form->input('reference_application', array('label' => 'Reference Application', 'class' => 'form-control', 'value' => $ref, 'readonly'=> 'readonly'));
                                  echo $this->Form->input('administration_id',array('empty' => '---------------------------------------------', 'class' => 'form-control'));
                                  echo $this->Form->input('amount',array('class' => 'form-control'));
                                  
                                  echo "</div><div class='col-lg-6'>";
                                   echo $this->Form->input('office_id',array('empty' => '---------------------------------------------','class' => 'form-control'));
                                   echo $this->Form->input('department_id',array('empty' => '---------------------------------------------','class' => 'form-control'));
                                   echo $this->Form->input('currency_id',array('empty' => '---------------------------------------------','class' => 'form-control'));
                                  echo "</div>";

                                  echo $this->Form->input('amount_in_words', array('type' => 'textarea', 'class' => 'form-control', 'rows' => '4'));
                                  ?>
                                </div>
                                <div class="col-lg-6">
                                  <?php
                                  echo $this->Form->input('provider_id',array('empty' => '---------------------------------------------','class' => 'form-control'));
                                  echo $this->Form->input('external_beneficiary_id',array('empty' => '---------------------------------------------','class' => 'form-control'));							  
                                  echo $this->Form->hidden('request_status', array('hiddenField' => true, 'value'=>0));
                                  echo $this->Form->hidden('user_id', array('hiddenField' => true, 'value'=> $this->Session->read('Auth.User.id')));
                                   echo $this->Form->input('payment_details',array('class' => 'form-control'));

                                ?>
                                <div class="col-lg-6">
                                <br>
                                

                                </div>
                                <div class="col-lg-6">
                                <br>
                                 <?php echo $this->Form->end(__('Enviar'),array('class' => 'btn btn-primary', 'type' => 'submit')); ?>
                                </div>
                              </div>
                            </div>

<?php echo $this->element('content_footer'); ?> 

                           