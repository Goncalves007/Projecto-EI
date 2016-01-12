<?php
$department_id = $this->Session->read('Auth.User.department_id');
$status = $this->Session->read('Auth.User.boss');
$userID = $this->Session->read('Auth.User.id');
$head = $this->Session->read('Auth.User.group_id');
$username = $this->Session->read('Auth.User.name');
$name = $this->Session->read('Auth.User.username');

echo $this->element('expedientes');
?>
<!-- start: PAGE CONTENT -->
          <div class="invoice">
            <div class="row invoice-logo">
              <div class="col-sm-6">
              <?php
              //echo debug($expedientes[0]['Expediente']['id']);
              
              ?>
              </div>
              <div class="col-sm-6">
                <p>
                   <?php echo $expedientes[0]['Expediente']['nr_expediente'] ?>
                   <span>Enviado em:  <?php echo $expedientes[0]['Expediente']['created'] ?> </span>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
               
              </div>
              <div class="col-sm-4 pull-right">
                      <div class="tabbable tabs-left">
                        <div class="panel-heading">
                            Corfirmacao de Recepcao
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Assunto</a>
                                </li>
                             <?php if(($userID != $expedientes[0]['Expediente']['id_remetente'])){  ?>
                                <li><a href="#profile" data-toggle="tab">Corfirmar Recepcao</a>
                                </li>
                             <?php }elseif ($expedientes[0]['Expediente']['status'] == 1 ) { ?>
                               <li><a href="#feedback" data-toggle="tab">Feedback</a>
                                </li>
                             <?php } ?>

                            </ul>

                            <div class="tab-content">
                            
                               <div class="tab-pane fade in active" id="home">
                                    <p>
                                     <fieldset class="col-lg-7">
                                       <?php echo $expedientes[0]['Expediente']['assunto'] ?>
                                      </fieldset>
                                    </p>
                             </div>
                           
                            <div class="tab-pane fade" id="profile">
                                    <p>
                                      <?php if ($expedientes[0]['Expediente']['status'] ==0) { ?>
                                     <em>Recebido</em>  
                                <fieldset>
                                <?php echo $this->Form->create('Expediente', array('action' => 'confirmar')); ?>
                                
                                <?php
                                echo $this->Form->hidden('nr_exp', array('hiddenField' => true, 'value'=>$expedientes[0]['Expediente']['nr_expediente']));
                                
                                echo $this->Form->hidden('destino', array('hiddenField' => true, 'value'=>$expedientes[0]['Expediente']['id_remetente']));
                               echo $this->Form->hidden('ref', array('hiddenField' => true, 'value'=>$expedientes[0]['Expediente']['nr_expediente']));
                               echo $this->Form->hidden('remetente', array('hiddenField' => true, 'value'=>$expedientes[0]['Expediente']['user_id']));

                                $options=array('Recebido dentro do Prazo'=>'Dentro do Prazo&nbsp&nbsp','Recebido fora do Prazo'=>'Fora do Prazo&nbsp&nbsp');
                                $attributes=array('legend'=>false,'class'=>'radio-inline');
                                echo $this->Form->radio('conf',$options,$attributes,array('class'=>'grey','escape'=>false));
                                  ?>
                                  <label class="radio-inline">
                                   <?php  
                                        echo $this->Form->input('observacao', array('type' => 'textarea', 'class' => 'form-control'));
                                   ?>
                                   <?php
                                   echo $this->Form->hidden('prov', array('hiddenField' => true, 'value'=>$expedientes[0]['Expediente']['proviniencia']));
                                   echo $this->Form->hidden('destinatario', array('hiddenField' => true, 'value'=>$username));
                                   echo $this->Form->hidden('emissor', array('hiddenField' => true, 'value'=>$expedientes[0]['Expediente']['remitente']
                                    ));
                                   echo $this->Form->hidden('idUser', array('hiddenField' => true, 'value'=>$userID
                                    ));
                                   echo $this->Form->hidden('idExp', array('hiddenField' => true, 'value'=>$expedientes[0]['Expediente']['id']
                                    ));
                                   echo $this->Form->hidden('expStatus', array('hiddenField' => true, 'value'=>1
                                    ));
                                   ?>
                                   </label>
                                   <?php
                                     echo $this->Form->end(array('label' => __d('admin', 'Submit'), 'class' => 'btn btn-success'));
                                   ?>
                                </fieldset>
                                <?php }elseif ($expedientes[0]['Expediente']['status'] == 1) {
                                  echo "<a class='btn btn-teal show-tab'>
                                       <em>Expediente Processado</em>
                                       </a>";
                                } ?>
                                    </p>
                            </div>
                            <div class="tab-pane fade" id="feedback">
                            <?php
                            foreach ($confirmas as $confirma) {
                               if ($confirma['Confirma']['nr_expediente'] == $expedientes[0]['Expediente']['nr_expediente']) {
                                 echo "<strong>estado:</strong><br>".$confirma['Confirma']['estado'];
                                 echo "<br><br>";
                                 echo "<strong>Observacao:</strong><br><div class='well'>".$confirma['Confirma']['observacao']."</div>";
                               }
                             } 
                            ?>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--End Basic Tabs   -->

              </div>
            
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th class="hidden-480"> Guia nr. </th>
                      <th class="hidden-480"> Proviniencia </th>
                      <th class="hidden-480"> Remitente </th>
                      <th class="hidden-480"> Motorista </th>
                      <th class="hidden-480"> Correio </th>
                      <th class="hidden-480"> Previsao de Entrega </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="hidden-480"> <?php echo $expedientes[0]['Expediente']['nr_guia'] ?> </td>
                      <td class="hidden-480"> <?php 
                      if ($expedientes[0]['Expediente']['proviniencia'] == 1) {
                      echo "MAPUTO";
                      }elseif ($expedientes[0]['Expediente']['proviniencia'] == 2) {
                        echo "MATOLA";
                      }elseif ($expedientes[0]['Expediente']['proviniencia'] == 3) {
                       echo "TETE";
                      }
                      ?>
                       </td>
                      <td class="hidden-480"> <?php echo $expedientes[0]['Expediente']['remitente'] ?> </td>
                      <td class="hidden-480"> <?php echo $expedientes[0]['Motorista']['name'] ?> </td>
                      <td class="hidden-480">  <?php echo $expedientes[0]['Correio']['name'] ?> </td>
                      <td class="hidden-480">  <?php echo $expedientes[0]['Expediente']['previsao_chegada'] ?> </td>
                      <td><?php if ('a'=='b') {?>
   <div class="form-group">
   <?php //echo $this->Html->link('Download', array('controller' => 'reports', 'action' => 'viewdown', $internalRequest['Report'][0]['id']));?>
   <?php //echo $this->Html->link('Gerar PDF', array('action' => 'pdf', $internalRequest['Report'][0]['id']));?>
</div>
<?php } ?>
</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>
          <!-- end: PAGE CONTENT-->
          <?php
            //echo debug($confirmas);
          ?>