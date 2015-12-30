<?php
$group_id = $this->Session->read('Auth.User.group_id');
$who = '';
switch ($group_id) {
  case '7':
    $who =1; 
    break;
  case '8':
    $who =3; 
    break;
  case '9':
    $who =5; 
    break;
  default:
    # code...
    break;
}
?>
<div class="row">
                <!--quick info section -->
              
                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'REQUESTS IN PROCESS'), array('controller' => 'reports', 'action' => 'all')); ?></b>
                    </div>
                </div></a>

                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'ALL REQUESTS'), array('controller' => 'reports', 'action' => 'over_all')); ?></b>
                    </div>
                </div></a>
                <?php if ($group_id == 8 || $group_id == 9) {?>
                
                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'FINISHED REQUESTS'), array('controller' => 'reports', 'action' => 'finished_o')); ?></b>
                    </div>
                </div></a>
                <?php }?>   
                <!--end quick info section -->
            </div>
