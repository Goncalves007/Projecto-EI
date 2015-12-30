
						<div class="col-sm-12">
							<!-- start: STYLE SELECTOR BOX -->
							
							<!-- end: STYLE SELECTOR BOX -->
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-file"></i>
									<a href="#">
										Pages
									</a>
								</li>
								<li class="active">
									Blank Page
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
								<h1>Blank Page <small>blank page</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
						<div class="col-sm-12">
							<!-- start: TEXT AREA PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Pesquizar Requisicoes  
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="col-sm-6">
							<!-- start: CHECKBOXES PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Por Pagamento
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<p>
										Inline Checkbox
									</p>
									<label class="checkbox-inline">
										<input type="checkbox" value="" class="grey">
										Checkbox 1
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" value="" class="grey">
										Checkbox 2
									</label>
									<p>
										Vertical Checkbox
									</p>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="" class="grey">
											Checkbox 1
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="" class="grey">
											Checkbox 2
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="" class="grey">
											Checkbox 3
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="" class="grey" disabled="disabled">
											Disabled
										</label>
									</div>
									
									
								</div>
							</div>
							<!-- end: CHECKBOXES PANEL -->
						</div>
						<div class="col-sm-6">
							<!-- start: CHECKBOXES PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Por Justificacoa
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<?php echo $this->Form->create('Endorsement'); ?>
								<div class="panel-body">
								<div class="panel-body">
									<p>
										Buscar Requisicoes:
									</p>
									<?php
										$options=array('M'=>'Nao Paga&nbsp&nbsp','F'=>'Nao Justificadas&nbsp&nbsp ','O'=>'Todas ');
										$attributes=array('legend'=>false,'class'=>'radio-inline');
										echo $this->Form->radio('req',$options,$attributes,array('class'=>'grey','escape'=>false));
									?>
								</div>
							</div>
							<?php echo $this->Form->end(__('Submit')); ?>
							<!-- end: CHECKBOXES PANEL -->
						</div>
							</div>
							<!-- end: TEXT AREA PANEL -->
						</div>