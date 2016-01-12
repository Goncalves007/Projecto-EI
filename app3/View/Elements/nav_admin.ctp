<nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                        
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                   
                    <li class="selected">
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li><?php echo $this->Html->link(__('Administrations'), array('controller' => 'administrations', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('Beneficiaries type'), array('controller' => 'beneficiaries', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('External Beneficiaries'), array('controller' => 'external_beneficiaries', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Internal Beneficiaries'), array('controller' => 'internal_beneficiaries', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Offices'), array('controller' => 'offices', 'action' => 'index')); ?> 
					</li>
					<li><?php echo $this->Html->link(__('Providers'), array('controller' => 'providers', 'action' => 'index')); ?> 
					</li>
    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
