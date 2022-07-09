@extends('layout-home') 

    
@section('page')
<style type="text/css">
	.mobile-content {
		 
		background-position: center;
		background-size: cover;
		/*background-color: #181818;*/ 
		min-height: 0vh; 
		padding: 0px; 
	} 
	.dish-content {
		font-size: 30px;
		padding-top: 20px;
		line-height: 25px; 
	}
</style>
<div class="col-xs-12" style="color: white!important; padding-bottom: 70px;">
 			
 			<h5>&nbsp;</h5>
			<div class="col-xs-12 np" style="padding: 0px!important;">
				<div class="owl-carousel carousel- owl-theme">
						    <div class="item">
						    	<div class="dish-container"> 
						    		<a href='--'>
							    		<div class="dish-content" style="background-image: url('https://thumbs.dreamstime.com/b/banner-spa-aloe-vera-piedra-tajadas-frescas-salaz%C3%B3n-cuerpo-crema-lonas-cosm%C3%A9tica-natural-173843029.jpg');">
							    			<span>Haz tu cita para cualquiera de los siguientes servicios</span>
							    			<span></span>
							    			<!-- <div class="courtain-slider">
							    			</div> -->
							    		</div>
						    		</a>
						    	</div> 
						    </div>
						    <div class="item">
						    	<div class="dish-container"> 
						    		<a href='--'>
							    		<div class="dish-content" style="background-image: url('https://fionettavet.com/wp-content/uploads/2021/11/banner_spa_def.jpg');">
							    			<span>También serivicio para mascotas</span>
							    			<span></span>
							    			<!-- <div class="courtain-slider">
							    			</div> -->
							    		</div>
						    		</a>
						    	</div> 
						    </div>
						    <div class="item">
						    	<div class="dish-container"> 
						    		<a href='--'>
							    		<div class="dish-content" style="background-image: url(' https://elements-twenty20-photos-0.imgix.net/production/uploads/items/5ace45a3-ca4a-4576-b223-162a9a195cfa/source?auto=compress%2Cformat&fit=max&mark=https%3A%2F%2Felements-assets.envato.com%2Fstatic%2Fwatermark2.png&markalign=center%2Cmiddle&markalpha=18&w=700&s=737e41770be17c8cbca24fc50ce15f60');">
							    			<span>Vamos a tu habitación</span>
							    			<span></span>
							    			<!-- <div class="courtain-slider">
							    			</div> -->
							    		</div>
						    		</a>
						    	</div> 
						    </div>
				</div>
			</div>

			<style type="text/css">
				.content-btn { text-align: center; }
				.btn-spa {
					background-color: #2196f3;
				    font-size: 20px;
				    border: 0px;
				    font-weight: 600;
				}
			</style>

			<div class="col-lg-12 col-xs-12">
				<div class="content-btn">
					<button class="btn btn-primary btn-spa">
						agendar una cita
					</button>
				</div>
			</div>
   
</div>
@endsection 