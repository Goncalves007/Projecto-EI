<?php
$department_id = $this->Session->read('Auth.User.department_id');
$status = $this->Session->read('Auth.User.boss');
$userID = $this->Session->read('Auth.User.id');
$head = $this->Session->read('Auth.User.group_id');

echo $this->element('expedientes');
?>

<div class="col-sm-12">
							<!-- start: CHECKBOXES PANEL -->
							<div class="panel panel-default">

								<div class="panel-heading">

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
										<div class="form-group">
										 <?php echo $this->Form->create('Search'); ?>
			                              <?php
			                              echo $this->Form->input('search',array('label'=>false,'placeholder' => 'Expedientes Especifica'),array('escape'=>false));
			                              ?>
			                              <?php echo $this->Form->end(__('Search')); ?>
			                             </div>
										 
									</div>
								</div>
								<div class="panel-body">
									<center><fieldset>
									<p>
									<strong> Buscar Expedientes</strong>:
								    </p>
								    <?php echo $this->Form->create('Expediente'); ?>
								    
								    <?php
										$options=array('T'=>'Todos Expedientes');
										$attributes=array('legend'=>false,'class'=>'radio-inline');
										echo $this->Form->radio('req',$options,$attributes,array('class'=>'grey','escape'=>false));
									?>
									<br>
									<label class="radio-inline">
			                          <?php  
			                          echo $this->Form->input('office_id',array('empty' => '------------------','class'=>'grey','label'=>'Office &nbsp&nbsp&nbsp&nbsp'));
			                         ?>
			                         </label>
			                         <label class="radio-inline">
			                         <?php  
			                          echo $this->Form->input('user_id',array('empty' => '------------------','class'=>'grey','label'=>'Destinatario &nbsp&nbsp&nbsp&nbsp'));
			                         ?>
			                        </label>
								    <p>
										<strong> Entre as Datas </strong>:
									</p>
									<label class="radio-inline">
									<?php  
			                          echo $this->Form->input('dataI',array('type' => 'date','label' =>false));
			                         ?>
			                         </label>
			                         <label class="radio-inline">
									[<= =>]
			                         </label>
			                         <label class="radio-inline">
									<?php  
			                          echo $this->Form->input('dataF',array('type' => 'date','label' =>false));
			                         ?>
			                         </label>
			                      
									<?php echo $this->Form->end(__('Submit')); ?>
									
									</fieldset></center>
									</div>

							     </div>
							</div>
							<!-- end: CHECKBOXES PANEL -->
	<?php if (isset($Reports) && !empty($Reports) && $Label == 'S' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									E
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
                                     <!-- CONTEUDO -->
                                     <div class="row">
						              <div class="col-sm-12">
						                <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Nr. Expediente </th>
						                      <th class="hidden-480"> Proviniencia </th>
						                      <th class="hidden-480"> Enviado Por </th>
						                      <th class="hidden-480"> Destinatario </th>
						                      <th class="hidden-480"> Observacao</th>
						                      <th class="hidden-480"> Estado</th>
						                      <th class="hidden-480"> created </th>
						                      <th class="hidden-480"> Action</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
						                      <td class="hidden-480"> <?php echo $Report['Confirma']['nr_expediente']; ?> </td>
						                      <td class="hidden-480"> <?php if ($Report['Confirma']['proviniencia'] ==1) {
						                      	echo "MAPUTO";
						                      }elseif ($Report['Confirma']['proviniencia'] ==2) {
						                      	echo "MATOLA";
						                      }elseif ($Report['Confirma']['proviniencia'] == 3) {
						                      	echo "TETE";
						                      } ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Confirma']['emissor']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Confirma']['destinatario']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Confirma']['observacao']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Confirma']['estado']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Confirma']['created']; ?> </td>
						                      <td class="hidden-480"> <?php //echo $Report['Confirma']['nr_expediente']; ?> </td>

                                           
						                    </tr>
						                  </tbody>
						                </table>
						              </div>
						            </div>



								</div>
						   </div>
						</div>

          <?php }?>						
<?php echo debug($nr_expediente) ?>
<?php echo debug($Reports) ?>