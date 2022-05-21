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
        background-image: url('{{asset('media-admin/user-default.png')}}')
     }
    .prev-img-guest { 
        display: inline-block;
        width: 90px; 
        height: 90px; 
        border-radius: 12px; 
        background-color: black; 
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
     }
</style>
 
    <div class="col-lg-12 col-sm-12"> 
         <div class="col-lg-12 pd1">
            <span class="title-page">CLIENTES</span>
            <span class="description-page">Registra a tus clientes y obtendrás el código QR para que lo escanee y pueda acceder 
                                                <br> a la plataforma para poder comunicarse contigo. </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Tipo de cliente</th>
                    <th>Habitación</th>
                    <th>Alergias</th>
                    <th>IMG</th>
                    <th>VER</th>
                    <th>EDITAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $guests as $guest )
                <tr>
                    <td>
                        <span>
                            {{$guest->name}}
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
                                <span class="prev-img-guest prev-img-guest-def"></span>
                            @endif 
                        </div>
                    </td>
                    <td>
                        <button class="btn" onclick="show('{{$guest->hash}}')">VER</button>
                    </td>  
                    <td>
                        <a href="{{asset('editGuest')}}/{{$guest->idguest}}">
                            <button class="btn btn-primary">editar</button>
                        </a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
         <div class="col-lg-12 pd1">
            <a href="{{asset('')}}">
                <button class="btn btn-primary" onclick="">nuevo</button>
            </a>
        </div>
    </div>
 

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-radius: 22px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:black; font-size: 25px;">Accede a tu APP desde este QR</h4>
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
                <a target="_blank" id="url-link" style="color:black; font-size: 20px;"></a>
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
            colorDark : "#5868bf",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    }
</script>

 

 @endsection