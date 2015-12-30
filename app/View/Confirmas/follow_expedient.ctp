<?php
$group_id =$this->Session->read('Auth.User.group_id');
$departmant_head = $this->Session->read('Auth.User.boss');
$idUsr = $this->Session->read('Auth.User.id');
$username = $this->Session->read('Auth.User.name');
$department_id = $this->Session->read('Auth.User.department_id');

echo $this->element('expedientes'); ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Sistema Emissao de Espedientes
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
                                        <div class="form-group">
                                         <?php 
                                        if (!empty($confirmas)) {
                                         echo $this->Form->create('Search'); ?>
                                          <?php
                                          echo $this->Form->input('search',array('label'=>false,'placeholder' => 'Expediente Especifica'),array('escape'=>false));
                                          ?>
                                          <?php echo $this->Form->end(__('Search'));
                                        }
                                           ?>
                                         </div>
									</div>
                                    
                                 
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<h3>Todos Expedientes</h3>
										<table class="table table-bordered table-hover" id="sample-table-1">
<?php
if (empty($confirmas)) {
   echo "<div class='list-group'>";
   echo "<a href='#' class='btn btn-default btn-block'>Nenhum Expediente </a>";
   echo "</div>";
 }else{?>
											<thead>
											
												<tr>
                                                  <th class="hidden-480"> Guia nr. </th>
                                                  <th class="hidden-480"> Proviniencia </th>
                                                  <th class="hidden-480"> Enviado Por </th>
                                                  <th class="hidden-480"> Motorista </th>
                                                  <th class="hidden-480"> Correio </th>
                                                  <th class="hidden-480"> Previsao de Chegada </th>
                                                  <th class="hidden-480"> Estado </th>
                                                </tr>
											   
											</thead>
<?php }?> 
											<tbody>
											<?php foreach ($confirmas as $confirma) { ?>
												
												<tr class="pure-table-odd">
                                                    <td><?php echo $confirma['Expediente']['nr_guia']; ?></td>
                                                    <td><?php echo $confirma['Office']['nome']; ?></td>
                                                    <td><?php echo $confirma['Expediente']['remitente']; ?></td>
                                                    <td><?php echo $confirma['Motorista']['name']; ?></td>
                                                    <td><?php echo $confirma['Correio']['name']; ?></td>
                                                    <td><?php echo $confirma['Expediente']['previsao_chegada']; ?></td>
        <?php 
         $previsao_chegada = $confirma['Expediente']['previsao_chegada'];
         //$this->

        if ($confirma['Expediente']['status'] == 0 && (!empty($vence_hoje))) {?>
            <td><?php echo "<em style='color:black'><b> $vence_hoje </b></em>"; ?></td>
        <?php }elseif (($confirma['Expediente']['status'] == 0)) { ?>
            <td><em style='color:#000080'><b><?php echo $this->Html->link('A caminho ...', array('controller' => 'expedientes', 'action' =>'confirmar',$confirma['Expediente']['id'])) ?>  </b></em></td>
        <?php }elseif($confirma['Expediente']['status'] == 1){ ?>
            <td><em style='color:#800000'><b><?php echo $this->Html->link('Recebido', array('controller' => 'expedientes', 'action' =>'confirmar',$confirma['Expediente']['id'])) ?></b></em></td>
        <?php } ?>
                                                </tr>
                                                <?php } ?>										
                                            </tbody>
                            </table>
                            <?php echo $this->element('footer_user'); ?>
                            </div>
                            </div>

							<!-- end: RESPONSIVE TABLE PANEL -->
							<?php //debug($idE) ?>
							<?php //debug($confirmas) ?>