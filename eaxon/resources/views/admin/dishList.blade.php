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
</style>
 
    <div class="col-lg-12 col-sm-12"> 
        <div class="col-lg-12 pd1">
            <h1>Lista de platillos</h1>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Portada</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dishes as $key => $dish)
                    <tr>
                        <td>
                            <span>
                                {{$dish->name}}
                            </span>
                        </td>
                        <td style="text-align: center;">
                            @foreach($dish->gallery as $key => $img )
                                @if($key == 0 )
                                    <img style="width: 150px; border-radius: 12px;" src="{{$img->url}}">
                                @endif 
                            @endforeach 
                        </td>
                        <td>
                            <a href="{{asset('editDish')}}/{{$dish->iddish}}">
                                <button class="btn" onclick="">VER</button>
                            </a>
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div clas="foo-list">
            <a href="{{asset('newDish')}}">
                <button class="btn btn-primary">Nuevo</button>
            </a>
        </div>
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
 

 @endsection