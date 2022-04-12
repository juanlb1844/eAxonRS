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
            <h1>Lista de ingredientes</h1>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
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
                            <a href="{{asset('editIngredient')}}/{{$item->idingredients}}">
                                <button class="btn" onclick="">VER</button>
                            </a>
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div clas="foo-list">
            <a href="{{asset('newIngredient')}}">
                <button class="btn btn-primary">Nuevo</button>
            </a>
        </div>
    </div>
  
 @endsection