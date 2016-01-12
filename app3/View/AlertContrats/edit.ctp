<div class="row">
<div class="col-sm-12">
							<!-- start: CHECKBOXES PANEL -->
							<div class="panel panel-default">

								<div class="panel-heading">
                          Registo de Contratos    
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
									
								    <?php echo $this->Form->create('AlertContrat'); ?>
								    
								    <label class="radio-inline">
								    Nome do Contratado.:
								      <?php  
			                          echo $this->Form->input('nome_contratado',array('size'=>40, 'label' => false,'label'=>false));
			                         ?>
								    </label>
									<label class="radio-inline">
									Tipo de Contrato.:
			                          <?php  
			                          echo $this->Form->input('contract_type_id',array('empty' => '------------------','class'=>'grey','label'=>false));
			                         ?>
			                         </label>
									<label class="radio-inline">
									Data de Inicio
									<?php  
			                          echo $this->Form->input('data_inicio',array('type' => 'date','label' =>false));
			                         ?>
			                         </label>
			                         <label class="radio-inline">
			                         Data do Fim
									<?php  
			                          echo $this->Form->input('data_fim',array('type' => 'date','label' =>false));
			                         ?>
			                         </label>
									<?php echo $this->Form->end(__('Submit')); ?>
									
									</fieldset></center>
									
							     </div>
							</div>
                            </div>
                            </div>
   </div>
</div>