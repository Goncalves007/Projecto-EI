<!-- start: RESPONSIVE TABLE PANEL -->
<?php
$idUsr = $this->Session->read('Auth.User.id');
$username = $this->Session->read('Auth.User.name');
$departmant_head = $this->Session->read('Auth.User.boss');
$department_id = $this->Session->read('Auth.User.department_id');
$group_id = $this->Session->read('Auth.User.group_id');

echo $this->element('expedientes'); ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Sistema de Requisição de Fundo
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
											<?php if (!empty($expedientes)) {
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
										<?php if (empty($expedientes)) {
											echo "<h4>Sem Novos Expedientes</h4>";
										}else{
											echo "<h3>Novos Expedientes</h3>";
										} ?>
										<table class="table table-bordered table-hover" id="sample-table-1">
									<div class="endorsements view">

<div class="panel-body">
<?php if(!empty($expedientes)){ ?>
<?php foreach ($expedientes as $key => $expediente) { ?>
<div class="list-group">
<?php echo $this->Html->link($expediente['Expediente']['nr_expediente'].'  --> '.$expediente['Expediente']['assunto'], array('controller' =>'expedientes', 'action' =>'confirmar',$expediente['Expediente']['id']),array('class' => 'list-group-item'));?>
<span class="pull-right text-muted small">
<em><?php echo $expediente['Expediente']['created'] ?></em>
</span>
</div>
<?php }}elseif (empty($expedientes)) {
 echo "<a href='#' class='btn btn-default btn-block'>Nenhum Expediente</a>";
} ?>
</div>
</table>
<?php echo $this->element('footer_user'); ?>
</div>
</div>
</div>
							<!-- end: RESPONSIVE TABLE PANEL -->
              <?php
              //foreach ($expedientes as $key => $expediente) {
                //echo debug($expedientes);
              //}
              
              ?>
  