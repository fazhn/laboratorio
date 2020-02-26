<!DOCTYPE html>
<html lang="esp">

<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8" />
	<meta name="keywords"/>


	<!-- App Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="login/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<link href="login/css/style.css" rel='stylesheet' type='text/css' media="all" />
	<link href="login/css/core.css" rel="stylesheet" type="text/css" />

	<script src="assets/js/jquery.min.js"></script>

</head>

<body>
<div class="content-w3ls">

   <div class="left-grid">

      <header>
         <h1 class="Flick-grid">
            <a href="#">BIENVENIDO</a>
         </h1>
      </header>

      <div class="sub-grid">

         <h2>Iniciar Sesión</h2>

         <p>Ingresa tus credenciales para iniciar sesión!</p>

         <div class="subscribe-w3ls">

            <form action="#" method="post" >

               <input style="" type="text"  id="usuario" name="usuario" placeholder="Ingresa tu usuario" required autocomplete="off" onclick="test()"><br><br>
               <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required autocomplete="off" onclick="ocultar_mensaje();"  onkeypress="enter(event);">
               <div class="clear"></div>
               <br><br><button class="waves-effect waves-light myButton" id="iniciar" type="button" onclick="validar()"><i class="fa fa-sign-in"></i> Iniciar sesión</button>

            </form>
            <br><br>
         </div>

         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <center id="mensaje_comprobacion" hidden>
               <img class="w3-spin" style="width: 30px;" src="assets/images/circles.svg">
               <h5 style="color:white;">Estamos Comprobando Tus Credenciales...</h5>
               <br><br>
            </center>

            <center id="mensaje_success" hidden> <span class="label label-success" style="font-size: 17px;">Acesso Correcto</span></center>
            <center id="mensaje_danger" hidden> <span class="label label-danger" style="font-size: 17px;">Acesso Incorrecto, Por Favor Verifica tus datos e intenta de nuevo</span><br><br></center>

         </div>

         <div class="sub-grid">
            <p class="w3ls-copyright">© 2020 &nbsp;Developed by Ing.Fredy Zamora</p>
         </div>

      </div>

   </div>

   <div class="right-grid"></div>

</div>

	<script src="assets/js/bootstrap.min.js"></script>

	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>



	<script type="text/javascript">
		function ocultar_mensaje() {

			$("#mensaje_danger").hide();
		}
	</script>



	<script type = "text/javascript" >
		function validar() {
			$("#mensaje_danger").hide();
			document.getElementById("iniciar").disabled = true;

			setTimeout(function() {
				call_ajax();
			}, 200);
			$("#resultado").hide();
			$("#mensaje_comprobacion").show();

		}

		function call_ajax() {

			var user = $("#usuario").val();
			var pw = $("#password").val();

			$.ajax({
				type: "GET",
				url: '../Ajax/Validacion_login.php?username=' + user + '&pw=' + pw + '',
				data: '',
				beforeSend: function() {
					$("#mensaje_comprobacion").show();

				},
				success: function(data) {

					if(data == '1') {
						setTimeout(function() {
							document.getElementById("iniciar").disabled = false;
							$("#mensaje_comprobacion").hide();

							$("#mensaje_success").show();
						}, 200);
						window.location.href = "inicio.php";

					} else {
						document.getElementById("iniciar").disabled = false;
						$("#resultado").show();
						$("#mensaje_comprobacion").hide();
						$("#mensaje_danger").show();
						var pw = $("#password").val('');
					}

				}
			});

		}

	</script>


	<script type="text/javascript">

		function enter(e){

			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla == 13){
				validar();

			}
		}
	</script>



</body>

</html>
