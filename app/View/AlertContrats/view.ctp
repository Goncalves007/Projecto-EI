
<div class="row">
<div class="col-sm-12">
							<!-- start: CHECKBOXES PANEL -->
							<div class="panel panel-default">

								<div class="panel-heading">
                                 Pesquizar Contratos
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
                                <?php echo $this->Form->create('AlertContrats'); ?>
									<center><fieldset>
			                         <div class="form-group">
				                        <?php  
				                          echo $this->Form->input('Search',array('class' => 'form-control','placeholder'=>'Procure pelo Nome ou parte do Nome','label' => false));
				                         ?>
				                    </div>
									<br>
								    <p>
										<strong> ... Ou ... </strong>:
									</p>
								    <?php
										$options=array('Td' =>'Todos&nbsp&nbsp' ,'Ex' =>'Expirados&nbsp&nbsp');
										$attributes=array('legend'=>false,'class'=>'radio-inline');
										echo $this->Form->radio('req',$options,$attributes,array('class'=>'grey','escape'=>false));
									?>
									<label class="radio-inline">
			                          <?php  
			                          echo $this->Form->input('contract_type_id',array('empty' => '------------------','class'=>'grey','label'=>'Tipo &nbsp&nbsp&nbsp&nbsp'));
			                         ?>
			                        </label>
									
								<?php echo $this->Form->end(array('label' => __d('admin', 'Buscar'), 'class' => 'btn btn-success')); ?>
								</fieldset></center>
									
							 </div>
							</div>
                           </div>
                          </div>
   </div>
</div>

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
						                      <th class="hidden-480"> Nome do Contratado </th>
						                      <th class="hidden-480"> Tipo do Contrato </th>
						                      <th class="hidden-480"> Data Inicio </th>
						                      <th class="hidden-480"> Data Fim </th>
						                      <th class="hidden-480"> Accoes </th>
						                    </tr>
						                  </thead>
						                  <?php if (!empty($Contratados)){ ?>
						                  <tbody>
						                   <?php foreach ($Contratados as $Contratado) {?>
						                    <tr>
						                      <td class="hidden-480"> <?php echo $Contratado['AlertContrat']['nome_contratado']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Contratado['ContractType']['name']; ?> </td>
						                      <td class="hidden-480"> <?php echo $Contratado['AlertContrat']['data_inicio']; ?> </td>
						                      <?php
                                                if(!empty($Contratado['AlertContrat']['dt_prorogacao']) && !empty($Contratado['AlertContrat']['data_fim']) && $Contratado['AlertContrat']['contract_type_id'] == 2){
                                                	echo "<td class='hidden-480'>".$Contratado['AlertContrat']['dt_prorogacao']." </td>";
                                                }elseif ($Contratado['AlertContrat']['contract_type_id'] == 1) { ?>
						                      	<td class="hidden-480">----------------</td>
						                      <?php }elseif(empty($Contratado['AlertContrat']['dt_prorogacao'])){?>
                                                 <td class="hidden-480"> <?php echo $Contratado['AlertContrat']['data_fim']; ?> </td>
						                      <?php }?>
						                      <td>
                                                 	<?php echo $this->Html->link('Editar', array('action' => 'edit', $Contratado['AlertContrat']['id']), array('class' =>'btn btn-primary btn-xs')) ?>
                                                 	<?php
                                                 	if ($Contratado['AlertContrat']['contract_type_id'] == 2) {
                                                 	 echo "| ".$this->Html->link('Prorrogar', array('action' => 'prorogar', $Contratado['AlertContrat']['id']), array('class' =>'label label-sm label-success'));
                                                     }
                                                      ?>
                                                 	|
                                                    <?php echo $this->Html->link('Excluir', array('action' => 'delete', $Contratado['AlertContrat']['id']),array('class' => 'label label-sm label-danger')) ?>

                                                 </td>
						                    </tr>
						                    <?php }?>
						                  </tbody>
						                </table>
						              </div>
						            </div>
								</div>
						   </div>
						</div>
                 
<?php //echo debug($nome_contratado); ?>
<?php } ?>
