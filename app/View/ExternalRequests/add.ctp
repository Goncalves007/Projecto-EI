<?php
$boss = $this->Session->read('Auth.User.boss');
$idUsr = $this->Session->read('Auth.User.id');
$department_id = $this->Session->read('Auth.User.department_id');
?>
<div class="row">
           
            <div class="col-md-12">
              <!-- start: FORM VALIDATION 1 PANEL -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-external-link-square"></i>
                  EXTERNAL REQUEST
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
                  
                  <?php echo $this->Form->create('ExternalRequest', array('enctype'=>'multipart/form-data')); ?>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                          <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                        </div>
                        <div class="successHandler alert alert-success no-display">
                          <i class="fa fa-ok"></i> Your form validation is successful!
                        </div>
                      </div>
                   <div class="form-group">
                              <?php
                              echo $this->Form->input('reference_application', array('label' => 'Reference Application', 'class' => 'form-control', 'value' => $ref, 'readonly'=> 'readonly'));
                               ?>
                        </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('office_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Office <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('administration_id',array('class' => 'form-control','label'=>'Administration <span class="symbol required"></span>', 'readonly'=> 'readonly'),array('escape'=>false));
                         ?>
                        </div>
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('department_id',array('class' => 'form-control','label'=>'Department <span class="symbol required"></span>', 'readonly'=> 'readonly'),array('escape'=>false));
                         ?>
                        </div>
                        <?php if(1 ==1){ ?>
                        <div class="col-md-11">
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('provider_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Provider <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        </div>
                        <div class="col-md-1">
                        <div class="form-group">
                        <?php echo $this->Html->link('+', array('controller' =>'providers', 'action'=> 'add','ext',$idUsr,$department_id),array('class' => 'label label-sm label-warning')) ?>
                        </div>
                       </div>
                        <?php  }elseif (1 ==0) {?>
                          <div class="form-group">
                          <?php  
                          echo $this->Form->input('provider_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Provider <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        <?php } ?>
                 
                      <?php if(1 ==1){?>
                       <div class="col-md-11">
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('external_beneficiary_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Beneficiary <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        </div>
                        <div class="col-md-1">
                        <div class="form-group">
                        <?php echo $this->Html->link('+', array('controller' =>'externalBeneficiaries', 'action'=> 'add','ext',$idUsr,$department_id),array('class' => 'label label-sm label-warning')) ?>
                        </div>
                       </div>
                       <?php }elseif (1 ==0) { ?>
                         <div class="form-group">
                          <?php  
                          echo $this->Form->input('external_beneficiary_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Beneficiary <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                       <?php } ?>

                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                          <?php  
                          echo $this->Form->input('project_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Project <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                    
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <?php
                              echo $this->Form->input('amount',array('class' => 'form-control','label'=>'Amount <span class="symbol required"></span>'),array('escape'=>false));
                              ?>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <?php
                                echo $this->Form->input('currency_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'<span class="symbol required">Currency</span>'),array('escape'=>false));
                              ?>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                        <?php  
                          echo $this->Form->input('payment_details',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Payment Details'));
                          echo $this->Form->hidden('request_status', array('hiddenField' => true, 'value'=>0));
                                  echo $this->Form->hidden('user_id', array('hiddenField' => true, 'value'=> $this->Session->read('Auth.User.id')));
                                   
                         ?>
                       </div>
                       <div class="form-group">
                          <?php  
                          echo $this->Form->input('amount_in_words', array('type' => 'textarea', 'class' => 'form-control'));
                         ?>
                        </div>
                        an alert will be sent to the following email:
                        <em><?php
                              echo $correio ?>, financas@escopil.com, tesoureiro@escopil.com, administracao@escopil.com
                        </em>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div>
                          <span class="symbol required"></span>Required Fields
                          <hr>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        
                      </div>
                      
                      <div class="col-md-4">
                      <?php echo $this->Form->end(array('label' => __d('admin', 'Attach Invoice'), 'class' => 'btn btn-success')); ?>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- end: FORM VALIDATION 1 PANEL -->
            </div>  
</div>
<?php echo $correio ?>