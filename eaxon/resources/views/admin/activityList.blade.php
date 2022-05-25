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
            <span class="title-page">Actividades y Experiencias</span>
            <span class="description-page">
                    Crea y configura las actividades que se puedrán ver tus huéspedes al entrar a su aplicación
                    <br> y poder realizar la compra y el pago desde su dispositivo.
                </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>

        <!-- 
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Portada</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dishes as $key => $dish)
                    <tr>
                        <td>
                            <span>
                                {{$dish->name}}
                            </span>
                        </td>
                        <td style="text-align: center;">
                            @foreach($dish->gallery as $key => $img )
                                @if($key == 0 )
                                    <div class="prev-img-gallery" style="background-image: url('{{$img->url}}')">
                                @endif 
                            @endforeach 
                                
                            </div>
                        </td>
                        <td>
                            <a href="{{asset('editDish')}}/{{$dish->iddish}}">
                                <button class="btn" onclick="">VER</button>
                            </a>
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div clas="foo-list">
            <a href="{{asset('newDish')}}">
                <button class="btn btn-primary">Nuevo</button>
            </a>
        </div> --> 

        <style type="text/css">
            .container-dish-list {
                margin-top: 0px;
                margin-bottom: 40px;
            }
            .row-dish {
                border: 1px solid #424242;
                margin-top: 10px;
                border-radius: 12px;
                padding: 20px 20px;
            }
            .prev-img-dish {
                width: 140px;  
                height: 140px; 
                /*background-color:red;*/ 
                border-radius: 7px; 
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100%;
            }
            .title-dish {
                font-size: 25px; 
                font-weight: 900; 
            }
            .description-dish {
                font-size: 17px; 
                color: gray;
            }
            .element {
                width: 60px; 
                height: 60px; 
                background-color: #f4d6c7; 
                display: inline-block; 
                border-radius: 50%; 
                margin-right: 5px; 
                background-position: center;
                background-repeat: no-repeat;
                background-size: 70%; 
            }
            .content-ingredients {
                padding-top: 10px;
            }
            .price-dish {
                font-size: 30px;
                font-weight: 900; 
            }
            .c-gray { color: gray; } 
            .add-element {
                height: 50px; 
                width: 50px; 
                display: inline-block;
                border-radius: 50%; 
                background-color: #e1efb0;
                font-size: 38px;
                text-align: center; 
                color: #46b04a; 
                font-weight: 900; 
            }
            .add-element:hover {
                cursor: pointer;
                background-color: #c9e371; 
            }
            .container-add {
                padding-top: 30px;
            }
            .create-btn {
                    background-color: #46b04a;
                    font-weight: 600;
                    font-size: 17px;
                    padding: 12px 35px;
                    width: 250px;
                    background-repeat: no-repeat;
                    background-position: right;
                    background-size: 27px;
                    text-align: left;
                    background-position-x: 92%; 
                    box-shadow: none; 
            }
            .create-btn:hover, .create-btn:active, .create-btn:selected{ 
                background-color: #3a8c3d!important; 
            }
            .f-size-4 {
                font-size: 20px; 
                display: none; 
            }

            .ing-prev { width: 70px; }
        </style>

        <div class="col-lg-12 container-dish-list">
            

        <style type="text/css">
            .header-page {
                border-bottom: 0px solid #EDEDED; 
                margin-bottom: 40px; 
            }
            .header-page .filters-cat { padding-left: 0px; }
            .header-page .filters-cat li {
                display: inline-block;
                margin-right: 15px; 
                font-size: 17px;
                padding-bottom: 10px;
            }
            .header-page .filters-cat li:hover {
                cursor: pointer;
                font-weight: 600;
            }
            .filter-selected {
                border-bottom: 4px solid #46b04a; 
            }


            .banner-top {
                height: 200px; 
                border-radius: 12px; 
                background-image: url('{{asset('media-admin/banner-top-8.webp')}}');
                background-position: center;
                background-size: cover; 
            }
        </style>

         <div class="col-lg-9 header-page np">

            <div class="col-lg-12 np">
                <div class="container-banner">
                    <div class="banner-top">
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-12 np">
                <h1></h1>
                 <ul class="filters-cat">
                     <li class="filter-selected">Todos los platillos</li>
                     @foreach ( $categories as $key => $categorie )
                        <li idcat="{{$categorie->idcategories_menu}}">{{$categorie->name}}</li>
                     @endforeach 
                     <ul class="pull-right">Organizar por: <select class="form-control"><option>precio</option></select> </ul>
                 </ul>
            </div>

         </div>
          <div class="col-lg-3">
                
            <div class="panel-control">
                 <a href="{{asset('newDish')}}">
                    <button class="btn btn-primary pull-right create-btn" style="background-image: url('{{asset('/media-admin/plus-2.svg')}}')"> crear nueva actividad <span class="f-size-4"> +</span></button>
                </a>
            </div>

        </div>

        @foreach( $dishes as $keyy => $dish ) 
            <div class="col-lg-9 row-dish row-dish-{{$key}}" style="display: none;">
                <div class="col-lg-2">
                        <a href="{{asset('editDish')}}/{{$dish->iddish}}">
                            @foreach( $dish->gallery as $key => $img )
                                @if($key == 0 )
                                    <div class="prev-img-dish" style="background-image: url('{{$img->url}}')"> </div>
                                @endif 
                            @endforeach 
                        </a>  
                </div>
                <div class="col-lg-10">
                    <div class="col-lg-9 np">
                        <div>
                            <span class="title-dish">{{$dish->name}}</span>
                        </div>
                        <div>
                            <span class="description-dish">lista de ingredientes</span>
                        </div>
                        <div class="content-elements">
                            <div class="content-ingredients">
                                 @foreach($dish->ingredients as $key => $ing )
                                    <span class="element element-{{$key}}-{{$keyy}}"  style="background-image: url('{{$ing->img}}')">  
                                        <img style="display: none;" id="ing-{{$key}}-{{$keyy}}" src="{{$ing->img}}"/> 
                                    </span>    
                                @endforeach 
                                <!--
                                <span class="element element-2"  style="background-image: url('http://localhost/eaxon/eaxon/public/application/hotels/6276aa9c5f600mostaza.png')">
                                    <img style="display: none;" id="ing-2" src="http://localhost/eaxon/eaxon/public/application/hotels/6276aa9c5f600mostaza.png"/> 
                                </span> -->    
                            </div>
                        </div>
                    </div>    
                    <div class="col-lg-3">
                        <div>
                            <span class="price-dish"> <span class="c-gray">$ </span>{{$dish->price}}</span>
                        </div>
                        <div class="container-add">
                            <span class="add-element">+</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach 
 
            
        </div>
    </div>
 

      <!-- Modal -->
<div id="addElement" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AÑADIR INGREDIENTE</h4>
      </div>
      <div class="modal-body row">
        <div calss="col-xs-12">
            <div class="content-modal">
                <div class="col-lg-12">
                    @foreach( $ingredients as $key => $ingredient )
                        <div class="col-lg-6">
                            <p>{{$ingredient->name}}</p>
                        </div>
                        <div class="col-lg-6">
                            <img class="ing-prev" src="{{$ingredient->img}}">
                        </div>
                    @endforeach 
                </div>
                
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button> 
      </div>
    </div>

  </div>
</div>

    <script type="text/javascript">
    $('.add-element').click( function() {
        $('#addElement').modal('toggle');
    }); 
  
  r = 0; 
  $('.row-dish').each( function( aa, b ) {
        $(b).find('.element').each( function( a , b ) {
             //console.log( "#ing-"+(a+1) ); 
             r++; 
             rgb = ( getAverageRGB( document.getElementById( "ing-"+(a)+"-0" ) ) );  
             console.log( 'rgb('+rgb.r+','+rgb.g+','+rgb.b+')' ); 
             $( $('.element')[r] ).css('background-color', 'rgb('+rgb.r+','+rgb.g+','+rgb.b+')');
        });   
  }); 

function getAverageRGB(imgEl) {
    
    var blockSize = 5, // only visit every 5 pixels
        defaultRGB = {r:0,g:0,b:0}, // for non-supporting envs
        canvas = document.createElement('canvas'),
        context = canvas.getContext && canvas.getContext('2d'),
        data, width, height,
        i = -4,
        length,
        rgb = {r:0,g:0,b:0},
        count = 0;
        
    if (!context) {
        return defaultRGB;
    }
    
    height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
    width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;
    
    context.drawImage(imgEl, 0, 0);
    
    try {
        data = context.getImageData(0, 0, width, height);
    } catch(e) {
        /* security error, img on diff domain */
        return defaultRGB;
    }
    
    length = data.data.length;
    
    while ( (i += blockSize * 4) < length ) {
        ++count;
        rgb.r += data.data[i];
        rgb.g += data.data[i+1];
        rgb.b += data.data[i+2];
    }
    
    // ~~ used to floor values
    rgb.r = ~~(rgb.r/count);
    rgb.g = ~~(rgb.g/count);
    rgb.b = ~~(rgb.b/count);
    
    return rgb;
    
}
    </script>
 

 @endsection