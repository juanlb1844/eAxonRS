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
            <span class="title-page">TIPOS DE CLIENTES</span>
            <span class="description-page"> Agrega todos los tipos de clientes que puede tener tu hotel, con esto te ayudaremos 
                                    <br> a asegurar el flujo correcto y evitar errores de respuesta. </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entities as $key => $cat)
                    <tr>
                        <td>
                            <span>
                                {{$cat->title}}
                            </span>
                        </td>
                        <td>
                            <input type="color" value="{{$cat->flag}}" name="">
                        </td>
                        <td>
                            <a href="{{asset('editClientType')}}/{{$cat->idguest_types}}">
                                <button class="btn" onclick="">VER</button>
                            </a>
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div clas="foo-list">
            <a href="{{asset('newClientType')}}">
                <button class="btn btn-primary">Nuevo</button>
            </a>
        </div>
    </div>
  

 @endsection