 <?php
$idUsr = $this->Session->read('Auth.User.id');
$username = $this->Session->read('Auth.User.name');
$departmant_head = $this->Session->read('Auth.User.boss');
$department_id = $this->Session->read('Auth.User.department_id');
$group_id = $this->Session->read('Auth.User.group_id');
?>
 <div id="wrapper_requests">
            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $this->Session->read('Auth.User.name'); ?> </b>
 
                    </div>
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
                <!--quick info section -->
                 <a href="req.php"><div class="col-lg-3">
                    <div class="alert alert-primary text-center">
                        <i class="fa fa-pencil-square-o fa-3x"></i>&nbsp;<b>REQUISITAR FUNDO</b>
                    </div>
                </div></a>
                <a href="epr.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;<b><?php echo $this->Html->link(__d('admin', 'ACOMPANHAR REQUISICOES'), array( 'controller' => 'reports', 'action' => 'process_d',$department_id)); ?> </b>
                    </div>
                </div></a>
                <a href="arqReq.php"><div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa fa-floppy-o fa-3x"></i>&nbsp;<b> ARQUIVO DAS REQUISICOES</b>  
                    </div>
                </div></a>
                
                <!--end quick info section -->
            </div>

            <div class="pure-g">
			    <div class="pure-u-1-3"></div>
			    <div class="pure-u-1-3"></div>
			    <div class="pure-u-1-3"></div>
			</div>