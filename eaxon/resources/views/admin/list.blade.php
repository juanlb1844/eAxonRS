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
        width: 90px; 
        height: 90px; 
        border-radius: 50%; 
        background-color: black; 
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
     }
     .guest-initials {
        font-size: 37px;color: gray;font-weight: 900;
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
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>
                        <th>TIPO DE CLIENE</th>
                        <th>HABITACIÓN</th>
                        <th>ALERGIAS</th>
                        <th>IMG</th>
                        <th>***</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $guests as $guest )
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
                            <span>{{$guest->title}}</span>
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
         
         <div class="col-lg-12 pd1">
            <a href="{{asset('')}}">
                <button class="btn btn-primary" onclick="">nuevo</button>
            </a>
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
                        <p>John Doe</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                            <img class="icon-info" src="{{asset('media-admin/flag-simple.svg')}}">
                            <p>Almendras</p>
                        </div>
                        <div class="col-lg-4">
                            <img class="icon-info" src="{{asset('media-admin/canada-flag.svg')}}">
                            <p>Canada</p>
                        </div>
                        <div class="col-lg-4">
                            <img class="icon-info" src="{{asset('media-admin/root-keys.svg')}}">
                            <p>303</p>
                        </div>
                    </div>
                </div>
                <div class="body-sidebar-inf col-lg-12">
                     <p>Tipo de cliente</p>
                     <p>ORO</p>
                </div>
                <div class="col-lg-12">
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
                        <div class="row-history col-lg-12">
                            <div class="header-history">
                                <h4>LIMPIEZA</h4>
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

<script type="text/javascript">
    
    function showDetails(id, img) {
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