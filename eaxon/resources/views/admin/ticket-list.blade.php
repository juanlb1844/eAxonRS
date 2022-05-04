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
        border: 10px solid #caa200;
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
        font-size: 25px; 
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

</style>
 
    <div class="col-lg-12 col-sm-12"> 
        <div class="col-lg-12 pd1">
            <h1>Lista de tickets</h1>
            <h2></h2>
        <div class="col-lg-12">

          @foreach( $tickets as $key => $t )
            <div class="col-lg-3 cotainer-ticket-item client-gold">
               <div class="content-ticket">
                   <p><span class="name-field-ticket">Hora: </span> {{ $t->hora_de_peticion }} </p>
                   <p><span class="name-field-ticket">Cliente: </span> {{$t->id_client }} </p>
                   <p><span class="name-field-ticket">TIPO: </span> RESTAURANTE</p>
                   <div class="img-back" style="background-image: url('{{$t->img}}')">
                       
                   </div>
               </div>
           </div>
          @endforeach 

          <!-- 
           <div class="col-lg-3 cotainer-ticket-item client-gold">
               <div class="content-ticket">
                   <p><span class="name-field-ticket">Cliente: </span> Ruben Estrada</p>
                   <p><span class="name-field-ticket">Habitación: </span> 122 B</p>
                   <p><span class="name-field-ticket">TIPO: </span> RESTAURANTE</p>
                   <p><span class="name-field-ticket">HACE: </span> 21 minutos</p>
                   <div class="img-back">
                       
                   </div>
               </div>
           </div>
           <div class="col-lg-3 cotainer-ticket-item client-premium">
               <div class="content-ticket">
                   <p><span class="name-field-ticket">Cliente: </span> Ruben Estrada</p>
                   <p><span class="name-field-ticket">Habitación: </span> 122 B</p>
                   <p><span class="name-field-ticket">TIPO: </span> RESTAURANTE</p>
                   <p><span class="name-field-ticket">HACE: </span> 27 minutos</p>
                   <div class="img-back img-h">
                       
                   </div>
               </div>
           </div> --> 
        </div>
    </div>
 

<script type="text/javascript">
    
</script>

 

 @endsection