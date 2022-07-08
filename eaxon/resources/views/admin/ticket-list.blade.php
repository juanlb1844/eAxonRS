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

        <style type="text/css">
          .container-ticket-row {
            height: 140px; 
            border: 1px solid gray;
            border-left: 7px solid #4caf50; 
            padding: 30px;
            margin-bottom: 20px;
          }
          .time-data {
            border-right: 1px solid gray;
          }
          .time-data .time-data-hour{
            font-size: 25px; 
            font-weight: 900; 
            padding-bottom: 10px;
          }
          .time-data .time-data-to {
            font-size: 18; 
            font-weight: 600; 
            color: gray; 
          }

          .user-avatar {
            display: inline-block;
            width: 60px; 
            height: 60px; 
            border-radius: 50%; 
            border: 1px solid gray;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url('https://a0.muscache.com/im/pictures/user/782a3840-f42e-4196-b246-b31d4cb7d6ff.jpg?im_w=240'); 
          }

          .user-avatar-def {
            background-image: url('https://static.vecteezy.com/system/resources/thumbnails/004/515/057/small/watercolor-texture-background-free-vector.jpg'); 
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            color: gray;
            font-size: 35px;
            font-weight: 600;
            padding-top: 5px; 
            text-align: center;
          }

          .info-user-container {
            padding-top: 0px; 
            text-align: center;
          }
          .name-user { display: block; font-weight: 400; font-size: 17px; }
          .header-type { text-align: center; }
          .type-ticket {
            font-size: 20px; 
            font-weight: 600;
          }
          .container-status { text-align: center; padding: 20px; }
          .container-status button { color: black!important; font-weight: 500; padding: 5px 10px; background-color: #ff5722; color: white!important; box-shadow: none; font-size: 15px }

          .info-ticket ul li { padding-top: 4px; font-size: 16px; color: #919191; font-weight: 600; }

          .update-ticket-status:hover { background-color: #d64a1d!important; }
          .update-ticket-status:focus { background-color: #d64a1d!important; }

          .status-atendiendo { background-color: #0e7def!important; } 
          .status-en-camino { background-color: #e91e63!important; }
          .status-recibido { background-color: #4caf50!important; }

          .status-atendiendo:hover{ background-color: #0e7def!important; } 
          .status-en-camino:hover{ background-color: #e91e63!important; }
          .status-recibido:hover{ background-color: #4caf50!important; }
 
          .status-atendiendo:selected{ background-color: #0e7def!important; } 
          .status-en-camino:selected{ background-color: #e91e63!important; }
          .status-recibido:selected{ background-color: #4caf50!important; }

          .status-atendiendo:active{ background-color: #0e7def!important; } 
          .status-en-camino:active{ background-color: #e91e63!important; }
          .status-recibido:active{ background-color: #4caf50!important; }

          .status-atendiendo:focus{ background-color: #0e7def!important; } 
          .status-en-camino:focus{ background-color: #e91e63!important; }
          .status-recibido:focus{ background-color: #4caf50!important; }
        </style>

          <style type="text/css">
            .header-page {
                border-bottom: 0px solid #EDEDED; 
                margin-bottom: 10px; 
            }
            .header-page .filters-cat { padding-left: 0px; }
            .header-page .filters-cat li {
                display: inline-block;
                margin-right: 15px; 
                font-size: 17px;
                padding-bottom: 10px;
            }
            .header-page .filters-cat li:hover {
                cursor: pointer;
                font-weight: 600;
            }
            .filter-selected {
                border-bottom: 4px solid #46b04a; 
            }
        </style>
 
         <div class="col-lg-8 header-page np">
             <ul class="filters-cat np">
                 <li class="filter-selected">Sin resolver</li>
                 <li>Atendiendo</li>
                 <li>En camino</li>
                 <li>Resueltos 2h atrás</li>
                 <ul class="pull-right">Organizar por: <select class="form-control"><option>tipo</option></select> </ul>
             </ul>
         </div>

        <div class="col-lg-8 rows-tickets">

           @foreach( $tickets as $key => $t )

           @php 
              date_default_timezone_set('America/Mexico_City'); 
   
              $from_time = date_diff ( new DateTime(($t->hora_de_peticion) ), ( new DateTime() ) )->format('%h Horas con %i minutos'); 
              $from_time_2 = date_diff ( new DateTime(($t->hora_de_peticion) ), ( new DateTime() ) )->format('%h Hora con %i minutos'); 
              $from_time_3 = date_diff ( new DateTime(($t->hora_de_peticion) ), ( new DateTime() ) )->format('%i minutos'); 
              $h_time = intVal( date_diff ( new DateTime(($t->hora_de_peticion) ), ( new DateTime() ) )->format('%h')); 
              $m_time = intVal( date_diff ( new DateTime(($t->hora_de_peticion) ), ( new DateTime() ) )->format('%i')); 

              $name_pref = "..";  
              
              $name_arr = ( explode(' ', $t->client[0]->name) ); 
              if( count($name_arr) > 1 ) {
                $name_pref = substr($name_arr[0], 0, 1)."".substr($name_arr[1], 0, 1); 
              } else {
                $name_pref = substr($name_arr[0], 0, 1); 
            } 
           @endphp
 
          <div class="container-ticket-row row" style="border-left: 7px solid {{$t->client[0]->flag}}" idticket="{{$t->idticket}}">
            <div class="contaner-ticket col-lg-12">
              <div class="col-lg-2 time-data">
                <div class="time-data-hour"><span>{{  date("h:m a", strtotime($t->hora_de_peticion) ) }}</span></div>
                <div class="time-data-to">
                  @if( $h_time > 1 )  
                    <span>{{ $from_time }}</span>
                  @elseif( $h_time == 1 ) 
                    <span>{{ $from_time_2 }}</span>
                  @else 
                    <span>{{ $from_time_3 }}</span>
                  @endif 
                </div>
              </div>
              <div class="col-lg-5 data-user-info">
                <div class="col-lg-7 np">
                  <div class="info-user-container">
                    <div class="info-user-content">

                      @if( strlen($t->client[0]->url) )
                        <span class="user-avatar" style="background-image: url({{$t->client[0]->url}})"></span>
                      @else 
                        <span class="user-avatar user-avatar-def">
                          <span>{{$name_pref}}</span>
                        </span>
                      @endif 

                      <span class="name-user">{{$t->client[0]->name}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 np">
                  <div class="info-ticket">
                    <ul style="padding-left: 5px;">
                      <li>Alergico: {{$t->client[0]->notes}}</li>
                      <li>Cliente: {{$t->client[0]->title}}</li>
                      <li>Lugar: Room</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="container-type">
                  <div class="header-type">
                    <span class="type-ticket">RESTAURANTE</span>
                  </div>
                  <div class="ticket-type-content">
                    <ul>
                      @foreach( json_decode( $t->json) as $d )
                        <li> @php print_r( $d->info->name ) @endphp </li>
                      @endforeach 
                      <li><a href="" class="details-ticket" id-ticket="{{$t->idticket}}" json="{{$t->json}}">detalles</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 np">
                <div class="container-status">
                  @if( $t->status == 'atender' ) 
                    <button class="btn btn-primary update-ticket-status" idticket="{{$t->idticket}}">{{$t->status}}</button>
                  @elseif( $t->status == 'atendiendo') 
                    <button class="btn btn-primary update-ticket-status status-atendiendo" idticket="{{$t->idticket}}">{{$t->status}}</button>
                  @elseif( $t->status == 'en camino')
                    <button class="btn btn-primary update-ticket-status status-en-camino" idticket="{{$t->idticket}}">{{$t->status}}</button>
                  @elseif( $t->status == 'recibido')
                    <button class="btn btn-primary update-ticket-status status-recibido" idticket="{{$t->idticket}}">{{$t->status}}</button>
                  @endif  
                </div>
              </div>
            </div> 
          </div>
          @endforeach 
           <h1>no hay tickets sin resolver</h1>
        </div>

        <!-- 
        <div class="col-lg-12" id="mode-1">
          @foreach( $tickets as $key => $t )
          @php 
            //print_r( $t->json )
          @endphp
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
        </div> --> 



    </div>

<style type="text/css">
  .details-title { font-size: 25px; font-weight: 700; }
  .body-details img {
    width: 100px;
  }
  .row-detail {
    border: 1px solid #262626;
    padding: 15px; 
    margin-bottom: 20px; 
  }
  .name-detail-dish {
    font-size: 22px; 
    font-weight: 600;
  }
  .cant-detail-dish {
    color: gray;
    font-size: 32px;
    font-weight: 900;
  }
  .name-sin { font-size: 17px; font-weight: 700; background-color: #4caf50; padding: 5px 10px; border-radius: 7px; margin-bottom: 10px; display: inline-block; }
  .name-ext { font-size: 17px; font-weight: 700; background-color: #ff5722; padding: 5px 10px; border-radius: 7px; margin-bottom: 10px; display: inline-block; }
  .row-ing, .row-guar { font-size: 17px; }
</style>

    <!-- Modal -->
<div id="detailsTicket" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content--> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalles del pedido ()</h4>
      </div>
      <div class="modal-body">
        <div calss="col-xs-12">
          <div class="content-modal">
            <div class="row">
              <div class="col-lg-12">
                <div class="header-details">
                  <span class="details-title">EL CLIENTE PIDIÓ</span>
                </div>
                <div class="body-details">
                  
                </div>
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

    $('.update-ticket-status').click( function( evet ) {
      let idticket = $(event.target).attr('idticket'); 
      btn = $(event.target); 
      let to = ""; 
      let actual = $(btn).text().trim(); 

      if( actual == 'atender' ) {
        to = "atendiendo"; 
      } else if( actual == 'atendiendo') {
        to = "en camino"; 
      } else if( actual == 'en camino') {
        to = "recibido"; 
      } else {
        return; 
      }

      $.ajax({ 
        'url' : '{{asset("updateStatusTicket")}}', 
        'method' : 'post',  
        'data' : {
          'idticket': idticket, 
          'changeto': to 
        }, 
        'success' : function( resp ) {
          console.log( resp );
          $(btn).text(resp); 
          $(btn).addClass("status-"+resp.replace(" ", "-"));  
        }
      });  
    }); 

    $('.details-ticket').click( function(event) {
      event.preventDefault();
      $('.body-details').html(""); 
      let ticket = $(event.target).attr('json'); 
      let details = JSON.parse(ticket); 
      details.forEach( function (a, b ) {
        //console.log( a );
        let name = a.info.name; 
        let image = a.image; 
        let cant = a.cant; 

        let in_guar = a.included_guarnicions; 
        let in_ingr = a.excluded_ingredients; 
        console.log(in_ingr); 
        let rows_g = ''; 
        if( in_guar ) {
           in_guar.forEach( function( c , d ) {
            let row_g = null; 
            row_g = "<div><span class='row-guar'>"+c.cant+"</span> <span>"+c.name+"</span></div>"; 
            rows_g += row_g; 
           }); 
        }

        let rows_i = '';   
        if( in_ingr ) {
          in_ingr.forEach( function( c , d ) {
            let row_i = null; 
            row_i = "<div class='row-ing'><span>"+c.name+"</span></div>"; 
            rows_i += row_i; 
          }); 
        }

        let row = "<div class='col-lg-12 row-detail'><div class='col-lg-4'><p class='name-detail-dish'>"+name+"</p> <img src='"+image+"'></img> <span class='cant-detail-dish'>"+cant+"</span></div><div class='col-lg-8'><div class='col-lg-6'><div><span class='name-sin'>SIN</span></div>"+rows_i+"<div></div></div><div class='col-lg-6'><div><span class='name-ext'>EXTRA</span></div>"+rows_g+"</div>";
        $('.body-details').append(row); 
      });   
      $('#detailsTicket').modal('toggle');
    }); 
</script>

 

 @endsection