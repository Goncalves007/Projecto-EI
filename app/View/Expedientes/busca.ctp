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
			                              echo $this->Form->hidden('userid', array('hiddenField' => true, 'value'=>$userID
                                           ));
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
										$options=array('T'=>'Todos&nbsp&nbsp','Ec'=>'Enviado & confirmado&nbsp&nbsp','En'=>'Enviado nao confirmado&nbsp&nbsp');
										$attributes=array('legend'=>false,'class'=>'radio-inline','value' => 'T');
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
			                         <?php  
			                          echo $this->Form->hidden('userID', array('hiddenField' => true, 'value'=>$userID
                                    ));
			                         ?>
			                         </label>
			                      
									<?php echo $this->Form->end(__('Submit')); ?>
									
									</fieldset></center>
									</div>

							     </div>
							</div>
							<!-- end: CHECKBOXES PANEL -->
		<?php if (isset($Reports) && !empty($Reports)) {?>
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
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
									</div>
                                     <!-- CONTEUDO -->
                                     <?php if($Label == 'T' || $Label == 'Ec' || $Label == 'En'){ ?>
                                     <div class="row">
						              <div class="col-sm-12">
						                <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Referencia </th>
						                      <th class="hidden-480"> N. Guia </th>
						                      <th class="hidden-480"> Proviniencia </th>
						                      <th class="hidden-480"> Destinatario </th>
						                      <th class="hidden-480"> Entrega </th>
						                      <th class="hidden-480"> Previcao de Entrega</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
						                      <td class="hidden-480"> <?php echo $Report['Expediente']['nr_expediente']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Expediente']['nr_guia']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Office']['nome']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['User']['name']; ?> </td>
						                      <td class="hidden-480"> 
							                    <?php 
							                      if ($Report['Expediente']['status'] == 0) {
							                      	echo $this->Html->link('Nao Confirmado', array('controller' => 'expedientes', 'action' =>'confirmar',$Report['Expediente']['id']));
							                      }elseif($Report['Expediente']['status'] == 1){
							                      	echo $this->Html->link('Confirmado', array('controller' => 'expedientes', 'action' =>'confirmar',$Report['Expediente']['id']));
							                      }
						                        ?> 
						                       </td>
						                      <td class="hidden-480"> <?php echo $Report['Expediente']['previsao_chegada']; ?> </td>
						                    </tr>
						                    <?php } ?>
						                  </tbody>
						                </table>
						              </div>
						            </div>
                                <?php } ?> 
								</div>
						   </div>
						</div>
          <?php }?>
          <?php if (isset($Reports) && !empty($Reports) && $Label == 'S') {?>
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
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
									</div>
                                     <!-- CONTEUDO -->
                                     <div class="row">
						              <div class="col-sm-12">
						                <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Referencia </th>
						                      <th class="hidden-480"> N. Guia </th>
						                      <th class="hidden-480"> Proviniencia </th>
						                      <th class="hidden-480"> Destinatario </th>
						                      <th class="hidden-480"> Entrega </th>
						                      <th class="hidden-480"> Previcao de Entrega</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
						                      <td class="hidden-480"> <?php echo $Report['Expediente']['nr_expediente']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Expediente']['nr_guia']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Office']['nome']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['User']['name']; ?> </td>
						                      <td class="hidden-480"> 
							                    <?php 
							                      if ($Report['Expediente']['status'] == 0) {
							                      	echo $this->Html->link('Nao Confirmado', array('controller' => 'expedientes', 'action' =>'confirmar',$Report['Expediente']['id']));
							                      }elseif($Report['Expediente']['status'] == 1){
							                      	echo $this->Html->link('Confirmada', array('controller' => 'expedientes', 'action' =>'confirmar',$Report['Expediente']['id']));
							                      }
						                        ?> 
						                       </td>
						                      <td class="hidden-480"> <?php echo $Report['Expediente']['previsao_chegada']; ?> </td>
						                    </tr>
						                    <?php } ?>
						                  </tbody>
						                </table>
						              </div>
						            </div>
								</div>
						   </div>
						</div>
          <?php }?>
          <?php if ((isset($Reports) && empty($Reports))) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									<?php
                                      if ($Label == 'T' || $Label == 'Ec' || $Label == 'En'  || $Label == 'S') {
                                      	echo "Nenhuma Resultado Encontrado";
                                      }
									 ?>
									
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
						   </div>
						</div>

          <?php }?>





<?php //echo debug($caso) ?>
<?php //echo debug($usr) ?>
<?php //echo debug($Label) ?>					
<?php //echo debug($field) ?>
<?php //echo debug($param) ?>
<?php //echo debug($Reports) ?>