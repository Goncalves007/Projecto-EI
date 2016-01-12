<?php
$department_id = $this->Session->read('Auth.User.department_id');
$status = $this->Session->read('Auth.User.boss');
$userID = $this->Session->read('Auth.User.id');
$head = $this->Session->read('Auth.User.group_id');

if($head==2){ 
 echo $this->element('nav_menu_Register');
    }elseif ($head==7 || $head==8 || $head==9) {
      echo $this->element('nav_menu_other');?>
      <?php
    }elseif ($head==6) {
      echo $this->element('nav_menu_Department');
    }

?>
 <?php //echo debug($Reports) ?>
 <?php //echo debug($pro) ?>
						<div class="col-sm-12">
							<!-- start: STYLE SELECTOR BOX -->
							
							<!-- end: STYLE SELECTOR BOX -->
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-file"></i>
									<a href="#">
										Pages
									</a>
								</li>
								<li class="active">
									Blank Page
								</li>
								<li class="search-box">
									<form class="sidebar-search">
										<div class="form-group">
											<input type="text" placeholder="Start Searching...">
											<button class="submit">
												<i class="clip-search-3"></i>
											</button>
										</div>
									</form>
								</li>
							</ol>
							<div class="page-header">
								<h1>Blank Page <small>blank page</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
						
						<div class="col-sm-12">
							<!-- start: CHECKBOXES PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									CHECK FOR REQUESTS 
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
			                              echo $this->Form->input('search',array('label'=>false,'placeholder' => 'Requisicao Especifica'),array('escape'=>false));
			                              ?>
			                              <?php echo $this->Form->end(__('Search')); ?>
			                             </div>
									</div>
								</div>
								<div class="panel-body">
									<center><fieldset>
									<p>
									<strong> Buscar Requisicoes</strong>:
								    </p>
								    <?php echo $this->Form->create('InternalRequest'); ?>
								    
								    <?php
										$options=array('P'=>'Nao Paga&nbsp&nbsp','J'=>'Nao Justificadas&nbsp&nbsp ','Tp'=>'Pagas &nbsp&nbsp', 'Tj'=>'Justificadas &nbsp&nbsp','T'=>'Todas Requisicoes');
										$attributes=array('legend'=>false,'class'=>'radio-inline');
										echo $this->Form->radio('req',$options,$attributes,array('class'=>'grey','escape'=>false));
									?>
									<br>
									<label class="radio-inline">
			                          <?php  
			                          echo $this->Form->input('department_id',array('empty' => '------------------','class'=>'grey','label'=>'Departmento &nbsp&nbsp&nbsp&nbsp'));
			                         ?>
			                         </label>
			                         <label class="radio-inline">
			                         <?php  
			                          echo $this->Form->input('beneficiary_id',array('empty' => '------------------','class'=>'grey','label'=>'Beneficiario &nbsp&nbsp&nbsp&nbsp'));
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
									<?php echo $this->Form->end(array('label' => __d('admin', 'Submit'), 'class' => 'btn btn-success')); ?>
									</fieldset></center>
									</div>

							     </div>
							</div>
							<!-- end: CHECKBOXES PANEL -->
						</div>
									<!-- end: TEXT AREA PANEL -->
          <?php if (isset($Reports) && !empty($Reports) && $Label == 'P' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Requisicoes Nao Pagas
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
                                     <?php $sum_total[] = array() ?>
                                     <div class="row">
						              <div class="col-sm-12">
						                <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Reference </th>
						                      <th class="hidden-480"> Delivery note N. </th>
						                      <th class="hidden-480"> Invoice N. </th>
						                     
						                      <th class="hidden-480"> created </th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"> Action</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
                                           <?php echo $this->Form->create('Endorso',array('controller' => 'endorsos', 'action'=>'add')); ?>
						                      <td class="hidden-480"> <?php echo $Report['InternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>
						                     
						                       <td class="hidden-480"> <?php echo $Report['InternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?>
                                                <?php
                                                echo $this->Form->hidden('int', array('hiddenField' => true, 'value'=>'int'));
                                                ?>
						                        </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Pay', array('label' => false, 'value'=>1)); ?> </td>

						                        
                                              <td><?php echo $this->Form->end('Paid',array('class' => 'btn btn-yellow btn-block')); ?></td>
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

<?php if (isset($Reports) && !empty($Reports) && $Label == 'Tp' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Requisicoes Pagas
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
                                     <?php //echo debug($Reports) ?>
                                     <div class="row">
						              <div class="col-sm-12">
						                <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Reference </th>
						                      <th class="hidden-480"> Delivery note N. </th>
						                      <th class="hidden-480"> Invoice N. </th>
						                     
						                      <th class="hidden-480"> created </th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"> Action</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
                                           <?php echo $this->Form->create('Endorso',array('controller' => 'endorsos', 'action'=>'add')); ?>
						                      <td class="hidden-480"> <?php echo $Report['InternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>
                                              
						                      
						                       <td class="hidden-480"> <?php echo $Report['InternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?>
                                                    <?php
                                                echo $this->Form->hidden('int', array('hiddenField' => true, 'value'=>'int'));
                                                ?>
						                        </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Pay', array('label' => false, 'value'=>1)); ?> </td>
                                                <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?> </td>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'internalRequests', 'action' => 'view', $Report['Endorso']['request_id']),array('class' => 'btn btn-light-grey btn-xs'));?></td>
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
                                      if ($Label == 'P' || $Label == 'Tp' || $Label == 'Tj' || $Label == 'J' || $Label == 'T' || $Label == 'S') {
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
          <?php if (isset($Reports) && !empty($Reports) && $Label == 'J' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Requisicoes Nao Justificadas
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
						                      <th class="hidden-480"> Reference </th>
						                      <th class="hidden-480"> Delivery note N. </th>
						                      <th class="hidden-480"> Invoice N. </th>
						                      
						                      <th class="hidden-480"> created </th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"> Action</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
                                           <?php echo $this->Form->create('Endorso',array('controller' => 'endorsos', 'action'=>'add')); ?>
						                      <td class="hidden-480"> <?php echo $Report['InternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>
						                      
						                       <td class="hidden-480"> <?php echo $Report['InternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?>
                                                   <?php
                                                echo $this->Form->hidden('int', array('hiddenField' => true, 'value'=>'int'));
                                                ?>
						                        </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>

						                        
                                              <td><?php echo $this->Form->end('Justified',array('class' => 'btn btn-yellow btn-block')); ?> </td>
                                             

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

<?php if (isset($Reports) && !empty($Reports) && $Label == 'Tj' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Requisicoes Justificadas
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
                                     <?php //echo debug($Reports) ?>
                                     <div class="row">
						              <div class="col-sm-12">
						                <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Reference </th>
						                      <th class="hidden-480"> Delivery note N. </th>
						                      <th class="hidden-480"> Invoice N. </th>
						                      
						                      <th class="hidden-480"> created </th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"> Action</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
                                           <?php echo $this->Form->create('Endorso',array('controller' => 'endorsos', 'action'=>'add')); ?>
						                      <td class="hidden-480"> <?php echo $Report['InternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>

                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>

                                              
						                       <td class="hidden-480"> <?php echo $Report['InternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?>
                                                    <?php
                                                echo $this->Form->hidden('int', array('hiddenField' => true, 'value'=>'int'));
                                                ?>
						                        </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>
                                                <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?> </td>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'internalRequests', 'action' => 'view', $Report['Endorso']['request_id']),array('class' => 'btn btn-light-grey btn-xs'));?></td>

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

<?php if (isset($Reports) && !empty($Reports) && $Label == 'T' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Todas Requisicoes
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
                                     <?php //echo debug($Reports) ?>
                                     <div class="row">
						              <div class="col-sm-12">
						                <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Reference </th>
						                      <th class="hidden-480"> Delivery note N. </th>
						                      <th class="hidden-480"> Invoice N. </th>
						                     
						                      <th class="hidden-480"> created </th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"> Action</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
                                           <?php echo $this->Form->create('Endorso',array('controller' => 'endorsos', 'action'=>'add')); ?>
						                      <td class="hidden-480"> <?php echo $Report['InternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>

                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>

                                              
						                       <td class="hidden-480"> <?php echo $Report['InternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?>
                                                <?php
                                                echo $this->Form->hidden('int', array('hiddenField' => true, 'value'=>'int'));
                                                ?>
						                        </td>
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>
                                                <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?> </td>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'internalRequests', 'action' => 'view', $Report['Endorso']['request_id'],$Report['InternalRequest']['department_id']),array('class' => 'btn btn-light-grey btn-xs'));?></td>
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

          <?php if (isset($Reports) && !empty($Reports) && $Label == 'S' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Requisicao encontrada
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
                                     <?php //echo debug($Reports) ?>
                                     <div class="row">
						              <div class="col-sm-12">
						                <table class="table table-striped table-hover">
						                  <thead>
						                    <tr>
						                      <th class="hidden-480"> Reference </th>
						                      <th class="hidden-480"> Delivery note N. </th>
						                      <th class="hidden-480"> Invoice N. </th>
						                     
						                      <th class="hidden-480"> created </th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"></th>
						                      <th class="hidden-480"> Action</th>
						                    </tr>
						                  </thead>
						                  <tbody>
						                   <?php foreach ($Reports as $Report) {?>
						                    <tr>
                                           <?php echo $this->Form->create('Endorso',array('controller' => 'endorsos', 'action'=>'add')); ?>
						                      <td class="hidden-480"> <?php echo $Report['InternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>

                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura']));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>

                                              
						                       <td class="hidden-480"> <?php echo $Report['InternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>
                                                <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?> </td>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'internalRequests', 'action' => 'view', $Report['Endorso']['request_id']),array('class' => 'btn btn-light-grey btn-xs'));?></td>

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



          <?php
         /* echo debug($case);
          echo debug($field);
          echo debug($param);
          echo debug($ext);
          echo debug($dep);
          echo debug($start);
          echo debug($end);
          //echo "<br>";
          echo debug($Reports);
          //$inicio = $dataI['day'].'-'.$dataI['month'].'-'.$dataI['year'];
          //$fim = $dataF['day'].'-'.$dataF['month'].'-'.$dataF['year'];
          //echo debug($inicio);
          //echo "<br>";
          //echo debug($Label);*/
           ?>
           