@extends('admin.layout') 

@section('page')
  
        <div class="col-lg-12 pd1">
            <h1>CHECK IN</h1>
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
            <input class="form-control" id="checkin-name" placeholder="nombre" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Cel</p>
            <input class="form-control" id="checkin-phone" placeholder="teléfono" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Nacionalidad</p>
            <select id="nationality" class="form-control">
                <option value="EU">EU</option>
                <option value="CA">CA</option>
                <option value="MX">MX</option> 
            </select>
        </div>

        <div class="col-lg-12 np">
            <div class="col-lg-12" style="padding-left: 10px;">
                <h2 style="margin: 0px;">estadía</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Llegada</p>
                <input class="form-control" type="date" name="">
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Salida</p>
                <input class="form-control" type="date" name="">
            </div>
        </div>


        <div class="col-lg-2 col-md-4 col-12 pd1">
            <p>Habitación</p>
            <input style="display: none;" class="form-control" id="checkin-room" placeholder="habitación" type="text" name="">
            <button class="btn btn-primary" id="selectRoom">seleccionar</button>
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
                <option value="1">saludable</option>
                <option value="1">problemas cardiacos</option>
            </select>
        </div>
        <div class="col-lg-12 col-md-4 col-12 pd1">
            <p>Alergias</p>
            <textarea class="form-control" id="alergias" placeholder="alergias" type="text" name=""></textarea>
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
                            <tr>
                                <td>xx</td>
                                <td>xx</td>
                                <td>xx</td>
                                <td>xx</td>
                                <td>xx</td>
                                <td>xx</td>
                            </tr>
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