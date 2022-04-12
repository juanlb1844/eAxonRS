@extends('layout-home') 

    
@section('page')
<style type="text/css">
	.mobile-content {
		background-image: url('{{$portada->url}}'); 
		background-position: center;
		background-size: cover;
		/*background-color: #181818;*/ 
		min-height: 100vh; 
		padding: 0px; 
	} 
</style>
<div class="col-xs-12" style="background-color: #363530; color: white!important; padding-bottom: 70px;">
 	@if( $sliders ) 
		@foreach($sliders as $k => $slider)
			<h2>
				{{$slider['products'][0]->category_name}}
			</h2>  
			<div class="col-xs-12 np" style="padding: 0px!important;">
				<div class="owl-carousel carousel-{{$slider['layout']}} owl-theme">
					@foreach($slider['products'] as $kp => $product)
						    <div class="item">
						    	<div class="dish-container"> 
						    		<a href='{{asset("/dish/$product->iddish/hash/$hash/perfil/$perfil")}}'>
							    		<div class="dish-content" style="background-image: url('{{$product->gallery[0]->url}}');">
							    			<span>{{$product->namedish}}</span>
							    			<span> ${{number_format($product->price, 2, '.', ',') }} </span>
							    			<div class="courtain-slider">
							    			</div>
							    		</div>
						    		</a>
						    	</div> 
						    </div>
					@endforeach
				</div>
			</div>
		@endforeach 
 	@endif 
</div>
@endsection 