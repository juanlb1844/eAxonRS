@extends('admin.layout') 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"/>

<style type="text/css">
  .element-gallery {
    height: 170px; 
    width: auto;
    background-size: cover;
    background-repeat: no-repeat;
  }
  /* CUSTOM DROPZONE */ 
  .dz-message {
    margin: 1em 0px!important;
  }
  /* CUSTOM DROPZONE */ 
  .dropzone { border: 2px dotted red; height: 170px; width: 100%; padding: 0px!important; display: inline-block; margin-top: 20px; 
              background-color: transparent; margin-bottom: 20px; font-size: 20px; }
  .dropzone:hover { border: 4px solid #60d192; }

  .delete-img {
    background-image: url('{{asset('media-admin/trash.svg')}}')!important; 
    background-repeat: no-repeat;
    opacity: .7;
    margin-top: 2px!important; 
  }
  .status-photo {
    transform: scale(2);
    margin-top: 10px!important; 
    opacity: .6;
  }
</style>

@section('page')
    <div class="col-lg-12 pd1">
        <h1>Editar restaurante</h1>
    </div>
      <div class="col-lg-12 pd1">
            <div class="col-lg-4 np">
                <img id="img-prev" style="border-radius: 16px; width: 100%;" src="{{$entity->url_img}}">
            </div>
            <div class="col-lg-8 np">
                 <div class="dropzone col-lg-12" id="dropzone-1"></div> 
            </div>
        </div>
    <div class="col-lg-12 np" data-entity="form-entity" entity-id-field="idrestaurants" entity-id="{{$entity->idrestaurants}}" entity-name="restaurants">
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Nombre</p> 
            <input field="data" type-field="input" name-field="name" class="form-control" id="checkin-name" placeholder="título del platillo" type="text" name="" value="{{$entity->name}}">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Hoteles</p>
            <select field="data" name-field="hotel_idhotel" type-field="input" class="form-control">
                @foreach( $restaurants as $restaurant ) 
                    @if( $entity->hotel_idhotel == $restaurant->idhotel )
                        <option selected value="{{$restaurant->idhotel}}">{{$restaurant->name}}</option> 
                    @else 
                        <option value="{{$restaurant->idhotel}}">{{$restaurant->name}}</option> 
                    @endif 
                @endforeach 
            </select> 
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Ubicación</p>
            <input field="data" type-field="input" name-field="ubication" class="form-control" id="checkin-name" placeholder="ubicación del restaurante" type="text" name="" value="{{$entity->ubication}}">
        </div> 
         <div class="col-lg-12 col-md-4 col-12 pd1"> 
            <p>Descripción</p>
            <textarea class="form-control" rows="7" cols="7" value=""></textarea>
        </div>
        <div class="col-lg-12 col-md-4 col-12 pd1" style="display: none;">
                <input class="form-control url_image" field="data" name-field="url_img" type-field="input" type="text" name="">
            </div> 
        <div class="col-lg-12 pd1">
            <button class="btn btn-primary" onclick="saveEntity()">guardar</button>
            <button class="btn btn-primary btn-delete" onclick="deleteEntity()">borrar</button>
        </div>
    </div> 
<!-- 
    Lógica del formulario incluida en el HTML, adaptador en SCRIPT 
--> 
<script type="text/javascript">


         Dropzone.autoDiscover = false;
      let url_image = ""; 

          window.onload = function() {
     // upload file  
        myDropzone = new Dropzone("#dropzone-1", {
            url: "{{asset('uploadPhotoHotel')}}",
            paramName: "file", 
            dictDefaultMessage:'<span id="drop-mge">Arrastra o haz click para cargar las imágenes</span>',
            maxFilesize: 2,
            maxFiles: 10,
            acceptedFiles: "image/*",
            autoProcessQueue: true, 
            init: function() {
              this.on("addedfile", function(file) { 
                console.log("Se ha añadido una imágen"); 
            });
            },  
            sending:  function(file, xhr, formData){
              formData.append('idProuct', 1); 
            },   
            success: function( resp ) { 
                let r = resp.xhr.responseText; 
                r = JSON.parse(r); 
                url_image = r.link; 
                $('.url_image').val(r.link); 
                $('#img-prev').attr("src", r.link); 
                /*  
                $('.content-gallery-1').append('<div class="element-gallery imagen-'+r.id+' col-lg-2" link="'+r.link+'" style="background-image: url('+r.link+');"><input type="checkbox" class="status-photo" checked="" idphoto="1" /><button onclick="borrarFoto('+r.id+')" class="btn btn-default pull-right delete-img">&nbsp;</button></div>'); */
              } 
        });  
    }



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
    function saveEntity() {
        let entity_name = $('div[entity-name]').attr('entity-name'); 
        let entity_id = $('div[entity-id]').attr('entity-id'); 
        let data_form = Array();
        $('div[data-entity]').find('[field]').each( 
            function( a , b ) { 
                let type_field = $(b).attr('type-field'); 
                let name_field = $(b).attr('name-field'); 
                let val_field = $(b).val(); 
                data_form.push({
                    'type_field' : type_field, 
                    'name_field' : name_field, 
                    'val_field'  : val_field 
                }); 
            }
        ); 
        $.ajax({  
            'url' : '{{asset("editRestaurantPost")}}', 
            'method' : 'POST', 
            'data' : {
                'entity_id' : entity_id, 
                'fileds' : data_form
            },  
            'success' : function(resp) {
                window.location.href = "{{asset('restaurantsList')}}"; 
            }
        }); 
    }
</script>

 @endsection