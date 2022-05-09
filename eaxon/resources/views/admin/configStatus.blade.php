@extends('admin.layout') 

@section('page')


<style type="text/css">
    td span {
        color: white; 
        font-size: 17px; 
    }
    td button {
        background-color: gray; 
        color: black;
        font-weight: bolder; 
    }
    th {
        background-color: black; 
    }

    /* */ 
    .rows-status {
        padding: 20px 0px;
    }
    .content-status {
        border: 1px solid #161616;
        border-radius: 12px; 
        padding: 20px 40px;
        margin-bottom: 10px;
    }

    .status-selector {
        display: inline-block;
        border: 1px solid #59d66c;
        color: #59d66c;
        padding: 7px 20px;
        border-radius: 12px;  
        width: 100%;
        font-size: 15px;
    }
    .status-selector:hover {
        cursor: pointer;   
        background-color: #59d66c1f; 
    }
    .selected-status:hover {
        background-color: #429b4f;
    }
    .content-controls {
        text-align: center;
    }
    .title-table {
        font-size: 20px;
        font-weight: 500; 
    }
    .content-table {
        font-size: 18px;
        line-height: 16px; 
        display: inline-block;
        padding-top: 4px;
    }

    .flag-status {
        display: inline-block;
        height: 30px; 
        width: 30px; 
        border-radius: 50%; 
        background-color: #ff5722; 
        border: 1px solid white;
    }


    .selected-status {
        background-color: #59d66c; 
        color: white;
    }
</style>
 
    <div class="col-lg-12 col-sm-12"> 
         <div class="col-lg-12 pd1">
            <span class="title-page">STATUS</span>
            <span class="description-page">
                Agrega el mensaje personalizado para que el cliente pueda tener un estimado <br> dl tiempo de respuesta.
            </span> 
            <a class="more-info" href=""><p>Más información sobre esta página <img style="width: 25px;" src="{{asset('/media-admin/link.svg')}}"> </p></a>
        </div>
        
        <div class="col-lg-12 np">
            
            <div class="col-lg-8 rows-status">
                
                <div class="content-status col-lg-12">
                    <div class="col-lg-6">
                        <div>
                            <span class="title-table">Mensaje para el cliente</span>
                        </div>
                        <div>
                            <span class="content-table">El tiempo actual de espera es de 45min estimado para poder recibir tu platillo</span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div>
                            <span class="title-table">Flag</span>
                        </div>
                        <div>
                            <span class="content-table flag-status"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 content-controls">
                        <div class="status-selector selected-status">
                            <span>Desactivar</span>
                        </div>
                    </div>
                </div>

                <div class="content-status col-lg-12">
                    <div class="col-lg-6">
                        <div>
                            <span class="title-table">Mensaje para el cliente</span>
                        </div>
                        <div>
                            <span class="content-table">El tiempo actual de espera es de 45min estimado para poder recibir tu platillo</span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div>
                            <span class="title-table">Flag</span>
                        </div>
                        <div>
                            <span class="content-table flag-status" style="background-color: #4caf50;"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 content-controls">
                        <div class="status-selector">
                            <span>Activar</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
            
        <div clas="foo-list">
            <button class="btn btn-primary newStatus">Nuevo</button>
            <button class="btn btn-primary">Programar status</button>
        </div>
    </div>

 
    <!-- Modal -->
<div id="newStatus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CREAR STATUS</h4>
      </div>
      <div class="modal-body row">
        <div calss="col-xs-12">
            <div class="content-modal">
                <div class="col-xs-12">
                    <p>Mensaje</p>
                    <textarea class="form-control" placeholder="mensaje que verá el cliente"></textarea>
                </div>
                <div class="col-xs-12">
                    <p></p>
                    <p>Color del texto</p>
                    <input type="color" name="">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button> 
      </div>
    </div>

  </div>
</div>



    <script type="text/javascript">
        $('.newStatus').click( function() {
            $('#newStatus').modal('toggle'); 
        }); 
        $('.status-selector').click( function( event ){
            if( $(event.target).closest('.status-selector').hasClass('selected-status') ) {
                $(event.target).closest('.status-selector').removeClass('selected-status'); 
                $(event.target).closest('.status-selector').find('span').html("Activar"); 
            } else {
                $(event.target).closest('.status-selector').addClass('selected-status'); 
                $(event.target).closest('.status-selector').find('span').html("Desactivar");
            }
        } ); 
    </script>
  

 @endsection