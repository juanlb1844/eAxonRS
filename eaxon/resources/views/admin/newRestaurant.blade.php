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

 .content-prev-image {
    padding-top: 10px; 
    margin-bottom: 20px; 
  }
  .prev-image {
    display: inline-block; 
    width: 350px; 
    height: 300px; 
    border-radius: 12px; 
    background-color: black; 
    background-position: center;
    background-size: cover;
    background-image: url('https://nuevascsensaludocupacional.com/modules/iblog/img/post/default.jpg');
  }

</style>

@section('page')
    <div class="col-lg-12 pd1">
        <h1>Crear restaurante</h1> 
    </div>
    <div class="col-lg-12 pd1">
            <div class="col-lg-4 np">
                <div class="content-prev-image">
                    <div class="prev-image" style="background-image: url('https://nuevascsensaludocupacional.com/modules/iblog/img/post/default.jpg')">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 np">
                 <div class="dropzone col-lg-12" id="dropzone-1"></div> 
            </div> 
        </div>
    <div class="col-lg-12 np" data-entity="form-entity" entity-name="restaurants">
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Nombre</p> 
            <input field="data" type-field="input" name-field="name" class="form-control" id="checkin-name" placeholder="título del restaurante" type="text" name="">
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Hoteles</p>
            <select field="data" name-field="hotel_idhotel" type-field="input" class="form-control">
                @foreach( $restaurants as $restaurant ) 
                    <option value="{{$restaurant->idhotel}}">{{$restaurant->name}}</option> 
                @endforeach 
            </select>
        </div>
        <div class="col-lg-4 col-md-4 col-12 pd1">
            <p>Ubicación</p>
            <input field="data" type-field="input" name-field="ubication" class="form-control" id="checkin-name" placeholder="ubicación del restaurante" type="text" name="">
        </div> 
         <div class="col-lg-12 col-md-4 col-12 pd1">
            <p>Descripción</p>
            <textarea field="data" type-field="input" name-field="description" class="form-control" rows="7" cols="7"></textarea>
        </div> 
         <div class="col-lg-12 col-md-4 col-12 pd1" style="display: none;">
                <input class="form-control url_image" field="data" name-field="url_img" type-field="input" type="text" name="">
            </div> 
        <div class="col-lg-12 pd1">
            <button class="btn btn-primary" onclick="saveEntity()">guardar</button>
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
                $('.prev-image').css("background-image", "url('"+r.link+"')"); 
                /*  
                $('.content-gallery-1').append('<div class="element-gallery imagen-'+r.id+' col-lg-2" link="'+r.link+'" style="background-image: url('+r.link+');"><input type="checkbox" class="status-photo" checked="" idphoto="1" /><button onclick="borrarFoto('+r.id+')" class="btn btn-default pull-right delete-img">&nbsp;</button></div>'); */
              } 
        });  
    }


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
        $.ajax({
            'url' : '{{asset("newRestaurantPost")}}', 
            'method' : 'POST', 
            'data' : {
                'fileds' : data_form
            }, 
            'success' : function(resp) {
                console.log( resp ); 
                window.location.href = "{{asset('restaurantsList')}}"; 
            }
        }); 
    }
</script>

 @endsection