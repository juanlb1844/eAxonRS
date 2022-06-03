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
</style>

</head>
<body>

	<div class="container-fluid page-container">
		<div class="col-lg-12 np">
			<img id="logo" src="https://demo.eaxon.com.mx/media-admin/eaxon.png">
		</div>
		<div class="page-container-block col-lg-12"> 
			<div class="page-content-block">
				<div class="form-registration row" id="first-step">
					<div class="col-lg-12 title-block">
						<span>Iniciar una prueba de eAxón</span>
					</div>
					<div class="col-lg-12 row-data">
						<span class="title-field">Correo electrónico</span>
						<input class="form-control form-imput" id="client-email" type="email" name="email"> 
						<span style="color:red" id="mge-1"></span>
					</div>
					<div class="col-lg-12 row-data">
						<button class="btn btn-primary" id="next">siguiente</button>
					</div>
				</div>
				<div class="form-registration row inactive" id="second-step">
					<div class="col-lg-12 title-block">
						<span>Último paso</span>
					</div>
					<div class="col-lg-12 row-data">
						<div class="col-lg-6 np" style="padding-right: 10px!important;">
							<span class="title-field">Nombre</span>
							<input class="form-control form-imput" id="client-name" type="text" name="name"> 
						</div>
						<div class="col-lg-6 np">
							<span class="title-field">Apellido</span>
							<input class="form-control form-imput" id="client-lastname" type="text" name="lastname"> 
						</div>
					</div>
					<div class="col-lg-12 np">
						<span class="title-field">Teléfono</span>
						<input class="form-control form-imput" id="client-tel" type="tel" name="tel"> 
					</div>
					<div class="col-lg-12 np">
						<span class="title-field">Puesto de trabajo</span>
						<input class="form-control form-imput" id="client-work" type="" name="work"> 
					</div>
					<div class="col-lg-12 np">
						<span class="title-field">Departamento</span>
						<input class="form-control form-imput" id="client-department" type="" name="departament"> 
						<span style="color:red" id="mge-2"></span>
					</div>
					<div class="col-lg-12 row-data">
						<button class="btn btn-primary" id="last">finalizar</button>
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
		var clientEmail = ""; 
		var clienName = ""; 
		var lastName = ""; 
		var clientTel = ""; 
		var clientWork = ""; 
		var clientDepartment = ""; 
		$("#next").click( function() {

			clientEmail = $("#client-email").val(); 

			if(clientEmail.length < 5 ) {
				$("#mge-1").html("favor de introducir un email válido"); 
				return; 
			}

			$("#first-step").addClass("inactive");
			$("#second-step").removeClass("inactive");
		}); 

		$("#last").click( function() {
			clienName = $("#client-name").val(); 
			lastName = $("#client-lastname").val(); 
			clientTel = $("#client-tel").val(); 
			clientWork = $("#client-work").val(); 
			clientDepartment = $("#client-department").val(); 
		
			if(clienName.length < 2 || lastName.length < 2 || clientTel.length < 2 || clientWork.length < 2 || clientDepartment.length < 2 ) {
				$("#mge-2").html("favor de rellenar todos los campos"); 
				return; 
			} else {
				$("#mge-2").html(""); 
			}
		}); 
	</script>
 
</body>
</html>