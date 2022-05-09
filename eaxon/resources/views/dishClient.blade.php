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
		padding: 0px; 
		background-position: center;
    background-size: cover;
    background-color: #363530;
	}
  .container-description {
    min-height: 10vh; 
    padding-top: 5px; 
  }
  .gallery-entiti .gallery-element {
    width: 100%;
    border-radius: 12px; 
    height: 40vh; 
    background-position: center;
    background-size: cover;
  }

  .btn-style-1 {
    border-radius: 12px;
    font-weight: 600;
    padding: 5px 20px; 
  }

  .name-dish {
    font-size: 22px; 
    font-weight: 700;
    margin-bottom: 0px;  
  }

  .control-cant-main { background-color: #ad2; border-radius: 12px; display: inline-block; width: 100%;
    padding: 5px 0px;
    color: black;
  }
  .controls-cant {
    width: 30px; 
    height: 30px; 
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    font-size: 22px; 
  }
  .control-main-cant {
    padding-top: 5px;
    font-size: 21px;
  }
  #cant-m-plus {
    padding-right: 10px;
  }
  #cant-m-less {
    padding-left: 10px;
    font-size: 20px;
  }
  #cant-m-plus:active, #cant-m-less:active {
    transform: scale(1.5);
    color: white;
    transition-property: all; 
    transition-duration: .2s; 
  }
</style>

<div class="col-xs-12" style="background-color: #363530; color: white!important; min-height: 50vh;">
    <div class="col-lg-12 col-xs-12">
      <div class="gallery-entiti">
        <div class="gallery-element" style="background-image:url('{{$gallery[0]->url}}');">
          
        </div>
      </div>
    </div>
  <div class="col-xs-12">
    <div class="col-xs-3"></div>
    <div class="col-xs-6" style="text-align: center;">
      <div class="control-cant-main">
        <span id="cant-m-less" onclick="updateCant('-')" class="controls-cant pull-left">-</span>
        <span class="control-main-cant">1</span>
        <span id="cant-m-plus" onclick="updateCant('+')" class="controls-cant pull-right">+</span>
      </div>
    </div>
    <div class="col-xs-3"></div>
  </div>
	<div class="col-xs-8">
	   <p class="name-dish">{{$dish->name}}</p>		 
  </div>
  <div class="col-xs-4">
    <h2></h2>
  </div>
  <div class="col-xs-12">
    <div class="container-description">
       <p style="margin: 0px; font-weight: 700; font-size: 17px;">descripción</p>
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
  .btn-add {
    width: 100%; 
    border-radius: 12px; 
    padding: 10px 20px;
    background-color: #ad2; 
    font-size: 17px; 
    color: black;
    font-weight: 700;
  }
  .price-product {
    font-size: 22px; 
    color: white;
    font-weight: 700;
  }
  .container-controls-to-add {
    padding-top: 20px;
  }
  .container-controls {
    position: fixed;
    position: fixed;
    bottom: 0px;
    padding-bottom: 20px;
    background-color: #3e3e3e;
  }
</style>

<div class="col-xs-12 container-controls"> 
  <div class="container-controls-to-add">
    <div class="col-xs-5" style="text-align: center; padding-top: 10px;">
      <span class="price-product">$200</span>
    </div>
    <div class="col-xs-7">
      <button class="btn btn-primary btn-add" onclick="config()">ordenar</button>
    </div>
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

  body {
    min-height: 100vh;
    background-color: #363530;
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
		width: 55px;
	}
	.row-ingredient {
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
	
	.control-amount {
		    padding: 8px!important;
		    padding-bottom: -6px;
		    font-weight: bolder;
		    background-color: #bebebe;
		    border-radius: 30px;
		    height: 28px;
        width: 28px; 
        border-radius: 50%; 
		    line-height: 1px;
	}
</style>

  <!-- cargar --> 
   <div id="overlay">
    <div class="cv-spinner">
      <span class="spinner"></span>
    </div>
  </div>
  <!-- // cargar -->  

  <style type="text/css">
  #overlay{ 
  position: fixed;
  top: 0;
  z-index: 99999;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}

.cant-guarnicion { font-size: 17px; }
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
        	
        @foreach( $ingredients as $k => $i )
          <div class="row row-ingredient">
        		<div class="col-xs-7">
              <p></p>
        			<p class="name-ingredient">{{$i->name}} </p>
        			<p class="price-ingredient" id="ing-{{$i->idingredients}}">SI</p> 
        		</div>
        		<div class="col-xs-5 np">
        			<div class="col-xs-9 np" style="text-align: right; padding: 5px 5px!important;">
        				<img style="border-radius: 7px;" src="{{$i->img}}"> 
        			</div>
        			<div class="col-xs-3 np">
        				<button class="btn control-amount control-ingredient pull-right" ing="{{$i->idingredients}}">+</button>
        				<button class="btn control-amount control-ingredient pull-right" ing="{{$i->idingredients}}" style="margin-top: 10px;">-</button>
        			</div>
        		</div>
        	</div>
        @endforeach 
        </div>
        
        <p>Agregar guarniciones</p>
        <div class="col-xs-12 list-ingredents" style="display: flow-root; margin-bottom: 20px;">
          @foreach( $guarnicions as $k => $i )
              <div class="row row-ingredient">
            <div class="col-xs-7">
              <p></p>
              <p class="name-ingredient">{{$i->name}} </p>
              <p class="pull-left price-ingredient">${{$i->price}}</p> 
            </div>
            <div class="col-xs-5 np">
              <div class="col-xs-9 np" style="text-align: right; padding: 5px 5px!important;">
                <span class="cant-guarnicion" id="guar-{{$i->idguarnicion}}">1</span>
                <img style="border-radius: 7px;" src="{{$i->img}}"> 
              </div>
              <div class="col-xs-3 np">
                <button class="btn control-amount control-guarnicion pull-right" guar="{{$i->idguarnicion}}">+</button>
                <button class="btn control-amount control-guarnicion pull-right" guar="{{$i->idguarnicion}}" style="margin-top: 10px;">-</button>
              </div>
            </div>
          </div>
          @endforeach 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary btn-style-1" onclick="addToCart()">añadir</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  
  $('.control-guarnicion').click( function( event ) {
    let control = $(event.target ).text().trim(); 
    let ing = $(event.target ).attr('guar'); 
    let cant = $('#guar-'+ing).html(); 
    cant = parseInt(cant); 
    if( control == '+' ) {
      cant++; 
      $('#guar-'+ing).html(cant); 
    } else {
      let ing = $(event.target ).attr('guar'); 
      if( cant > 0 ) {
        cant--; 
        $('#guar-'+ing).html(cant); 
      }
    }
  }); 

  $('.control-ingredient').click( function( event ) {
    let control = $(event.target ).text().trim(); 
    if( control == '+' ) {
      let ing = $(event.target ).attr('ing'); 
      $('#ing-'+ing).html("SÍ"); 
    } else {
      let ing = $(event.target ).attr('ing'); 
      $('#ing-'+ing).html("NO"); 
    }
  }); 

  let cant = 1; 
  function updateCant( res ) {
    cant = parseInt( $('.control-main-cant').html() ); 
    if( res == '-') {
      if( cant > 1 ) {
        cant--;
        $('.control-main-cant').html(cant);   
      }
    } else {
        cant++;
        $('.control-main-cant').html(cant);   
    }
  }

  function addToCart() {
    $("#overlay").fadeIn(); 
    $.ajax({
      'url' : '{{asset("addToCart")}}', 
      'method' : 'post', 
      'data' : { 
        'type' : 'dish', 
        'cant' : cant, 
        'id' : '{{$id}}' 
      }, 
      'success' : function( resp ) {
        $("#overlay").fadeOut();  
      }
    }); 
  }
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