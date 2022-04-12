@extends('layout-home') 


@section('page')

<!-- 
	
	-Programar 
	-Calificar 
	-Compartir 
	-Configurar 

--> 

<style type="text/css">
		.mobile-content {
		background-image: url('{{$gallery[0]->url}}'); 
		min-height: 40vh; 
		padding: 0px; 
		background-position: center;
    	background-size: cover;
	}
  .container-description {
    min-height: 25vh; 
    padding-top: 20px; 
  }
</style>
<div class="col-xs-12" style="background-color: #363530; color: white!important; min-height: 70vh;">
	<div class="col-xs-9">
	   <h2>{{$dish->name}}</h2>		 
  </div>
  <div class="col-xs-3">
    <h2></h2>
    <button class="btn btn-primary" onclick="config()">pedir</button>
  </div>
  <div class="col-xs-12">
    <div class="container-description">
  	   <p>{{$dish->description}}</p>
    </div>
  </div>
	<div class="col-lg-3 col-xs-3" onclick="programming()" style="text-align: center;">
		<h2>+</h2>
		<p>programar</p>
	</div>
	<div class="col-lg-3 col-xs-3"  onclick="rating()" style="text-align: center;">
		<h2>+</h2>
		<p>calificar</p>
	</div>
	<div class="col-lg-3 col-xs-3" onclick="share()" style="text-align: center;">
		<h2>+</h2>
		<p>compartir</p>
	</div>
	<div class="col-lg-3 col-xs-3"  onclick="config()" style="text-align: center;">
		<h2>+</h2>
		<p>configurar</p>
	</div>
</div>


<style type="text/css">
	.content-modal {
		text-align: center!important;
	}
	.main-text-modal {
		font-size: 20px; 
		font-weight: bolder; 
	}

	.option-modal {
		background-color: white; 
		color: black;
	}

 
	.raiting-stars li {
		display: inline-block;
	}
	.raiting-stars img {
		width: 30px; 
	}
</style>
 
<!-- Modal -->
<div id="programming" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Programar</h4>
      </div>
      <div class="modal-body">
        <div calss="col-xs-12">
        	<div class="content-modal">
        		<div class="col-xs-12">
	        		<span class="main-text-modal">¿A que hora lo quires?</span>
	        		<input type="date"  min="2022-03-23" value="2022-03-23" max="2022-03-27" name="">
        		</div>
        		<div class="col-xs-12">
	        		<span class="main-text-modal">¿Dónde lo dejamos?</span>
	        		<div>
		        		<button class="btn btn-primary option-modal"> 
		        			Adentro
		        		</button>
		        		<button class="btn btn-primary option-modal"> 
		        			Fuera
		        		</button>
	        		</div>
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="rating" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tu opinión es importante</h4>
      </div> 
      <div class="modal-body">
        <div class="content-modal">
        		<div class="col-xs-12">
	        		<span class="main-text-modal">Dános tu calificación</span>
        		</div>
        		<div class="col-xs-12">
        			<ul class="raiting-stars">
        				<li>
        					<img src="https://cdn-icons.flaticon.com/png/512/2956/premium/2956792.png?token=exp=1648060166~hmac=4e8026479120658476b8c4d71fa9aa7b">
        				</li>
        				<li>
        					<img src="https://cdn-icons.flaticon.com/png/512/2956/premium/2956792.png?token=exp=1648060166~hmac=4e8026479120658476b8c4d71fa9aa7b">
        				</li>
        				<li>
        					<img src="https://cdn-icons.flaticon.com/png/512/2956/premium/2956792.png?token=exp=1648060166~hmac=4e8026479120658476b8c4d71fa9aa7b">
        				</li>
        				<li>
        					<img src="https://cdn-icons.flaticon.com/png/512/2956/premium/2956792.png?token=exp=1648060166~hmac=4e8026479120658476b8c4d71fa9aa7b">
        				</li>
        				<li>
        					<img src="https://cdn-icons.flaticon.com/png/512/2956/premium/2956792.png?token=exp=1648060166~hmac=4e8026479120658476b8c4d71fa9aa7b">
        				</li>
        			</ul>
        		</div>
        		<div class="col-xs-12"> 
        			<span class="main-text-modal">Escríbenos</span>
        			<textarea class="form-control" placeholder="me encanto.."></textarea>
        		</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="share" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Compartir</h4>
      </div> 
      <div class="modal-body">
      	<div style="text-align: center;">
        	<button class="btn btn-primary">Copiar link</button>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


<style type="text/css">
	.list-ingredents img {
		width: 70px;
	}
	.row-ingredient {
		border: 1px solid gray;
		background-color: #dedede; 
		border-radius: 12px; 
		margin-bottom: 10px; 
	}
	.price-ingredient { margin: 0px; }
	.name-ingredient {
		font-size: 17px; 
		font-weight: bolder; 
		margin: 0px;
	}
	.np {
		padding: 0px!important;
	}
	.control-amount {
		    padding: 8px!important;
		    padding-bottom: -6px;
		    font-weight: bolder;
		    background-color: #bebebe;
		    border-radius: 30px;
		    height: 28px;
		    line-height: 1px;
	}
</style>
<!-- Modal -->
<div id="config" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Configurar</h4>
      </div> 
      <div class="modal-body">
        <p>Agrega lo que desees en tu platillo</p>
        <div class="col-xs-12 list-ingredents" style="display: flow-root; margin-bottom: 20px;">
        	<div class="row row-ingredient">
        		<div class="col-xs-7">
        			<p class="name-ingredient">nombre del ingred</p>
        			<p class="price-ingredient">$20.00</p>
        		</div>
        		<div class="col-xs-5 np">
        			<div class="col-xs-10 np" style="text-align: right;">
        				<img src="https://cdn-icons-png.flaticon.com/512/926/926255.png">
        			</div>
        			<div class="col-xs-2 np">
        				<button class="btn control-amount">+</button>
        				<button class="btn control-amount" style="margin-top: 10px;">-</button>
        			</div>
        		</div>
        	</div>
        	<div class="row row-ingredient">
        		<div class="col-xs-7">
        			<p class="name-ingredient">nombre del ingred</p>
        			<p class="price-ingredient">$20.00</p>
        		</div>
        		<div class="col-xs-5 np">
        			<div class="col-xs-10 np" style="text-align: right;">
        				<img src="https://cdn-icons-png.flaticon.com/512/926/926255.png">
        			</div>
        			<div class="col-xs-2 np">
        				<button class="btn control-amount">+</button>
        				<button class="btn control-amount" style="margin-top: 10px;">-</button>
        			</div>
        		</div>
        	</div>
        	<div class="row row-ingredient">
        		<div class="col-xs-7">
        			<p class="name-ingredient">nombre del ingred</p>
        			<p class="price-ingredient">$20.00</p>
        		</div>
        		<div class="col-xs-5 np">
        			<div class="col-xs-10 np" style="text-align: right;">
        				<img src="https://cdn-icons-png.flaticon.com/512/926/926255.png">
        			</div>
        			<div class="col-xs-2 np">
        				<button class="btn control-amount">+</button>
        				<button class="btn control-amount" style="margin-top: 10px;">-</button>
        			</div>
        		</div>
        	</div>
        	<div class="row row-ingredient">
        		<div class="col-xs-7">
        			<p class="name-ingredient">nombre del ingred</p>
        			<p class="price-ingredient">$20.00</p>
        		</div>
        		<div class="col-xs-5 np">
        			<div class="col-xs-10 np" style="text-align: right;">
        				<img src="https://cdn-icons-png.flaticon.com/512/926/926255.png">
        			</div>
        			<div class="col-xs-2 np">
        				<button class="btn control-amount">+</button>
        				<button class="btn control-amount" style="margin-top: 10px;">-</button>
        			</div>
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
	function programming() {
		$('#programming').modal('toggle'); 
	}
	function rating() {
		$('#rating').modal('toggle'); 
	}
	function share() {
		$('#share').modal('toggle'); 
	}
	function config() {
		$('#config').modal('toggle'); 
	}
</script>


@endsection 