<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <script type="" src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>   --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> 
<!-- <script src="../dist/gridstack.js"></script>--> 

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Log In | eAxón</title>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Styles -->

<script src="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.standalone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fastselect/0.7.3/fastselect.css">


 <style type="text/css">
   .pd1 {
    padding: 10px; 
   }
   .form-control {
        /*background-color: #212228;*/ 
        font-size: 17px; 
        font-weight: 400;
   }
   .panel-default {
              background-color: transparent; 
          }
   .form-control:active, .form-control:fucus { box-shadow: none; }
</style>

  
</head>
 
<body>

  <!-- cargar --> 
   <div id="overlay">
    <div class="cv-spinner">
      <span class="spinner"></span>
    </div>
  </div>
  <!-- // cargar -->  
 
 <style type="text/css">
  td span { font-size: 15px; font-weight: 600; }
     td:hover{ cursor: pointer; }
     table.dataTable.no-footer {
         border-bottom: 1px solid #dddddd; 
    }
    @if ( isset($extra['selected-option']) ) 
        .selected-{{$extra['selected-option']}} { background-color: lightgrey; }
    @endif  
    .np-l { padding-left: 0px!important; }
    .np   { padding: 0px!important; }
    .np-r { padding-right: 0px!important; }
    .np-t { padding-top: 0px!important; }
    .np-b { padding-bottom: 0px!important; }
    .title-field { font-weight: 600; font-size: 15px; }
 </style>
 

<style type="text/css">
  #overlay{ 
  position: fixed;
  top: 0;
  z-index: 99999;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}


.section-login, .section-slider {
  min-height: 100vh;
}
.section-slider {
  background-color: gray; 
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-image: url('{{asset('media-admin/banner-login.webp')}}'); 
}
.section-login {
  border-left: 1px solid #f5f2f5; 
  padding-top: 30vh;
}
.header-login { text-align: center; min-height: 100px; }
.header-login span.title { font-weight: 900; font-size: 27px; display: block; }
.header-login span.subtitle { font-weight: 400; font-size: 14px; color: #999999; }

.content-login-section { padding: 10px 70px; }
.row-login { min-height: 50px; }

.btn-enter { min-height: 40px; width: 100%; border-radius: 9px; height: 35px; font-weight: 600; }

.enter-google {
  background-color: white; 
  border: 1px solid #d3d3d3;
  color: #424754;
  background-image: url('{{asset('media-admin/google-logo.png')}}');
  background-repeat: no-repeat;
  background-position: 7vw 5px;
  background-size: 30px; 
  font-weight: 600;
  border-radius: 9px;
}
.invitation { font-size: 17px; color: #999999; }

.content-company { padding: 20px 100px; }
.content-company span { font-size: 45px; font-weight: 900; }
</style>
      
 
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
        <div class="col-lg-7 section-slider" style="padding: 0px!important; overflow-y: auto;">
         <div class="content-company">
           <span>eAxón</span>
         </div>
        </div> 
        <div class="col-lg-5 section-login">
          <div class="content-login-section">
            <div class="header-login">
              <span class="title">ACCEDE A TU CUENTA</span>
              <span class="subtitle">¿no tienes una cuenta? <a href=""> créala aquí </a> </span>
            </div>
            <div class="body-login">
              <div class="row-login">
                <input class="form-control" id="user" type="" name="" placeholder="usuario">
              </div>
              <div class="row-login">
                <input class="form-control" id="pass" type="" name="" placeholder="contraseña">
              </div>
              <div class="row-login">
                <button class="btn btn-primary btn-enter btn-enter-local">Iniciar Sesión</button>
              </div>
              <div class="row-login">
                <button class="btn btn-primary btn-enter enter-google"> 
                  <span>Entrar con Google</span>
                </button>
              </div>
               <div class="row-login">
                <span class="invitation">Empieza con una cuenta de prueba de 30 días</span>
              </div>
            </div>
          </div>
        </div>
    </div>
   

   <script type="text/javascript">
     $('.btn-enter-local').click( function() {
        $('#overlay').fadeIn(); 
        let user = $('#user').val(); 
        let pass = $('#pass').val(); 
        $.ajax({
          'url' : '{{asset("check-login-admin")}}', 
          'method'  : 'post',  
          'data' : {
            'user' : user, 
            'pass' : pass
          }, 
          'success' : function( resp ) {
            $('#overlay').fadeOut(); 
            if( resp != 'error') {
              window.location.href = "{{asset('/')}}"; 
            } else {
              alert("Credenciales incorrectas");
            }
          }
        }); 

     }); 
   </script>
 
</body>
</html>