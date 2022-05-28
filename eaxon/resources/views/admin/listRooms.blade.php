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
            <span class="title-page">Habitaciones</span>
            <span class="description-page">Has el registro de las habitaciones con las que cuenta cada uno de tus hoteles <br> y/o revisa el status de cada una. </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div> 
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>NÚMERO</th>
                    <th>ESTATUS</th>
                    <th>CONDICIÓN</th>
                    <th>PLANTA</th>
                    <th>TIPO</th>
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
                            <span>
                                @if( $cat->guest_idguest > 0 )
                                    ocupada
                                @else 
                                    libre
                                @endif 
                            </span>
                        </td>
                        <td>
                            <span>
                                {{$cat->status}}
                            </span>
                        </td>
                        <td>
                            <span>
                                {{$cat->planta}}
                            </span>
                        </td>
                         <td>
                            <span>
                                {{$cat->type}}
                            </span>
                        </td>
                        <td>
                            <a href="{{asset('editRoom')}}/{{$cat->idroom}}">
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