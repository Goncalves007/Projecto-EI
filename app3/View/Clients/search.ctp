<?php
$department_id = $this->Session->read('Auth.User.department_id');
$status = $this->Session->read('Auth.User.boss');
$userID = $this->Session->read('Auth.User.id');
$head = $this->Session->read('Auth.User.group_id');

//echo $this->element('Clients');
?>
<div class="row">
<div class="col-sm-12">
							<!-- start: CHECKBOXES PANEL -->
							<div class="panel panel-default">

								<div class="panel-heading">
                     PESQUISA AVANCADA
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
									<p>
									<strong> Buscar Contratos</strong>:
								    </p>
								    <?php echo $this->Form->create('Client'); ?>
								    
								    <?php
										$options=array('T'=>'Todos&nbsp&nbsp', 'Ex' =>'Expirados');
										$attributes=array('legend'=>false,'class'=>'radio-inline');
										echo $this->Form->radio('req',$options,$attributes,array('class'=>'grey','escape'=>false));
									?>
									<br>
									<label class="radio-inline">
			                          <?php  
			                          echo $this->Form->input('contract_type_id',array('empty' => '------------------','class'=>'grey','label'=>'Tipo &nbsp&nbsp&nbsp&nbsp'));
			                         ?>
			                         </label>
			                         <label class="radio-inline">
			                         <?php  
			                          echo $this->Form->input('area_id',array('empty' => '------------------','class'=>'grey','label'=>'Area &nbsp&nbsp&nbsp&nbsp'));
			                         ?>
			                        </label>
			                        <label class="radio-inline">
			                         <?php  
			                          echo $this->Form->input('renewable_id',array('empty' => '------------------','class'=>'grey','label'=>'Renovavel &nbsp&nbsp&nbsp&nbsp'));
			                         ?>
			                        </label>
			                        <label class="radio-inline">
			                         <?php  
			                          echo $this->Form->input('partner_id',array('empty' => '------------------','class'=>'grey','label'=>'Parceiro &nbsp&nbsp&nbsp&nbsp'));
			                         ?>
			                        </label>
			                        <br>
			                        <div class="form-group">
			                              <?php
			                              echo $this->Form->input('search',array('label'=>'Nome &nbsp&nbsp&nbsp','placeholder' => '... ou Numero'));
			                              ?>
			                             </div>
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
                            </div>
   </div>
</div>
   <?php if (isset($Reports) && !empty($Reports) && $Label == 'T') {?>
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
						                      <th class="hidden-480"> Contrato </th>
						                      <th class="hidden-480"> Cliente </th>
						                      <th class="hidden-480"> Data Inicio </th>
						                      <th class="hidden-480"> Data Fim </th>
						                      <th class="hidden-480"> Area </th>
						                      <th class="hidden-480"> Saldo actual</th>
						                      <th>Opcoes</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
						                      <td class="hidden-480"> <?php echo $Report['Client']['contract_name']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Client']['client_name']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Client']['start_date']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Client']['end_date']; ?> </td>
						                      <td class="hidden-480"> 
							                    <?php echo $Report['Area']['nome']; ?>
						                       </td>
						                      <td class="hidden-480"> <?php echo $Report['Client']['balance']; ?> </td>
						                      <td>
						                      <?php echo $this->Html->link("<div class='label label-sm label-primary'><i class='fa fa-edit'></i></div>", array('controller' => 'clients', 'action' =>'edit',$Report['Client']['id']),array('escape' => false)); ?>
						                      &nbsp;
						                      <?php echo $this->Html->link('+', array('controller' => 'clients', 'action' =>'update',$Report['Client']['id']),array('class' => 'label label-sm label-warning')); ?>
						                      </td>
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
          <?php if (isset($Reports) && !empty($Reports) && $Label == 'Ex') {
          	?>
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
                                     <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Contrato </th>
						                      <th class="hidden-480"> Cliente </th>
						                      <th class="hidden-480"> Data Inicio </th>
						                      <th class="hidden-480"> Data Fim </th>
						                      <th class="hidden-480"> Area </th>
						                      <th class="hidden-480"> Saldo actual</th>
						                      <th>Opcoes</th>
						                    </tr>
						                  </thead>
						                  <tbody>
                                     <?php
						              foreach ($Reports as $Report) {
										if ($data_actual > ($Report['Client']['end_date'])) {
											echo "contrato expirado :".$Report['Client']['end_date'];?>
                                            <tr>
						                      <td class="hidden-480"> <?php echo $Report['Client']['contract_name']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Client']['client_name']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Client']['start_date']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Report['Client']['end_date']; ?> </td>
						                      <td class="hidden-480"> 
							                    <?php echo $Report['Area']['nome']; ?>
						                       </td>
						                      <td class="hidden-480"> <?php echo $Report['Client']['balance']; ?> </td>
						                      <td><?php echo $this->Html->link('Actualizar', array('controller' => 'clients', 'action' =>'update',$Report['Client']['id'])); ?>
						                      </td>
						                    </tr>

								        <?php }} ?>
						                  </tbody>
						                </table>
						              </div>
						            </div>
								</div>
						   </div>
          <?php } ?>
  <?php if ((isset($Reports) && empty($Reports))) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									<?php
                                      if ($Label == 'S' || $Label == 'T' || $Label == 'Ex') {
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




<?php //echo debug($hF) ?>
<?php //echo debug($hI) ?>
<?php //echo debug($caso) ?>
<?php //echo debug($usr) ?>
<?php //echo debug($Label) ?>					
<?php //echo debug($field) ?>
<?php //echo debug($param) ?>
<?php //echo debug($Reports) ?>