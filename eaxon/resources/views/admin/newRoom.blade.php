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
  .content-prev-image {
    padding-top: 10px; 
    margin-bottom: 20px; 
  }
  .prev-image {
    display: inline-block; 
    width: 100%; 
    height: 300px; 
    border-radius: 12px; 
    background-color: black; 
    background-position: center;
    background-size: cover;
    background-image: url('https://q-xx.bstatic.com/xdata/images/hotel/840x460/167534297.jpg?k=ca14cfb44b0a9e23dcf611a2326d73f40a97e568a62d468281f3b588c6aec5c5&o=');
  }
</style>
 
@section('page')
<div class="col-lg-12 pd1">
    <h1>Crear habitación</h1>



</div>  
<div class="col-lg-12 np" data-entity="form-entity" entity-name="room">
    <!-- 
    <div class="col-lg-8 col-md-8 col-sm-9">
        <div class="dropzone col-lg-12" id="dropzone-1"></div> 
    </div> -->
    <div class="col-lg-8">
    <div class="col-lg-4 col-md-4 col-xs-12 pd1">
        <p>Etiqueta de la habitación</p> 
        <input field="data" name-field="title" type-field="input" class="form-control" id="title" placeholder="102" type="text" name=""> 
    </div>
    <div class="col-lg-4"> 
        <p>Hotel</p>
        <select field="data" name-field="hotel_idhotel" type-field="input" class="form-control" id="planta" placeholder="" type="text" class="form-control">
            @foreach( $hotels as $k => $hotel )
                <option value="{{$hotel->idhotel}}">{{$hotel->name}}</option>
            @endforeach 
        </select>  
        <input field="data" name-field="status" type-field="input" class="form-control" id="status" placeholder="" type="text" name="" style="display: none;" value="libre">
        <input field="data" name-field="condition" type-field="input" class="form-control" id="status" placeholder="" type="text" name="" style="display: none;" value="limpia"> 
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 pd1">
        <p>Planta</p>
        <input field="data" name-field="planta" type-field="input" class="form-control" id="planta" placeholder="" type="text" name="">
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 pd1">
        <p>Tipo de habitación</p>
        <select field="data" name-field="type_room_idtype_room" type-field="input" class="form-control" id="planta" placeholder="" type="text" class="form-control">  
            @foreach( $types as $k => $type )
                <option value="{{$type->idtype_room}}">{{$type->title}} ({{$type->price_per_night}})</option>
            @endforeach 
        </select> 
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 pd1">
        <p>Sección</p>
        <input field="data" name-field="section" type-field="input" class="form-control" id="type" placeholder="" type="text" name="">
    </div>
    <div class="col-lg-12 pd1">
        <button class="btn btn-primary" onclick="saveEntity()">guardar</button>
    </div> 
    </div> 
    <div class="col-lg-4 col-md-4 col-sm-3">
        <div class="content-prev-image">
            <div class="prev-image"></div> 
        </div>
    </div> 
</div> 

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
            maxFiles: 1,
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
                $('.prev-image').css("background-image", "url("+r.link+")"); 
                $('#img').val(url_image); 
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
                window.location.href = "{{asset('listRooms')}}";  
            }
        }); 
    }
</script>
  
 @endsection