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
								    <?php echo $this->Form->create('ExternalRequest'); ?>
								    
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
			                          echo $this->Form->input('external_beneficiary_id',array('empty' => '------------------','class'=>'grey','label'=>'Beneficiario Externo &nbsp&nbsp&nbsp&nbsp'));
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
			                        <?php
                                         if (isset($sms)) {
                                           echo "<em style='color:red'>$sms</em>";
                                         }else{
                                          $sms="";
                                         }
                                     ?>			
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
						                      <th class="hidden-480"> Created </th>
						                      <th class="hidden-480"> Status </th>
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
						                      <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                            <?php $sum_total[] = $p; ?>
                                           <?php }} ?>
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <?php
                                                  if (empty($Report['Endorso']['justificada'])) {?>
                                                     <td><a class='btn btn-light-red btn-xs'>
                                                                Nao Justificada
                                                           </a></td>
                                                     <?php }else{ echo "<td></td>";} ?>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Pay', array('label' => false, 'value'=>1)); ?> </td>
						                        <td>
						                        <?php 
                                                    if (empty($Report['Endorso']['guia_entrega']) || empty($Report['Endorso']['n_factura']) || empty($Report['Endorso']['justificada'])) {
                                                     $block = "<a class='btn btn-light-grey btn-xs'>
                                                                Paid
                                                           </a>";
                                                     echo "$block";
                                                     }elseif (!empty($Report['Endorso']['guia_entrega']) && !empty($Report['Endorso']['n_factura'])) {?>
                                                    	<?php echo $this->Form->end('Paid',array('class' => 'btn btn-yellow btn-block')); ?></td>
                                                   <?php }  ?>
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
						                    	<td>
						                    	<br><?php echo number_format($sum, 2, ',', '.'); ?>
						                    	</td>
						                    	<td></td>
						                    	<?php
						                    	if ($block) {?>
						                    	<td>*Payment locked - <em style='color:red'>Dados Incompleto para o pagamento</em>
						                    	</td>
						                    	<?php } ?>
						                    	
						                    </tr>
						                  </tbody>
						                </table>
						              </div>
						            </div>



								</div>
						   </div>
						</div>

          <?php } //debug($Report);?>

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
                                              
                                            <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                                <?php $sum_total[] = $p; ?>
                                           <?php }} ?>
                                           
						                      
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Pay', array('label' => false, 'value'=>1)); ?> </td>
						                        <?php
                                                   if ($Report['Endorso']['paga'] == 1) {?>
                                                   <td><a class="btn btn-light-grey btn-xs">
                                                    <em>Edit</em></a></td>
                                                   <?php }else{?>
                                                     <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?></td>
                                                   <?php } ?>
                                                <td><?php echo $this->Html->link('View Details', array('controller' =>'externalRequests', 'action' => 'view', $Report['Endorso']['request_id']),array('class' => 'btn btn-light-grey btn-xs'));?></td>
						                        
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

                                               <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                            <?php $sum_total[] = $p; ?>

                                           <?php }} ?>
						                      
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>

						                        
                                              <td><?php echo $this->Form->end('Justified',array('class' => 'btn btn-yellow btn-block')); ?> </td>
                                             

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

                                              <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                              <?php $sum_total[] = $p; ?>

                                           <?php }} ?>
						                      
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>

						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>
                                                <?php
                                                   if ($Report['Endorso']['paga'] == 1) {?>
                                                   <td><a class="btn btn-light-grey btn-xs">
                                                    <em>Edit</em></a></td>
                                                   <?php }else{?>
                                                     <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?></td>
                                                   <?php } ?>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'externalRequests', 'action' => 'view', $Report['Endorso']['request_id']),array('class' => 'btn btn-light-grey btn-xs'));?></td>

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

<?php if (isset($Reports) && !empty($Reports) && $Label == 'T' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Todas Requisicoes Pagas e Justificadas
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

                                              <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                              <?php $sum_total[] = $p; ?>

                                           <?php }} ?>
						                      
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>
                                                <?php
                                                   if ($Report['Endorso']['paga'] == 1) {?>
                                                   <td><a class="btn btn-light-grey btn-xs">
                                                    <em>Edit</em></a></td>
                                                   <?php }else{?>
                                                     <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?></td>
                                                   <?php } ?>
						                        <td><?php echo $this->Html->link('View Details', array('controller' =>'externalRequests', 'action' => 'view', $Report['Endorso']['request_id'],$Report['ExternalRequest']['department_id']),array('class' => 'btn btn-light-grey btn-xs')); ?></td>

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

          <?php if (isset($Reports) && !empty($Reports) && $Label == 'S' ) {?>
          	
            <div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Busca de Requisicao Especifica
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

                                              <?php 
                                            foreach ($pro as $p) {
                                            if ($p['Proforma']['request_id'] == $Report['Endorso']['request_id']) {?>
                                            <td class="hidden-480"><?php echo number_format($p['Proforma']['proposal_value'], 2, ',', '.')  ?></td>
                                              <?php $sum_total[] = $p; ?>

                                           <?php }} ?>
						                      
						                       <td class="hidden-480"> <?php echo $Report['ExternalRequest']['created']; ?> </td>
						                       <td> <?php echo $this->Form->hidden('hidden', array('label' => false, 'value'=>$Report['Endorso']['id'])); ?> </td>
						                       
						                        <td> <?php echo $this->Form->hidden('Justify', array('label' => false, 'value'=>1)); ?> </td>
                                                <?php
                                                   if ($Report['Endorso']['paga'] == 1) {?>
                                                   <td><a class="btn btn-light-grey btn-xs">
                                                    <em>Edit</em></a></td>
                                                   <?php }else{?>
                                                     <td><?php echo $this->Form->end('Edit',array('class' => 'btn btn-yellow btn-block')); ?></td>
                                                   <?php } ?>
                                                <td> 
						                        <?php echo $this->Html->link('View Details', array('controller' =>'externalRequests', 'action' => 'view', $Report['Endorso']['request_id']),array('class' => 'btn btn-light-grey btn-xs'));?></td>

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
						                    
						                  </tbody>
						                </table>
						              </div>
						            </div>
								</div>
						   </div>
						</div>

          <?php }?>

          <?php
          //echo debug($Report);
         /* echo debug($field);
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
           