
            <div class="row">
                <!--quick info section -->
                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'REGISTOS'), array('controller' => 'Expedientes', 'action' => 'add',$this->Session->read('Auth.User.id'),$this->Session->read('Auth.User.group_id'))); ?></b>
                    </div>
                </div></a>

                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'NOVOS EXPEDIENTES'), array('controller' => 'expedientes', 'action' => 'view',$this->Session->read('Auth.User.id'))); ?></b>
                    </div>
                </div></a>
               
                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'ACOMPANHAMENTO'), array('controller' => 'expedientes', 'action' => 'follow_expedient', $this->Session->read('Auth.User.id'))); ?></b>
                    </div>
                </div></a>

                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'BUSCA AVANCADA'), array('controller' => 'expedientes', 'action' => 'busca',$this->Session->read('Auth.User.id'))); ?></b>
                    </div>
                </div></a>

            </div>