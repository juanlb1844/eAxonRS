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
            <span class="title-page">MENÚS</span>
            <span class="description-page"> Guarda la lista de menús que tienen tus restaurantes para ayudar a tus clientes 
                                            <br>
                                            a filtrar y encontrar los productos que buscan.
                                        </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Pertenece al Restaurante</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($menus as $key => $menu )
                <tr>
                    <td>
                        <span>
                            {{$menu->name_menu}}
                        </span>
                    </td>
                    <td>
                        <span>
                            {{$menu->name_rest}}
                        </span>
                    </td>
                    <td>
                        <a href="{{asset('editMenu')}}/{{$menu->idmenu}}">
                            <button class="btn" onclick="">VER</button>
                        </a>
                    </td>  
                </tr>
                @endforeach 
             
            </tbody>
        </table>
        <div class="col-lg-12 pd1">
            <a href="{{asset('newMenu')}}">
                <button class="btn btn-primary" onclick="">nuevo</button>
            </a>
        </div>
    </div>
   

 @endsection