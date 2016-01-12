<?php
$department_id = $this->Session->read('Auth.User.department_id');
$status = $this->Session->read('Auth.User.boss');
$userID = $this->Session->read('Auth.User.id');
$head = $this->Session->read('Auth.User.group_id');

if($head==2){ 
 echo $this->element('nav_menu_Register');
    }elseif ($head==7 || $head==8 || $head==9) {
      echo $this->element('nav_menu_other');
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
									</div>
								</div>
								<div class="panel-body">
								<div class="col-sm-6">

								<fieldset>
								<?php echo $this->Form->create('ExternalRequest'); ?>
									<p>
										Buscar Requisicoes :
									</p>
									<?php
										$options=array('P'=>'Nao Paga&nbsp&nbsp','J'=>'Nao Justificadas&nbsp&nbsp ','Tp'=>'Pagas &nbsp&nbsp', 'Tj'=>'Justificadas &nbsp&nbsp');
										$attributes=array('legend'=>false,'class'=>'radio-inline');
										echo $this->Form->radio('req',$options,$attributes,array('class'=>'grey','escape'=>false));
									?>
									<?php echo $this->Form->end(__('Submit')); ?>
									</fieldset>
									</div>
									<div class="col-sm-6">
									<fieldset>
								    <?php echo $this->Form->create('ExternalRequest'); ?>
									<p>
										Entre:
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
									</fieldset>
									</div>
							     </div>
							</div>
							<!-- end: CHECKBOXES PANEL -->
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
									</div>
								</div>
								<div class="panel-body">
								
									<fieldset>
								    <?php echo $this->Form->create('ExternalRequest'); ?>
								    <?php
										$options=array('P'=>'Nao Paga&nbsp&nbsp','J'=>'Nao Justificadas&nbsp&nbsp ','Tp'=>'Pagas &nbsp&nbsp', 'Tj'=>'Justificadas &nbsp&nbsp');
										$attributes=array('legend'=>false,'class'=>'radio-inline');
										echo $this->Form->radio('req',$options,$attributes,array('class'=>'grey','escape'=>false));
									?>
									<p>
										Entre:
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
									</fieldset>
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
						                      <th class="hidden-480"> Proposal value </th>
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
						                      <td class="hidden-480"> <?php echo $Report['ExternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega'], 'readonly'=> 'readonly'));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura'], 'readonly'=> 'readonly'));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>
						                      <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                            <?php $sum_total[] = $p; ?>
                                           <?php }} ?>
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Pay', array('label' => false, 'value'=>1)); ?> </td>

						                        <?php if ($head==8) {?>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'externalRequests', 'action' => 'view', $Report['Endorso']['request_id']));?></td>
                                              <?php }else{?>
                                              <td><?php echo $this->Form->end('Paid',array('class' => 'btn btn-yellow btn-block')); ?> </td>
                                              <?php } ?>
						                    </tr>
						                    <?php } ?>

						                    <?php
						                     $sum_total = array_filter($sum_total);
						                     $totaly[] = array();
						                     foreach ($sum_total as $total) {
						                     	$totaly[] = $total['Proforma']['proposal_value'];
						                     }
						                     $sum = array_sum(array_filter($totaly)) ;
						                     
						                    ?>
						                    <tr>
						                    	<td class="hidden-480"><br>Total</br></td>
						                    	<td></td>
						                    	<td></td>
						                    	<td><br><?php echo number_format($sum, 2, ',', '.'); ?></br></td>
						                    </tr>
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
						                      <th class="hidden-480">Proposal value</th>
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
						                      <td class="hidden-480"> <?php echo $Report['ExternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega'], 'readonly'=> 'readonly'));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura'], 'readonly'=> 'readonly'));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>
                                              
                                            <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                                <?php $sum_total[] = $p; ?>
                                           <?php }} ?>
                                           
						                      
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Pay', array('label' => false, 'value'=>1)); ?> </td>
                                                <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?> </td>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'externalRequests', 'action' => 'view', $Report['Endorso']['request_id']));?></td>
						                    </tr>
						                    <?php } ?>

						                    <?php
						                     $sum_total = array_filter($sum_total);
						                     $totaly[] = array();
						                     foreach ($sum_total as $total) {
						                     	$totaly[] = $total['Proforma']['proposal_value'];
						                     }
						                     $sum = array_sum(array_filter($totaly)) ;
						                      
						                    ?>
						                    <tr>
						                    	<td class="hidden-480"><br>Total</br></td>
						                    	<td></td>
						                    	<td></td>
						                    	<td><br><?php echo number_format($sum, 2, ',', '.'); ?></br></td>
						                    </tr>
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
                                      if ($Label == 'P') {
                                      	echo "Todas Requisicoes Foram Pagas";
                                      }elseif ($Label == 'Tp') {
                                      	echo "Nenhuma Requisicao Paga";
                                      }elseif ($Label == 'Tj') {
                                      	echo "Nenhuma Requisicao Justificada";
                                      }elseif ($Label == 'J') {
                                      	echo "Todas Requisicoes Foram Justificadas";
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
						                      <th class="hidden-480"> Proposal value </th>
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
						                      <td class="hidden-480"> <?php echo $Report['ExternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega'], 'readonly'=> 'readonly'));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura'], 'readonly'=> 'readonly'));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>

                                               <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                            <?php $sum_total[] = $p; ?>

                                           <?php }} ?>
						                      
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>

						                        <?php if ($head==8) {?>
                                           <td><?php echo $this->Html->link('View Details', array('controller' =>'externalRequests', 'action' => 'view', $Report['Endorso']['request_id']));?></td>
                                              <?php }else{?>
                                              <td><?php echo $this->Form->end('Justified',array('class' => 'btn btn-yellow btn-block')); ?> </td>
                                              <?php } ?>

						                    </tr>
						                    <?php } ?>

						                    <?php
						                     $sum_total = array_filter($sum_total);
						                     $totaly[] = array();
						                     foreach ($sum_total as $total) {
						                     	$totaly[] = $total['Proforma']['proposal_value'];
						                     }
						                     $sum = array_sum(array_filter($totaly)) ;
						                      
						                    ?>
						                    <tr>
						                    	<td class="hidden-480"><br>Total</br></td>
						                    	<td></td>
						                    	<td></td>
						                    	<td><br><?php echo number_format($sum, 2, ',', '.'); ?></br></td>
						                    </tr>
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
						                      <th class="hidden-480"> Proposal value </th>
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
						                      <td class="hidden-480"> <?php echo $Report['ExternalRequest']['reference_application']; ?> </td>

                                            <?php if ($head==8) {?>
                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['guia_entrega'], 'readonly'=> 'readonly'));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('guia', array('label' => false, 'value'=>$Report['Endorso']['guia_entrega'])); ?> </td>
                                              <?php } ?>
                                              <?php if ($head==8) {?>

                                            <td class="hidden-480">
                                             <?php echo $this->Form->input('factura', array('label' => false, 'class' => 'form-control', 'value' => $Report['Endorso']['n_factura'], 'readonly'=> 'readonly'));
				                               ?></td>
                                              <?php }else{?>
                                              <td class="hidden-480"> <?php echo $this->Form->input('factura', array('label' => false, 'value'=>$Report['Endorso']['n_factura'])); ?> </td>
                                              <?php } ?>

                                              <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                              <?php $sum_total[] = $p; ?>

                                           <?php }} ?>
						                      
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>
                                                <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?> </td>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'externalRequests', 'action' => 'view', $Report['Endorso']['request_id']));?></td>

						                    </tr>
						                    <?php } ?>

						                    <?php
						                     $sum_total = array_filter($sum_total);
						                     $totaly[] = array();
						                     foreach ($sum_total as $total) {
						                     	$totaly[] = $total['Proforma']['proposal_value'];
						                     }
						                     $sum = array_sum(array_filter($totaly)) ;
						                     
						                    ?>
						                    <tr>
						                    	<td class="hidden-480"><br>Total</br></td>
						                    	<td></td>
						                    	<td></td>
						                    	<td><br><?php echo number_format($sum, 2, ',', '.'); ?></br></td>
						                    </tr>
						                  </tbody>
						                </table>
						              </div>
						            </div>
								</div>
						   </div>
						</div>

          <?php }?>
          <?php 
          echo debug($teste);
          //echo debug($dataI);
          //echo "<br>";
          //echo debug($dataF);
          //
          //$inicio = $dataI['day'].'-'.$dataI['month'].'-'.$dataI['year'];
          //$fim = $dataF['day'].'-'.$dataF['month'].'-'.$dataF['year'];
          //echo debug($inicio);
          //echo "<br>";
          //echo debug($fim);
           ?>
           