@extends('admin.layout') 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"/>
<link rel="stylesheet" type="text/css" href="https://begima.com.mx/public/js/sortable/theme.css"/> 
<script type="text/javascript" src="https://begima.com.mx/public/js/sortable/Sortable.min.js"/></script>

 
@section('page')
  
        <div class="col-lg-12 pd1">
            <h1>Editar recurso del Home</h1>
        </div>
         
        <div class="col-lg-12 np" entity-id-field="idsliders_home" data-entity="form-entity" entity-name="sliders_home">
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Título</p> 
                <input field="data" name-field="name" type-field="input" class="form-control" id="checkin-name" placeholder="título de categoría" type="text" name="" value="{{$entitie->name}}">
            </div>
             <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Tipo</p>   
                <select field="data" name-field="type" type-field="input" class="form-control">
                    @foreach($types as $k => $t)
                        @if($entitie->type == $t['id'])
                            <option value="{{$t['id']}}" selected>{{$t['name']}}</option>
                        @else 
                            <option value="{{$t['id']}}">{{$t['name']}}</option>
                        @endif 
                    @endforeach  
                </select>
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Layout {{$entitie->layout}}</p> 
                <select field="data" name-field="layout" type-field="input" class="form-control">
                    @foreach($layouts as $k => $layout)
                        @if($entitie->layout == $layout['id'])
                            <option value="{{$layout['id']}}" selected>{{$layout['name']}}</option>
                        @else 
                            <option value="{{$layout['id']}}">{{$layout['name']}}</option>
                        @endif 
                    @endforeach 
                </select>
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Id de la categoría</p> 
                 <select field="data" name-field="idsource" type-field="input" class="form-control">
                    @foreach( $categories as $k => $categorie )
                        @if( $entitie->idsource == $categorie->idcategories_menu )
                            @php $cn = $categorie->name @endphp  
                            <option value="{{$categorie->idcategories_menu}}" selected>{{$categorie->name}}</option>
                        @else  
                            <option value="{{$categorie->idcategories_menu}}">{{$categorie->name}}</option>
                        @endif  
                    @endforeach  
                </select> 
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Platillos de [<span id="selectedCategorie">{{$cn}}</span>]</p> 
                 <select field="data" name-field="idsource2" type-field="input" class="form-control">
                    @if( property_exists($selected_product, 'iddish') )
                        <option value="{{$selected_product->iddish}}" selecte>{{$selected_product->name}}</option>
                    @endif 
                </select>
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Orden</p> 
                <input type="number" field="data" name-field="order" type-field="input" class="form-control" id="checkin-name" placeholder="orden" name=""  min="10" max="100" value="{{$entitie->order}}">
            </div> 
            <div class="col-lg-12 pd1">
                <button class="btn btn-primary" onclick="updateEntity()">editar</button>
                <button class="btn btn-primary btn-delete" onclick="deleteEntity()">borrar</button>
            </div> 
        </div>

<script type="text/javascript">
 
     window.onload = function() {
        $('select[name-field="idsource"]').change( function() {
            updateDishes(); 
        }); 
    }

    function updateDishes() {
        let cats = $('select[name-field="idsource"] option').length; 
        if( cats == 0 ){
            alert("Primero crea categorías y platillos"); 
            window.location.href = "{{asset('configHome')}}";  
        } else {
            cat = $('select[name-field="idsource"]').val(); 
            namecat = $('select[name-field="idsource"] option:selected').text(); 
            $.ajax({
                'url' : '{{asset("getDishesByCat")}}', 
                'method' : 'post', 
                'data' : { 'idcat' : cat }, 
                'success' : function( resp ) {
                    console.log(resp.length); 
                    console.log(resp); 
                    $('select[name-field="idsource2"]').html("");
                    $('#selectedCategorie').text(namecat);  
                    for( i = 0; i < resp.length; i++ ) { 
                        dish = "<option value='"+resp[i].iddish+"'>"+resp[i].name+"</option>"; 
                        $('select[name-field="idsource2"]').append(dish); 
                    }
                }
            }); 
        }
    }

      function deleteEntity() {
        let entity_name = $('div[entity-name]').attr('entity-name'); 
        let entity_id_field = $('div[entity-name]').attr('entity-id-field');  
        if( confirm("¿seguro?") ) {
            $.ajax({ 
                'url' : '{{asset("deleteEntity")}}', 
                'method' : 'POST', 
                'data' : {
                    'entity_id' : {{$id}},  
                    'entity_name' : entity_name, 
                    'entity_id_field' : entity_id_field
                }, 
                'success' : function(resp) {
                    console.log( resp ); 
                    window.location.href = "{{asset('configHome')}}"; 
                }
            });
        }
    }
 
      function updateEntity() {
        let entity_name = $('div[entity-name]').attr('entity-name'); 
        let entity_id_field = $('div[entity-name]').attr('entity-id-field');  
        let data_form = Array(); 
        $('div[data-entity]').find('[field]').each( 
            function( a , b ) { 
                let type_field = $(b).attr('type-field'); 
                let name_field = $(b).attr('name-field'); 
                let val_field  = $(b).val(); 
                data_form.push({
                    'type_field' : type_field, 
                    'name_field' : name_field, 
                    'val_field'  : val_field 
                }); 
            }
        ); 
        
        console.log( data_form );
    
        $.ajax({ 
            'url' : '{{asset("updateEntityPost")}}', 
            'method' : 'POST', 
            'data' : {
                'fileds' : data_form, 
                'entity_id' : {{$id}},  
                'entity_name' : entity_name, 
                'entity_id_field' : entity_id_field
            }, 
            'success' : function(resp) {
                console.log( resp ); 
                window.location.href = "{{asset('configHome')}}"; 
            }
        }); 
    }
</script>
  
 @endsection