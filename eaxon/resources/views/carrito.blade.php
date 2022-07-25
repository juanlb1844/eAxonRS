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

<link rel="stylesheet" type="text/css" href="https://unpkg.com/pattern.css">

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
	.there-is-no {
		font-size: 25px; 
		font-weight: boldeR; 
	}
	body {
		min-height: 100vh;
    	background-color: #e8e8e8;
	}
	.container-msg {
		margin-top: 30px; 
		display: inline-block;
		background-color: white; 
		border-radius: 12px;
		padding: 5px 15px; 
	}
</style>  

</head>
<body>

	<div class="container-fluid mobile-content np">
		<div class="header-top col-xs-12">
			<!-- <span>{{$hash}}</span> --> 
			<div class="col-lg-6 col-xs-2">
				<a href='{{asset("/client/$hash/perfil/1")}}'>
					<img src="{{asset('theme_client/row-back.svg')}}" style="width: 40px;">
				</a> 
			</div>
			<div class="col-lg-6 col-xs-10">
				<div style="text-align: center; font-size: 20px; font-weight: bolder; padding-right: 40px; padding-top: 7px;">
					<a href='{{asset("/cart/1/hash/$hash/perfil/1")}}'>
						<span style="color: white;">Carrito</span>
					</a> 
				</div>
			</div>
		</div>

		<style type="text/css">
			.container-controls {
				text-align: center;
			}
			.control-item {
				display: inline-block;
				border-radius: 50%; 
				border: 1px solid #d5d5d5;
				background-color: #d5d5d5; 
				width: 30px;
				height: 30px;
				padding: 0px 0px;
				font-size: 20px;
				font-weight: bolder;
				text-align: center;
			}
			.cart-items-container {
				background-color: white;
				border-radius: 12px; 
				padding: 20px 0px;
				margin-bottom: 20px;
			}
			.cart-items {
				padding-top: 20px;
			}

			.img-prev-cart {
				width: 100%; 
				height: 90px; 
				border-radius: 12px;
				background-color: black;
				background-size: cover;
				background-position: center;
			}
			.price-item {
				font-size: 20px; 
				font-weight: 700;
			}

			.control-count { display: inline-block; width: 100%; text-align: center; }

			.arrow-right {
				background-image: url('{{asset('theme_client/right-arrow.svg')}}'); 
				background-repeat: no-repeat;
				text-align: center;
				background-size: cover;
				height: 70px; 
				background-position-y: center;
				background-position-x: right;
				background-size: 35px; 
			}
		</style>

		@if(\Session::get('dishes'))
			@php $total = 0; @endphp
			<div class="cart-items col-xs-12">
				@foreach( \Session::get('dishes') as $k )
						@php 
							$total+=$k['info']->price; 
						@endphp
						<div class="cart-items-container col-xs-12"> 
							<div class="cart-item col-xs-12">
								<div class="col-xs-4" style="padding-left: 0px;">
									<div class="img-prev-cart" style="background-image: url('{{$k['image']}}');">
									</div>
								</div>
								<div class="col-xs-6 np">
									<p>{{$k['info']->name}}</p>
									<p class="price-item">${{$k['info']->price}}</p>
								</div>
								<div class="col-xs-2 np">
									<div class="container-controls">
										<span class="control-item">+</span>
										<span class="control-count">{{$k['cant']}}</span>
										<span class="control-item">-</span>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div>
									@if( $k['excluded_ingredients'] ) 
										<span style="font-weight: 900;">sin:</span>   
										@foreach( $k['excluded_ingredients'] as $i => $ing )
											@if( $i === array_key_last($k['excluded_ingredients']) )
												<span>{{ $ing['name'] }}</span>
											@else 
												<span>{{ $ing['name'] }}, </span>
											@endif 
										@endforeach 
									@endif 
								</div>
								<div> 
									@if( $k['included_guarnicions'] )
										<span style="font-weight: 900;">extras: </span>    
										@foreach( $k['included_guarnicions'] as $i => $guar )
											@if( $i === array_key_last($k['included_guarnicions']) )
												<span>{{ $guar['name'] }} {{ $guar['cant'] }}</span>
											@else 
												<span>{{ $guar['name'] }} {{ $guar['cant'] }}, </span>
											@endif 
										@endforeach 
										@endif 
									<img src="{{asset('theme_client/edit_2.svg')}}" style="width: 20px;">
								</div>
							</div>
						</div>
				@endforeach 
			</div>

			<style type="text/css">
				.dotted {
					border-top: 2px dotted gray;
					margin-top: 10px;
					margin-bottom: 10px;
				}
				.totals-cart p { font-size: 20px; }
				.totals-cart .total-number { font-weight: 700; }
				.container-main-control {
					text-align: center;
				}
				.main-btn-cart {
					background-color: black;
					border: 0px;
					width: 100%;
					padding: 15px 10px;
					border-radius: 14px;
				}

				.payment-methods {
					margin: 20px 0px;
				}
				.header-payment {
					font-size: 20px;
					font-weight: 700;
				}
				.add-pm {
					color: #36b25c;
					font-weight: 700;
					font-size: 12px;
					display: inline-block;
					margin-top: 5px;
				}

				.option-payment {
					height: 70px; 
					background-color: #d5d5d5; 
					border-radius: 12px;
					padding: 25px 0px;
					text-align: center;
				}
				.opt-payment-active {
					background-color: #ad3; 
				}
			</style>

			<div class="col-xs-12 payment-methods">
				<div class="col-xs-8">
					<span class="header-payment">Payment Method</span>
				</div>
				<div class="col-xs-4">
					<span class="add-pm pull-right">Add New</span>
				</div>
				
				<div class="payments-options col-xs-12 np">
					<div class="col-xs-6">
						<div class="option-payment opt-payment-active"> ** ** 22 26</div>
					</div>
					<div class="col-xs-6">
						<div class="option-payment "> Añadir a la cuenta </div>
					</div>
				</div>
			</div>

			<div class="totals-cart col-xs-12">
				<div class="subtotal-row col-xs-12 np">
					<div class="col-xs-6">
						<p>Subtotal</p>
					</div>
					<div class="col-xs-6">
						<p class="pull-right total-number">${{$total}}</p>
					</div>
				</div>
				<div class="col-xs-12 dotted">
				</div>
				<div class="subtotal-row col-xs-12 np">
					<div class="col-xs-6">
						<p>Total</p>
					</div>
					<div class="col-xs-6">
						<p class="pull-right total-number">${{$total}}</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 main-control-cart">
				<div class="container-main-control">
					<!-- <a href="{{asset('order/1/hash/')}}/{{$hash}}/perfil/1">--> 
						<button class="btn btn-primary main-btn-cart">crear orden</button>
					<!-- </a> --> 
				</div>
			</div>
		@else 
			<div class="col-xs-12"> 
				<div class="container-msg">
				 <span class="there-is-no">No hay productos en su carrito</span>
				</div>
			</div>
		@endif  

		@if(count($orders))
				<div calss="row">
					<div class=""> 
						<div class="col-xs-12 pattern-dots-sm">
							<div class="col-xs-10">
							 <span class="there-is-no">Tiene un pedido en curso</span>
							</div>
							<div class="col-xs-2 arrow-right">
								
							</div>
						</div>
					</div>
				</div>
			@endif 

	</div>

	<script type="text/javascript">
		$('.main-btn-cart').click( function() {
			let hash = '{{$hash}}';
			let base = "{{$_SERVER['SERVER_NAME']}}{{str_replace('index.php', '', $_SERVER['PHP_SELF'])}}"; 
			$.ajax({ 
				'url' : "{{asset('createTicket')}}", 
				'method' : 'post', 
				'data' : {
					'hash' : '{{$hash}}' 
				}, 
				'success' : function(resp) {
					resp = resp.trim(); 
					to = window.location.protocol+"//"+base+"order/"+resp+"/hash/"+hash+"/perfil/1";
					window.location = to; 
				}
			}); 
		}); 
	</script>
	 

</body>
</html>



 