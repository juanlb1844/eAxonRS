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

   
<style type="text/css">
	.html {
		padding: 0px; margin: 0px; 
	}
	.mobile-content {
		background-image: url('https://images.pexels.com/photos/2122294/pexels-photo-2122294.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'); 
		background-position: center;
		background-size: cover;
		/*background-color: #181818;*/ 
		min-height: 100vh; 
		padding: 0px; 
	}
	.header-top {
		/*background-color: #050505; */ 
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
		text-shadow: 0px 0px 4px white; 
		font-size: 45px; 
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

	.dish-content {
		display: inline-block;
		width: 110px; 
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
	}

	h2 { font-weight: 900; }
</style>  

</head>
<body>

	<div class="container-fluid mobile-content">
		<div class="header-top">
			<!-- <span>{{$hash}}</span> --> 
			<div class="col-lg-6 col-xs-6">
				<span class="header-title pull-left">eAxón</span>
			</div>
			<div class="col-lg-6 col-xs-6">
				<span class="header-avatar pull-right"></span>
			</div>
		</div>
		<div class="second-menu col-xs-12">
			<ul>
				<li>
					<span>cominda</span>
				</li>
				<li>
					<span>servicios</span>
				</li>
				<li>
					<span>comentarios *</span>
				</li> 
			</ul>
		</div>
		<div class="banner-img-text">
			<span>Hotkakes a la memonié $30</span>
			<button class="btn btn-primary btn-s1">ordenar</button>
		</div>
	</div>
	<div class="col-xs-12" style="background-color: #363530; color: white!important;">
		<h2>mariscos</h2>
		<div class="col-xs-12 np" style="padding: 0px!important;">
			<div class="owl-carousel owl-theme">
			    <div class="item">
			    	<div class="dish-container">
			    		<div class="dish-content" style="background-image: url('https://images.pexels.com/photos/679454/pexels-photo-679454.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">
			    			<span>camarones en su concha</span>
			    		</div>
			    	</div>
			    </div>
			     <div class="item">
			    	<div class="dish-container">
			    		<div class="dish-content" style="background-image: url('https://images.pexels.com/photos/583880/pexels-photo-583880.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">
			    			<span>shot de camarón</span>
			    		</div>
			    	</div>
			    </div>
			    <div class="item">
			    	<div class="dish-container">
			    		<div class="dish-content" style="background-image: url('https://images.pexels.com/photos/3475617/pexels-photo-3475617.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">
			    			<span>comer en el solazo</span>
			    		</div>
			    	</div>
			    </div>
			    <div class="item">
			    	<div class="dish-container">
			    		<div class="dish-content" style="background-image: url('https://images.pexels.com/photos/1833349/pexels-photo-1833349.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');">
			    			<span>comaron en brochetado</span>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
		<h2>vegetarianas</h2>
		<div class="col-xs-12 np" style="padding: 0px!important;">
			<div class="owl-carousel owl-theme" >
			    <div class="item">
			    	<div class="dish-container">
			    		<div class="dish-content" style="background-image: url('https://images.pexels.com/photos/2097090/pexels-photo-2097090.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">
			    			
			    		</div>
			    	</div>
			    </div>
			     <div class="item">
			    	<div class="dish-container">
			    		<div class="dish-content">
			    			
			    		</div>
			    	</div>
			    </div>
			    <div class="item">
			    	<div class="dish-container">
			    		<div class="dish-content">
			    			
			    		</div>
			    	</div>
			    </div>
			    <div class="item">
			    	<div class="dish-container">
			    		<div class="dish-content">
			    			
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
		$('.owl-carousel').owlCarousel({
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
	}
</script>