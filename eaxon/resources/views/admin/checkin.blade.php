@extends('admin.layout') 

@section('page')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"/>

<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.min.css">

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


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
        <h1 style="font-weight: bolder;">RESERVACIÓN</h1>
    </div>

    <style type="text/css">
        .section { font-weight: bolder; font-size: 20px; letter-spacing: 1px; }
    </style>
        
    <div class="col-lg-9 np">
        <div class="col-lg-12 section">
            <span>PERFIL</span>
        </div>
        <div class="col-lg-12 np"> 
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
                <!--<input class="form-control" id="checkin-name" placeholder="nombre" type="text" name=""> --> 
                  <div class="body" align="center">  
                    @if( $load )
                        <input id="autoComplete" class="checkin-name" type="text" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="200" tabindex="1" value="{{$guest->name}}">
                    @else 
                        <input id="autoComplete" class="checkin-name" type="text" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="200" tabindex="1">
                    @endif 
                    <!--<div class="mode">
                        <h4>mode</h4>
                        <div class="toggle">
                            <div class="toggler">Strict</div>
                        </div>
                    </div>--> 
                    <div class="selection"></div>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Cel</p>
                @if( $load ) 
                    <input class="form-control" id="checkin-phone" placeholder="teléfono" type="text" name="" value="{{$guest->phone}}">
                @else 
                    <input class="form-control" id="checkin-phone" placeholder="teléfono" type="text" name="">
                @endif 
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
         <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Forma de llegada</p>
            <select class="form-control">
                <option value="1">default</option>
                <option value="2">caminando</option>
                <option value="3">eaxon empresas</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Tarjeta de crédito</p>
            <input class="form-control" placeholder="**** **** **** ****" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>FECHA</p>
            <input class="form-control" placeholder="MM/YY" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>CV</p>
            <input class="form-control" placeholder="CV" type="text" name="">
        </div>
        <div class="col-lg-8 col-md-4 col-12 pd1">
            <p>Alergias</p>
            <textarea class="form-control" id="alergias" placeholder="alergias" type="text" name=""></textarea>
        </div>
        </div>

        <style type="text/css">
            .multiinput {
                border: 1px solid gray;
                min-height: 40px;
                padding-top: 2px;
                padding-left: 20px;
            }
            .element-multi {
                background-color: gray; 
                display: inline-block;
                padding: 0px 10px; 
                font-size: 17px; 
                padding-right: 0px; 
                vertical-align: middle;
                text-align: center;
                margin-right: 10px; 
                min-width: 60px;
                margin-bottom: 5px; 
                margin-top: 4px; 
            }
            .del-element {
                display: inline-block;
                background-color: #fe8500;
                position: relative;
                width: 20px;
                height: 25px;
                line-height: 27px;
                font-size: 41px;
            }
            .del-element:hover {
                cursor: pointer;
                background-color: #ba3f00;
            }
            .select-more {
                padding-left: 20px;
                padding-right: 20px;
            }
        </style>

        <div class="col-lg-12 np">
            <div class="col-lg-12 np">
            <div class="col-lg-12 section">
                <span>ESTADIA</span>
            </div>
            <div class="col-lg-3 col-md-4 col-12 pd1">
                <p>Llegada</p>
                <input class="form-control" id="time-from" type="date" name="">
            </div>
            <div class="col-lg-3 col-md-4 col-12 pd1">
                <p>Salida</p>
                <input class="form-control" id="time-to" type="date" name="">
            </div>
            <div class="col-lg-3 col-md-4 col-12 pd1">
                <p>Habitaciónes</p>
                <input style="display: none;" class="form-control" id="checkin-room" placeholder="habitación" type="text" name="">

                <div class="multiinput">
                    <!-- <span class="element-multi">1<span class="del-element pull-right">×</span></span> --> 
                    <button class="btn btn-primary pull-right select-more" id="selectRoom">. . .</button>
                </div>

            </div>
            <div class="col-lg-3 col-md-4 col-12 pd1">
                <p>Tarifa</p>
                <button class="btn btn-primary" id="">seleccionar...</button>
            </div>
        </div>
 
        
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


    <div class="col-lg-3">
        <div style="text-align: center;">
             <div class="col-lg-12">
                @if( $load ) 
                    @if( $guest->url )
                        <div class="prev-image" style="background-image: url({{$guest->url}});"></div>
                    @else 
                        <div class="prev-image"></div>
                    @endif 
                @else 
                    <div class="prev-image"></div>
                @endif 
             </div>
             <div class="col-lg-12 col-md-8 col-sm-9">
                <div class="dropzone col-lg-12" id="dropzone-1"></div> 
            </div>
        </div>


        <div class="col-lg-12 np">
                <div class="container-events">
                    @if( $load )
                        @foreach( $guest->events as $k => $event )
                            <div class="col-lg-12 row-event">
                                <div class="col-lg-7 event-dates">
                                    <span>Check in&nbsp;&nbsp;&nbsp;: {{$event->from_date}}</span>
                                    <span>Check out: {{$event->to_date}}</span>
                                </div>
                                <div class="col-lg-5 event-side">
                                    <span>${{$event->total_event}}</span>
                                </div>
                            </div> 
                        @endforeach 
                    @endif 
                </div>
            </div>

    </div>

        
 
        <div id="qrcode-2"></div>
        <div class="col-lg-12 pd1">
            <button class="btn btn-primary" onclick="save()">guardar</button>
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
                    <table class="table table-rooms table-hover table-bordered" style="widows: 100%;">
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

<script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>

  
<script type="text/javascript">

jQuery(function($) {

    var input = $('.checkin-name'); 
    input.on('keydown', function() {
        var key = event.keyCode || event.charCode;

        if( key == 8 || key == 46 )
            clientSelected = false; 
            idClientSelected = null; 
            resetLoaded(); 
      });   
});

let clientSelected = false; 
let idClientSelected = null; 
// The autoComplete.js Engine instance creator
const autoCompleteJS = new autoComplete({
  data: {
    src: async () => {
      try {
        // Loading placeholder text
        document.getElementById("autoComplete").setAttribute("placeholder", "Loading...");
        // Fetch External Data Source
        const source = await fetch("{{asset('getAllCustomers')}}");
        const data = await source.json();
        // Post Loading placeholder text
        document.getElementById("autoComplete").setAttribute("placeholder", autoCompleteJS.placeHolder);
        // Returns Fetched data
        return data;
      } catch (error) {
        return error;
      }
    },
    keys: ["nombre", "cities", "idguest"],
    cache: true,
    filter: (list) => {
      // Filter duplicates
      // incase of multiple data keys usage
      const filteredResults = Array.from(new Set(list.map((value) => value.match))).map((food) => {
        return list.find((value) => value.match === food);
      });

      return filteredResults;
    },
  },
  placeHolder: "Nombre del cliente",
  resultsList: {
    element: (list, data) => {
      const info = document.createElement("p");
      if (data.results.length) {
        info.innerHTML = `Displaying <strong>${data.results.length}</strong> out of <strong>${data.matches.length}</strong> results`;
      } else {
        info.innerHTML = `Found <strong>${data.matches.length}</strong> matching results for <strong>"${data.query}"</strong>`;
      }
      list.prepend(info);
    },
    noResults: true,
    maxResults: 15,
    tabSelect: true,
  },
  resultItem: {
    element: (item, data) => {
      // Modify Results Item Style
      item.style = "display: flex; justify-content: space-between;";
      // Modify Results Item Content
      item.innerHTML = `
      <span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
        ${data.match}
      </span>
      <span style="display: flex; align-items: center; font-size: 13px; font-weight: 100; text-transform: uppercase; color: rgba(0,0,0,.2);">
        ${data.key}
      </span>`;
    },
    highlight: true,
  },
  events: {
    input: {
      focus() {
        if (autoCompleteJS.input.value.length) autoCompleteJS.start();
      },
      selection(event) {
        const feedback = event.detail;
        autoCompleteJS.input.blur();
        // Prepare User's Selected Value
        const selection = feedback.selection.value[feedback.selection.key];
        // Render selected choice to selection div
        //document.querySelector(".selection").innerHTML = selection;
        // Replace Input value with the selected value
        autoCompleteJS.input.value = selection;
        // Console log autoComplete data feedback
        checkinName = feedback; 
        //alert(checkinName.selection.value.idguest);
        loadGuest(checkinName.selection.value.idguest); 
        //alert(checkinName.selection.value.nombre);
        idClientSelected = checkinName.selection.value.idguest; 
        clientSelected = true; 
        console.log(feedback);
      },
    },
  },
});

function loadGuest( idGuest ) {
    //alert("LOAD GUEST"); 
    $.ajax({
        'url' : '{{asset("loadGuest")}}', 
        'method' : 'post', 
        'data' : {'idguest' : idGuest}, 
        'success' : function(resp) {
            resp = JSON.parse(resp); 
            console.log(resp); 
            $('#checkin-phone').val(resp.phone); 
            $('.prev-image').css("background-image", "url("+resp.url+")"); 
            $('.container-events').html(''); 
            resp.events.forEach( function(a, b) {
                console.log( a ); 
                var row = '<div class="col-lg-12 row-event">'+
                        '<div class="col-lg-7 event-dates">'+
                            '<span>Check in&nbsp;&nbsp;&nbsp;: '+a.from_date+'</span>'+
                            '<span>Check out: '+a.to_date+'</span>'+
                        '</div>'+
                        '<div class="col-lg-5 event-side">'+
                            '<span>$'+a.total_event+'</span>'+
                        '</div>'+
                    '</div>'; 
                $('.container-events').append(row); 
            }); 
        }
    })
}

// Toggle Search Engine Type/Mode
/* 
document.querySelector(".toggler").addEventListener("click", () => {
  // Holds the toggle button selection/alignment
  const toggle = document.querySelector(".toggle").style.justifyContent;

  if (toggle === "flex-start" || toggle === "") {
    // Set Search Engine mode to Loose
    document.querySelector(".toggle").style.justifyContent = "flex-end";
    document.querySelector(".toggler").innerHTML = "Loose";
    autoCompleteJS.searchEngine = "loose";
  } else {
    // Set Search Engine mode to Strict
    document.querySelector(".toggle").style.justifyContent = "flex-start";
    document.querySelector(".toggler").innerHTML = "Strict";
    autoCompleteJS.searchEngine = "strict";
  }
}); */ 

// Blur/unBlur page elements
const action = (action) => {
  const github = document.querySelector(".github-corner");
  const title = document.querySelector("h1");
  const mode = document.querySelector(".mode");
  const selection = document.querySelector(".selection");
  const footer = document.querySelector(".footer");

  if (action === "dim") {
    github.style.opacity = 1;
    title.style.opacity = 1;
    mode.style.opacity = 1;
    selection.style.opacity = 1;
    footer.style.opacity = 1;
  } else {
    github.style.opacity = 0.1;
    title.style.opacity = 0.3;
    mode.style.opacity = 0.2;
    selection.style.opacity = 0.1;
    footer.style.opacity = 0.1;
  }
};

// Blur/unBlur page elements on input focus
["focus", "blur"].forEach((eventType) => {
  autoCompleteJS.input.addEventListener(eventType, () => {
    // Blur page elements
    if (eventType === "blur") {
      action("dim");
    } else if (eventType === "focus") {
      // unBlur page elements
      action("light");
    }
  });
});


/// SELECT PRE 

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

    function getRooms() {
        rooms = Array(); 
        $('.multiinput span[type-room="room"]').each( function(a, b){ 
            rooms.push($(b).attr("id-room")); 
        });      
        return rooms;    
    }

    function selectRoom( id, title ) { 
        $("#select-room").modal('toggle');
        $('#checkin-room').val(id);   
        $('.multiinput').append('<span class="element-multi room-'+id+'" type-room="room" id-room="'+id+'" onclick="deleteRoom('+id+')">'+title+'<span class="del-element pull-right">×</span></span>');   
    }

    function deleteRoom( id ) {
        $('.room-'+id).remove(); 
    }

    $('#selectRoom').click( function() {

        if( $('#time-from').val().length < 2 ) {
            ohSnap('Asigna una fecha de llegada para poder buscar', {color: 'red'}); 
            return; 
        }

        if( $('#time-to').val().length < 2 ) {
            ohSnap('Asigna una fecha de salida para poder buscar', {color: 'red'}); 
            return;  
        }

        $("#select-room").modal('toggle');
        $('.body-rooms').html("");

         let timeFrom = $('#time-from').val();
         timeFrom = timeFrom.replace("-", "/").replace("-", "/"); 
         timeFrom = new Date( timeFrom ); 
         console.log(timeFrom); 
         var from_date = timeFrom.getFullYear()+"-"+(timeFrom.getMonth() + 1)+"-"+(parseInt( timeFrom.getUTCDate() ) ); 
  
         let timeTo   = $('#time-to').val(); 
         timeTo = timeTo.replace("-", "/").replace("-", "/");  
         timeTo = new Date( timeTo ); 
         console.log(timeTo);  
         var timeToStr = timeTo.getFullYear()+"-"+(timeTo.getMonth() + 1)+"-"+(parseInt( timeTo.getUTCDate() ) );
 

           $.ajax({
            'url' : '{{asset("availableRooms")}}',
            'method' : 'post', 
            'data' : {
                'from' : from_date, 
                'to' : timeToStr 
            },  
            'success' : function( resp ) {
                resp = JSON.parse(resp); 
                console.log( resp ); 
                resp.forEach( function( a, b ) {
                    var s = "libre"; 
                    var tr = "<tr onclick='selectRoom(\""+a.idroom+"\",\""+a.title+"\")'><td>"+a.title+"</td><td>"+s+"</td><td>"+a.status+"</td><td>"+a.planta+"</td><td>"+a.section+"</td><td>"+a.type+"</td></tr>"; 
                    $('.body-rooms').append(tr); 
                }); 
                 table = $('.table-rooms').DataTable({  
                              columns : [ 
                                          { title : 'TÍTULO'}, 
                                          { title : 'ESTATUS'}, 
                                          { title : 'CONDICIÓN'}, 
                                          { title : 'PLANTA'},
                                          { title : 'SECCIÓN'}, 
                                          { title : 'TIPO'}, 
                                        ], 
                            "language" :  { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},  
                            destroy: true, 
                             //"order"    : [[ 0, "desc" ]], 
                            "initComplete": function() { 
                        } 
                    }); 
                console.log( resp ); 
            }
        }); 

        /* 
        $.ajax({
            'url' : '{{asset("getRooms")}}',
            'method' : 'post', 
            'data' : {},  
            'success' : function( resp ) {
                resp = JSON.parse(resp); 
                resp.forEach( function( a, b ) {
                    var s = "libre"; 
                    var tr = "<tr onclick='selectRoom(\""+a.idroom+"\",\""+a.title+"\")'><td>"+a.title+"</td><td>"+s+"</td><td>"+a.status+"</td><td>"+a.planta+"</td><td>"+a.section+"</td><td>"+a.type+"</td></tr>"; 
                    $('.body-rooms').append(tr); 
                }); 
                console.log( resp ); 
            }
        }); */ 
    }); 


    // crea un nuevo huesped o liga el evento a uno ya existente 
    function save() {
        let checkinPhone  = $('#checkin-phone').val(); 
        let checkinRoom   = $('#checkin-room').val(); 
        let checkinHotel  = $('#hotel').val(); 
        let idguest_types = $('#idguest_types').val(); 
        let nationality   = $('#nationality').val(); 
        let alergias      = $('#alergias').val(); 
        let checkinName   = $('.checkin-name').val(); 
        
        let timeFrom = $('#time-from').val(); 
        timeFrom = timeFrom.replace("-", "/").replace("-", "/"); 
        let timeTo   = $('#time-to').val(); 
        timeTo = timeTo.replace("-", "/").replace("-", "/");  

        if( timeFrom.length < 1 ) {
            ohSnap('Asigna una fecha de llegada', {color: 'red'}); 
            return; 
        }

        timeFrom = new Date( timeFrom ); 
        var from_date = timeFrom.getFullYear()+"-"+(timeFrom.getMonth() + 1)+"-"+(parseInt( timeFrom.getUTCDate() ) ); 

        if( timeTo.length < 1 ) {
            ohSnap('Asigna una fecha de salida', {color: 'red'}); 
            return; 
        }

        timeTo = new Date( timeTo ); 
        var timeToStr = timeTo.getFullYear()+"-"+(timeTo.getMonth() + 1)+"-"+(parseInt( timeTo.getUTCDate() ) );

        checkinRoom = getRooms(); 

        if( checkinRoom.length < 1 ) {
            ohSnap('Asigna al menos una habitación', {color: 'red'}); 
            return; 
        } 

        if( checkinName.length < 1 ) {
            ohSnap('Llena el nombre del huesped', {color: 'red'}); 
            return; 
        }
        if( checkinHotel.length < 1 ) {
            ohSnap('No hay un hotel asignado', {color: 'red'}); 
            return;
        }
 
        $.ajax({
            'url' : '{{asset("guest")}}', 
            'method' : 'post',  
            'data' : { 
                'name'  : checkinName,  
                'phone' : checkinPhone, 
                'room'  : checkinRoom, 
                'hotel' : checkinHotel, 
                'nationality' : nationality,
                'url' : url_image, 
                'idguest_types' : idguest_types, 
                'alergias' : alergias, 
                'from'     : from_date, 
                'to'       : timeToStr,   
                'idguest'  : idClientSelected 
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


function resetLoaded() {
    $('.container-events').html(''); 
    $('.prev-image').css("background-image", "url('./media-admin/user-default.png')"); 
    $('#checkin-phone').val(''); 
}
 
</script>


<style type="text/css">
    .autoComplete_wrapper>input {
        /*height: 35px;*/ 
        width: 370px;
        margin: 0;
        padding: 0 2rem 0 3.2rem;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        font-size: 25px;
        text-overflow: ellipsis;
        color: rgb(0 0 0 / 30%);
        outline: 0;
        border-radius: 7px;
        border: .05remsolidrgba(255,122,122,.5);
        background-image: url(images/search.svg);
        background-size: 1.4rem;
        background-position: left 1.05rem top 0.8rem;
        background-repeat: no-repeat;
        background-origin: border-box;
        background-color: transparent!important; 
        transition: all .4s ease;
        -webkit-transition: all -webkit-transform .4s ease;
        color: white;
    }
    .autoComplete_wrapper>ul>li {
        margin: 0.3rem;
        padding: 0.3rem 0.5rem;
        text-align: left;
        font-size: 22px;
        color: #212121;
        border-radius: 0.35rem;
        background-color: #fff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: all .2s ease;
    }
</style>

 @endsection