<!-- start: RESPONSIVE TABLE PANEL -->
<?php
$group_id =$this->Session->read('Auth.User.group_id');
$departmant_head = $this->Session->read('Auth.User.boss');
$idUsr = $this->Session->read('Auth.User.id');
$username = $this->Session->read('Auth.User.name');
$department_id = $this->Session->read('Auth.User.department_id');


if($group_id==2){ 
 echo $this->element('nav_menu_Register');
    }elseif ($group_id==7 || $group_id==8 || $group_id==9) {
        echo $this->element('nav_menu_other');
         }elseif ($group_id==6) {
       echo $this->element('nav_menu_Department');
    }
?>
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
                                         <?php echo $this->Form->create('Search'); ?>
                                          <?php
                                          echo $this->Form->input('search',array('label'=>false,'placeholder' => 'Requisicao Especifica'),array('escape'=>false));
                                          ?>
                                          <?php echo $this->Form->end(__('Search')); ?>
                                         </div>
									</div>
                                    
                                 
								</div>
                                <?php if(!isset($Pesquiza) || empty($Pesquiza)) { ?>
                                 
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-bordered table-hover" id="sample-table-1">
											<thead>
											<?php
												if ($departmant_head==0) {?>
												    <h3>Acompanhar Minhas Requisicoes</h3>
												<?php }elseif ($departmant_head==1) {?>
												   <h3>Acompanhar Requisicoes</h3>
												<?php } ?>
											<?php
												if (empty($Reports)) {
												   echo "<div class='list-group'>";
												   echo "<a href='#' class='btn btn-default btn-block'>Lista Vazia </a>";
												   echo "</div>";
												 }else{?>
												<tr>
											        <th>Request Reference</th>
											        <th>payment Details</th>
											        <th>Ch. Departamento</th>
											        <th>Ger. Financeiro</th>
											        <th>Tesoreiro</th>
											        <th>Administracao</th>
											        <th>Estado</th>
											        <th>Created</th>
											        <th colspan="2">Actions</th>
											    </tr>
											   <?php }?>
											</thead>
											 <?php for ($i=0; $i < sizeof($Reports) ; $i++) { ?>
											<tbody>
												<tr class="pure-table-odd">

        <td><?php echo $Reports[$i]['reference_application']; ?></td>

        <td><?php echo $Reports[$i]['payment_details']; ?></td>

        <?php if ($Reports[$i]['request_status'] == 0) {?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>"; ?></td>
        <?php }elseif (($Reports[$i]['request_status'] == 1) || ($Reports[$i]['request_status'] == 3) || ($Reports[$i]['request_status'] == 5)) { ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Submetida </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2) {?>
           <td><?php echo "<em style='color:#800000'><b> Indeferiu </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 4 || $Reports[$i]['request_status'] == 6 || $Reports[$i]['request_status'] == 8) {?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 9) { ?>
            <td><?php echo "<em style='color:#000080'><b> Paga </b></em>" ?></td>
        <?php } ?>

        <?php if ($Reports[$i]['request_status'] == 0) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 1) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 3 || $Reports[$i]['request_status'] == 5){ ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Submetida </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2) {?>
             <td><?php echo "Indeferido" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 4) {?>
             <td><?php echo "<em style='color:#800000'><b> Endeferiu </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 6 || $Reports[$i]['request_status'] == 8) {?>
             <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 9) { ?>
            <td><?php echo "<em style='color:#000080'><b> Paga </b></em>" ?></td>
        <?php } ?>

        <?php if ($Reports[$i]['request_status'] == 0 || $Reports[$i]['request_status'] == 1) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 3) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 5){ ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Submetida </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2 || $Reports[$i]['request_status'] == 4) {?>
            <td><?php echo "Indeferido" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 6) {?>
            <td><?php echo "<em style='color:#800000'><b> Indeferiu </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 8) {?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 9) { ?>
            <td><?php echo "<em style='color:#000080'><b> Paga </b></em>" ?></td>
        <?php } ?>

        <?php if ($Reports[$i]['request_status'] == 0 || $Reports[$i]['request_status'] == 1 || $Reports[$i]['request_status'] == 3) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 5) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Submeteu </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2 || $Reports[$i]['request_status'] == 4 || $Reports[$i]['request_status'] == 6) {?>
            <td><?php echo "Indeferido" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 8) {?>
            <td><?php echo "Nao Pago" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 9) { ?>
            <td><?php echo "<em style='color:#000080'><b> Paga </b></em>" ?></td>
        <?php } ?>

        <?php if ($Reports[$i]['request_status'] == 0) {?>
            <td><?php echo "Aguarda Por Ch. Departamento" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 1){ ?>
            <td><?php echo "Aguarda Por Ger. Financeiro" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 3) {?>
           <td><?php echo "Aguarda Por Tesoreiro" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 5) {?>
            <td><span class="label label-sm label-inverse"><b> Aguarda Submissao </b></span></td>
        <?php }
        elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><span class="label label-sm label-warning"><b> Nao foi Paga </b></span></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2 || $Reports[$i]['request_status'] == 4 || $Reports[$i]['request_status'] == 6) {?>
            <td><span class="label label-sm label-danger"><b> Indiferida </b></span></td>
        <?php }elseif ($Reports[$i]['request_status'] == 8) {?>
            <td><?php echo "Pendente!?!" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 9) { ?>
            <td><span class="label label-sm label-success"><b> Comcluido </b></span></td>
        <?php } ?>

        <td><?php echo $Reports[$i]['created']; ?></td>
        <?php
         if (substr($Reports[$i]['reference_application'], 0,6)=='RefInt' ) {
             $controller = 'internalRequests';
             
         }elseif (substr($Reports[$i]['reference_application'], 0,6)=='RefExt') {
            $controller = 'externalRequests';
         }
        ?>
           <td><?php echo $this->Html->link('View Details', array('controller' =>$controller, 'action' => 'view', $Reports[$i]['id'],$Reports[$i]['department_id']),array('class' => 'btn btn-light-grey btn-xs'));?></td>
         
    </tr>
    <?php  } ?>
    <?php unset($user); ?>											
</tbody>
</table>
<?php echo $this->element('footer_user'); ?>
</div>
</div>
<?php }elseif(isset($Pesquiza) || !empty($Pesquiza)) { ?>
<?php

                                                 if (isset($Pesquiza[0]['InternalRequest']['reference_application'] ) && substr($Pesquiza[0]['InternalRequest']['reference_application'], 0,6)=='RefInt') {
                                                     $controller = 'InternalRequest';
                                                     
                                                 }elseif (isset($Pesquiza[0]['ExternalRequest']['reference_application'] ) && substr($Pesquiza[0]['ExternalRequest']['reference_application'], 0,6)=='RefExt') {
                                                     $controller = 'ExternalRequest';
                                                 }
                                                ?>
<div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="sample-table-1">
                                            <thead>
                                            <?php
                                                if ($departmant_head==0) {?>
                                                    <h3>Acompanhar Minhas Requisicoes</h3>
                                                <?php }elseif ($departmant_head==1) {?>
                                                   <h3>Acompanhar Requisicoes</h3>
                                                <?php } ?>
                                                <tr>
                                                    <th>Request Reference</th>
                                                    <th>payment Details</th>
                                                    <th>Ch. Departamento</th>
                                                    <th>Ger. Financeiro</th>
                                                    <th>Tesoreiro</th>
                                                    <th>Administracao</th>
                                                    <th>Estado</th>
                                                    <th>Created</th>
                                                    <th colspan="2">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td><?php echo $Pesquiza[0][$controller]['reference_application']; ?></td>
                                                <td><?php echo $Pesquiza[0][$controller]['payment_details']; ?></td>
                                                <?php if ($Pesquiza[0][$controller]['request_status'] == 0) {?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>"; ?></td>
        <?php }elseif (($Pesquiza[0][$controller]['request_status'] == 1) || ($Pesquiza[0][$controller]['request_status'] == 3) || ($Pesquiza[0][$controller]['request_status'] == 5)) { ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Pesquiza[0]['InternalRequest']['request_status'] == 7 || $Pesquiza[0]['ExternalRequest']['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Submetida </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0]['InternalRequest']['request_status'] == 2) {?>
           <td><?php echo "<em style='color:#800000'><b> Indeferiu </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 4 || $Pesquiza[0][$controller]['request_status'] == 6 || $Pesquiza[0][$controller]['request_status'] == 8) {?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 9) { ?>
            <td><?php echo "<em style='color:#000080'><b> Paga </b></em>" ?></td>
        <?php } ?>
                                                <?php if ($Pesquiza[0][$controller]['request_status'] == 0) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 1) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Pesquiza[0][$controller]['request_status'] == 3 || $Pesquiza[0][$controller]['request_status'] == 5){ ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Pesquiza[0][$controller]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Submetida </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 2) {?>
             <td><?php echo "Indeferido" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 4) {?>
             <td><?php echo "<em style='color:#800000'><b> Endeferiu </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 6 || $Pesquiza[0][$controller]['request_status'] == 8) {?>
             <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 9) { ?>
            <td><?php echo "<em style='color:#000080'><b> Paga </b></em>" ?></td>
        <?php } ?>
                                                <?php if ($Pesquiza[0][$controller]['request_status'] == 0 || $Pesquiza[0][$controller]['request_status'] == 1) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 3) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Pesquiza[0][$controller]['request_status'] == 5){ ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Pesquiza[0][$controller]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Submetida </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 2 || $Pesquiza[0][$controller]['request_status'] == 4) {?>
            <td><?php echo "Indeferido" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 6) {?>
            <td><?php echo "<em style='color:#800000'><b> Indeferiu </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 8) {?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 9) { ?>
            <td><?php echo "<em style='color:#000080'><b> Paga </b></em>" ?></td>
        <?php } ?>
                                                <?php if ($Pesquiza[0][$controller]['request_status'] == 0 || $Pesquiza[0][$controller]['request_status'] == 1 || $Pesquiza[0][$controller]['request_status'] == 3) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 5) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Pesquiza[0][$controller]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Submeteu </b></em>" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 2 || $Pesquiza[0][$controller]['request_status'] == 4 || $Pesquiza[0][$controller]['request_status'] == 6) {?>
            <td><?php echo "Indeferido" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 8) {?>
            <td><?php echo "Nao Pago" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 9) { ?>
            <td><?php echo "<em style='color:#000080'><b> Paga </b></em>" ?></td>
        <?php } ?>
                                                <?php if ($Pesquiza[0][$controller]['request_status'] == 0) {?>
            <td><?php echo "Aguarda Por Ch. Departamento" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 1){ ?>
            <td><?php echo "Aguarda Por Ger. Financeiro" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 3) {?>
           <td><?php echo "Aguarda Por Tesoreiro" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 5) {?>
            <td><span class="label label-sm label-inverse"><b> Aguarda Submissao </b></span></td>
        <?php }
        elseif($Pesquiza[0][$controller]['request_status'] == 7){ ?>
            <td><span class="label label-sm label-warning"><b> Nao foi Paga </b></span></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 2 || $Pesquiza[0][$controller]['request_status'] == 4 || $Pesquiza[0]['InternalRequest']['request_status'] == 6) {?>
            <td><span class="label label-sm label-danger"><b> Indiferida </b></span></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 8) {?>
            <td><?php echo "Pendente!?!" ?></td>
        <?php }elseif ($Pesquiza[0][$controller]['request_status'] == 9) { ?>
            <td><span class="label label-sm label-success"><b> Comcluido </b></span></td>
        <?php } ?>
                                                <td><?php echo $Pesquiza[0][$controller]['created']; ?></td>
                                                
                                                   <?php
                                             if (substr($Pesquiza[0][$controller]['reference_application'], 0,6)=='RefInt' ) {
                                                 $controller = 'internalRequests';
                                                 ?>
                                                   <td><?php echo $this->Html->link('View Details', array('controller' =>$controller, 'action' => 'view', $Pesquiza[0]['InternalRequest']['id'],$Pesquiza[0]['InternalRequest']['department_id']));?></td>
                                                 <?php
                                                 
                                             }elseif (substr($Pesquiza[0][$controller]['reference_application'], 0,6)=='RefExt') {
                                                $controller = 'externalRequests';
                                                ?>
                                                   <td><?php echo $this->Html->link('View Details', array('controller' =>$controller, 'action' => 'view', $Pesquiza[0]['ExternalRequest']['id'],$Pesquiza[0]['ExternalRequest']['department_id']));?></td>
                                                 <?php
                                             }
                                            ?>
                                               
                                            </tr> 
                                                                
</tbody>  
</table>
<?php echo $this->element('footer_user'); ?>
</div>
</div>

<?php } ?>
</div>
<?php 
//echo debug($Pesquiza);
?>

							<!-- end: RESPONSIVE TABLE PANEL -->