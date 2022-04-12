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
            <h1>Lista de restaurantes</h1>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Pertenece al Hotel</th>
                    <th>Portada</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restaurants as $restaurant ) 
                    <tr>
                        <td>
                            <span>
                                {{$restaurant->name_restaurant}} 
                            </span>
                        </td>
                        <td>
                            <span>{{$restaurant->name_hotel}} </span>
                        </td>
                        <td style="text-align: center;">
                            <img src="{{$restaurant->url_img}}" style="width: 170px; border-radius: 12px;">
                        </td>
                        <td>
                            <a href="{{asset('editRestaurant')}}/{{$restaurant->idrestaurants}}">
                                <button class="btn" onclick="">VER</button>
                            </a>
                        </td>  
                    </tr>
                @endforeach 
            </tbody>
        </table>
        <div class="col-lg-12 pd1">
            <a href="{{asset('newRestaurant')}}">
                <button class="btn btn-primary" onclick="">nuevo</button>
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