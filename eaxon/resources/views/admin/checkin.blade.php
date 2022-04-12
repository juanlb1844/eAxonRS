@extends('admin.layout') 

@section('page')
  
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
            <input class="form-control" id="checkin-name" placeholder="nombre" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Cel</p>
            <input class="form-control" id="checkin-phone" placeholder="teléfono" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Nacionalidad</p>
            <select class="form-control">
                <option value="1">EU</option>
                <option value="2">CA</option>
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
            <input class="form-control" id="checkin-room" placeholder="habitación" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Condición médica</p>
            <select class="form-control">
                <option value="1">al 100</option>
                <option value="1">enfermo</option>
            </select>
        </div>
        <div id="qrcode-2"></div>
        <div class="col-lg-12 pd1">
            <button class="btn btn-primary" onclick="save()">guardar</button>
        </div>
 
 

<script type="text/javascript">
    function save() {
        let checkinName = $('#checkin-name').val(); 
        let checkinPhone = $('#checkin-phone').val(); 
        let checkinRoom = $('#checkin-room').val(); 
        let checkinHotel = $('#hotel').val(); 
        $.ajax({
            'url' : '{{asset("guest")}}', 
            'method' : 'post', 
            'data' : {
                'name' : checkinName,  
                'phone' : checkinPhone, 
                'room' : checkinRoom, 
                'hotel' : checkinHotel 
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