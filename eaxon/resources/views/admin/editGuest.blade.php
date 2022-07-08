@extends('admin.layout') 

@section('page')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"/>


<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.min.css">


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
  .dropzone {    border: 2px dashed; border-radius: 10px;
    border-color: #959595; width: 100%; padding: 0px!important; display: inline-block; margin-top: 20px; 
              background-color: transparent; margin-bottom: 0px; font-size: 20px; min-height: 100px; }
  .dropzone:hover { border: 2px dashed #218aff; background-color: #218aff21; }

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
    width: 100px; 
    height: 100px; 
    border-radius: 50%; 
    background-color: black; 
    background-position: center;
    background-size: cover;
    background-image: url('{{asset('media-admin/user-default.png')}}');
  }
</style>
  
    <div class="col-lg-12 pd1">
        <h1 style="font-weight: 900;">PERFIL DE CLIENTE</h1>
    </div>

    <div class="col-lg-9">
        <div class="col-lg-12 np">
            <div class="col-lg-3 col-md-4 col-12 pd1">
                <p>Hoteles</p>
                <select field="data" id="hotel" name-field="hotel_idhotel" type-field="input" class="form-control">
                    @foreach( $hotels as $hotel ) 
                        <option value="{{$hotel->idhotel}}">{{$hotel->name}}</option> 
                    @endforeach 
                </select> 
            </div> 
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Nombre de huesped</p>
                <input class="form-control" id="checkin-name" placeholder="nombre" type="text" name="" value="{{$guest[0]->name}}">

            </div>
            <div class="col-lg-2 col-md-4 col-12 pd1">
                <p>Nacionalidad</p>
                <select id="nationality" class="form-control">
                    <option value="EU">EU</option>
                    <option value="CA">CA</option>
                    <option value="MX">MX</option> 
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-12 pd1">
                <p>Cel</p>
                <input class="form-control" id="checkin-phone" placeholder="teléfono" type="text" name="" value="{{$guest[0]->phone}}">
            </div>
        </div>
            <div class="col-lg-12 np">
                <!-- 
                <div class="col-lg-12" style="padding-left: 10px;">
                    <h2 style="margin: 0px;">estadía</h2>
                </div>
                <div class="col-lg-4 col-md-4 col-12 pd1">
                    <p>Llegada</p>
                    <input class="form-control" min="2022-05-31" id="time-from" type="date" name="">
                </div>
                <div class="col-lg-4 col-md-4 col-12 pd1">
                    <p>Salida</p>
                    <input class="form-control" min="2022-06-01" id="time-to" type="date" name="">
                </div> --> 
                <!-- <div class="col-lg-4 col-md-4 col-12 pd1">
                    <p>Habitaciónes</p>
                    <input style="display: none;" class="form-control" id="checkin-room" placeholder="habitación" type="text" name="" value="">
                    <button class="btn btn-primary" id="selectRoom"></button>
                </div> --> 
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
                    <option value="1">default</option>
                    <option value="2">saludable</option>
                    <option value="3">problemas cardiacos</option>
                </select>
            </div>
            <!-- 
             <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Forma de llegada</p>
                <select class="form-control">
                    <option value="1">default</option>
                    <option value="2">caminando</option>
                    <option value="3">eaxon empresas</option>
                </select>
            </div> --> 
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Tarjeta de crédito</p>
                <input class="form-control" id="checkin-name" placeholder="**** **** **** ****" type="text" name="">
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>FECHA</p>
                <input class="form-control" id="checkin-name" placeholder="MM/YY" type="text" name="">
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>CV</p>
                <input class="form-control" id="checkin-name" placeholder="CV" type="text" name="">
            </div>
            <div class="col-lg-12 col-md-4 col-12 pd1">
                <p>Alergias</p>
                <textarea class="form-control" id="alergias" placeholder="alergias" type="text" name="">{{$guest[0]->notes}}</textarea>
            </div>

        <div id="qrcode-2"></div>
        <div class="col-lg-12 pd1">
            <button class="btn btn-primary" onclick="save()">guardar</button>
            <button class="btn btn-primary" onclick="deleteGuest()">eliminar</button>
        </div>

    </div>
    <div class="col-lg-3">
            <div style="text-align: center;">
                 <div class="col-lg-12">
                    @if( strlen($guest[0]->url) > 1 ) 
                        <div class="prev-image" style="background-image: url('{{$guest[0]->url}}')"></div> 
                    @else 
                        <div class="prev-image"></div> 
                    @endif     
                 </div>
                 <div class="col-lg-12 col-md-8 col-sm-9">
                    <div class="dropzone col-lg-12" id="dropzone-1"></div> 
                </div>
            </div>

            <style type="text/css">
                .container-events {
                    padding-top: 20px; 
                }
                .row-event {
                    background-color: #2196f3; 
                    border-radius: 7px; 
                    padding: 10px; 
                    margin-bottom: 20px; 
                }
                .row-event:hover {
                    cursor: pointer;
                }
                .event-dates span {
                    display: block; 
                    font-size: 17px; 
                    font-weight: 600;
                }
                .event-side {
                    font-size: 27px; 
                    font-weight: bolder;
                    text-align: left;
                }
            </style>

            <div class="col-lg-12 np">
                <div class="container-events">
                    <div class="col-lg-12 row-event">
                        <div class="col-lg-7 event-dates">
                            <span>Check in&nbsp;&nbsp;&nbsp;: 23 ENE 2022</span>
                            <span>Check out: 25 ENE 2022</span>
                        </div>
                        <div class="col-lg-5 event-side">
                            <span>$1,700.00</span>
                        </div>
                    </div>
                    <div class="col-lg-12 row-event">
                        <div class="col-lg-7 event-dates">
                            <span>Check in&nbsp;&nbsp;&nbsp;: 23 ENE 2022</span>
                            <span>Check out: 25 ENE 2022</span>
                        </div>
                        <div class="col-lg-5 event-side">
                            <span>$1,700.00</span>
                        </div>
                    </div>
                    <div class="col-lg-12 row-event">
                        <div class="col-lg-7 event-dates">
                            <span>Check in&nbsp;&nbsp;&nbsp;: 23 ENE 2022</span>
                            <span>Check out: 25 ENE 2022</span>
                        </div>
                        <div class="col-lg-5 event-side">
                            <span>$1,700.00</span>
                        </div>
                    </div>
                    <div class="col-lg-12 row-event">
                        <div class="col-lg-7 event-dates">
                            <span>Check in&nbsp;&nbsp;&nbsp;: 23 ENE 2022</span>
                            <span>Check out: 25 ENE 2022</span>
                        </div>
                        <div class="col-lg-5 event-side">
                            <span>$1,700.00</span>
                        </div>
                    </div>
                </div>
            </div>
    </div>


<div id="select-room" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-radius: 22px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size: 25px;">Selecciona la habitación</h4>
      </div>
      <div class="modal-body" style="display: inline-block; width: 100%;">
        <div class="col-lg-12 np">
                <div style="padding-top: 20px;">
                    <table class="table table-hover table-bordered" style="widows: 100%;">
                        <thead>
                            <tr>
                                <th>TÍTULO</th> 
                                <th>ESTATUS</th>
                                <th>CONDICIÓN</th>
                                <th>PLANTA</th>
                                <th>SECCIÓN</th>
                                <th>TIPO</th>
                            </tr>
                        </thead> 
                        <tbody class="body-rooms">
                        </tbody> 
                    </table>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Seleccionar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    function deleteGuest() {
        var id = '{{$guest[0]->idguest}}'; 
        if( confirm('¿estás seguro?')) {
            
            let entity_id = id; 
            let entity_name = 'guest'; 
            let entity_id_field = 'idguest'; 
                 $.ajax({  
                    'url' : '{{asset("deleteEntity")}}', 
                    'method' : 'POST',  
                    'data' : { 
                        'entity_id' : entity_id, 
                        'entity_name' : entity_name, 
                        'entity_id_field': entity_id_field
                    },  
                    'success' : function(resp) {
                        window.location.href = "{{asset('list')}}"; 
                    }
                });
        } 
    }

    Dropzone.autoDiscover = false;

    let url_image = ""; 

    window.onload = function() {
     // upload file  
        myDropzone = new Dropzone("#dropzone-1", {
            url: "{{asset('uploadPhotoGuest')}}",
            paramName: "file",  
            dictDefaultMessage:'<span id="drop-mge"><span style="color: 218aff; font-weight: 900;">Arrastra</span> o haz click para cargar la <span style="color: 218aff; font-weight: 900;">imagen</span> de perfil <br> <span style="font-size: 18px; color: #8a8a8a;font-weight: 700;">este es un dato (opcional) </span> </span>',
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
              formData.append('idguest', 0); 
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

    function selectRoom( id, title ) { 
        $('#selectRoom').text(title); 
        $("#select-room").modal('toggle');
        $('#checkin-room').val(title);  
    }
    $('#selectRoom').click( function() {
        $("#select-room").modal('toggle');
        $('.body-rooms').html("");
        $.ajax({
            'url' : '{{asset("getRooms")}}',
            'method' : 'post', 
            'data' : {},  
            'success' : function( resp ) {
                resp = JSON.parse(resp); 
                resp.forEach( function( a, b ) {
                    var s = "libre"; 
                    var tr = "<tr onclick='selectRoom("+a.idroom+","+a.title+")'><td>"+a.title+"</td><td>"+s+"</td><td>"+a.status+"</td><td>"+a.planta+"</td><td>"+a.section+"</td><td>"+a.type+"</td></tr>"; 
                    $('.body-rooms').append(tr); 
                }); 
                console.log( resp ); 
            }
        }); 

    }); 

    function save() {
        let checkinName   = $('#checkin-name').val(); 
        let checkinPhone  = $('#checkin-phone').val(); 
        let checkinRoom   = $('#checkin-room').val(); 
        let checkinHotel  = $('#hotel').val(); 
        let idguest_types = $('#idguest_types').val(); 
        let nationality   = $('#nationality').val(); 
        let alergias      = $('#alergias').val(); 

        let timeFrom = $('#time-from').val(); 
        let timeTo   = $('#time-to').val(); 

        if( timeFrom.length < 1 ) {
            alert("Asigna una fecha de llegada"); 
            return; 
        }

        timeFrom = new Date( timeFrom ); 
        var from_date = timeFrom.getFullYear()+"-"+(timeFrom.getMonth() + 1)+"-"+(parseInt( timeFrom.getUTCDate() ) ); 

        if( timeTo.length < 1 ) {
            alert("Asigna una fecha de salida"); 
            return; 
        }

        timeTo = new Date( timeTo ); 
        var timeToStr = timeTo.getFullYear()+"-"+(timeTo.getMonth() + 1)+"-"+(parseInt( timeTo.getUTCDate() ) );

        if( checkinRoom.length < 1 ) {
            alert("Asigna una habitación"); 
            return; 
        }
        if( checkinName.length < 1 ) {
            alert("Llena el nombre del huesped"); 
            return; 
        }
        if( checkinHotel.length < 1 ) {
            alert("No hay un hotel asignado"); 
            return;
        }
        if( checkinName.length < 1 ) {
            alert("Llena el nombre del huesped"); 
            return; 
        }

        $.ajax({
            'url' : '{{asset("guest")}}', 
            'method' : 'post',  
            'data' : { 
                'name' : checkinName,  
                'phone' : checkinPhone, 
                'room' : checkinRoom, 
                'hotel' : checkinHotel, 
                'nationality' : nationality,
                'url' : url_image, 
                'idguest_types' : idguest_types, 
                'alergias' : alergias, 
                'from' : from_date, 
                'to' : timeToStr
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