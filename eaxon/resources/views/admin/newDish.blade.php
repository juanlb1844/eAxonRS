@extends('admin.layout') 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css"/>
<link rel="stylesheet" type="text/css" href="https://begima.com.mx/public/js/sortable/theme.css"/> 
<script type="text/javascript" src="https://begima.com.mx/public/js/sortable/Sortable.min.js"/></script>

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
            <h1>Crear platillo</h1>
        </div>
        <div class="col-lg-12">
            <div class="dropzone col-lg-12" id="dropzone-1"></div> 
        </div>
        <div class="col-lg-12">
            <div id="galeria" class="content-gallery-1">
                 <!--
                 <div class="element-gallery imagen-1 col-lg-2" link="https://acroadtrip.blob.core.windows.net/catalogo-imagenes/s/RT_V_d90806c14f064e0c9577278dcfcc35a9.jpg" style="background-image: url('https://acroadtrip.blob.core.windows.net/catalogo-imagenes/s/RT_V_d90806c14f064e0c9577278dcfcc35a9.jpg');"><input type="checkbox" class="status-photo" checked="" idphoto="1" /> <button onclick="borrarFoto(1)" class="btn btn-default pull-right delete-img">&nbsp;</button></div> 
                 <div class="element-gallery imagen-2 col-lg-2" link="https://www.eluniversal.com.mx/sites/default/files/2019/02/22/challenger.jpg" style="background-image: url('https://www.eluniversal.com.mx/sites/default/files/2019/02/22/challenger.jpg');"><input type="checkbox" class="status-photo" checked="" idphoto="1" /> <button onclick="borrarFoto(2)" class="btn btn-default pull-right delete-img">&nbsp;</button></div> 
                 <div class="element-gallery imagen-3 col-lg-2" link="https://cdn.motor1.com/images/mgl/xxONq/s1/final-c7-chevrolet-corvette.jpg" style="background-image: url('https://cdn.motor1.com/images/mgl/xxONq/s1/final-c7-chevrolet-corvette.jpg');"><input type="checkbox" class="status-photo" checked="" idphoto="1" /> <button onclick="borrarFoto(3)" class="btn btn-default pull-right delete-img">&nbsp;</button></div>  --> 
            </div> 
        </div>
        <div class="col-lg-12 np" data-entity="form-entity" entity-name="dish">
            <div class="col-lg-6 col-md-4 col-12 pd1">
                <p>Título</p> 
                <input field="data" name-field="name" type-field="input" class="form-control" id="checkin-name" placeholder="título del menú" type="text" name="">
            </div>
             <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Precio</p>
                <input field="data" name-field="price" type-field="input" class="form-control" id="checkin-name" placeholder="$" type="text" name="">
            </div>
            <div class="col-lg-6 col-md-4 col-12 pd1">
                <p>Categorías</p>
                <select multiple class="form-control categories-relation">
                    @foreach( $categories_menu as $category )
                      <option value="{{$category->idcategories_menu}}">{{$category->name}}</option>
                    @endforeach 
                </select>
            </div>
            <div class="col-lg-6 col-md-4 col-12 pd1">
                <p>Ingredientes</p>
                <select multiple class="form-control ingredients-relation">
                    @foreach( $ingredients as $ingredient ) 
                      <option value="{{$ingredient->idingredients}}">{{$ingredient->name}}</option>
                    @endforeach 
                </select>
            </div>
             <div class="col-lg-12 col-md-4 col-12 pd1">
                <p>Descripción</p>
                <textarea field="data" name-field="description" type-field="input" class="form-control" rows="4" cols="12"></textarea> 
            </div>
            
            <div id="qrcode-2"></div>
            <div class="col-lg-12 pd1">
                <button class="btn btn-primary" onclick="saveEntity()">guardar</button>
            </div> 
        </div>

<script type="text/javascript">

    Dropzone.autoDiscover = false;

    let images_list = Array(); 
    let images_list_upload = Array();

    function borrarFoto(id) {
      if( confirm("¿seguro?")) {
        $('.imagen-'+id).remove();
        updateListImgs(); 
      } 
    }

    function updateListImgs() {
      images_list_upload = Array(); 
      $('.content-gallery-1 .element-gallery').each( function(a, b) {
        images_list_upload.push($(b).attr('link')); 
      }); 
      console.log(images_list_upload); 
    }

    window.onload = function() {

        // order elements 
        var gridDemo = $('.content-gallery-1')[0];  
        new Sortable(gridDemo, {
            animation: 150,
            ghostClass: 'blue-background-class', 
            onEnd: function (/**Event*/evt) { 
              image_link = $(evt.item).attr('link'); 
              console.log( evt.oldIndex );    
              console.log( image_link ); 
              images_list.push(image_link); 
              console.log( evt.to ); 
              $('.element-gallery').each( function(a, b) {
                console.log($(b).attr('link')); 
              });  
            }, 
        });

        // upload file 
        myDropzone = new Dropzone("#dropzone-1", {
            url: "{{asset('uploadPhoto')}}",
            paramName: "file", 
            dictDefaultMessage:'<span id="drop-mge">Arrastra o haz click para cargar las imágenes</span>',
            maxFilesize: 2,
            maxFiles: 10,
            acceptedFiles: "image/*,application/pdf",
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
                images_list_upload.push(r.link); 
                $('.content-gallery-1').append('<div class="element-gallery imagen-'+r.id+' col-lg-2" link="'+r.link+'" style="background-image: url('+r.link+');"><input type="checkbox" class="status-photo" checked="" idphoto="1" /><button onclick="borrarFoto('+r.id+')" class="btn btn-default pull-right delete-img">&nbsp;</button></div>');  
                console.log( images_list_upload ); 
              } 
        }); 
    }
 
    function saveEntity() {
        let entity_name = $('div[entity-name]').attr('entity-name'); 
        let data_form = Array(); 
        let categories_relation = $('.categories-relation').val(); 
        let ingredients_relation = $('.ingredients-relation').val(); 

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
            'url' : '{{asset("newDishEntityPost")}}', 
            'method' : 'POST', 
            'data' : {
                'categories_relation' : categories_relation, 
                'ingredients_relation' : ingredients_relation, 
                'fileds' : data_form, 
                'resources' : images_list_upload, 
                'entity_name' : entity_name  
            }, 
            'success' : function(resp) {
                console.log( resp ); 
                window.location.href = "{{asset('dishList')}}"; 
            }
        }); 
    }
</script>
  
 @endsection