@extends('admin.layout') 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"/>
<link rel="stylesheet" type="text/css" href="https://begima.com.mx/public/js/sortable/theme.css"/> 
<script type="text/javascript" src="https://begima.com.mx/public/js/sortable/Sortable.min.js"/></script>

 
@section('page')

        <div class="col-lg-12 pd1">
            <h1>Editar tipo de cliente</h1>
        </div>
        <div class="col-lg-12 np" data-entity="form-entity" entity-id-field="idguest_types" entity-name="guest_types">
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Título</p> 
                <input field="data" name-field="title" type-field="input" class="form-control" id="checkin-name" placeholder="título" type="text" name="" value="{{$entity->title}}">
            </div>
            <div class="col-lg-8 col-md-8 col-12 pd1">
                <p>Descripción</p> 
                <textarea field="data" name-field="description" type-field="input" class="form-control" id="checkin-name" placeholder="Descripción del tipo de cliente" type="text" name="" value="">{{$entity->description}}</textarea>
            </div>
            <div class="col-lg-12 pd1">
                <button class="btn btn-primary" onclick="updateEntity()">editar</button>
                <button class="btn btn-primary btn-delete" onclick="deleteEntity()">borrar</button>
            </div> 
        </div>
 
<script type="text/javascript">
    
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
                    window.location.href = "{{asset('listClientTypes')}}"; 
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
                window.location.href = "{{asset('listClientTypes')}}"; 
            }
        }); 
    }
</script>
  
 @endsection