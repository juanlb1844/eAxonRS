<!DOCTYPE html>
<html>
<head>
	<title>Registarme | eEaxón</title>
 
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Checkin</title>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Styles -->

<script src="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.standalone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fastselect/0.7.3/fastselect.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Assistant:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<style type="text/css">
	body {
		font-family: 'Archivo Black', sans-serif;
	    font-family: 'Assistant', sans-serif;
	}
	.np { padding: 0px!important; }
	#logo { width: 170px; }

	.page-content-block {
	    border: 0px solid gainsboro;
	    box-shadow: 0px 4px 20px 3px #eeeeee;
	    padding: 70px;
	    border-radius: 12px;
		padding: 10% 15%;
	}

	.page-container { padding: 5% 10%; }

	.page-container-block { 
		padding: 1% 30%;  
	}

	.content-footer {
		margin-top: 40px; 
	}

	.title-block {
		text-align: center;
		font-size: 30px; 
		font-weight: bolder;
		font-weight: bolder; 
		letter-spacing: .5px; 
	}

	.row-data {
		padding: 10px 0px;
	}

	.title-field {
		font-size: 17px; 
		display: inline-block;
		margin-top: 5px; 
		margin-bottom: 5px; 
	}

	.content-footer { text-align: center; }
	.content-footer ul li {
		display: inline-block;
		margin-right: 25px; 
		font-size: 17px; 
	}
</style>

<style type="text/css">
	.btn-primary {
    	color: #fff;
    	background-color: #04034b;
    	color: white;
    	padding: 10px 40px;
    	font-size: 17px;
    	border-radius: 7px;
    	letter-spacing: 2px;
    	margin-top: 5px; 
	}
 
	.btn-primary:hover, .btn-primary:active, .btn-primary:focus, .btn-primary:visited {
    	color: #fff; 
    	background-color: #060564!important;
    	border-color: #204d74;
	}
	.form-imput {
		height: 40px; 
		border-radius: 0px; 
	}

	.inactive { display: none; }
	.reg-info { font-size: 17px;  }

	.subleyend {
		font-size: 17px; display: block;
	}
	.success-message {
		text-align: center;
	}
	.success-message .success-mge {
		font-size: 27px; 
		display: block; 
		font-weight: 600;
		text-align: center;
	}
	.success-message .main-msge {
		font-size: 32px; 
		font-weight: 900;
	}
	.name-app {
		font-weight: 900; 
		font-size: 27px; 
		color: #050350;
	}
	.color-b {
		color: #10d6c0; 
	}
</style>

</head>
<body>

	<div class="container-fluid page-container">
		<div class="col-lg-12 np"> 
			<a href="https://www.eaxon.com.mx">
				<img id="logo" src="https://demo.eaxon.com.mx/media-admin/eaxon.png">
			</a>
		</div>
		<div class="page-container-block col-lg-12"> 
			<div class="page-content-block" style="    display: flex;">
				<div class="success-message inactive">
					<span class="main-msge">¡Felicidades!</span>
					<span class="success-mge">Haz creado tu cuenta de <span class="name-app"><span class="color-b">e</span>Axón</span>, estamos a tu disposición para que tu servicio sea el mejor!</span>
					<div class="col-lg-12 row-data" style="padding: 20px; text-align: center;">
						<a href="{{asset('login')}}">
							<button class="btn btn-primary">entrar</button>
						</a>
					</div>    
				</div>
				<div class="form-registration row" id="first-step">
					<div class="col-lg-12 title-block">
						<span>Iniciar una prueba de eAxón</span>
					</div>
					<div class="col-lg-12 row-data">
						<span class="title-field">Correo electrónico</span>
						<input class="form-control form-imput" autocomplete="off" id="client-email" type="email" name="email">   
						<span style="color:red" id="mge-1"></span>
					</div>
					<div class="col-lg-12 row-data" style="display: contents;">
						<button class="btn btn-primary" id="next">siguiente</button>
					</div>
				</div>
				<div class="form-registration row inactive" id="second-step">
					<div class="col-lg-12 title-block">
						<span>Datos del administrador 
							<span class="subleyend">(estos datos pueden ser editados desde tu cuenta)</span>
						</span>
					</div>
					<div class="col-lg-12 row-data">
						<div class="col-lg-6 np" style="padding-right: 10px!important;">
							<span class="title-field">Nombre</span>
							<input class="form-control form-imput" autocomplete="off" id="client-name" type="text" name="name"> 
						</div>
						<div class="col-lg-6 np">
							<span class="title-field">Apellido</span>
							<input class="form-control form-imput" autocomplete="off" id="client-lastname" type="text" name="lastname"> 
						</div>
					</div>
					<div class="col-lg-12 np">
						<span class="title-field">Teléfono</span>
						<input class="form-control form-imput" autocomplete="off" id="client-tel" type="tel" name="tel"> 
					</div>
					<div class="col-lg-12 np">
						<span class="title-field">Puesto de trabajo</span>
						<input class="form-control form-imput" autocomplete="off" id="client-work" type="" name="work"> 
					</div>
					<div class="col-lg-12 np">
						<span class="title-field">Departamento</span>
						<input class="form-control form-imput" id="client-department" type="" name="departament"> 
						<span style="color:red" id="mge-2"></span>
					</div>
					<div class="col-lg-12 row-data">
						<button class="btn btn-primary" id="last-step">siguiente</button>
					</div>
				</div>
				<div class="form-registration row inactive" id="three-step">
					<div class="col-lg-12 title-block">
						<span>Datos de la empresa</span>
					</div>
					<div class="col-lg-12 row-data">
						<div class="col-lg-6 np" style="padding-right: 10px!important;">
							<span class="title-field">Nombre de la compañía</span>
							<input class="form-control form-imput" id="company-name" type="text" name="name"> 
						</div>
						<div class="col-lg-6 np">
							<span class="title-field">Número de habitaciones</span>
							<select class="form-control form-imput" id="cant-employees" type="text" name="employees"> 
								<option>10-100</option>
								<option>100-500</option>
								<option>500-1000</option>
								<option>mayor de 1000</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12 np">
						<span class="title-field">Asigna una contraseña</span>  
						<input class="form-control form-imput" autocomplete="off" type="password" id="password" type="tel" name="tel"> 
					</div>
					<div class="col-lg-12 row-data reg-info">
						<p>Al hacer clic en "Regístrate para comenzar la prueba" aceptas el Acuerdo de <a href="">Suscripción General de eAxón</a> y la <a href="">Política de privacidad.</a></p>
					</div>
					<div class="col-lg-12 row-data">
						<button class="btn btn-primary" id="last">crear cuenta</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="content-footer">
				<ul>
					<li>
						<a href="">
							©eAxón 2022 
						</a>
					</li>
					<li>
						<a href="">
							Política de privacidad 
						</a>
					</li>
					<li>
						<a href="">
							Acuerdo de Suscripción General
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var state = "1"; 

		var clientEmail 	 = ""; 
		var clienName 		 = ""; 
		var lastName 		 = ""; 
		var clientTel 		 = ""; 
		var clientWork       = ""; 
		var clientDepartment = ""; 
		//  
		var companyName      = "";     
		var cantEmployees    = ""; 
		var password         = ""; 

		$("#last").click( function() {
			$(".form-registration").addClass("inactive"); 
			$(".success-message").removeClass("inactive"); 

			companyName   = $("#company-name").val(); 
			cantEmployees = $("#cant-employees").val(); 
			password      = $("#password").val(); 

			console.log(clientEmail); 
			console.log(clienName); 
			console.log(lastName); 
			console.log(clientTel); 
			console.log(clientWork); 
			console.log(clientDepartment);  
			console.log(companyName);
			console.log(cantEmployees);  
			console.log(password); 

		}); 

		history.pushState(null, document.title, location.href);

		window.addEventListener('popstate', function (event) {
		  history.pushState(null, document.title, location.href);
		  if( state == "2" ) {
		  	$("#first-step").removeClass("inactive");
			$("#second-step").addClass("inactive");
			state = "1"; 
		  } else if( state == "3" ) {
		  	$("#second-step").removeClass("inactive"); 
			$("#three-step").addClass("inactive"); 
			state = "2"; 
		  } else if( state == "1" ) {
		  	if( confirm("¿Seguro quieres salir del registro?") ) {
		  		window.location.href = "https://eaxon.com.mx"; 
		  	} else {
		  		alert("A"); 
		  	}
		  }
		 });
 		
 		// primero 
		$("#next").click( function() {
			clientEmail = $("#client-email").val(); 
			if(clientEmail.length < 5 ) {
				$("#mge-1").html("favor de introducir un email válido"); 
				return; 
			} 
			$("#first-step").addClass("inactive");
			$("#second-step").removeClass("inactive");
			state = "2"; 
		}); 
 		
 		// seccond    
		$("#last-step").click( function() {
			clienName        = $("#client-name").val(); 
			lastName         = $("#client-lastname").val(); 
			clientTel        = $("#client-tel").val(); 
			clientWork 		 = $("#client-work").val(); 
			clientDepartment = $("#client-department").val(); 
		
			if(clienName.length < 2 || lastName.length < 2 || clientTel.length < 2 || clientWork.length < 2 || clientDepartment.length < 2 ) {
				$("#mge-2").html("favor de rellenar todos los campos"); 
				return; 
			} else {
				$("#mge-2").html(""); 
				$("#second-step").addClass("inactive"); 
				$("#three-step").removeClass("inactive"); 
				state = "3"; 
			}
		}); 
	</script>
 
</body>
</html>