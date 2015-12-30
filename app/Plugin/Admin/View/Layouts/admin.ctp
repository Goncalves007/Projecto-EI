<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Clip-One - Responsive Admin Template</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->

		<?php 
      echo $this->Html->css(array(
        '/admin/assets/plugins/bootstrap/css/bootstrap.min.css',
        '/admin/assets/plugins/font-awesome/css/font-awesome.min.css',
        '/admin/assets/fonts/style.css',
        '/admin/assets/css/main.css',
        '/admin/assets/css/main-responsive.css',
        '/admin/assets/plugins/iCheck/skins/all.css',
        '/admin/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css',
        '/admin/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css',
        '/admin/assets/css/theme_light.css',
        '/admin/assets/css/print.css',
        '/admin/assets/plugins/select2/select2.css',
        '/admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
        '/admin/assets/plugins/datepicker/css/datepicker.css',
        '/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
        '/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css',
        '/admin/assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css',
        '/admin/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css',
        '/admin/assets/plugins/summernote/build/summernote.css'
        ));
      echo $this->Html->css(array('href' => '/admin/assets/css/theme_light.css', 'type' => 'text/css', 'id' => 'skin_color'));
      echo $this->Html->css(array('href' => '/admin/assets/css/print.css', 'type' => 'text/css', 'media' => 'print'));
       echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
      echo $this->Html->script('//yui.yahooapis.com/pure/0.6.0/pure-min.css');
     ?>
     <?php 
          $app = array();
          $app['basePath'] = Router::url('/');
          $app['params'] = array(
            'controller' => $this->params['controller'],
            'action' => $this->params['action'],
            'named' => $this->params['named'],
          );
          echo $this->Html->scriptBlock('var App = ' . $this->Js->object($app) . ';');
     ?>

		
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
	<?php
	$idUsr = $this->Session->read('Auth.User.id');
	$username = $this->Session->read('Auth.User.name');
	$departmant_head = $this->Session->read('Auth.User.boss');
	$department_id = $this->Session->read('Auth.User.department_id');
	$group_id = $this->Session->read('Auth.User.group_id');
	$office_id = $this->Session->read('Auth.User.office_id');
	$name = $this->Session->read('Auth.User.username');
	?>
		<!-- start: HEADER -->
		
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<div class="navbar-content">
				<!-- start: SIDEBAR -->
				<div class="main-navigation navbar-collapse collapse">
					<!-- start: MAIN MENU TOGGLER BUTTON -->
					<div class="navigation-toggler">
						<i class="clip-chevron-left"></i>
						<i class="clip-chevron-right"></i>
					</div>
					<!-- end: MAIN MENU TOGGLER BUTTON -->
					<!-- start: MAIN NAVIGATION MENU -->
					<?php if(isset($group_id)){ ?>
					<ul class="main-navigation-menu">
						<li class="active open">
						<?php echo $this->Html->link(__d('admin', '<i class="clip-home-3"></i><span class="title"> Dashboard </span><span class="selected"></span>'), array('controller' => 'users', 'action' => 'admin_wellcome'),array('escape'=>false)); ?>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="clip-screen"></i>
								<span class="title"><?php if($group_id == 10){echo "EXPEDIENTES";}elseif($group_id == 11){echo "CONTRATOS";}elseif($group_id == 1){echo "CONTROL PANEL";}elseif($group_id == 2 || $group_id == 3 || $group_id == 6 || $group_id == 7 || $group_id == 8 || $group_id == 9){echo "REQUESTS";}else{echo "REQUISICAO DE FUNDOS";}?> </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
							<?php if($group_id == 2){  ?>
								<li>
								<?php echo $this->Html->link(__d('admin', '<span class="title">INTERNAL REQUEST</span>'), array('controller' => '../../Internal_requests', 'action' => 'add',$idUsr,$department_id),array('escape'=>false)); ?>
                                    
								</li>
								<li>
								<?php echo $this->Html->link(__d('admin', '<span class="title">EXTERNAL REQUEST</span>'), array('controller' => '../../External_requests', 'action' => 'add',$idUsr,$department_id),array('escape'=>false)); ?>
								</li>
							<?php }elseif ($group_id == 10) { ?>
								<li>
								<?php echo $this->Html->link(__d('admin', '<span class="title">REGISTO DE  EXPEDIENTES</span>'), array('controller' => '../../Expedientes', 'action' => 'add',$idUsr,$group_id),array('escape'=>false)); ?>
                                    
								</li>
							<?php }elseif ($group_id == 11) { ?>
								<li>
								<?php echo $this->Html->link(__d('admin', '<span class="title">REGISTO DE  CONTRATOS</span>'), array('controller' => '../../clients', 'action' => 'add'),array('escape'=>false)); ?>
                                    
								</li>
							<?php }elseif ($group_id == 1) { ?>
								 <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">Adicionar Correios</span>'), array('controller' => '../../correios','action' => 'add'),array('escape'=>false)); ?>
									     </li>
							<?php } ?>
							</ul>
						  </li>
						  <?php if ($group_id != 1) {?>
						<li>
							<a href="javascript:;">
								<i class="clip-folder-open"></i>
								<span class="title"><?php if($group_id == 10){echo "FAZER ACOMPANHAMENTO";}elseif($group_id == 11){echo "PESQUISAR CONTRATOS";}else{echo "FOLLOW REQUESTS";}?> </span><i class="icon-arrow"></i>
								<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
							<?php if($group_id == 2){  ?>
								           <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">REQUESICAO EM ANDAMENTO</span>'), array('controller' => '../../reports', 'action' => 'progress', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>
							                <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">REQUESICAO TERMINADA</span>'), array('controller' => '../../reports', 'action' => 'finished', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>
							                <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">REQUESICAO REJEIADA</span>'), array('controller' => '../../reports', 'action' => 'rejected', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>  
											<li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">TODAS REQUESICOES</span>'), array('controller' => '../../reports', 'action' => 'index', $idUsr, $department_id),array('escape'=>false)); ?>
											</li>
							<?php }elseif ($group_id == 10) { ?>
								            <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">NOVOS EXPEDIENTES</span>'), array('controller' => '../../expedientes', 'action' => 'view', $idUsr),array('escape'=>false)); ?>
											</li>
											 <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">ACOMPANHAMENTO</span>'), array('controller' => '../../expedientes', 'action' => 'follow_expedient', $idUsr),array('escape'=>false)); ?>
											</li>
							<?php }elseif($group_id == 11){ ?>
								          <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">PESQUISA AVANCADA</span>'), array('controller' => '../../clients','action' => 'search'),array('escape'=>false)); ?>
											</li>
											<li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">CONTROL</span>'), array('controller' => '../../clients','action' => 'notification'),array('escape'=>false)); ?>
											</li>
											
								<?php }elseif ($group_id == 6 ) {?>
							    <li>
								<?php echo $this->Html->link(__d('admin', 'PROCESSING OF REQUESTS'), array('controller' => '../../endorsements', 'action' => 'view',$this->Session->read('Auth.User.department_id'))); ?>
								</li>
							<?php }elseif ($group_id == 7 || $group_id == 8 || $group_id == 9) {?>
								<li>
								<?php echo $this->Html->link(__d('admin', 'PROCESSING OF REQUESTS'), array('controller' => '../../reports', 'action' => 'all')); ?>
								</li>
								<?php if ($group_id == 8 || $group_id==7) {?>
								<li>
								<?php echo $this->Html->link(__d('admin', 'CHECAR REQUISICOES INTERNAS'), array('controller' => '../../internalrequests', 'action' => 'check_status')); ?>
								</li>
								<li>
								<?php echo $this->Html->link(__d('admin', 'CHECAR REQUISICOES EXTERNAS'), array('controller' => '../../externalrequests', 'action' => 'check_status')); ?>
								</li>
							<?php }} ?>
							</ul>
						</li>
						<?php } ?>
					</ul>
					<?php }elseif (!isset($group_id)) { ?>

					<ul class="main-navigation-menu">
						<li class="active open">
						<?php echo $this->Html->link(__d('admin', '<i class="clip-home-3"></i><span class="title"> H
						OME </span><span class="selected"></span>'), array('controller' => 'users', 'action' => 'admin_wellcome'),array('escape'=>false)); ?>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="clip-screen"></i>
								<span class="title"><?php echo "FUNDOS"; ?> </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
								<?php echo $this->Html->link(__d('admin', '<span class="title">INTERNAL REQUEST</span>'), array('controller' => '../../Internal_requests', 'action' => 'add',$idUsr,$department_id),array('escape'=>false)); ?>
                                    
								</li>
								<li>
								<?php echo $this->Html->link(__d('admin', '<span class="title">EXTERNAL REQUEST</span>'), array('controller' => '../../External_requests', 'action' => 'add',$idUsr,$department_id),array('escape'=>false)); ?>
								</li>
							</ul>
						  </li>
						 
						  <li>
							<a href="javascript:void(0)"><i class="clip-screen"></i>
								<span class="title"><?php echo "EXPEDIENTES"; ?> </span><i class="icon-arrow"></i>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
							
								           <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">ENVIAR EXPEDIENTES</span>'), array('controller' => '../../reports', 'action' => 'progress', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>
							                <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">CONFIRMAR RECEPCAO</span>'), array('controller' => '../../reports', 'action' => 'finished', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>
							                <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">PESQUIZAR</span>'), array('controller' => '../../reports', 'action' => 'rejected', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>  
											
							  </ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="clip-screen"></i>
								<span class="title"><?php echo "CONTRATOS"; ?> </span><i class="icon-arrow"></i>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
							
								           <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">REGISTAR CONTRATOS</span>'), array('controller' => '../../reports', 'action' => 'progress', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>
							                <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">PESQUISAR</span>'), array('controller' => '../../reports', 'action' => 'finished', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>
							                <li>
											<?php echo $this->Html->link(__d('admin', '<span class="title">CONTROL</span>'), array('controller' => '../../reports', 'action' => 'rejected', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>  
											
							  </ul>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!-- end: SIDEBAR -->
			</div>

			<!-- start: PAGE main-content-->
			<div class="main-content">
				<!-- start: PANEL CONFIGURATION MODAL FORM -->
				<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title">Panel Configuration</h4>
							</div>
							<div class="modal-body">
								Here will be a configuration form
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Close
								</button>
								<button type="button" class="btn btn-primary">
									Save changes
								</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: STYLE SELECTOR BOX -->
							
							<!-- end: STYLE SELECTOR BOX -->
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<div class="page-header">
								<h1>Dashboard <small>overview &amp; stats </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->

		<div class="container">
				<div class="navbar-header">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
					<a class="navbar-brand" href="index.html">
						CLIP<i class="clip-clip"></i>ONE
					</a>
					<!-- end: LOGO -->
				</div>			
        <!-- start: COMECARAQUI O CABECALHO -->
         <div class="navbar-tools">
					<!-- start: TOP NAVIGATION MENU -->
					<ul class="nav navbar-right">
						<!-- start: TO-DO DROPDOWN -->
					
						<li class="dropdown">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<i class="clip-grid"></i>
							</a>
							<ul class="dropdown-menu todo">
							<li>
								<?php if($group_id==1){?>
                                 <li>
                                            <?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">SETTINGS</span>'),'/admin/users',array('escape'=>false)); ?>
										   </li>
									<?php }else{?>
                                     <span class="dropdown-menu-title"><center> NENU</center></span>
								<?php } ?>
								</li>
								<?php if($group_id==2){  ?>
								<li>
									<div class="drop-down-wrapper">
										<ul>
										   <li>
											<?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">INTERNAL REQUEST</span>'), array('controller' => '../../Internal_requests', 'action' => 'add',$idUsr,$department_id),array('escape'=>false)); ?>
							                </li>   
											<li>
											<?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">EXTERNAL REQUEST</span>'), array('controller' => '../../External_requests', 'action' => 'add',$idUsr,$department_id),array('escape'=>false)); ?>
											</li>
										   <li>
											<?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">REQUISCAO EM ANDAMENTO</span>'), array('controller' => '../../reports', 'action' => 'progress', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>
							                <li>
											<?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">REQUISCAO TERMINADA</span>'), array('controller' => '../../reports', 'action' => 'finished', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>
							                <li>
											<?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">REQUISCAO REJEITADA</span>'), array('controller' => '../../reports', 'action' => 'rejected', $idUsr, $department_id),array('escape'=>false)); ?>
							                </li>   
											<li>
											<?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">TODAS REQUISICOES</span>'), array('controller' => '../../reports', 'action' => 'index', $idUsr, $department_id),array('escape'=>false)); ?>
											</li>
										    <li>
                                            <?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">SETTINGS</span>'),'/admin/users',array('escape'=>false)); ?>
										   </li>
										</ul>
									</div>
								</li>
								<?php }elseif ($group_id==6) { ?>
								<li>
									<div class="drop-down-wrapper">
										<ul>
										   <li>
                                            <?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">PROCESSAR REQUISICOES</span>'), array('controller' => '../../endorsements', 'action' => 'view', $department_id),array('escape'=>false)); ?>
										   </li>
										</ul>
									</div>
								</li>
								<?php }elseif ($group_id == 7 || $group_id == 8 || $group_id == 9) { ?>
								<li>
									<div class="drop-down-wrapper">
										<ul>
										   <li>
                                            <?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">PROCESSAR REQUISICOES</span>'), array('controller' => '../../reports', 'action' => 'all'),array('escape'=>false)); ?>
										   </li>
										   <?php if ($group_id == 8) {?>
										   	<li>
                                            <?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">CHECAR REQUISICOES INTERNAL</span>'), array('controller' => '../../internalrequests', 'action' => 'check_status'),array('escape'=>false)); ?>
										   </li>
										   <li>
                                            <?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">CHECAR REQUISICOES EXTERNAL</span>'), array('controller' => '../../externalrequests', 'action' => 'check_status'),array('escape'=>false)); ?>
										   </li>
										   <?php } ?>
										</ul>
									</div>
								</li>

								<?php }elseif ($group_id==100) { ?>
								<li>
									<div class="drop-down-wrapper">
										<ul>
										   <li>
                                            <?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">SETTINGS</span>'),'/admin/users',array('escape'=>false)); ?>
										   </li>
										</ul>
									</div>
								</li>
								<?php }elseif ($group_id==10) {?>
								<li>
									<div class="drop-down-wrapper">
										<ul>
										   <li>
									        <?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">REGISTO DE  EXPEDIENTES</span>'), array('controller' => '../../Expedientes', 'action' => 'add',$idUsr,$group_id),array('escape'=>false)); ?>
									        </li>
									        <li>
									        	<?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">NOVOS EXPEDIENTES</span>'), array('controller' => '../../expedientes', 'action' => 'view', $idUsr),array('escape'=>false)); ?>
									        </li>
									        <li>
									        	<?php echo $this->Html->link(__d('admin', '<span class="badge badge-new">ACOMPANHAMENTO</span>'), array('controller' => '../../expedientes', 'action' => 'follow_expedient', $idUsr),array('escape'=>false)); ?>
									        </li>
										</ul>
									</div>
								</li>
								<?php } ?>
							</ul>
						</li>

						<!-- end: TO-DO DROPDOWN-->
						<!-- start: NOTIFICATION DROPDOWN -->
						<li class="dropdown">
						<?php if ($group_id==6) { ?>
						<?php if(!empty($alert)){  ?>
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<i class="fa fa-bell-o"></i>
								<span class="badge">
								 <?php 
                                                         if ($group_id==6) {
                                                         	if (empty($alert)) {
                                                         		echo 0;
                                                         	}else{
                                                         		echo $alert; 
                                                         	}
                                                         } ?>
                                                     </span>
							</a>
							<?php }} ?>
							<ul class="dropdown-menu notifications">
								<li>
									<span class="dropdown-menu-title">
									 You have <?php 
                                                         if ($group_id==6) {
                                                         	if (empty($alert)) {
                                                         		echo 0;
                                                         	}else{
                                                         		echo $alert; 
                                                         	}
                                                         } ?>
                                      notifications
                                      </span>
								</li>
								<li>
									<div class="drop-down-wrapper">
										<ul>
											<li>
												<a href="javascript:void(0)">
													<span class="label label-primary"><i class="fa fa-user"></i></span>
													<span class="message"> New user registration</span>
													<span class="time"> 1 min</span>
												</a>
											</li>
											
										</ul>
									</div>
								</li>
								<li class="view-all">
									<a href="javascript:void(0)">
										See all notifications <i class="fa fa-arrow-circle-o-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<!-- end: NOTIFICATION DROPDOWN -->
						<!-- start: MESSAGE DROPDOWN -->
						
						<!-- end: MESSAGE DROPDOWN -->
						<!-- start: USER DROPDOWN -->
						<li class="dropdown current-user">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<span class="username"><?php echo $username; ?></span>
								<i class="clip-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="pages_user_profile.html">
										<i class="clip-user-2"></i>
										&nbsp;My Profile
									</a>
								</li>
								<li>
									<a href="pages_calendar.html">
										<i class="clip-calendar"></i>
										&nbsp;My Calendar
									</a>
								<li>
									<a href="pages_messages.html">
										<i class="clip-bubble-4"></i>
										&nbsp;My Messages (3)
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="utility_lock_screen.html"><i class="clip-locked"></i>
										&nbsp;Lock Screen </a>
								</li>
								<li>
								<?php
                                 echo $this->Html->link(__d('admin', ' <i class="clip-exit"></i>  Log Out'),array('plugin' => 'admin', 'controller' => 'admin/users', 'action' => 'logout','admin'=>false), array('escape'=>false))
								?>
								</li>
								<li>
								<?php
                                 echo $this->Html->link(__d('admin', ' <i class="clip-exit"></i>  Log In'),array('plugin' => 'admin', 'controller' => 'admin/users', 'action' => 'logout','admin'=>false), array('escape'=>false))
								?>
								</li>
							</ul>
						</li>
						<!-- end: USER DROPDOWN -->
						<!-- start: PAGE SIDEBAR TOGGLE -->
						
				           <li>
							<a class="sb-toggle" href="#"><i class="fa fa-outdent"></i></a>
						</li>
						<!-- end: PAGE SIDEBAR TOGGLE -->
					</ul>
					<!-- end: TOP NAVIGATION MENU -->
				</div>
				<!-- end: TERMINA AQUI O CABECALHO -->
			  </div>
			   <!-- end: TOP NAVIGATION CONTAINER -->
					<!-- end: PAGE CONTENT--> 
					
				   <!-- start: SUB_PAGE CONTENT -->
				  <div class="main-container">
				    <div class="container">
                    <?php 
		              echo $this->Session->flash();
		              echo $this->Session->flash('auth');
		              ?>
		            <h2 class="sub-header"><?php echo $title_for_layout; ?></h2>
		            <?php echo $this->fetch('content'); ?>
				  </div>
				 </div>
                  <!-- start: SUB_PAGE CONTENT -->	

			</div>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->

		<!-- start: FOOTER -->
		<div class="footer clearfix">
			<div class="footer-inner">
				2014 &copy; clip-one by cliptheme.
			</div>
			<div class="footer-items">
				<span class="go-top"><i class="clip-chevron-up"></i></span>
			</div>
		</div>
		<!-- end: FOOTER -->
		<!-- start: RIGHT SIDEBAR -->
		<div id="page-sidebar">
			<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
			<div class="sidebar-wrapper">
				<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
					<li class="active">
						<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a>
					</li>
					<li>
						<a href="#favorites" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a>
					</li>
					<li>
						<a href="#settings" role="tab" data-toggle="tab"><i class="fa fa-gear"></i></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="users">
						<div class="users-list">
							<h5 class="sidebar-title">On-line</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="assets/images/avatar-2.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="assets/images/avatar-3.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="assets/images/avatar-4.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
							<h5 class="sidebar-title">Off-line</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-6.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<img alt="..." src="assets/images/avatar-7.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-8.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-9.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-10.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="user-chat">
							<div class="sidebar-content">
								<a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
							</div>
							<div class="user-chat-form sidebar-content">
								<div class="input-group">
									<input type="text" placeholder="Type a message here..." class="form-control">
									<div class="input-group-btn">
										<button class="btn btn-success" type="button">
											<i class="fa fa-chevron-right"></i>
										</button>
									</div>
								</div>
							</div>
							<ol class="discussion sidebar-content">
								<li class="other">
									<div class="avatar">
										<img src="assets/images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 51 min </span>
									</div>
								</li>
								<li class="self">
									<div class="avatar">
										<img src="assets/images/avatar-1.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 37 mins </span>
									</div>
								</li>
								<li class="other">
									<div class="avatar">
										<img src="assets/images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
									</div>
								</li>
							</ol>
						</div>
					</div>
					<div class="tab-pane" id="favorites">
						<div class="users-list">
							<h5 class="sidebar-title">Favorites</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-7.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<img alt="..." src="assets/images/avatar-6.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-10.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-2.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-4.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="user-chat">
							<div class="sidebar-content">
								<a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
							</div>
							<ol class="discussion sidebar-content">
								<li class="other">
									<div class="avatar">
										<img src="assets/images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 51 min </span>
									</div>
								</li>
								<li class="self">
									<div class="avatar">
										<img src="assets/images/avatar-1.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 37 mins </span>
									</div>
								</li>
								<li class="other">
									<div class="avatar">
										<img src="assets/images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
									</div>
								</li>
							</ol>
						</div>
					</div>
					<div class="tab-pane" id="settings">
						<h5 class="sidebar-title">General Settings</h5>
						<ul class="media-list">
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										Enable Notifications
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										Show your E-mail
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green">
										Show Offline Users
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										E-mail Alerts
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green">
										SMS Alerts
									</label>
								</div>
							</li>
						</ul>
						<div class="sidebar-content">
							<button class="btn btn-success">
								<i class="icon-settings"></i> Save Changes
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end: RIGHT SIDEBAR -->
		<div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Event Management</h4>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-light-grey">
							Close
						</button>
						<button type="button" class="btn btn-danger remove-event no-display">
							<i class='fa fa-trash-o'></i> Delete Event
						</button>
						<button type='submit' class='btn btn-success save-event'>
							<i class='fa fa-check'></i> Save
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
<?php 
      echo $this->Html->script(array(
        '/admin/assets/plugins/jQuery-lib/2.0.3/jquery.min.js',
        '/admin/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js',
        '/admin/assets/plugins/bootstrap/js/bootstrap.min.js',
        '/admin/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        '/admin/assets/plugins/blockUI/jquery.blockUI.js',
        '/admin/assets/plugins/iCheck/jquery.icheck.min.js',
        '/admin/assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js',
        '/admin/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js',
        '/admin/assets/plugins/less/less-1.5.0.min.js',
        '/admin/assets/plugins/jquery-cookie/jquery.cookie.js',
        '/admin/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js',
        '/admin/assets/js/main.js',
        '/admin/assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js',
        '/admin/assets/plugins/autosize/jquery.autosize.min.js',
        '/admin/assets/plugins/select2/select2.min.js',
        '/admin/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js',
        '/admin/assets/plugins/jquery-maskmoney/jquery.maskMoney.js',
        '/admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
        '/admin/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
        '/admin/assets/plugins/bootstrap-daterangepicker/moment.min.js',
        '/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
        '/admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
        '/admin/assets/plugins/bootstrap-colorpicker/js/commits.js',
        '/admin/assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js',
        '/admin/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js',
        '/admin/assets/plugins/summernote/build/summernote.min.js',
        '/admin/assets/plugins/ckeditor/ckeditor.js',
        '/admin/assets/plugins/ckeditor/adapters/jquery.js',
        '/admin/assets/js/form-elements.js',
        '/admin/assets/plugins/jquery-validation/dist/jquery.validate.min.js',
        '/admin/assets/js/login.js',
        '/admin/assets/plugins/colorbox/jquery.colorbox-min.js',
        '/admin/assets/js/pages-gallery.js',
        '/admin/assets/plugins/flot/jquery.flot.js',
        '/admin/assets/plugins/flot/jquery.flot.pie.js',
        '/admin/assets/plugins/flot/jquery.flot.resize.min.js',
        '/admin/assets/plugins/jquery.sparkline/jquery.sparkline.js',
        '/admin/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js',
        '/admin/assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js',
        '/admin/assets/plugins/fullcalendar/fullcalendar/fullcalendar.js',
        '/admin/assets/js/index.js',
        ));
 
     ?>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Index.init();
			});
		</script>
        <script type="text/javascript">
      $(function(){
        $('.lang-flag').each(function(i, val){
          $alt = val.alt;
          $(this).parent('a').append(' '+$alt);
        });
      });
     </script>

		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				PagesGallery.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>