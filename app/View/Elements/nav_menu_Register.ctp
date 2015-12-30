
            <div class="row">
                <!--quick info section -->
                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'EM ANDAMENTO'), array('controller' => 'reports', 'action' => 'progress', $this->Session->read('Auth.User.id'), $this->Session->read('Auth.User.department_id'))); ?></b>
                    </div>
                </div></a>

                <a href="arqReq.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa fa-floppy-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'TERMINADAS'), array('controller' => 'reports', 'action' => 'finished', $this->Session->read('Auth.User.id'), $this->Session->read('Auth.User.department_id'))); ?></b>  
                    </div>
                </div></a>

                <a href="arqReq.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa fa-floppy-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'REJEITADAS'), array('controller' => 'reports', 'action' => 'rejected', $this->Session->read('Auth.User.id'), $this->Session->read('Auth.User.department_id'))); ?></b>  
                    </div>
                </div></a>

                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'VER TODAS'), array('controller' => 'reports', 'action' => 'index', $this->Session->read('Auth.User.id'), $this->Session->read('Auth.User.department_id'))); ?></b>
                      </div>
                    </div></a>
                
                <!--end quick info section -->
            </div>

            