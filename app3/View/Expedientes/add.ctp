<?php
$Userid = $this->Session->read('Auth.User.id');
$name = $this->Session->read('Auth.User.username');
$username = $this->Session->read('Auth.User.name');
$office_id = $this->Session->read('Auth.User.office_id');
?>
<?php 
//echo debug($Proviniencia);
?>

<div class="row">
           
            <div class="col-md-12">
              <!-- start: FORM VALIDATION 1 PANEL -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-external-link-square"></i>
                  REGISTO DE EXPEDIENTES
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
                  
                  <?php echo $this->Form->create('Expediente'); ?>

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
                              echo $this->Form->input('nr_expediente', array('label' => 'Nr. Expediente', 'class' => 'form-control', 'value' => $expediente, 'readonly'=> 'readonly'));
                               ?>
                    </div>

                      <div class="col-md-6">
                      <div class="form-group">
                              <?php
                              echo $this->Form->input('nr_guia',array('class' => 'form-control','label'=>'Nr. Guia <span class="symbol required"></span>'),array('escape'=>false));
                              ?>
                        </div>
                        <div class="form-group">
                              <?php
                              echo $this->Form->input('assunto',array('class' => 'form-control','label'=>'Assunto <span class="symbol required"></span>'),array('escape'=>false));
                              ?>
                        </div>
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('office_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Office <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('user_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Distinatario <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group">
                          <?php  
                          echo $this->Form->input('motorista_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Motorista <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                         <div class="form-group">
                          <?php  
                          echo $this->Form->input('correio_id',array('empty' => '---------------------------------------------','class' => 'form-control','label'=>'Correios <span class="symbol required"></span>'),array('escape'=>false));
                         ?>
                        </div>
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('cc',array('placeholder' => 'Informe os e-mails separados por virgula(;), e sem espaco em branco.','class' => 'form-control','label'=>'Cc.'),array('escape'=>false));
                         ?>
                         <em>Ex.: eu@email.com<b>;</b>voce@email.com<b>;</b>eles@email.com ...</em>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                          <label class="radio-inline">
                           <?php  
                                echo $this->Form->input('dataP',array('type' => 'date','label' =>'Previsao de Chegada&nbsp&nbsp&nbsp&nbsp'));
                               ?>
                          </label>
                        </div>
                        <div class="form-group">
                        <?php
                          echo $this->Form->hidden('Proviniencia', array('hiddenField' => true, 'value'=>$office_id));
                           echo $this->Form->hidden('Username', array('hiddenField' => true, 'value'=>$username));
                           echo $this->Form->hidden('Userid', array('hiddenField' => true, 'value'=>$Userid));
                         ?>
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
<?php //echo debug($gotedExpediente); ?>
