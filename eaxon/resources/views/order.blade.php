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
    min-height: 15vh; 
    padding-top: 20px; 
  }
  .gallery-entiti .gallery-element {
    width: 100%;
    border-radius: 12px; 
    height: 350px; 
    background-position: center;
    background-size: cover;
  }

  .btn-style-1 {
    border-radius: 12px;
    font-weight: 600;
    padding: 5px 20px; 
  } 
</style>

<style type="text/css">
  .text {
  font-size:20px;
  font-family:helvetica;
  font-weight:bold;
  color:#71d90b;
  text-transform:uppercase;
}
.parpadea {
  
  animation-name: parpadeo;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;

  -webkit-animation-name:parpadeo;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo{  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
   100% { opacity: 1.0; }
}

@keyframes parpadeo {  
  0% { opacity: 1.0; }
   50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}
</style>

<div class="col-xs-12" style="background-color: #363530; color: white!important; min-height: 100vh; padding-top: 5vh;">
    <div class="col-xs-12" style="text-align: center;">
      <span style="font-size: 27px; font-weight: bolder;">estamos haciéndonos cargo de tu pedido..</span>
      <h1></h1>
    </div>
    <div class="col-lg-12 col-xs-12">
      <div class="gallery-entiti">
        <img src="{{asset('theme_client/cooking.svg')}}" style="width: 100%">
      </div>
    </div>
  

  <style type="text/css">
    .status-order { padding: 0px; }
    .status-order li{
      display: inline-block;
      width: 33%;
    }
    .step {
      display: inline-block;
      width: 20px; 
      height: 20px; 
      border-radius: 50%;
      background-color: #0daca2; 
      background-image: url('{{asset('theme_client/check.svg')}}'); 
      background-repeat: no-repeat;
      background-position: center;
    }
    .step-to {
      display: inline-block;
      width: 20px; 
      height: 20px; 
      border-radius: 50%;
      background-color: black; 
      background-repeat: no-repeat;
      background-position: center;
      text-align: center;
    }
  </style>

  <div class="col-xs-12">
    <h1>&nbsp;</h1>
  </div>
  <div class="col-xs-12 np">
    <div class="col-xs-4 np">
      <p><span class="step">&nbsp;</span> orden recibida</p>
    </div>
    <div class="col-xs-4 np" style="text-align: center;">
      <p><span class="step-to">2</span> preparando</p>
    </div>
    <div class="col-xs-4 np">
      <p><span class="step-to">3</span> en camino</p>
    </div>
  </div>

 <!-- 
  <ul class="status-order">
     <li><span class="parpadea text"><strong>PEDIDO RECIBIDO</strong></li> 
    <li><span>*</span>orden recivida</li>
    <li>preparando</li>
    <li>en camino</li>
  </ul> --> 
      
</div>


  
 
@endsection 