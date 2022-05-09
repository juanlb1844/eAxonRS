@extends('admin.layout') 

@section('page')


<style type="text/css">
    td span {
        color: white; 
        font-size: 17px; 
    }
    td button {
        background-color: gray; 
        color: black;
        font-weight: bolder; 
    }
    th {
        background-color: black; 
    }
    #container-qr img { display: inline-block!important; }
    .cotainer-ticket-item {
        min-height: 250px; 
        border-radius: 7px; 
        margin-right: 10px;
    }
    .client-gold {
        border: 1px solid gray;
        border-top: 10px solid #caa200;
        background-color: #1b232a; 
    }
    .client-premium {
        border: 10px solid white;
    }
    .name-field-ticket {
        background-color: black;
        border-radius: 7px;
        margin-right: 10px;
        padding: 5px 10px;
    }
    .content-ticket {
        padding-top: 20px;
        font-size: 20px; 
        font-weight: bolder;
    }

    .img-back {
        display: inline-block;
        height: 200px; 
        border: 1px solid gray;
        width: 100%;
        /* background-image: url('https://media.timeout.com/images/105490616/750/562/image.jpg'); */ 
        background-position: center;
        background-size: cover;
    }

    .img-h {
        background-image: url('https://media-cdn.tripadvisor.com/media/photo-s/12/51/77/a2/intro-restaurant-plaza.jpg'); 
    }
    .btn-ticket {
      color: #5a5a5a;
      font-size: 17px;
      font-weight: bolder;
    }
</style>
 
    <div class="col-lg-12 col-sm-12"> 
       <div class="col-lg-12 pd1">
            <span class="title-page">LISTA DE TICKETS</span>
            <span class="description-page">
              Ten un panorama general del historial de peticiones, status actual y seguimiento del flujo de cada una.
            </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
        <div class="col-lg-12 pd1">
        <div class="col-lg-12">
          @foreach( $tickets as $key => $t )
            <div class="col-lg-3 cotainer-ticket-item client-gold">
               <div class="content-ticket">
                   <div class="header-flags col-xs-12 col-lg-12">
                    @if( strlen($t->client[0]->notes ) > 1 )
                      <img src="{{asset('media-admin/redflag.svg')}}" style="width: 30px;">
                      <span>Alergico: {{$t->client[0]->notes}}</span>
                    @else 
                      <img src="{{asset('media-admin/greenflag.svg')}}" style="width: 30px;">
                      <span>sin alergias</span>
                    @endif 
                     <p></p>
                   </div>
                   <p><span class="name-field-ticket">Hora: </span> {{ $t->hora_de_peticion }} </p>
                   <p><span class="name-field-ticket">Cliente: </span> @php print_r( $t->client[0]->name ) @endphp </p>
                   <p><span class="name-field-ticket">TIPO: </span> RESTAURANTE</p>
                   <div>
                     <button class="btn brn-primary btn-ticket">atender</button>
                     <p></p>
                   </div>
                   <div class="img-back" style="background-image: url('{{$t->img}}')">                       
                   </div>
               </div>
           </div>
          @endforeach 
 
        </div>
    </div>
 

<script type="text/javascript">
    
</script>

 

 @endsection