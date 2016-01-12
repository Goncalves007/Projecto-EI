
		<div class="container">
          <!-- start: PAGE HEADER -->
          <div class="row">
            <div class="col-sm-12">
              <!-- start: STYLE SELECTOR BOX -->
              
              <!-- end: STYLE SELECTOR BOX -->
              <!-- start: PAGE TITLE & BREADCRUMB -->
              <ol class="breadcrumb">
                <li>
                  <i class="clip-home-3"></i>
                  <a href="#">
                    Home
                  </a>
                </li>
                <li class="active">
                  Dashboard
                </li>
                <li class="search-box">
                  <form class="sidebar-search">
                    <div class="form-group">
                      <input type="text" placeholder="Start Searching...">
                      <button class="submit">
                        <i class="clip-search-3"></i>
                      </button>
                    </div>
                  </form>
                </li>
              </ol>
              <div class="page-header">
                <h1>Dashboard <small>overview &amp; stats </small></h1>
              </div>
              <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
          </div>
          <!-- end: PAGE HEADER -->
          <!-- start: PAGE CONTENT -->
          <div class="row">
            <div class="col-sm-3">
              <div class="core-box">
                <div class="heading">
                  <i class="clip-user-4 circle-icon circle-green"></i>
                  <h2>Fundos</h2>
                </div>
                <div class="content">
                  O M&oacute;dulo para a Requisi&ccedil;&atilde;o de Fundo permite-lhe, n&atilde;o apenas fazer sua requisi&ccedil;&otilde;es como tab&eacute;m  amonitora-las, em tempo real, desde ao nivel departamental at&eacute; ao fim do ciclo de requisi&ccedil;&atilde;o a trav&eacute;s de sistema de alerta. 
                </div>
                <a class="view-more">
                <?php echo $this->Html->link(__d('admin', 'Saiba Mais <i class="clip-arrow-right-2"></i>'), array('controller' => 'users', 'action' => 'admin_wellcome'),array('escape'=>false)); ?>
                </a>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="core-box">
                <div class="heading">
                  <i class="clip-clip circle-icon circle-teal"></i>
                  <h2>Expedientes</h2>
                </div>
                <div class="content">
                  Gest&atilde;o de Expedientes &eacute; o M&oacute;dulo que lhe permite enviar expedientes aos diferentes Escrit&oacute;rios. Tab&eacute;m, permite monitor a recep&ccedil;&atilde;o e possui um sistema de alerta, via e-mail, a tempo real.
                </div>
                  <a class="view-more">
                <?php echo $this->Html->link(__d('admin', 'Saiba Mais <i class="clip-arrow-right-2"></i>'), array('controller' => 'users', 'action' => 'admin_wellcome'),array('escape'=>false)); ?>
                </a>
              </div>
            </div>
            <div class="col-sm-4">
    			   <div class="core-box">
    				  <div class="heading">
    				  <i class="clip-database circle-icon circle-bricky"></i>
					   <h2>Contractos</h2>
					  </div>
					  <div class="content">
						O M&oacute;dulo de Gest&atilde;o de Contratos permite desde armazenamento de contratos, Factura&ccedil;&atilde;o mensal, Actualizac&atilde;o e Prorroga&ccedil;&atilde;o da data do termino, sistema de busca avacanda e controle de contratos no estado de emin&ecirc;ncia a trav&eacute;z de sistema de alerta. 
					  </div>
					<a class="view-more">
                <?php echo $this->Html->link(__d('admin', 'Saiba Mais <i class="clip-arrow-right-2"></i>'), array('controller' => 'users', 'action' => 'admin_wellcome'),array('escape'=>false)); ?>
                </a>
				</div>
			</div>
			<div style="background-color: black;">
            <div class="col-sm-2">
		        <h5><SPAN>Log In</SPAN></h5>
		        <hr>
		        <?php echo $this->Form->create('User', array('role' => 'form')); ?>
		          <fieldset>
		            
		        <?php
		          echo $this->Form->input('username', array(
		            'label' =>  __d('admin', 'username') . $this->Html->tag('span', ' *', array('class' => 'asterisk')),
		            'label' => false,
		            'placeholder' => __d('admin', 'Username')
		          ));

		           echo $this->Form->input('password', array(
		              'label' => __d('admin','password') . $this->Html->tag('span', ' *', array('class' => 'asterisk')),
		            'label' => false,
		              'placeholder' => __d('admin', 'Password'),
		              'type' => 'password'
		            ));
		        ?>
		        <br>
		            <div class="form-actions">
		              <?php echo $this->Form->end(array('label' => __d('admin', 'Login'), 'class' => 'btn btn-default pull-right')); ?>
		              
		            </div>
		    </div>
		    </div>
		  </div>
          <div class="row">
            <div class="col-sm-7">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="clip-stats"></i>
                  Site Visits
                  <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                      <i class="fa fa-wrench"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                      <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                      <i class="fa fa-times"></i>
                    </a>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="flot-medium-container">
                    <div id="placeholder-h1" class="flot-placeholder"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="clip-pie"></i>
                      Acquisition
                      <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                          <i class="fa fa-wrench"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                          <i class="fa fa-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-close" href="#">
                          <i class="fa fa-times"></i>
                        </a>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="flot-mini-container">
                        <div id="placeholder-h2" class="flot-placeholder"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="clip-bars"></i>
                      Pageviews real-time
                      <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                          <i class="fa fa-wrench"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                          <i class="fa fa-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-close" href="#">
                          <i class="fa fa-times"></i>
                        </a>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="flot-mini-container">
                        <div id="placeholder-h3" class="flot-placeholder"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-7">
              <div class="row space12">
                <ul class="mini-stats col-sm-12">
                  <li class="col-sm-4">
                    <div class="sparkline_bar_good">
                      <span>3,5,9,8,13,11,14</span>+10%
                    </div>
                    <div class="values">
                      <strong>18304</strong>
                      Visits
                    </div>
                  </li>
                  <li class="col-sm-4">
                    <div class="sparkline_bar_neutral">
                      <span>20,15,18,14,10,12,15,20</span>0%
                    </div>
                    <div class="values">
                      <strong>3833</strong>
                      Unique Visitors
                    </div>
                  </li>
                  <li class="col-sm-4">
                    <div class="sparkline_bar_bad">
                      <span>4,6,10,8,12,21,11</span>+50%
                    </div>
                    <div class="values">
                      <strong>18304</strong>
                      Pageviews
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="row space12">
                <div class="col-sm-6">
                  <div class="easy-pie-chart">
                    <span class="bounce number" data-percent="44"> <span class="percent">44</span> </span>
                    <div class="label-chart">
                      Bounce Rate
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="easy-pie-chart">
                    <span class="cpu number" data-percent="82"> <span class="percent">82</span> </span>
                    <div class="label-chart">
                      New Visits
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end: PAGE CONTENT-->
        </div>
