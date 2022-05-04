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
</style>
 
    <div class="col-lg-12 col-sm-12"> 
        <div class="col-lg-12 pd1">
            <h1>Lista de huéspedes</h1>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Tipo de cliente</th>
                    <th>Habitación</th>
                    <th>VER</th>
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
                        <button class="btn" onclick="show('{{$guest->hash}}')">VER</button>
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