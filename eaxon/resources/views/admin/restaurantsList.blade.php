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
    .prev-img-gallery {
        display: inline-block; 
        width: 110px; 
        height: 110px; 
        background-color: black; 
        border-radius: 12px; 
        background-position: center;
        background-size: cover; 
    }

 
</style>
 
    <div class="col-lg-12 col-sm-12"> 
        <div class="col-lg-12 pd1">
            <span class="title-page">LISTA DE RESTAURANTES</span>
            <span class="description-page">Registra los restaurantes o crea varias instancias de unos para igualar tu forma detrabajo <br> de tu o tus hoteles.</span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
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
                            <div class="prev-img-gallery" style="background-image: url('{{$restaurant->url_img}}')"></div>
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