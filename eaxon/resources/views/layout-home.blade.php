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
	
	.header-top {
		width: 100%;
		background-color: #333333;
	    text-align: center;
	    display: block;
	    padding: 10px 10px;
	    clear: both;
	    display: inline-block;
	}
	.header-title {
		font-size: 25px; 
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

	 
	.line-body {
		font-size: 32px; 
		color: white;
		padding: 20px 10px; 
	}


	.header-avatar {
		display: inline-block;
		width: 40px; 
		height: 40px; 
		border-radius: 4px; 
		background-color: black; 
		background-image: url('https://archive.org/download/profiles_202104/chicken.png'); 
		background-position: center;
		background-size: cover;
	}



	/* second menu */ 
	.second-menu { padding-top: 20px;  }
	.second-menu ul li {
		display: inline-block;
		padding-right: 20px;  
	}
	.second-menu ul li span {
		color: white; 
		font-size: 17px; 
	}

	/* banner-img-text */ 
	.banner-img-text {
		color: #d15219;
		/*text-shadow: 0px 0px 4px white;*/ 
		color: #dddddd; 
		font-size: 35px; 
		font-weight: bolder; 
		padding-top: 60vh; 
		text-align: center;
	}
	.btn-s1 {
		border-radius: 20px;
		padding: 5px 27px;
		background-color: #FFC800;
		border: 0px;
		color: #453d3d;
		font-weight: 900;
		letter-spacing: 1px;
	}


	/* slider */ 
	.dish-content span {
		z-index: 22;
    	position: relative;
	}
	.dish-content {
		display: inline-block;
		width: 100%; 
		height: 135px; 
		background-image: url('https://images.pexels.com/photos/2122294/pexels-photo-2122294.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'); 
		background-position: center;
		background-size: cover; 
		padding: 10px; 
		color: white;
		font-weight: bolder;
		color: white; 
		padding-top: 100px;
		line-height: 12px; 
		border-radius: 10px;
	}

	h2 { font-weight: 900; }

	.courtain {
		background-color: #00000087;
    	height: 400px;
    	position: absolute;
    	width: 100%;
    	bottom: 0px!important;
		background: linear-gradient(0deg, rgba(54,53,48,1) 0%, rgba(54,53,48,0.7962535355939251) 47%, rgba(0,0,0,0) 100%); 
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
	}
	.courtain-slider {
		background-color: #00000087;
	    height: 100px;
	    position: absolute;
	    width: 101%;
	    background: rgb(54,53,48);
	    background: linear-gradient(0deg, rgb(0 0 0 / 65%) 0%, rgba(54,53,48,0.7962535355939251) 47%, rgba(0,0,0,0) 100%);
	    border-bottom-left-radius: 10px; 
	    border-bottom-right-radius: 10px; 
	    left: 0px;
	    bottom: 0px; 
	}

	.np {
		padding: 0px!important;
	}

	.basket {
		display: inline-block;
		width: 45px; 
		height: 40px; 
		position: absolute;
		background-image: url('{{asset("theme_client/cart.svg")}}');
		background-size: 75%;
		right: 10px;
		/*top: -10%;*/ 
		background-repeat: no-repeat;
		background-position: center;
		background-color: #d15219e3;
    	border-radius: 7px;
	}
</style>  

</head>
<body>

	<div class="container-fluid mobile-content">
		<div class="header-top">
			<!-- <span>{{$hash}}</span> --> 
			<div class="col-lg-6 col-xs-3">
				<a href='{{asset("/client/$hash/perfil/1")}}'>
					<span class="header-title pull-left">eAxón</span>
				</a> 
			</div>
			<div class="col-lg-6 col-xs-6" style="padding-top: 5px;">
				<span class="header-title" id="MyClockDisplay" style="color: red; font-size: 22px!important;"></span>
			</div>
			<div class="col-lg-6 col-xs-3">
				<!-- <span class="header-avatar pull-right"></span> -->
				<a href='{{asset("/cart/1/hash/$hash/perfil/1")}}'>
					<span class="pull-right basket"></span>
				</a>
			</div>
		</div>
		<div class="second-menu col-xs-12 np"> 
			<ul>
				<li>
					<span>comida</span>
				</li>
				<li>
					<span>servicios</span>
				</li>
				<li>
					<span>comentarios</span>
				</li> 
			</ul> 
		</div>
		 @if( request()->route()->uri == "client/{hash}/perfil/{p}" )
			<div class="banner-img-text"> 
				<span style="display: block; font-weight: bolder; position: relative;z-index: 999;">
					{{$portada->name}}  ${{number_format($portada->price, 2, '.', ',') }}
				</span>
	    		<a href='{{asset("/dish/$portada->iddish/hash/$hash/perfil/$perfil")}}'>
					<button class="btn btn-primary btn-s1" style="position: relative; z-index: 999;">ordenar</button>	
	    		</a>
			</div>
			<div class="courtain" style="border-radius: 0px!important;"></div>
		 @endif 
	</div>
	@yield('page'); 

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