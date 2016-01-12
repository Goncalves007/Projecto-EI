<div class="row">
           
            <div class="col-md-12">
              <!-- start: FORM VALIDATION 1 PANEL -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-external-link-square"></i>
                  PRO-FORMA
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
                  <?php echo $this->Form->create('Proforma',array('enctype'=>'multipart/form-data')); ?>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                          <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                        </div>
                        <div class="successHandler alert alert-success no-display">
                          <i class="fa fa-ok"></i> Your form validation is successful!
                        </div>
                      </div>
                  
                              <?php
                              echo "<strong>Reference:</strong>  "."<em>".$ref."</em>";
                               ?>
                               
                      
                      <div class="col-md-6">
                        <div class="form-group">
                        <?php 
                          echo $this->Form->input('title', array('class' => 'form-control','value'=> $title));
                          echo $this->Form->hidden('request_id', array('hiddenField' => true, 'value'=> $lastID));
                          echo $this->Form->hidden('request_reference', array('hiddenField' => true, 'value'=> $ref));
                         ?>
                       </div>
                       <div class="form-group">
                        <?php 
                          echo $this->Form->input('proposal_value',array('class' => 'form-control'));
                         ?>
                       </div>
                       <div class="form-group">
                        <?php 
                          echo $this->Form->input('proposal_invoice_number',array('class' => 'form-control'));
                         ?>
                       </div>


                       <div class="form-group">
                          <?php  
                          echo $this->Form->input('description', array('class' => 'form-control','value'=> $desc));
                         ?>
                        </div>

                        <div class="form-group">
                      <div data-provides="fileupload" class="fileupload fileupload-new">
                         
                          <?php
                          echo $this->Form->input('report', array('label' => 'Upload Invoice', 'class' => 'btn btn-file btn-light-grey','type' => 'file'),array('scape'=>false));
                          ?>
                          <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">
                            &times;
                          </a>
                        </div>
                       </div>
                        
                      </div>
                      <div class="col-md-6">

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

                      <?php echo $this->Form->end(array('label' => __d('admin', 'Register'), 'class' => 'btn btn-success')); ?>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- end: FORM VALIDATION 1 PANEL -->
            </div>  
</div>
<?php echo $correio ?>