<?php
$idUsr = $this->Session->read('Auth.User.id');
$username = $this->Session->read('Auth.User.name');
$departmant_head = $this->Session->read('Auth.User.boss');
$department_id = $this->Session->read('Auth.User.department_id');
$group_id = $this->Session->read('Auth.User.group_id');
$who = 'nobody';
$id = 0;
switch ($group_id) {
  case '2':
    $who ='Applicant'; 
    break;  
  case '1':
    $who ='Admin'; 
    break;  
  case '6':
    $who ='Head_Department'; 
    break;
  case '7':
    $who ='Finacial_Maneger'; 
    $id = 1;
    break;
  case '8':
    $who ='Treasurer'; 
    $id = 3;
    break;
  case '9':
    $who ='Administrations'; 
    $id =5;
    break;
    case '10':
      $who ='Expedient'; 
      break;
    case '11':
      $who ='Contract'; 
    break;
    case '12':
      $who ='Contract_alert';
      break;
      default:
  }
?>
<div class="row">
<?php if ($who=='Applicant'){ ?>
  <div class="col-sm-4">
              <div class="core-box">
                <div class="heading">
                  <i class="clip-user-4 circle-icon circle-green"></i>
                  <h2>Requisitante</h2>
                </div>
                <div class="content">
                  O M&oacute;dulo para a <b>Requisi&ccedil;&atilde;o de Fundo</b> permite-lhe, n&atilde;o apenas fazer sua requisi&ccedil;&otilde;es como tab&eacute;m  monitora-las, em tempo real, desde ao nivel departamental at&eacute; ao fim do ciclo de requisi&ccedil;&atilde;o a trav&eacute;s de sistema de alerta.
                </div>
              </div>
            </div>
<?php }elseif ($who == 'Head_Department') {?>
  <div class="col-sm-4">
              <div class="core-box">
                <div class="heading">
                  <i class="clip-clip circle-icon circle-teal"></i>
                  <h2>Head_Department</h2>
                </div>
                <div class="content">
                  O M&oacute;dulo para a <b>Requisi&ccedil;&atilde;o de Fundo</b> permite-lhe, n&atilde;o apenas fazer sua requisi&ccedil;&otilde;es como tab&eacute;m  monitora-las, em tempo real, desde ao nivel departamental at&eacute; ao fim do ciclo de requisi&ccedil;&atilde;o a trav&eacute;s de sistema de alerta.
                </div>
              </div>
            </div>
<?php }elseif ($who == 'Finacial_Maneger' || $who == 'Treasurer' || $who == 'Administrations') {?>
  <div class="col-sm-4">
              <div class="core-box">
                <div class="heading">
                  <i class="clip-database circle-icon circle-bricky"></i>
                  <h2>Forwarding Agent</h2>
                </div>
                <div class="content">
                  O M&oacute;dulo para a <b>Requisi&ccedil;&atilde;o de Fundo</b> permite-lhe, n&atilde;o apenas fazer sua requisi&ccedil;&otilde;es como tab&eacute;m  amonitora-las, em tempo real, desde ao nivel departamental at&eacute; ao fim do ciclo de requisi&ccedil;&atilde;o a trav&eacute;s de sistema de alerta.
                </div>
                <a class="view-more" href="#">
                  View More <i class="clip-arrow-right-2"></i>
                </a>
              </div>
            </div>
<?php }elseif ($who == 'Admin') { ?>
  <div class="col-sm-4">
              <div class="core-box">
                <div class="heading">
                  <i class="clip-user-4 circle-icon circle-green"></i>
                  <h2>Administrator</h2>
                </div>
                <div class="content">
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                </div>
                <a class="view-more" href="#">
                  View More <i class="clip-arrow-right-2"></i>
                </a>
              </div>
            </div>
<?php }elseif ($who == 'Expedient') { ?>
 <div class="col-sm-3">
              <div class="core-box">
                <div class="heading">
                  <i class="clip-clip circle-icon circle-teal"></i>
                  <h2>Gest&atilde;o de Expedientes</h2>
                </div>
                <div class="content">
                  Gest&atilde;o de Expedientes &eacute; o M&oacute;dulo que lhe permite enviar expedientes aos diferentes Escrit&oacute;rios. Tab&eacute;m, permite monitor a recep&ccedil;&atilde;o e possui um sistema de alerta, via e-mail, a tempo real.
                </div>
                  <a class="view-more">
                <?php echo $this->Html->link(__d('admin', 'Enviar Expediente <i class="clip-arrow-right-2"></i>'), array('controller' => '../../Expedientes', 'action' => 'add',$idUsr,$group_id),array('escape'=>false)); ?>
                </a>
              </div>
            </div>
<?php }elseif ( $who == 'Contract') { ?>
  <div class="col-sm-4">
      <div class="core-box">
        <div class="heading">
         <i class="clip-database circle-icon circle-bricky"></i>
         <h2>Gest&atilde;o de Contractos</h2>
         </div>
          <div class="content">
            O M&oacute;dulo de Gest&atilde;o de Contratos permite desde armazenamento de contratos, Factura&ccedil;&atilde;o mensal, Actualizac&atilde;o e Prorroga&ccedil;&atilde;o da data do termino, sistema de busca avacanda e controle de contratos no estado de emin&ecirc;ncia a trav&eacute;z de sistema de alerta. 
          </div>
          <a class="view-more">
                <?php echo $this->Html->link(__d('admin', 'Registar Contratos <i class="clip-arrow-right-2"></i>'), array('controller' => '../../clients', 'action' => 'add'),array('escape'=>false)); ?>
          </a>
        </div>
      </div>
<?php }elseif ($who == 'Contract_alert') { ?>
  <div class="col-sm-4">
      <div class="core-box">
        <div class="heading">
         <i class="clip-database circle-icon circle-bricky"></i>
         <h2>Gest&atilde;o de Contractos</h2>
         </div>
          <div class="content">
            O M&oacute;dulo de Gest&atilde;o de Contratos permite desde armazenamento de contratos, Factura&ccedil;&atilde;o mensal, Actualizac&atilde;o e Prorroga&ccedil;&atilde;o da data do termino, sistema de busca avacanda e controle de contratos no estado de emin&ecirc;ncia a trav&eacute;z de sistema de alerta. 
          </div>
          <a class="view-more">
                <?php echo $this->Html->link(__d('admin', 'Registar Contratos <i class="clip-arrow-right-2"></i>'), array('controller' => '../../alertContrats', 'action' => 'add'),array('escape'=>false)); ?>
          </a>
        </div>
      </div>
<?php } ?>
</div>


