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

<title>Checkin</title>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Styles -->
 <style type="text/css">
   .pd1 {
    padding: 10px; 
   }
   .btn-delete {
      border: 1px solid red!important;
   }
   .form-control {
        background-color: #212228;
        color: white; 
        font-size: 20px; 
   }
   .panel-default {
              background-color: transparent; 
          }
    .title-panel {
        font-size: 20px; 
        font-weight: 800; 
    } 
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
</style>
     
<style type="text/css">
   
  html, body{ 
      font-family: 'Rajdhani'!important;   
  } 
  .menu-options li {
      display: block;
      margin: 0px 0px; 
      color: #434b69; 
      font-size: 15px; 
  } 
  .menu-options li a {
      color: white;  
  }
  .menu-options li a:hover {
      text-decoration: none; 
  }
  .menu-options {
      font-size: 12px;  
      padding-top: 20px;
      font-weight: 500!important;
      list-style: none; 
      padding-left: 10px;  
      margin-right: 10px; 
  }
  .container-side {
      height: 100vh;
      background: #212228;
      /*position: fixed;*/
      z-index: 99;
      border-right: 1px solid gray; 
  }
  .panel-right {
      padding: 45px 0px; width: 120%; padding-left: 25vh
  }
</style>

    <style type="text/css">
        .option-side-conteainer {
            display: inline-block; 
            width: 35px;  
            height: 35px; 
            /*border: 1px solid gray;*/ 
            border-radius: 14px;
            background-color: #ffffff;  
            box-shadow: 0px 7px 6px 0px #8080803b; 
            background-size: 75%;
            background-position: center;
            background-repeat: no-repeat;
        }
        .opt-hotels {
            background-image: url({{asset('media-admin/hotel.svg')}}); 
        }
        .opt-clock {
            background-image: url({{asset('media-admin/clock.svg')}}); 
        }
        .opt-misc {
            background-image: url({{asset('media-admin/duck.svg')}}); 
            background-size: 85%; 
        } 
        .opt-activities {
            background-image: url({{asset('media-admin/activities.svg')}}); 
            background-size: 65%; 
        }
        .opt-dashboard {
            background-image: url({{asset('media-admin/checkin.svg')}}); 
        }
        .opt-dish {
            background-image: url({{asset('media-admin/dish-2.svg')}}); 
            background-size: 95%; 
        }
        .txt-option {
            padding: 10px; 
            font-weight: 600;
            color: white;
            font-size: 20px; 
        }
        .menu-options li {
            border-radius: 10px; 
            padding: 5px; 
            transition-property: all; transition-duration: .2s; 
            margin-top: 5px;
        } 
        .inter-menu li:hover {
            background-color: #333333;  
            cursor: pointer;
            transition-property: all; transition-duration: .2s;  
        }

        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
          background-color: #242424;
        }
    </style>

    <style type="text/css">
    table {
        border: 1px solid #dddddd;
        border-radius: 7px;
    }
    th {
        border-bottom: 1px solid #f0f0f0!important;
        background-color: #efefef;
        color: #696969; 
        font-weight: 900!important; 
    }
    td {
        color: #7b848d;  
        font-weight: 500; 
        font-size: 12px; 
    }
    .container-header { 
        padding: 5px 0px 35px 0px;
    }
    #example_filter input {
        border: 1px solid #efefef;
        border-radius: 10px;
        height: 25px; 
    }

    .btn-default {
        border-radius: 4px;
        font-weight: 900;
    }
    .btn-primary {
            background-color: #000000; border: 0px; border-radius: 4px;
            transition-property: all; 
            transition-duration: .2s; 
            box-shadow: 0px 2px 5px 0px #b5b5b5;
            padding: 5px 35px;
            font-weight: 900;
            font-size: 17px;
          }
          .btn-primary:hover, .btn-primary:active, .btn-primary:focus{  
            box-shadow: 0px 2px 4px 1px #3a3a3a;
            background-color: #3a3a3a!important;
            transition-property: all; 
            transition-duration: .2s; 
          }
          .label-sucess {
            background-color: #39b67c; 
          }
          
          .inter-menu li { display: inline-block; width: 100%; }


          html, body{
            background-color: #212228;
            color: white; 
          }
</style>
 
    <div class="container-fluid" style="padding-left: 0px;">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 container-side" style="padding: 0px!important; width: 190px; overflow-y: auto;">
            <div>  
                <div style="text-align: center; padding-top: 0px!important;">
                    <h3 style="font-weight: 900; margin: 5px; font-size: 35px; letter-spacing: 1px; margin-top: 35px; color: #3fbf92; background-color: black; border-radius: 4px; display: inline-block; padding: 4px 20px; border: 2px solid gray;">eAx</span>ón</h3>
                </div>
                <ul class="menu-options">
                    <li class="col-lg-12 selected-admin-pedidos">
                        <a href="{{asset('')}}"> 
                            <div class="col-lg-6 option-side-conteainer opt-dashboard">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Checkin</span>
                            </div>
                        </a> 
                        <ul class="inter-menu">
                          <li><a href="{{asset('list')}}"><span>--Huespedes</span></a></li>
                          <li><a href="{{asset('catalogues')}}"><span>--Catálogos</span></a></li>
                        </ul>
                    </li> 
                    <li class="col-lg-12 selected-admin-pedidos">
                        <a href="{{asset('')}}"> 
                            <div class="col-lg-6 option-side-conteainer opt-dish">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Cocina</span>
                            </div>
                        </a> 
                        <ul class="inter-menu">
                          <li><a href="{{asset('restaurantsList')}}"><span>--Restaurantes</span></a></li>
                          <li><a href="{{asset('menuList')}}"><span>--Menús</span></a></li>
                          <li><a href="{{asset('dishList')}}"><span>--Platillos</span></a></li>
                          <li><a href="{{asset('categoriesDishList')}}"><span>--Categorías</span></a></li>
                          <li><a href="{{asset('ingredientList')}}"><span>--Ingredientes</span></a></li>
                        </ul>
                    </li>   
                     <li class="col-lg-12 selected-admin-pedidos">
                        <a href="{{asset('')}}"> 
                            <div class="col-lg-6 option-side-conteainer opt-activities">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Actividades</span>
                            </div>
                        </a> 
                        <ul class="inter-menu">
                          <li><a href="{{asset('list')}}"><span>--Actividades</span></a></li>
                        </ul>
                    </li>  
                     <li class="col-lg-12 selected-admin-pedidos">
                        <a href="{{asset('')}}"> 
                            <div class="col-lg-6 option-side-conteainer opt-misc">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Miscelanea</span>
                            </div>
                        </a> 
                        <ul class="inter-menu">
                          <li><a href="{{asset('list')}}"><span>--Productos</span></a></li>
                          <li><a href="{{asset('list')}}"><span>--Categorías</span></a></li>
                        </ul>
                    </li>  
                     <li class="col-lg-12 selected-admin-pedidos">
                        <a href="{{asset('')}}"> 
                            <div class="col-lg-6 option-side-conteainer opt-hotels">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Hoteles</span>
                            </div>
                        </a> 
                        <ul class="inter-menu">
                          <li><a href="{{asset('hotelList')}}"><span>--Lista</span></a></li>
                          <li><a href="{{asset('list')}}"><span>--Grupos</span></a></li>
                        </ul>
                    </li>
                    <li class="col-lg-12 selected-admin-pedidos">
                        <a href="{{asset('')}}"> 
                            <div class="col-lg-6 option-side-conteainer opt-clock">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Home</span>
                            </div>
                        </a> 
                        <ul class="inter-menu">
                          <li>
                            <a href="{{asset('configHome')}}"><span>--Sliders home</span></a>
                          </li>
                          <li>
                            <a href="{{asset('list')}}"><span>--Status</span></a>
                          </li>
                        </ul>
                    </li>  
                </ul>
            </div> 
        </div>

        <div class="col-lg-10 col-md-10" style="padding-top: 70px;">
            @yield('page')   
        </div>
   

    </div>
  
 
</body>
</html>