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
            <span class="title-page">CATEGORÍAS DE PLATILLOS</span>
            <span class="description-page"> Crea categorías que te ayuden a agrupar tus platillos fuera de su menú habitual 
                                            <br>
                                            y con eso manejar diferentes agrupaciones para la vista del cliente.
                                        </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entities as $key => $cat)
                    <tr>
                        <td>
                            <span>
                                {{$cat->name}}
                            </span>
                        </td>
                        <td>
                            <a href="{{asset('editCategorieDish')}}/{{$cat->idcategories_menu}}">
                                <button class="btn" onclick="">VER</button>
                            </a>
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div clas="foo-list">
            <a href="{{asset('newDishCategory')}}">
                <button class="btn btn-primary">Nuevo</button>
            </a>
        </div>
    </div>
  

 @endsection