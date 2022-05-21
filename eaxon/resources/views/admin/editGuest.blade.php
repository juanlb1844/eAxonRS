@extends('admin.layout') 

@section('page')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"/>


<style type="text/css">
  .element-gallery {
    height: 170px; 
    width: auto;
    background-size: cover;
    background-repeat: no-repeat;
  }
  /* CUSTOM DROPZONE */ 
  .dz-message {
    margin: 1em 0px!important;
  }
  /* CUSTOM DROPZONE */ 
  .dropzone { border: 2px dotted red; height: 170px; width: 100%; padding: 0px!important; display: inline-block; margin-top: 20px; 
              background-color: transparent; margin-bottom: 20px; font-size: 20px; }
  .dropzone:hover { border: 4px solid #60d192; }

  .delete-img {
    background-image: url('{{asset('media-admin/trash.svg')}}')!important; 
    background-repeat: no-repeat;
    opacity: .7;
    margin-top: 2px!important; 
  }
  .status-photo {
    transform: scale(2);
    margin-top: 10px!important; 
    opacity: .6;
  }
  .content-prev-image {
    padding-top: 10px; 
    margin-bottom: 20px; 
  }
  .prev-image {
    display: inline-block; 
    width: 350px; 
    height: 300px; 
    border-radius: 12px; 
    background-color: black; 
    background-position: center;
    background-size: cover;
    background-image: url('{{asset('media-admin/user-default.png')}}');
  }
</style>
  
        <div class="col-lg-12 pd1">
            <h1>Check in</h1>
        </div>
         <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Hoteles</p>
            <select field="data" id="hotel" name-field="hotel_idhotel" type-field="input" class="form-control">
                @foreach( $hotels as $hotel ) 
                    <option value="{{$hotel->idhotel}}">{{$hotel->name}}</option> 
                @endforeach 
            </select> 
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Nombre de huesped</p>
            <input value="{{$guest->name}}" class="form-control" id="checkin-name" placeholder="nombre" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Cel</p>
            <input value="{{$guest->phone}}" class="form-control" id="checkin-phone" placeholder="teléfono" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Nacionalidad</p>
            <select id="nationality" class="form-control">
                <option value="EU">EU</option>
                <option value="CA">CA</option>
                <option value="MX">MX</option> 
            </select>
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Llegada</p>
            <input class="form-control" type="date" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Salida</p>
            <input class="form-control" type="date" name="">
        </div>
        <div class="col-lg-2 col-md-4 col-12 pd1">
            <p>Habitación</p>
            <input value="{{$guest->room}}" class="form-control" id="checkin-room" placeholder="habitación" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Tipo de cliente</p>
            <select class="form-control" id="idguest_types">
                @foreach( $client_types as $k => $type )
                    <option value="{{$type->idguest_types}}" value="{{$type->idguest_types}}">{{$type->title}}</option>
                @endforeach  
            </select>
        </div>
         <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Condición médica</p>
            <select class="form-control">
                <option value="1">al 100</option>
                <option value="1">enfermo</option>
            </select>
        </div>
        <div class="col-lg-12 col-md-4 col-12 pd1">
            <p>Alergias</p>
            <textarea class="form-control" id="alergias" placeholder="alergias" type="text" name="">{{$guest->notes}}</textarea>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-3">
            <div class="content-prev-image">
                @if( strlen( $guest->url ) > 10 )
                    <div class="prev-image" style="background-image: url('{{$guest->url}}')"></div>
                @else 
                    <div class="prev-image"></div>
                @endif 
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-9">
            <div class="dropzone col-lg-12" id="dropzone-1"></div> 
        </div>
 
        <div id="qrcode-2"></div>
        <div class="col-lg-12 pd1">
            <button class="btn btn-primary" onclick="save()">guardar</button>
        </div>
 
 

<script type="text/javascript">

    Dropzone.autoDiscover = false;

    let url_image = ""; 

    window.onload = function() {
     // upload file  
        myDropzone = new Dropzone("#dropzone-1", {
            url: "{{asset('uploadPhotoGuest')}}",
            paramName: "file", 
            dictDefaultMessage:'<span id="drop-mge">Arrastra o haz click para cargar las imágenes</span>',
            maxFilesize: 2,
            maxFiles: 1,
            acceptedFiles: "image/*",
            autoProcessQueue: true, 
            init: function() {
              this.on("addedfile", function(file) { 
                console.log("Se ha añadido una imágen"); 
            });
            },  
            sending:  function(file, xhr, formData){
              formData.append('idguest', {{$guest->idguest}}); 
            },      
            success: function( resp ) { 
                console.log(resp.xhr.responseText);
                let r = resp.xhr.responseText; 
                r = JSON.parse(r); 
                url_image = r.link; 
                $('.url_image').val(r.link); 
                $('.prev-image').css("background-image", "url("+r.link+")"); 
              } 
        });  
    }


    function save() {
        let checkinName = $('#checkin-name').val(); 
        let checkinPhone = $('#checkin-phone').val(); 
        let checkinRoom = $('#checkin-room').val(); 
        let checkinHotel = $('#hotel').val(); 
        let idguest_types = $('#idguest_types').val(); 
        let nationality   = $('#nationality').val(); 
        let alergias = $('#alergias').val(); 
        $.ajax({
            'url' : '{{asset("guest")}}', 
            'method' : 'post',  
            'data' : { 
                'name' : checkinName,  
                'phone' : checkinPhone, 
                'room' : checkinRoom, 
                'hotel' : checkinHotel, 
                'nationality' : nationality, 
                'idguest_types' : idguest_types, 
                'alergias' : alergias 
            }, 
            'success' : function(resp) {
                window.location.href = "{{asset('list')}}"; 
            } 
        }); 

        var qrcode = new QRCode(document.getElementById("qrcode-2"), { 
            text: checkinName, 
            width: 128,
            height: 128,
            colorDark : "#5868bf",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    }
</script>

 @endsection