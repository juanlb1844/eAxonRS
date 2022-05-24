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

    .img-prev {
        width: 120px; 
        height: 120px; 
        border-radius: 12px; 
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
    }
</style>
 
    <div class="col-lg-12 col-sm-12"> 
         <div class="col-lg-12 pd1">
            <span class="title-page">GUARNICIONES</span>
            <span class="description-page"> Administra las guarniciones con las que se relacionan tus productos para que tus clientes 
                                            <br>
                                            puedan agregarlas o retirarlas de los platillos.
                                        </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>IMG</th>
                    <th>PRECIO</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entities as $key => $item)
                    <tr> 
                        <td>
                            <span>
                                {{$item->name}}
                            </span>
                        </td> 
                        <td>
                            <div class="img-prev" style="background-image: url('{{$item->img}}')">
                                
                            </div>
                        </td>
                        <td>
                            <span>${{$item->price}}</span>
                        </td>
                        <td>  
                            <a href="{{asset('editGuarnicion')}}/{{$item->idguarnicion}}">
                                <button class="btn" onclick="">VER</button>
                            </a>
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div clas="foo-list">
            <a href="{{asset('newGuarnicion')}}">
                <button class="btn btn-primary">Nuevo</button>
            </a>
        </div>
    </div>
  
 @endsection