<div class="row">
<div class="col-sm-12">
							<!-- start: CHECKBOXES PANEL -->
							<div class="panel panel-default">

								<div class="panel-heading">
                          Prorogar Contrato    
									<i class="fa fa-external-link-square"></i>
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" created-toggle="modal">
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
                                <div class="row">
                                <div class="col-sm-12">
									<center><fieldset>
									
								    <?php echo $this->Form->create('AlertContrat', array('action'=>'prorogar' )); ?>
			                         <label class="radio-inline">
			                         Data da Prorogacao
									<?php  
			                          echo $this->Form->input('dt_prorogacao',array('type' => 'date','label' =>false));
			                          echo $this->Form->hidden('id', array('hiddenField' => true, 'value'=>$id ));
			                         ?>
			                         </label>
									<?php echo $this->Form->end(array('label' => __d('admin', 'Enviar'), 'class' => 'btn btn-success')); ?>
									
									</fieldset></center>
									
							     </div>
							</div>
                            </div>
                            </div>
   </div>
</div>
<?php //echo debug($id); ?>