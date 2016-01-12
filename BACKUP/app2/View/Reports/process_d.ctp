<?php
//echo debug($Reports);
 echo $this->element('nav_menu_Department');
 echo $this->element('content_header'); ?>

<h1>Requisicoes Em Progresso</h1>
<table class="pure-table pure-table-bordered">
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
    <?php for ($i=0; $i < sizeof($Reports) ; $i++) { ?>
    <tr class="pure-table-odd">

        <td><?php echo $Reports[$i]['reference_application']; ?></td>

        <td><?php echo $Reports[$i]['payment_details']; ?></td>

        <?php if ($Reports[$i]['request_status'] == 0) {?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>"; ?></td>
        <?php }elseif (($Reports[$i]['request_status'] == 1) || ($Reports[$i]['request_status'] == 3) || ($Reports[$i]['request_status'] == 5)) { ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Terminado </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2) {?>
           <td><?php echo "<em style='color:#800000'><b> Endeferido </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 4 || $Reports[$i]['request_status'] == 6 || $Reports[$i]['request_status'] == 8) {?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php } ?>

        <?php if ($Reports[$i]['request_status'] == 0) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 1) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 3 || $Reports[$i]['request_status'] == 5){ ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Terminado </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2) {?>
             <td><?php echo "Terminado" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 4) {?>
             <td><?php echo "<em style='color:#800000'><b> Endeferido </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 6 || $Reports[$i]['request_status'] == 8) {?>
             <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php } ?>

        <?php if ($Reports[$i]['request_status'] == 0 || $Reports[$i]['request_status'] == 1) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 3) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 5){ ?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Terminado </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2 || $Reports[$i]['request_status'] == 4) {?>
            <td><?php echo "Terminado" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 6) {?>
            <td><?php echo "<em style='color:#800000'><b> Endeferido </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 8) {?>
            <td><?php echo "<em style='color:#000080'><b> Endossou </b></em>" ?></td>
        <?php } ?>

        <?php if ($Reports[$i]['request_status'] == 0 || $Reports[$i]['request_status'] == 1 || $Reports[$i]['request_status'] == 3) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 5) { ?>
            <td><?php echo "<em style='color:black'><b> Em Espera ... </b></em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Terminado </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2 || $Reports[$i]['request_status'] == 4 || $Reports[$i]['request_status'] == 6) {?>
            <td><?php echo "Terminado" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 8) {?>
            <td><?php echo "Pendente!?!" ?></td>
        <?php } ?>

        <?php if ($Reports[$i]['request_status'] == 0) {?>
            <td><?php echo "--------------" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 1 || $Reports[$i]['request_status'] == 3 || $Reports[$i]['request_status'] == 5) { ?>
            <td><?php echo "<em> Em Andamento </em>" ?></td>
        <?php }elseif($Reports[$i]['request_status'] == 7){ ?>
            <td><?php echo "<em style='color:#800000'><b> Terminado </b></em>" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 2 || $Reports[$i]['request_status'] == 4 || $Reports[$i]['request_status'] == 6) {?>
            <td><?php echo "Terminado" ?></td>
        <?php }elseif ($Reports[$i]['request_status'] == 8) {?>
            <td><?php echo "Pendente!?!" ?></td>
        <?php } ?>

        <td><?php echo $Reports[$i]['created']; ?></td>
        <?php
         if (substr($Reports[$i]['reference_application'], 0,6)=='RefInt' ) {
             $controller = 'internalRequests';
         }elseif (substr($Reports[$i]['reference_application'], 0,6)=='RefExt') {
            $controller = 'externalRequests';
         }
        ?>
        <td><?php echo $this->Html->link('View Details', array('controller' =>$controller, 'action' => 'view', $Reports[$i]['id']));?></td>
    </tr>
    <?php  } ?>
    <?php unset($user); ?>
</table>
<?php echo $this->element('content_footer'); ?>