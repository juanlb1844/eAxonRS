@extends('admin.layout') 

@section('page')

<link rel="stylesheet" href="{{asset('caleandar-master/css/demo.css')}}"/>
<link rel="stylesheet" href="{{asset('caleandar-master/css/theme1.css')}}"/>    
<script type="text/javascript" src="{{asset('caleandar-master/js/caleandar.js')}}"></script>
  
<style type="text/css">
    .invisible { display: none; }
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
    #container-qr-2 img { display: inline-block!important; }

    .prev-img-guest-def { 
        background-image: url('{{asset('media-admin/user-default.png')}}'); 
        padding-top: 5px;
        background-color: black;
        background-image: url(https://static.vecteezy.com/system/resources/thumbnails/004/515/057/small/watercolor-texture-background-free-vector.jpg);
        background-size: cover;
     }
    .prev-img-guest { 
        display: inline-block;
        width: 45px; 
        height: 45px; 
        border-radius: 50%; 
        background-color: black; 
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
     }
     .guest-initials {
        font-size: 32px; color: gray;font-weight: 900;
    }
    .prev-img-guest-def {
        padding-top: 0px;
    }
</style>
 
    <div class="col-lg-12 col-sm-12 np"> 

        <div class="col-lg-9 col-md-8 col-sm-8 np">
         
         <div class="col-lg-12 pd1" style="padding-bottom: 0px;">
            <span class="title-page">CLIENTES</span>
            <span class="description-page">Registra a tus clientes y obtendrás el código QR para que lo escanee y pueda acceder 
                                                <br> a la plataforma para poder comunicarse contigo. </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
 
        <div class="col-lg-12">

            <style type="text/css">
            .header-page {
                border-bottom: 0px solid #EDEDED; 
                margin-bottom: 0px;
                margin-top: 0px;
            }
            .header-page .filters-cat { padding-left: 0px; }
            .header-page .filters-cat li {
                display: inline-block;
                margin-right: 15px; 
                font-size: 17px;
                padding-bottom: 0px;
            }
            .header-page .filters-cat li:hover { 
                cursor: pointer;
                font-weight: 500;
            }
            .filter-selected {
                /*border-bottom: 4px solid #46b04a;*/ 
                color: #61e466;
                font-weight: 500;
            }

            .list-data thead th { text-align: center; }
            .list-data thead th:first-child {
                border-top-left-radius: 7px; 
            }
            .list-data thead th:last-child {
                border-top-right-radius: 7px; 
            }
            .list-data tbody tr:last-child td:first-child {
                border-bottom-left-radius: 7px; 
            }
            .list-data tbody tr:last-child td:last-child {
                border-bottom-right-radius: 7px; 
            }
            .list-data tbody td { vertical-align: middle!important; text-align: center;}
            .list-data tbody td:first-child { text-align: left;}

            .list-data .type-guest {
                background-color: #f44336;
                border-radius: 12px;
                padding: 2px 10px;
                color: white;
                border: 1px solid #2a2a2a;
            }

            .room-selected {
                border-radius: 10px;
                background-color: #607d8b;
                padding: 2px 10px;
                display: inline-block;
                margin-left: 10px;
                margin-top: 5px;
            }
            table .sorting_desc, table .sorting_asc, table .sorting { vertical-align: middle!important; }
            .room-selected .action-room { 
                color: black;
                text-decoration: underline;
            }
            .btn-show, .btn-edit-client { margin-top: 5px; font-weight: 700; color: black; }
            .btn-edit-client img { width: 20px; }
        </style>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <div class="col-lg-12">
        <a href="{{asset('')}}">
            <button class="btn btn-primary pull-right create-btn" style="background-image: url('{{asset('/media-admin/plus-2.svg')}}')"> registrar una entrada <span class="f-size-4"></span></button>
        </a>
    </div>

         <div class="col-lg-12 header-page np">
             <ul class="filters-cat">
                 <li class="filter-selected">Reservaciones</li>
                    <li idcat="$categorie->idcategories_menu">Registrados hoy</li>
                    <li idcat="$categorie->idcategories_menu">Todos</li>
                  <!-- <ul class="pull-right">Organizar por: <select class="form-control"><option>nombre</option></select> </ul> --> 
             </ul>
         </div>

            <table class="table table-hover table-bordered list-data">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>
                        <th>HABITACIONES</th>
                        <th>TIPO DE CLIENE</th>
                        <th>ALERGIAS</th>
                        <th>IMG</th>
                        <!-- <th>ACCIÓN</th> -->
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $idlast = 0; 
                        if( count($guests) > 0 )
                            $idlast = $guests[count($guests)-1]->idguest; 
                    @endphp 
                    @foreach( $guests as $key => $guest )
                         
                    @if( $guest->url ) 
                        <tr onclick="showDetails('{{$guest->idguest}}', '{{$guest->url}}')">
                    @else 
                        <tr onclick="showDetails('{{$guest->idguest}}', '{{asset('media-admin/user-default.png')}}')">
                    @endif 
                        <td>
                            <span>
                                {{$guest->name}}
                                @php 
                                    $in = explode(" ", $guest->name); 

                                    if( count($in) > 1 ) {
                                        $in = substr($in[0], 0, 1).substr($in[1], 0, 1);
                                    } else {
                                        $in = substr($in[0], 0, 1);
                                    }
                                @endphp 
                            </span>
                        </td>
                        <td>
                            <span>
                                {{$guest->phone}}
                            </span>
                        </td>
                        <td>
                            <span class="type-guest" style="background-color: {{$guest->flag}}">{{$guest->title}}</span>
                        </td>
                        <td>
                            @foreach($guest->rooms as $room )
                                <span class="room-selected">{{$room->title}} <span class="action-room">ver</span></span>
                            @endforeach 
                        </td>
                        <td>
                            <span>{{$guest->notes}}</span>
                        </td> 
                        <td>
                            <div style="text-align: center;">
                                @if( strlen($guest->url) > 10 ) 
                                    <span class="prev-img-guest" style="background-image: url({{$guest->url}}); background-size: cover;"></span>
                                @else 
                                    <span class="prev-img-guest prev-img-guest-def">
                                        <span class="guest-initials">{{$in}}</span>
                                    </span>
                                @endif 
                            </div>
                        </td>
                        <!-- <td>
                            <!-- <button class="btn btn-show" onclick="show('{{$guest->hash}}')">QR</button> -->
                            <!-- 
                            <a href="{{asset('editGuest')}}/{{$guest->idguest}}">
                                <button class="btn btn-edit-client">
                                    <img src="{{asset('media-admin/edit.svg')}}">
                                </button>
                            </a> --> 
                        </td>  
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>

    </div>

    <style type="text/css">
        .title-sidebar-inf {
            font-size: 22px; 
            font-weight: 900;
        }
        .main-info-sidebar-inf { 
            text-align: center; 
            padding-top: 10px; 
            border-bottom: 1px solid #2f2f2f; 
            padding-bottom: 10px; 
        }
        .img-inf-guest {
            display: inline-block;
            width: 90px;
            height: 90px; 
            background-color: #2f2f2f; 
            border-radius: 50%; 
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }



        .icon-info {
            width: 35px;
        }
        .body-sidebar-inf {
            padding-top: 20px;
        }


        .history-container {
            padding: 10px 15px;
            border-radius: 12px;
        }
        .row-history {
            margin-bottom: 15px;
            background-color: #383838; 
            border-radius: 12px;
        }
        .name-info-side { font-size: 17px; }
        .sidebar-information {
            padding-top: 20px; 
        }


        .content-aside-block {
            background-color: #404040;; 
            border-radius: 7px; 
            padding: 10px 10px!important;
            margin-top: 40px;
        }
        .text-aside-content {
            text-align: left;
            padding-top: 20px!important;
        }
        .aside-title {
            font-size: 22px; 
            font-weight: bolder; 
            line-height: 20px;
        }
        .ago-registered {
            font-size: 12px; 
            display: block;
        }
        .block-sidebar-fast {
            margin-bottom: 10px;
            margin-top: 20px; 
        }
    </style>

    <div class="col-lg-3 col-md-4 col-sm-4 np sidebar-content invisible">
        <div class="sidebar-information">
            <div class="content-sidebar-inf">
                <div class="header-sidebar-inf">
                    <div class="col-lg-12 np">
                        <div class="col-lg-6 np">
                            <span class="title-sidebar-inf">PERFIL</span>
                        </div>
                        <div class="col-lg-6 np" style="text-align: right;">
                            <a href="" class="btn-editt-client-href">
                                <button class="btn btn-edit-client">
                                    <img src="{{asset('media-admin/edit.svg')}}">
                                </button>
                            </a>
                                <button class="btn btn-show show-qr" data-url="xx" onclick="show('')">QR</button>
                            <a href="" class="btn-edit-client-href">
                                <button class="btn btn-edit-client">
                                    <img src="{{asset('media-admin/append.svg')}}">
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="main-info-sidebar-inf col-lg-12 np">
                    <div class="col-lg-12 np">
                        <div class="content-aside-block col-lg-12 np">
                            <div class="col-lg-8 np"> 
                                <div class="col-lg-4 np">
                                    <span class="img-inf-guest">
                                </div>
                                <div class="col-lg-8">
                                    <div class="col-lg-12 np text-aside-content">
                                        <span class="aside-title name-info-side">...</span>
                                        <span class="ago-registered">********</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" style="text-align: right;">
                                 <div id="container-qr-2" style="text-align: right;"></div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 block-sidebar-fast">
                        <div class="col-lg-4">
                            <img class="icon-info" src="{{asset('media-admin/flag-simple.svg')}}">
                            <p class="notes-info-side">**</p>
                        </div>
                        <div class="col-lg-4">
                            <img class="icon-info side-flag" src="{{asset('media-admin/canada-flag.svg')}}">
                            <p class="country-info-side">**</p>
                        </div>
                        <div class="col-lg-4">
                            <img class="icon-info" src="{{asset('media-admin/root-keys.svg')}}">
                            <p class="room-info-side">**</p>
                        </div>
                    </div>
                </div>
                <div class="body-sidebar-inf col-lg-12">
                     <!-- <p>Tipo de cliente</p>
                     <p>ORO</p> --> 
                </div>

                <style type="text/css">
                    .table-calendar th {
                        width: 40px;
                        height: 40px;
                        text-align: center;
                    } 
                    .table-calendar td {
                        width: 40px; 
                        height: 40px; 
                        text-align: center;
                    }
                    .container-eaxon-calendar { text-align: center; }
                    .table-calendar {
                        border: 1px solid #171717;
                        display: inline-block;
                    }
                    .table-calendar th {
                        background-color: transparent;
                        border: 0px!important; 
                    }
                    .today-calendar {
                        background-color: #2568ef;
                        /* border: 1px solid #2568ef; */
                        color: white;
                        border-radius: 4px;
                        font-size: 20px;
                    }
                    .date-from-side, .date-to-side {
                        font-size: 16px;
                        padding: 4px;
                        background-color: #404040;
                        border-radius: 7px;
                    }
                    #caleandar { display: inline-block; padding-top: 20px; }
                    .cld-datetime {
                        margin-bottom: 20px; 
                        font-weight: bolder; 
                        font-size: 17px; 
                    }
                </style>

                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div style="text-align: center;">
                            <p class="date-from-side">** ** **</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div style="text-align: center;">
                            <p class="date-to-side">** ** **</p>
                        </div>
                    </div> 
                    <div class="container-eaxon-calendar col-lg-12 np">
                        <div id="caleandar"></div>
                    </div>
                </div>

                <div class="col-lg-12" style="display: none;">
                    <div class="history-container col-lg-12">
                        <div class="row-history col-lg-12">
                            <div class="header-history">
                                <h4>COMIDA</h4>
                            </div>
                            <div class="body-history-row col-lg-12">
                                <div class="col-lg-12 np">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
 
<style type="text/css">
    .close {
        color: white!important;
        font-size: 38px;
        text-shadow: none;
        position: inherit;
    }
</style>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-radius: 22px;">
      <div class="modal-header" style="border-bottom: 1px solid #2f2f2f!important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size: 25px;">Accede a tu APP desde este QR</h4>
      </div>
      <div class="modal-body" style="display: inline-block;">
        <div class="col-lg-12 np">
            <div class="col-lg-6">
                <div style="padding-top: 20px;">
                  <img style="width: 380px;" src="{{asset('media-admin/app_1.svg')}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div id="container-qr" style="text-align: center;">
                </div>
            </div>
            
        </div>
        <div class="col-lg-12 np">
            <div style="text-align: center; padding-top: 20px;">
                <a target="_blank" id="url-link" style="font-size: 20px;"></a>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="border-top: 1px solid #2f2f2f!important;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="{{asset('caleandar-master/js/demo.js')}}"></script>

<script type="text/javascript">
      
      showDetails({{$idlast}}); 

      table = $('.table').DataTable({  
                          columns : [ 
                                      { title : 'NOMBRE'}, 
                                      { title : 'TELÉFONO'}, 
                                      { title : 'TIPO DE CLIENE'}, 
                                      { title : 'HABITACIÓN'},
                                      { title : 'ALERGIAS'}, 
                                      { title : 'IMG'}, 
                                      /*{ title : "ACCIÓN"}*/ ], 
                                      
                        "language" :  { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},  
                        destroy: true, 
                         //"order"    : [[ 0, "desc" ]], 
                        "initComplete": function() { 
                    } 
    });  

    // obtener strings para formato de fechas 
    function getNameDates(type, lan, num ) {
        var m_es_full = Array("en", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic"); 

        var d_es_full = Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"); 
        if(type == "month" && lan == "S") {
            return m_es_full[num]; 
        } 

        if(type == "day" && lan == "S") {
            return d_es_full[num]; 
        }
    }

    Date.prototype.addDays = function (days) {
        const date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    };
 
    function updateCalendar( year_from, month_from, day_from, year_to, month_to, day_to ) {
        $("#caleandar").html(""); 
        
        var events = [
          {'Date': new Date(year_from, month_from, day_from), 'Title': 'Check in'},
          {'Date': new Date(year_to, month_to, day_to), 'Title': 'Check out', 'Link': 'https://google.com'},
        ];  

        d_from = new Date(year_from, month_from, day_from); 
        d_to   = new Date(year_to, month_to, day_to); 
        while( (d_from < d_to) ) {
            d_from = d_from.addDays(1); 
            //console.log("--------------");
            events.push({'Date': new Date(d_from.getFullYear(), d_from.getUTCMonth(), d_from.getDate()), 'Title': ''}); 
            //console.log("--------------"); 
        }

        var settings = {};
        var element = document.getElementById('caleandar');
        caleandar(element, events, settings);
    }

    let d = null; 
    function showDetails(id) {
        let hr = window.location.href; 
        hr     = hr.replace('list',''); 
        $('.sidebar-content').removeClass('invisible'); 
        $('.btn-edit-client-href').attr('href', hr+"?id="+id); 
        $('.btn-editt-client-href').attr('href', hr+"editGuest/"+id); 
        
        $.ajax({
            'url' : '{{asset('getGuestDetails')}}', 
            'data' : {
                'id' : id 
            }, 
            'method' : 'post', 
            'success' : function function_name(resp) {
                resp = JSON.parse(resp); 

                $(".show-qr").attr("data-url", resp.hash);

                $('#container-qr-2').html(''); 
                var qrcode = new QRCode(document.getElementById("container-qr-2"), { 
                    text: resp.hash, 
                    width: 100,
                    height: 100,
                    colorDark : "#000000",
                    colorLight : "#ffffff",
                    correctLevel : QRCode.CorrectLevel.H
                });

                console.log(resp); 

                var rooms_perfil = ""; 
                resp.rooms.forEach( function(a, b) {
                    rooms_perfil += "<span class='room-pefil'>"+a.title+"</span>"; 
                }); 

                $('.room-info-side').html(rooms_perfil); 

                var from_date_f = new Date(resp.from_date); 
                console.log(from_date_f); 

                var dia_mes = from_date_f.getDate(); 
                    
                d = from_date_f; 

                var date_from_f = getNameDates("day", "S", from_date_f.getDay()) +" "+ dia_mes+" "+getNameDates("month", "S", from_date_f.getUTCMonth());  
                 
                $('.date-from-side').html(date_from_f); 
 
                var from_date_t = new Date(resp.to_date); 
                
                updateCalendar(from_date_f.getFullYear(), from_date_f.getUTCMonth(), dia_mes, from_date_t.getFullYear(), from_date_t.getUTCMonth(), from_date_t.getDate() ); 

                console.log(from_date_t); 
                
                var dia_mes = from_date_t.getDate(); 
                var from_date_t = getNameDates("day", "S", from_date_t.getDay())+ " "+ dia_mes +" "+ getNameDates("month", "S", from_date_t.getUTCMonth()); 


                $('.date-to-side').html(from_date_t);  


                $('.room-info-side').html(resp.room);  

                var country = resp.nationality; 
                $('.country-info-side').html(country); 
                if( country == 'EU') {
                    $('.side-flag').attr("src", "{{asset("media-admin/usa-flag.svg")}}"); 
                } else if( country == 'CA') {
                    $('.side-flag').attr("src", "{{asset("media-admin/canada-flag.svg")}}"); 
                } else if( country == 'MX') {
                    $('.side-flag').attr("src", "{{asset("media-admin/mex-flag.svg")}}"); 
                } 

                if( resp.notes.length > 2 ) {
                    $('.notes-info-side').html(resp.notes); 
                } else {
                    $('.notes-info-side').html("sin alergias"); 
                }

                if( resp.url.length > 2 ) {
                    $('.img-inf-guest').css('background-image', 'url('+resp.url+')');  
                } else {
                    $('.img-inf-guest').css('background-image', 'url("media-admin/user-default.png")'); 
                } 

                $('.name-info-side').html(resp.name);  
            } 
        });  
    }

    function show( hash ) {
        hash = $(".show-qr").attr("data-url"); 
        $('#container-qr').html('');  
        $('#myModal').modal('toggle'); 
        let url = "{{asset('client')}}/";  
        $('#url-link').html(url+hash); 
        $('#url-link').attr("href", url+hash); 
         var qrcode = new QRCode(document.getElementById("container-qr"), { 
            text: url+hash, 
            width: 270,
            height: 270,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

    }
</script>

 

 @endsection