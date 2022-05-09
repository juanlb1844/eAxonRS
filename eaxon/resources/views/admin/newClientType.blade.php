@extends('admin.layout') 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"/>
<link rel="stylesheet" type="text/css" href="https://begima.com.mx/public/js/sortable/theme.css"/> 
<script type="text/javascript" src="https://begima.com.mx/public/js/sortable/Sortable.min.js"/></script>

 
@section('page')

  
        <div class="col-lg-12 pd1">
            <h1>Crear tipo de cliente</h1>
        </div>
         
        <div class="col-lg-12 np" data-entity="form-entity" entity-name="guest_types">
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Título</p> 
                <input field="data" name-field="title" type-field="input" class="form-control" id="checkin-name" placeholder="título de categoría" type="text" name="">
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Color identificador (opcional)</p> 
                <input field="data" name-field="flag" type-field="input" class="form-control" id="checkin-name" placeholder="" type="color" name="">
            </div> 
            <div class="col-lg-8 col-md-8 col-12 pd1">
                <p>Descripción</p> 
                <textarea field="data" name-field="description" type-field="input" class="form-control" id="checkin-name" placeholder="Descripción de tipo de cliente" type="text" name=""></textarea>
            </div>
            <div class="col-lg-12 pd1">
                <button class="btn btn-primary" onclick="saveEntity()">guardar</button>
            </div> 
        </div> 

<script type="text/javascript">
 
    function saveEntity() {
        let entity_name = $('div[entity-name]').attr('entity-name'); 
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
            'url' : '{{asset("newEntityPost")}}', 
            'method' : 'POST', 
            'data' : {
                'fileds' : data_form, 
                'entity_name' : entity_name 
            }, 
            'success' : function(resp) {
                console.log( resp ); 
                window.location.href = "{{asset('listClientTypes')}}"; 
            }
        }); 
    }
</script>
  
 @endsection