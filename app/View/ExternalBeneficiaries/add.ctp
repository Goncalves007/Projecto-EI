<div class="row">
           
            <div class="col-md-12">
              <!-- start: FORM VALIDATION 1 PANEL -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-external-link-square"></i>
                 ADICIONAR BENEFICIARIO
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
                 
                  <?php echo $this->Form->create('ExternalBeneficiary'); ?>

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
                      <div class="col-md-12">
                        <div class="form-group">
                          <?php  
                          echo $this->Form->input('name',array('class' => 'form-control','label'=>'Nome do Beneficiario <span class="symbol required"></span>'),array('escape'=>false));
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