@extends('layout') 

@section('page')
 
    <div class="col-lg-12 col-sm-12"> 
        <div class="col-lg-12 pd1">
            <h1>Lista de huéspedes</h1>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $guests as $guest )
                <tr>
                    <td>{{$guest->name}}</td>
                    <td>{{$guest->phone}}</td>
                    <td>
                        <button class="btn" onclick="show('{{$guest->hash}}')">VER</button>
                    </td>  
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
 

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">QR</h4>
      </div>
      <div class="modal-body">
        <div id="container-qr" style="padding-left: 40%;">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function show( hash ) {
        $('#container-qr').html(''); 
        $('#myModal').modal('toggle'); 
        let url = "{{asset('client')}}/"; 
         var qrcode = new QRCode(document.getElementById("container-qr"), { 
            text: url+hash, 
            width: 128,
            height: 128,
            colorDark : "#5868bf",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    }
</script>

 

 @endsection