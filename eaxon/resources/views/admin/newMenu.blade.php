@extends('admin.layout') 

@section('page')
        <div class="col-lg-12 pd1">
            <h1>Crear menú</h1>
        </div>
        <div class="col-lg-12 np" data-entity="form-entity" entity-name="menu"> 
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Título</p>
                <input class="form-control" field="data" name-field="name" type-field="input" placeholder="título del menú" type="text" name="">
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Restaurantes</p>
                <select field="data" name-field="restaurants_idrestaurants" type-field="input" class="form-control">
                    @foreach( $restaurants as $key => $restaurant )
                        <option value="{{$restaurant->idrestaurants}}">{{$restaurant->name}}</option>
                    @endforeach 
                </select>
            </div>
             <div class="col-lg-12 col-md-4 col-12 pd1">
                <p>Descripción</p>
                <textarea class="form-control" rows="5" cols="12"></textarea>
            </div>
           
            <div class="col-lg-12 pd1">
                <button class="btn btn-primary" onclick="saveEntity()">guardar</button>
            </div>
        </div>


          <div class="col-lg-12 pd1">
                <div class="panel-group np">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <span class="title-panel">configuración</span>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-4 col-12 pd1">
                                <p>Activo desde</p> 
                                <input class="form-control" field="data" name-field="name" type-field="input" placeholder="activo desde" type="datetime-local" name="">
                            </div>
                             <div class="col-lg-4 col-md-4 col-12 pd1">
                                <p>Activo hasta</p>
                                <input class="form-control" field="data" name-field="name" type-field="input" placeholder="activo desde" type="datetime-local" name="">
                            </div>
                        </div>
                    </div>
                  </div>
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
        console.log(data_form); 

        $.ajax({
            'url' : '{{asset("newEntityPost")}}', 
            'method' : 'POST', 
            'data' : {
                'entity_name' : entity_name, 
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