@extends('admin.layout') 

@section('page')
  
        <div class="col-lg-12 pd1">
            <h1>Editar menú</h1>
        </div>
        <div class="col-lg-12 np" data-entity="form-entity" entity-id-field="idmenu" entity-name="menu"> 
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Título</p>
                <input class="form-control" field="data" name-field="name" type-field="input" placeholder="título del menú" type="text" value="{{$entity->name}}">
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Restaurantes</p>
                <select field="data" name-field="restaurants_idrestaurants" type-field="input" class="form-control">
                    @foreach( $restaurants as $key => $restaurant )
                        @if( $entity->idmenu == $restaurant->idrestaurants )
                            <option selected value="{{$restaurant->idrestaurants}}">{{$restaurant->name}}</option>
                        @else 
                            <option value="{{$restaurant->idrestaurants}}">{{$restaurant->name}}</option>
                        @endif 
                    @endforeach 
                </select>
            </div>
             <div class="col-lg-12 col-md-4 col-12 pd1">
                <p>Descripción</p>
                <textarea class="form-control" rows="10" cols="12"></textarea>
            </div>
            <div class="col-lg-12 pd1">
                <button class="btn btn-primary" onclick="updateEntity()">guardar</button>
                 <button class="btn btn-primary btn-delete" onclick="deleteEntity()">borrar</button>
            </div>
        </div>
 

<script type="text/javascript">

        function deleteEntity() {
        let entity_id = $('div[entity-id]').attr('entity-id'); 
        let entity_name = $('div[entity-name]').attr('entity-name'); 
        let entity_id_field = $('div[entity-id-field]').attr('entity-id-field'); 
        
        if( confirm("¿Neta?") ) {
             $.ajax({  
                'url' : '{{asset("deleteEntity")}}', 
                'method' : 'POST',  
                'data' : { 
                    'entity_id' : entity_id, 
                    'entity_name' : entity_name, 
                    'entity_id_field': entity_id_field
                },  
                'success' : function(resp) {
                    window.location.href = "{{asset('restaurantsList')}}"; 
                }
            });
        }
    }
     
    function updateEntity() {
        let entity_name = $('div[entity-name]').attr('entity-name'); 
        let entity_id_field = $('div[entity-id-field]').attr('entity-id-field'); 
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
        console.log(data_form); 
        $.ajax({
            'url' : '{{asset("updateEntityPost")}}', 
            'method' : 'POST', 
            'data' : {
                'entity_id'   : {{$id}},  
                'entity_name' : entity_name, 
                'entity_id_field' : entity_id_field, 
                'fileds' : data_form
            },  
            'success' : function(resp) {
                console.log( resp ); 
                window.location.href = "{{asset('menuList')}}"; 
            }
        }); 
    } 
</script>

 @endsection