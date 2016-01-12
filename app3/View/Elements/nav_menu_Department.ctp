  <?php $department_id = $this->Session->read('Auth.User.department_id'); ?>
  <div class="row">
                <!--quick info section -->
                 <a href="arqReq.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa fa-floppy-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link('EM ESPERA', array('controller' => 'reports', 'action' => 'progress_d',$department_id,$status=0)) ?> </b>  
                    </div>
                </div></a>
                
                <a href="arqReq.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa fa-floppy-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'EM ANDAMENTO'), array('controller' => 'reports', 'action' => 'process_d',$this->Session->read('Auth.User.department_id'))); ?> </b>  
                    </div>
                </div></a>

                <a href="arqReq.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa fa-floppy-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link('REJEITADAS', array('controller' => 'reports', 'action' => 'rejected_d',$this->Session->read('Auth.User.department_id'))) ?> </b>  
                    </div>
                </div></a>
             
                <a href="arqReq.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa fa-floppy-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link('TERMINADAS', array('controller' => 'reports', 'action' => 'finished_d',$this->Session->read('Auth.User.department_id'))) ?> </b>  
                    </div>
                </div></a>
                
                <!--end quick info section -->
            </div>