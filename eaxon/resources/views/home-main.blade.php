<!DOCTYPE html>
<html>
<head>
	
<title>Client - eAxón</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Assistant:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

<style type="text/css">
	.html {
		padding: 0px; margin: 0px; 
		font-family: 'Archivo Black', sans-serif;
		font-family: 'Assistant', sans-serif;
	}
	
  
	.np {
		padding: 0px!important;
	}

	.container-fluid {
		background-color: #141414; 
		min-height: 100vh;
	} 

	.header-section span { font-size: 25px; color: white; font-weight: 600; }

	.body-section {
		background-color: #202124;
		border-radius: 12px;
		padding: 20px;
	}
	.content-img {
		text-align: right;
		height: 170px; 
		border-radius: 12px; 
		background-color: black;
		background-size: cover;
		background-position: center;
		background-image: url('https://a0.muscache.com/im/pictures/b2779a03-9afa-460e-b42d-4b2715561a2e.jpg?im_w=1200');
	}
	.text-content { padding: 10px; }
	.name-content { color: white; font-size: 20px; font-weight: 500; }
	.content-description { color: white; }
	.tags-section { color: gray; }

	.action-section {
		display: inline-block;
		background-color: #fece00;
		color: black;
		padding: 10px;
    	border-bottom-left-radius: 12px;
    	border-top-right-radius: 12px;
	}



	.service-1 {
		height: 170px; 
		/*background-color: black;*/
		border-radius: 12px; 
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		text-align: center;
		padding-top: 10px;
	}
	.back-img {
		height: 170px; 
		background-color: black; 
		border-radius: 12px; 
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		text-align: center;
		padding-top: 10px;
	}
	.name-service {
		display: inline-block;
		background-color: #e54947; 
		padding: 2px 10px; 
		border-radius: 7px;
		color: white;
	}

	.row-section, .row-services {
		margin-bottom: 20px;
	}

	.user-avatar {
		display: inline-block;
		height: 50px; 
		width: 50px;
		border-radius: 50%;
		background-image: url('https://a0.muscache.com/im/pictures/user/a6993565-2d8f-4d43-825a-134094c0faaa.jpg?im_w=240'); 
		background-position: center;
		background-size: cover; 
		background-repeat: no-repeat;
	}

	.header-main {
		margin: 5px 0px;
		padding-top: 10px;
	}
</style>  

</head>
<body>

	 
	<div class="container-fluid np">
		<div class="header-main col-xs-12">
			<div class="col-xs-8">
				<div class="col-xs-4 np">
					<div class="content-user">
						<span class="user-avatar">
							
						</span>
					</div>
				</div>
				<div class="col-xs-8 np">
					<div style="padding-top: 15px; text-align: left;">
						<span style="color: white; font-weight: 500; font-size: 17px;">Avatar L</span>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div style="padding-top: 12px;">
					<span style="font-size: 20px; font-weight: 600;">¡hola!</span>
				</div>
			</div>
		</div>

		<div class="row-services col-xs-12">
			<div class="content-services">
				<a href='{{asset("/client/$hash/perfil/1")}}'>
					<div class="service-1 col-xs-4" style="padding: 5px;">
						<div class="back-img col-xs-12"  style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPolWrfvDPzEEm3KR6cV4ejqTX5PeidHfFf9nwvgAlt5TPVz0VQQXuiKbJckc6K_THvao&usqp=CAU'); ">
							<div>
								<span class="name-service">spa</span>
							</div>
						</div>
					</div>
				</a>
				<a href='{{asset("/client/$hash/perfil/1")}}'>
					<div class="service-1 col-xs-4" style="padding: 5px;">
						<div class="back-img col-xs-12"  style="background-image: url('https://media.gq.com.mx/photos/6155f165f3951529d43a0743/16:9/w_2560%2Cc_limit/GettyImages-56807633-lo-que-no-debes-pedir-de-room-service.jpg'); ">
							<div>
								<span class="name-service">alimentos</span>
							</div>
						</div>
					</div>
				</a>
				<a href='{{asset("/client/$hash/perfil/1")}}'>
					<div class="service-1 col-xs-4" style="padding: 5px;">
						<div class="back-img col-xs-12"  style="background-image: url('https://www.limpiezaslm2.com/wp-content/uploads/2019/06/externalizaci%C3%B3n-de-la-limpieza-1200x900.jpg'); ">
							<div>
								<span class="name-service">limpieza</span>
							</div>
						</div>
					</div>
				</a>

			</div>
		</div>

		<div class="row-section col-xs-12">
			<div class="header-section">
				<span>Trending</span>
			</div>
			<div class="body-section">
				<div class="content-section">
					<a href='{{asset("/client/$hash/perfil/1")}}'>
						<div class="content-img">
							<span class="action-section">ver más</span>
						</div>
					 </a>
					<div class="text-content">
						<span class="name-content">Olas de arena</span>
						<p class="content-description">Conduciremos a una playa remota en el Cabo Este, a 40 minutos de Cabo</p>
						<div class="tags-section">
							#surfArena #afueras #viaje #deporte
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row-section col-xs-12">
			<div class="header-section">
				<span>Nuestro menú</span>
			</div>
			<div class="body-section">
				<div class="content-section">
					<a href='{{asset("/client/$hash/perfil/1")}}'>
						<div class="content-img" style="background-image: url('https://gourmetdemexico.com.mx/wp-content/uploads/2020/09/platillo-trazo.jpg')">
							<span class="action-section">ver más</span>
						</div>
					</a>
					<div class="text-content">
						<span class="name-content">Pide a tu cuarto</span>
						<p class="content-description">Pide en a tu habitaión o programa algúna fecha importante desde tu celular</p>
						<div class="tags-section">
							#food #relaxAndFood #caboFood #mexico
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row-section col-xs-12">
			<div class="header-section">
				<span>Artículos y recuerdos</span>
			</div>
			<div class="body-section">
				<div class="content-section">
					<a href='{{asset("/client/$hash/perfil/1")}}'>
						<div class="content-img" style="background-image: url('https://cdn.aarp.net/content/dam/aarp/entertainment/beauty-and-style/2021/07/1140-beach-hat-bag-flip-flops-esp.jpg')">
							<span class="action-section">ver más</span>
						</div>
					</a>
					<div class="text-content">
						<span class="name-content">¿Olvidaste algo?</span>
						<p class="content-description">Compra tus accesorios y/o recuerdos en nuestra tienda</p>
						<div class="tags-section">
							#bikini #accesoriesBeach #mexico #mexicoMemories
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>


<script type="text/javascript">
	window.onload = function() {

		$('.carousel-1').owlCarousel({
			    loop:true,
			    margin:10,
			    nav:false,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:1
			        },
			        1000:{
			            items:1
			        }
			    }
			}); 
 
		$('.carousel-2').owlCarousel({
			    loop:true,
			    margin:10,
			    nav:false,
			    responsive:{
			        0:{
			            items:2
			        },
			        600:{
			            items:2
			        },
			        1000:{
			            items:2
			        }
			    }
			}); 

		$('.carousel-3').owlCarousel({
			    loop:true,
			    margin:10,
			    nav:false,
			    responsive:{
			        0:{
			            items:3
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:3
			        }
			    }
			}); 


		function showTime(){
		    var date = new Date();
		    var h = date.getHours(); // 0 - 23
		    var m = date.getMinutes(); // 0 - 59
		    var s = date.getSeconds(); // 0 - 59
		    var session = "AM";
		    
		    if(h == 0){ 
		        h = 12;
		    }
		    
		    if(h > 12){
		        h = h - 12;
		        session = "PM";
		    }
		     
		    h = (h < 10) ? "0" + h : h;
		    m = (m < 10) ? "0" + m : m;
		    s = (s < 10) ? "0" + s : s;
		    
		    var time = h + ":" + m + ":" + s + " " + session;
		    document.getElementById("MyClockDisplay").innerText = time;
		    document.getElementById("MyClockDisplay").textContent = time;
		    
		    setTimeout(showTime, 1000);
		    
		}

		showTime();

	}
</script>