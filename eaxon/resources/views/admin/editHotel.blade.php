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
  .dropzone { border: 4px dotted red; height: 170px; width: 100%; padding: 0px!important; display: inline-block; margin-top: 20px; 
              background-color: transparent; margin-bottom: 20px; font-size: 35px; }
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
            <h1>Editar hotel</h1>  
        </div> 
        <div class="col-lg-12 pd1">
            <div class="col-lg-4 col-md-4 np">
                <div class="content-prev-image">
                    <div class="prev-image" style="background-image: url('{{$entity->url_img}}')"></div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 np">
                 <div class="dropzone col-lg-12" id="dropzone-1"></div> 
            </div>
        </div>
        <div class="col-lg-12 np" data-entity="form-entity" entity-id-field="idhotel" entity-name="hotel"> 
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Título</p>
                <input class="form-control" field="data" name-field="name" type-field="input" placeholder="título del menú" type="text" name="" value="{{$entity->name}}">
            </div> 
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Razón social</p>
                <input class="form-control" field="data" name-field="company" type-field="input" placeholder="nombre de la razón social" type="text" name="" value="{{$entity->company}}">
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Estado</p>
                <select class="form-control" field="data" type-field="input" name-field="state_idstate">
                     @foreach( $states as $key => $state )
                        @if( $entity->state_idstate == $state->idstate )
                            <option selected value="{{$state->idstate}}">{{$state->name}}</option>
                        @else 
                            <option value="{{$state->idstate}}">{{$state->name}}</option>
                        @endif 
                    @endforeach 
                </select> 
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Pais</p>
                 <select class="form-control" field="data" type-field="input" name-field="country_idcountry">
                    @foreach( $countries as $key => $country )
                        @if( $entity->country_idcountry == $country->idcountry )
                            <option selected value="{{$country->idcountry}}">{{$country->name}}</option>
                        @else 
                            <option value="{{$country->idcountry}}">{{$country->name}}</option>
                        @endif 
                    @endforeach 
                </select>
            </div>
            <div class="col-lg-4 col-md-4 col-12 pd1">
                <p>Ciudad</p>
                <input field="data" name-field="city" class="form-control" type-field="input" placeholder="nombre de la ciudad" type="text" name="" value="{{$entity->city}}">
            </div>
             <div class="col-lg-12 col-md-4 col-12 pd1">
                <p>Dirección</p>
                <input class="form-control" field="data" name-field="direction" type-field="input" placeholder="dirección del hotel" type="text" name="" value="{{$entity->direction}}">
            </div>
             <div class="col-lg-12 col-md-4 col-12 pd1" style="display: none;">
                <input class="form-control url_image" field="data" name-field="url_img" type-field="input" type="text" name="">
            </div> 
            <div class="col-lg-12 pd1">
                <button class="btn btn-primary" onclick="saveEntity()">guardar</button>
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
                console.log( r ); 
                url_image = r.link; 
                $('.url_image').val(r.link);  
                $('.prev-image').attr("background-image", "url('"+r.link+"')");  
                /*  
                $('.content-gallery-1').append('<div class="element-gallery imagen-'+r.id+' col-lg-2" link="'+r.link+'" style="background-image: url('+r.link+');"><input type="checkbox" class="status-photo" checked="" idphoto="1" /><button onclick="borrarFoto('+r.id+')" class="btn btn-default pull-right delete-img">&nbsp;</button></div>'); */
              } 
        });  
    }


    function saveEntity() {
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
                'entity_id' : {{$id}}, 
                'entity_name' : entity_name,  
                'entity_id_field': entity_id_field, 
                'fileds' : data_form
            },  
            'success' : function(resp) {
                console.log( resp ); 
                window.location.href = "{{asset('hotelList')}}"; 
            }
        }); 
    }
</script>

 @endsection