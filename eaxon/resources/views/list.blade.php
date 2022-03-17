@extends('layout') 

@section('page')
<div class="container-fluid">
    <div class="container">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $guests as $guest )
                <tr>
                    <td>{{$guest->name}}</td>
                    <td>{{$guest->phone}}</td>
                    <td>
                        <button class="btn">VER</button>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>

 

 @endsection