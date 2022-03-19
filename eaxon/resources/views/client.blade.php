<!DOCTYPE html>
<html>
<head>
	<title>Client - eAxón</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
<style type="text/css">
	.html {
		padding: 0px; margin: 0px; 
	}
	.mobile-content {
		background-color: #181818; 
		min-height: 100vh; 
		padding: 0px; 
	}
	.header-top {
		background-color: #050505; 
		text-align: center;
		padding: 10px 10px; 
	}
	.header-title {
		font-size: 30px; 
		font-weight: bolder;
		color: #ccc; 
	}

	.body-content {
		text-align: center;
		padding-top: 17vh; 
	}
	.title-1 {
		font-size: 28px; 
		font-weight: 600; 
		color: #ccc;
	}

	.avatar-content {
		display: inline-block;
		border: 2px solid black;
		width: 30vw; 
		height: 30vw;
		background-image: url('https://archive.org/download/profiles_202104/chicken.png'); 
		background-size: cover; 
	}
	.line-body {
		font-size: 32px; 
		color: white;
		padding: 20px 10px; 
	}
</style>

</head>
<body>

	<div class="container-fluid mobile-content">
		<div class="header-top">
			<!-- <span>{{$hash}}</span> --> 
			<span class="header-title">eAxón</span>
		</div>
		<div class="body-content">
			<div class="line-body">
				<span>¿Quién usará eAxón?</span>
			</div>
			<div class="avatar-container">
				<a href='{{asset("/client/$hash/perfil/1")}}'>
					<div class="avatar-content"> 
						
					</div>
				</a>
			</div>
			<span class="title-1">{{$user->name}}</span>
		</div>
	</div>

</body>
</html>