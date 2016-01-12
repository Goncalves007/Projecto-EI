<div class="row">
           
            <div class="col-md-12">
              <!-- start: FORM VALIDATION 1 PANEL -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-external-link-square"></i>
                 REGISTO DO CLIENTE
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
                 
                  <?php echo $this->Form->create('Client'); ?>

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
                              echo $this->Form->input('reference_application', array('label' => false, 'class' => 'form-control','readonly'=> 'readonly'));
                               ?>
                        </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('contract_name',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Nome do Contrato <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('client_name',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Nome do Cliente <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>

                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('client_contact',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Contacto do Cliente <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('contract_type_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Tipo de Contrato <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        <div class="form-group">
                        <?php  
                          echo $this->Form->input('area_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Area de Contrato'));
                         ?>
                       </div>
                      </div>
                      <div class="col-md-6">
                      <div class="row">
                      <div class="col-md-4">
                      <div class="form-group">
                        <?php  
                          echo $this->Form->input('renewable_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Renovavel'));
                          ?>
                       </div>
                       </div>
                      <div class="col-md-7">
                      <div class="form-group">
                        <?php  
                          echo $this->Form->input('partner_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Parceria'));
                          ?>
                       </div>
                       </div>
                       <div class="col-md-1">
                        <div class="form-group">
                        <?php echo $this->Html->link('+', array('controller' =>'partners', 'action'=> 'add'),array('class' => 'label label-sm label-warning')) ?>
                        </div>
                       </div>
                       </div>
                       <div class="row">
                       <div class="col-md-6">
                      <div class="form-group">
                        <?php  
                          echo $this->Form->input('budget',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Orcamento'));
                          ?>
                       </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">
                        <?php  
                          echo $this->Form->input('used_budget',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Valor usado'));
                          ?>
                       </div>
                       </div>
                         
                       </div>
                       
                        <div class="form-group">
                        <label>Objecto do Contrato</label>
                          <?php  
                          echo $this->Form->input('contract_subject', array('type' => 'textarea', 'class' => 'form-control','label' =>false));
                         ?>
                        </div>
                       <div class="row">
                          <div class="col-md-6">
                           <div class="form-group">
                            <label>Data do Inicio</label>
                             <label class="radio-inline">
                             <?php  
                                echo $this->Form->input('start_date',array('type' => 'date','label' =>false));
                               ?>
                            </label>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                          <label>Data do Fim</label>
                          <label class="radio-inline">
                           <?php  
                                echo $this->Form->input('end_date',array('type' => 'date','label' =>false));
                            ?>
                          </label>
                          </div>
                          </div>
                        </div>
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
                      <?php echo $this->Form->end(array('label' => __d('admin', 'Registar'), 'class' => 'btn btn-success')); ?>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- end: FORM VALIDATION 1 PANEL -->
            </div>  
</div>
<?php //debug($areas); ?>