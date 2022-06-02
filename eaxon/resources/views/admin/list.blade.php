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

    .prev-img-guest-def { 
        background-image: url('{{asset('media-admin/user-default.png')}}'); 
        padding-top: 20px;
        background-color: black;
        background-image: url(https://static.vecteezy.com/system/resources/thumbnails/004/515/057/small/watercolor-texture-background-free-vector.jpg);
        background-size: cover;
     }
    .prev-img-guest { 
        display: inline-block;
        width: 60px; 
        height: 60px; 
        border-radius: 50%; 
        background-color: black; 
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
     }
     .guest-initials {
        font-size: 37px; color: gray;font-weight: 900;
    }
    .prev-img-guest-def {
        padding-top: 5px;
    }

    
</style>
 
    <div class="col-lg-12 col-sm-12"> 

        <div class="col-lg-9">
         
         <div class="col-lg-12 pd1">
            <span class="title-page">CLIENTES</span>
            <span class="description-page">Registra a tus clientes y obtendrás el código QR para que lo escanee y pueda acceder 
                                                <br> a la plataforma para poder comunicarse contigo. </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
 
        <div class="col-lg-12">

            <style type="text/css">
            .header-page {
                border-bottom: 0px solid #EDEDED; 
                margin-bottom: 40px; 
                margin-bottom: 25px;
                margin-top: 40px;
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
                color: #000000;
                border: 1px solid #2a2a2a;
            }
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
                        <th>TIPO DE CLIENE</th>
                        <th>HABITACIÓN</th>
                        <th>ALERGIAS</th>
                        <th>IMG</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
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
                            <span class="type-guest">{{$guest->title}}</span>
                        </td>
                        <td>
                            <span>{{$guest->room}}</span>
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
                        <td>
                            <button class="btn" onclick="show('{{$guest->hash}}')">ver</button>
                            <a href="{{asset('editGuest')}}/{{$guest->idguest}}">
                                <button class="btn">editar</button>
                            </a>
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
        .main-info-sidebar-inf { text-align: center; padding-top: 10px; border-bottom: 1px solid #2f2f2f; padding-bottom: 10px; }
        .img-inf-guest {
            display: inline-block;
            width: 100px;
            height: 100px; 
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
    </style>

    <div class="col-lg-3">
        <div class="sidebar-information">
            <div class="content-sidebar-inf">
                <div class="header-sidebar-inf">
                    <span class="title-sidebar-inf">Perfil</span>
                </div>
                <div class="main-info-sidebar-inf col-lg-12">
                    <span class="img-inf-guest">
                        
                    </span>
                    <div class="col-lg-12">
                        <p class="name-info-side">John Doe</p>
                    </div>
                    <div class="col-lg-12">
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
                        <table class="table-calendar">
                            <thead>
                                <tr>
                                    <th>
                                        DO
                                    </th>
                                    <th>
                                        LO
                                    </th>
                                    <th>
                                        MA
                                    </th>
                                    <th>
                                        MI
                                    </th>
                                    <th>
                                        JU
                                    </th>
                                    <th>
                                        VI
                                    </th>
                                    <th>
                                        SA
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
                                    <td>1</td>
                                    <td class="today-calendar">2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>20</td>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>26</td>
                                    <td>27</td>
                                    <td>28</td>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>1</td>
                                    <td>2</td>
                                </tr>
                            </tbody>
                        </table>
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

<style type="text/css">
    table.dataTable tbody tr {
        background-color: #212228;
    }
    .table-bordered {
        border: 0px solid #ddd;
    }   
    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
        color: #b9b9b9!important;
        font-weight: 600;
    }
    .dataTables_length select {
        background-color: #212228;
        border-radius: 7px;
        margin: 0px 10px;
    }
    .dataTables_wrapper .dataTables_filter input {
        margin-left: 0.5em;
        background-color: #212228;
        border: 1px solid #545454;
        border-radius: 7px;
        height: 30px;
        padding: 10px;
    }
    table.dataTable.no-footer {
        border-bottom: 0px solid #111;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover { 
        background: linear-gradient(to bottom, #212228 0%, #212228 100%);
        border: 1px solid #2f2f2f;
    }
</style>

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
                                                      { title : "ACCIÓN"} ], 
                                        "language" :  { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},  
                                        destroy: true, 
                                         //"order"    : [[ 0, "desc" ]], 
                                        "initComplete": function() { 
                                    } 
                            }); 

    // obtener strings para formato de fechas 
    function getNameDates(type, lan, num ) {
        
        var m_es_full = Array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"); 

        var d_es_full = Array("lu", "mar", "miér", "jue", "vier", "sa", "do"); 
        if(type == "month" && lan == "S") {
            return m_es_full[num]; 
        }

        if(type == "day" && lan == "S") {
            return d_es_full[num-1]; 
        }

    }
    
    function showDetails(id) {
        $.ajax({
            'url' : '{{asset('getGuestDetails')}}', 
            'data' : {
                'id' : id 
            }, 
            'method' : 'post', 
            'success' : function function_name(resp) {
                resp = JSON.parse(resp); 
                console.log(resp); 

                var from_date_f = new Date(resp.from_date); 
                console.log(from_date_f); 


                var dia_mes = from_date_f.getDate(); 
                var date_from_f = getNameDates("month", "S", from_date_f.getUTCMonth()) + " "+ dia_mes +" "+ getNameDates("day", "S", from_date_f.getDay());  
                 
                $('.date-from-side').html(date_from_f); 
 
                var from_date_t = new Date(resp.to_date); 
                console.log(from_date_t); 
                
                var dia_mes = from_date_t.getDate(); 
                var from_date_t = getNameDates("month", "S", from_date_t.getUTCMonth()) + " "+ dia_mes +" "+ getNameDates("day", "S", from_date_t.getDay()); 

                alert(from_date_t.getDay()); 

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
                    $('.notes-info-side').html("NA"); 
                }

                if( resp.url.length > 2 ) {
                    $('.img-inf-guest').css('background-image', 'url('+resp.url+')');  
                } else {
                    $('.img-inf-guest').css('background-image', 'url("media-admin/user-default.png")'); 
                } 

                $('.name-info-side').html(resp.name);  
            } 
        });  
        $('.img-inf-guest').css('background-image', 'url("'+img+'")'); 
    }

    function show( hash ) {
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