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
            <h1>Lista de hoteles</h1>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre del hotel</th>
                    <th>Compañía</th>
                    <th>Estado</th>
                    <th>Portada</th>
                    <th>VER</th> 
                </tr>
            </thead>
            <tbody>
                 @foreach($hotels as $key => $hotel )
                <tr>
                    <td>
                        <span>
                            {{$hotel->name}}
                        </span>
                    </td>
                    <td>
                        <span>
                            {{$hotel->company}}
                        </span>
                    </td>
                    <td>
                        <span>
                            {{$hotel->state}}
                        </span>
                    </td>
                    <td style="text-align: center; background-size: cover;">
                        <img style="width: 170px;" src="{{$hotel->url_img}}">
                    </td>
                    <td>
                        <a href="{{asset('editHotel')}}/{{$hotel->idhotel}}">
                            <button class="btn" onclick="">VER</button>
                        </a>
                    </td>  
                </tr>
                @endforeach 
            </tbody>
        </table>
        <div class="col-lg-12 pd1">
            <a href="{{asset('newHotel')}}">
                <button class="btn btn-primary" onclick="">nuevo</button>
            </a>
        </div>
    </div>
   

 @endsection