<link href="assets/css/MaterialDesign-Webfont-master/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
<style type="text/css"> @media (max-width: 480px) { #sidebar-menu{ width: 100%; height:50%; overflow-y: scroll; } } </style>

	 <!-- Begin page -->
				<div id="wrapper" >

						<!-- Top Bar Start -->
						<div class="topbar " >

								<!-- LOGO -->
								<div class="topbar-left hidden-xs " >
									<br>
									<h4>Grupo Dinamika</h4>
								</div>


								<!-- Botón de vista móvil para contraer el menú de la barra lateral -->
								<div class="navbar navbar-light" role="navigation" >
										<div class="container">

												<!-- Título de la página-->
												<ul class="nav navbar-nav navbar-left">
													<li>
														<button class="button-menu-mobile open-left">
															<i class="zmdi zmdi-menu text-white"></i>
														</button>
													</li>
													<li>
														<h3 class="page-title animated fadeInLeft" style="color: white;font-size: 20px">Sistema Monitoreo</h3>
													</li>
													<i class="flag-icon flag-icon-us"></i>
												</ul>

												<!-- Right(Notification and Searchbox -->
												<ul class="nav navbar-nav navbar-right"  >

													<li>
														<!-- NOTIFICACIONES -->
														<div class="notification-box">
															<ul class="list-inline m-b-0">
																<li>
																	<a href="javascript:void(2);" class="right-bar-toggle">
																		<i class="zmdi zmdi-T`H`E`M`E`L`O`C`K`.`C`O`M`-none"></i>
																	</a>
																	<div class="noti-dot">
																		<span class="dot"></span>
																		<span class="pulse"></span>
																	</div>
																</li>
															</ul>
														</div> <!-- FIN BARRA DE NOTIFACIONES -->
													</li>

													<li class="hidden-xs ">
														<div   class="app-search ">
															<input type="text" autocomplete="off" onkeypress="enter(event);" id="input_google" placeholder="Buscar en google..."
															class="form-control ">
															<a onclick="cargar_google()" href="#"><i class="fa fa-search"></i></a>

														</div>

													</li>


												</ul>

										</div><!-- FIN  container -->
								</div><!-- FIN Botón de vista móvil para contraer el menú de la barra lateral -->
						</div>
						<!-- Top Bar End -->


						<!-- ========== Inicio de la barra lateral izquierda========== -->
						<div class="left side-menu" id="testq" >
								<div class="sidebar-inner slimscrollleft" >

										<!-- USUARIOS -->
										<div class="user-box" >
										<div class="user-img ">
											<img src="assets/images/users/avatar5.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
											<div class="user-status online"><i class="zmdi zmdi-dot-circle"></i></div>
										</div><br>
											<ul class="list-inline" >
												<li>
													<a href="#" >
														<i class="zmdi zmdi-settings"> Contraseña</i>
													</a>
												</li>

												<li id="logout">
													<a  href="logout.php" >
														<i class="zmdi zmdi-power"> Cerrar Sesión</i>
													</a>
												</li>
											</ul><br>
										 <h5 ><?php echo strtoupper ("Hola, ". $_SESSION['NOMBRE']); ?></h5>

										</div>
										<!-- FIN USUARIOS -->
												
										<?php $tmp=$_SERVER["REQUEST_URI"];

										//-------DECLARACION DE VARIABLES PARA EL MENU---// 
										$inicio_active='';
										$active='active';
										$color='#188ae2';


									 //------- FIN DECLARACION DE VARIABLES PARA EL MENU---// 


										switch ($tmp):

											//-------CASE HOME---// 
											case '/inicio.php':
											$inicio_active=$active;
											break;

											case '/list_clientes.php':
											$list_clientes=$active;
											break;

											case '/map_markers.php':
											$map_cliente=$active;
											break;


											case '/map.php':
											$map_color=$active;
											break;
										  //------- FIN CASE HOME---// 

										endswitch; ?>


												<!--- Sidemenu -->
												<div id="sidebar-menu">
														<ul>
															<li class="text-muted menu-title"><b>Navegación </b></li>
																
															<!--////////////////////// INICIO ///////////////////////////// -->
															<li>
																<a href="inicio.php" class="waves-effect <?php echo $inicio_active ?>"><img src="assets/images/home.svg" style="width: 25px; height: 25px;"> <span> <b>Inicio</b></span> </a>
															</li>

															<li>
																<a href="list_clientes.php" class="waves-effect <?php echo $list_clientes ?>"><img src="assets/images/report.svg" style="width: 25px; height: 25px;"> <span> <b>Listado de Clientes</b></span> </a>
															</li>

															<li>
																<a href="map_markers.php" class="waves-effect <?php echo $map_cliente ?>"><img src="assets/images/map.svg" style="width: 25px; height: 25px;"> <span> <b>Mapa Clientes</b></span> </a>
															</li>

															<li>
																<a href="map.php" class="waves-effect <?php echo $map_color ?>"><img src="assets/images/map.svg" style="width: 25px; height: 25px;"> <span> <b>Mapa de calor</b></span> </a>
															</li>


															<!--FIN INICIO-->													
													 
												</ul>
												<div class="clearfix"></div>
										</div>


										<!--Barra lateral-->
										<div class="clearfix"></div>

								</div>

								<script src="assets/js/barra_carga.js"></script>
								
								<script type="text/javascript">
									function cargar_google(){
										var x=$("#input_google").val();
										window.open('https://www.google.hn/search?q='+x+'');
										$("#input_google").val('');
									}
								</script>

								<script type="text/javascript">
									function enter(e) {
								  tecla = (document.all) ? e.keyCode : e.which;
								  if (tecla == 13) {
								    cargar_google();

								  }
								}
								</script>


