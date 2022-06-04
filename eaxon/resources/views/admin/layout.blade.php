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

<script src="https://rawgit.com/dbrekalo/fastselect/master/dist/fastselect.standalone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fastselect/0.7.3/fastselect.css">


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
        border: 1px solid #5d5d5d;
   }
   .panel-default {
              background-color: transparent; 
          }
    .title-panel {
        font-size: 20px; 
        font-weight: 800; 
    } 
</style>

<style type="text/css">
    /* THEME FAST SELECT */ 
  .fstMultipleMode {
    width: 100%; 
    height: 50px; 
    border-radius: 7px; 
    padding: 4px; 
    display: inline-table!important;
  }
  .fstChoiceItem {
    font-size: 15px!important; 
    background-color:  #46b04a!important; 
    border: 1px solid #46b04a!important;
    padding-left: 30px!important;
  }
  .fstChoiceRemove { font-size: 30px!important; }
  .fstControls { display: inline!important; }
  .fstMultipleMode .fstControls { display: inline-block!important; width: 100%!important; padding: 0px!important; }
  .fstMultipleMode .fstQueryInputExpanded { font-size: 17px!important;  }
  .fstQueryInput { height: 30px; }
  .fstResultItem { font-size: 17px!important; }
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
      overflow: hidden;
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
      background: #212228;
      /*position: fixed;*/
      z-index: 99;
      min-height: 100vh;
  }
  .panel-right {
      padding: 45px 0px; width: 120%; padding-left: 25vh
  }
</style>

<style type="text/css">
  /* MEDIAS */ 
  @media ( max-width: 1600px ) {
    .menu-options {
      padding-left: 0px!important; 
    }
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
            margin-top: 5px; 
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
        .opt-spa {
          background-image: url({{asset('media-admin/spa.svg')}}); 
          background-size: 85%; 
        }

        .opt-activities {
            background-image: url({{asset('media-admin/activities.svg')}}); 
            background-size: 65%; 
        }
        .opt-dashboard {
            background-image: url({{asset('media-admin/checkin.svg')}}); 
        }
        .opt-ticket {
          background-image: url({{asset('media-admin/ticket.svg')}}); 
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
            box-shadow: none;
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
          
          .inter-menu li { 
            display: inline-block; 
            width: 100%;
            border-radius: 0px;
            margin: 0px; 
            padding-left: 0px;
            padding-top: 10px;
            font-size: 18px; 
          }
          .inter-menu { display: none; padding-left: 20px; width: 100%; }


          html, body{
            background-color: #212228;
            color: white; 
          }

  /* nuevo menú */ 
    .selected-option {
      background-color: white;
      display: inline-block;
      border-radius: 12px;
      width: 100%;
    }
    .selected-option span {
      color: #59d66c; 
      font-weight: 700; 
    }
    .selected-option + .inter-menu { display: inline-block; }
    /* **/ 
    .selected-admin-pedidos{
      background-color: transparent; 
      transition-property: all; 
      transition-duration: .2s;
    }
    .selected-admin-pedidos:hover {
      cursor: pointer;
      background-color: #00000040; 
      transition-property: all; 
      transition-duration: .2s;
    }


    .separator {
      width: 15px;
      display: inline-block;
      margin-bottom: 4;
      margin-right: 10px;
    }

    .{{request()->route()->uri}} {
      font-weight: bolder; 
    }


     /* theme */ 
    .title-page {
        font-weight: 900; 
        font-size: 35px; 
        display: block;
    }
    .description-page {
        font-size: 20px; 
        line-height: 20px;
        padding-bottom: 10px;
        display: inline-block;
    }
    .more-info { font-size: 17px; font-weight: 700; }
    .modal-content {
      background-color: #131313;
    }


    .border-b { border-bottom: 1px solid #363636; }
    .border-r { border-right: 1px solid #363636; }
    .inter-menu li { border-left: 1px solid #636363; }
    .separator { border-top: 1px solid #636363; }

    .content-user-info {
      text-align: center;
    }
    .user-avatar-admin {
      display: inline-block;
      width: 60px; 
      height: 60px; 
      border-radius: 50%; 
      background-position: center;
      background-size: cover;
      background-image: url('https://a0.muscache.com/im/pictures/user/9d2db02e-fe38-4c79-9233-72f221e7f4c2.jpg?im_w=240'); 
      border: 2px solid gray; 
    }
    .content-user-info {
      padding-top: 10px; 
    }
    .name-avatar-content {
      padding-top: 10px;
    }
    .avatar-title {
      font-size: 20px;   
      font-weight: 600;
    }
    .avatar-desc { color: gray; }

    .container-logo { background-color: #cfcfcf; }

    .exit:hover { cursor: pointer; }

     th, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
                border: 1px solid #2f2f2f!important;
        }

    .img-per-edit {
      width: 20px; display: inline-block;
    }
    .img-per-edit:hover{
      cursor: pointer;
    }

 
    .more-icon {
      width: 35px; 
      transition-property: all; 
      transition-duration: .2s;
    }
    .more-icon-switched {
      transition-property: all; 
      transition-duration: .2s;
      transform: rotate(90deg); 
    }

    .exit-section {
      border-top: 1px solid #4b4b4b;
      border-radius: 0px!important;
      margin-top: 20px!important;
      padding-top: 20px!important;
      color: white; font-size: 22px!important;
      font-weight: 600;
    }




     .create-btn {
                    background-color: #46b04a;
                    font-weight: 600;
                    font-size: 17px;
                    padding: 12px 35px;
                    width: 250px;
                    background-repeat: no-repeat;
                    background-position: right;
                    background-size: 27px;
                    text-align: left;
                    background-position-x: 92%; 
                    box-shadow: none; 
            }
            .create-btn:hover, .create-btn:active, .create-btn:selected{ 
                background-color: #3a8c3d!important; 
            }
</style>
 
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 container-side border-r" style="padding: 0px!important; overflow-y: auto;">

            <div class="col-lg-12 border-b container-logo" style="text-align: center;">
              <img style="width: 70%;" src="{{asset('media-admin/eaxon.png')}}">
            </div>

            <div class="col-lg-12 container-user-info">
              <div class="content-user-info">
                <div class="img-content">
                  <span class="user-avatar-admin">
                    
                  </span>
                </div>
                <div class="name-avatar-content">
                  <span class="avatar-title">John Doe</span>
                  <div>
                  <span class="avatar-desc">Administrador</span> <img class="img-per-edit" src="{{asset('media-admin/edit.svg')}}">
                    
                  </div>
                </div>
              </div>
            </div>
              
            <div class="col-lg-12">  
                <!-- 
                <div style="text-align: center; padding-top: 0px!important;">
                    <h3 style="font-weight: 900; margin: 5px; font-size: 35px; letter-spacing: 1px; color: #46b04a; background-color: #2c2c2c; border-radius: 4px; display: inline-block; padding: 4px 20px; border: 1px solid #193f1a;">eAx</span>ón</h3>
                </div> --> 

                 
                <ul class="menu-options" style="padding-left: 40px;">
                  <li class="col-lg-12 selected-admin-pedidos">
                        <div @if( request()->route()->uri == 'ticket-list' ) class="selected-option" @endif> 
                            <div class="col-lg-4 option-side-conteainer opt-ticket">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Tickets </span>
                                       <span class="num-notification" style="display: inline-block;font-size: 13px;background-color: #7ed66c;padding: 0px 10px;border-radius: 7px;color: #ffffff;     position: absolute; right: -20px; top: 5px;">1</span>
                            </div>
                            <div class="col-lg-2">
                              <img class="more-icon" src="{{asset('/media-admin/row-right.svg')}}">
                            </div>
                        </div> 
                        <ul class="inter-menu">
                          <li>
                              <a href="{{asset('ticket-list')}}">
                                <span class="separator"></span>
                                <span class="ticket-list">Listado</span>
                              </a>
                            </li>
                        </ul>
                    </li> 
                    <li class="col-lg-12 selected-admin-pedidos">
                        <div @if( request()->route()->uri == 'list' OR request()->route()->uri == 'listClientTypes' ) class="selected-option col-lg-12" @endif > 
                            <div class="col-lg-4 option-side-conteainer opt-dashboard">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Checkin</span>
                            </div>
                            <div class="col-lg-2"> 
                              <img class="more-icon" src="{{asset('/media-admin/row-right.svg')}}">
                            </div>
                        </div> 
                        <ul class="inter-menu">
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span class="list">Huespedes</span>
                            </a>
                          </li>
                          <li>
                              <a href="{{asset('listClientTypes')}}">
                                <span class="separator"></span>
                                <span class="listClientTypes">Tipo de clientes</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{asset('listRooms')}}">
                                <span class="separator"></span>
                                <span class="listClientTypes">Habitaciones</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{asset('listClientTypes')}}">
                                <span class="separator"></span>
                                <span class="listClientTypes">TAG'S</span>
                              </a>
                          </li>
                        </ul>
                    </li> 
                    <li class="col-lg-12 selected-admin-pedidos">
                        <div @if( request()->route()->uri == 'restaurantsList' OR request()->route()->uri == 'categoriesDishList' OR request()->route()->uri == 'menuList' OR request()->route()->uri == 'ingredientList' OR request()->route()->uri == 'guarnicionsList' OR request()->route()->uri == 'dishList' OR request()->route()->uri == 'newRestaurant' OR request()->route()->uri == 'newDishCategory' OR request()->route()->uri =='newDish') 
                                  class="selected-option col-lg-12" 
                              @endif> 
                            <div class="col-lg-4 option-side-conteainer opt-dish">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Cocina</span>
                            </div> 
                            <div class="col-lg-2">
                              <img class="more-icon" src="{{asset('/media-admin/row-right.svg')}}">
                            </div>
                        </div> 
                        <ul class="inter-menu">
                          <li>
                              <a href="{{asset('restaurantsList')}}">
                                <span class="separator"></span>
                                <span class="restaurantsList newRestaurant">Restaurantes</span>
                              </a>
                            </li>
                          <li>
                            <a href="{{asset('categoriesDishList')}}">
                              <span class="separator"></span>
                              <span class="categoriesDishList newDishCategory">Categorías</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('menuList')}}">
                              <span class="separator"></span>
                              <span class="menuList">Menús</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('ingredientList')}}">
                              <span class="separator"></span>
                              <span class="ingredientList">Ingredientes</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('guarnicionsList')}}">
                              <span class="separator"></span>
                              <span class="guarnicionsList">Guarniciones</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('dishList')}}">
                              <span class="separator"></span>
                              <span class="dishList newDish">Platillos</span>
                            </a>
                          </li>
                        </ul>
                    </li>   
                     <li class="col-lg-12 selected-admin-pedidos">
                        <div @if( request()->route()->uri == 'x') class="" @endif)>
                            <div class="col-lg-4 option-side-conteainer opt-activities">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Actividades</span>
                                <span style="display: inline-block;font-size: 13px;background-color: #2568ef;padding: 0px 4px;border-radius: 7px;color: #ffffff;     position: absolute;
    right: -20px;
    top: 5px;">pro</span>
                            </div>
                            <div class="col-lg-2">
                              <img class="more-icon" src="{{asset('/media-admin/row-right.svg')}}">
                            </div>
                        </div> 
                        <ul class="inter-menu">
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span>Hostes</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span>Categorías</span>
                            </a>
                          </li>
                          <li> 
                            <a href="{{asset('activityList')}}">
                              <span class="separator"></span>
                              <span>Actividades</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span>Configuración</span>
                            </a>
                          </li>
                        </ul> 
                    </li>  
                     <li class="col-lg-12 selected-admin-pedidos">
                        <div> 
                            <div class="col-lg-4 option-side-conteainer opt-misc">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Miscelanea</span>
                                <span style="display: inline-block;font-size: 13px;background-color: #2568ef;padding: 0px 4px;border-radius: 7px;color: #ffffff;     position: absolute;
    right: -20px;
    top: 5px;">pro</span>
                            </div>
                            <div class="col-lg-2">
                              <img class="more-icon" src="{{asset('/media-admin/row-right.svg')}}">
                            </div>
                        </div> 
                        <ul class="inter-menu">
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span>Productos</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span>Categorías</span>
                            </a>
                          </li>
                        </ul>
                    </li> 
                     <li class="col-lg-12 selected-admin-pedidos">
                        <div> 
                            <div class="col-lg-4 option-side-conteainer opt-spa">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Spa</span>
                                <span style="display: inline-block;font-size: 13px;background-color: #2568ef;padding: 0px 4px;border-radius: 7px;color: #ffffff;     position: absolute;
    right: -20px;
    top: 5px;">pro</span>
                            </div>
                            <div class="col-lg-2">
                              <img class="more-icon" src="{{asset('/media-admin/row-right.svg')}}">
                            </div>
                        </div> 
                        <ul class="inter-menu">
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span>Citas</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span>Servicios</span>
                            </a>
                          </li>
                        </ul>
                    </li>  
                     <li class="col-lg-12 selected-admin-pedidos">
                        <div @if( request()->route()->uri == 'hotelList') 
                                  class="selected-option col-lg-12" 
                              @endif>
                            <div class="col-lg-4 option-side-conteainer opt-hotels">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Hoteles</span>
                            </div>
                            <div class="col-lg-2">
                              <img class="more-icon" src="{{asset('/media-admin/row-right.svg')}}">
                            </div>
                        </div>
                        <ul class="inter-menu">
                          <li>
                            <a href="{{asset('hotelList')}}">
                              <span class="separator"></span>
                              <span class="hotelList">Lista</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('list')}}">
                              <span class="separator"></span>
                              <span>Grupos</span>
                            </a>
                          </li>
                        </ul>
                    </li>
                    <li class="col-lg-12 selected-admin-pedidos">
                        <div  @if( request()->route()->uri == 'configHome' || request()->route()->uri == 'configStatus') 
                                  class="selected-option col-lg-12" 
                              @endif>
                            <div class="col-lg-4 option-side-conteainer opt-clock">
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>App</span>
                            </div>
                            <div class="col-lg-2">
                              <img class="more-icon" src="{{asset('/media-admin/row-right.svg')}}">
                            </div>
                        </div> 
                        <ul class="inter-menu">
                          <li>
                            <a href="{{asset('configHome')}}">
                              <span class="separator"></span>
                              <span class="configHome">Sliders home</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('configStatus')}}">
                              <span class="separator"></span>
                              <span class="configStatus">Status</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{asset('apk/eaxon.apk')}}">
                              <span class="separator"></span>
                              <span class="configStatus">Descargar</span>
                            </a>
                          </li>
                        </ul>
                    </li>  
                    <li class="col-lg-12 exit-section">
                      <div> 
                        <img src="{{asset('media-admin/exit-2.svg')}}" style="width: 30px;">
                        <span class="exit" style="color: white; font-size: 19px;"> Exit</span>
                      </div>
                    </li>
                    <li class="col-lg-12" style="margin-bottom: 40px;">
                      <div> 
                        <img src="{{asset('media-admin/help.svg')}}" style="width: 30px;">
                        <span class="exit" style="color: white; font-weight: 600; font-size: 18px;"> Ayuda</span>
                      </div>
                    </li>
                </ul>
            </div> 
        </div>

        <div class="col-lg-10 col-md-10 content-page" style="padding-top: 40px; max-height: 100vh; overflow: auto;">
            @yield('page')   
        </div>

    </div>


    <script type="text/javascript">

      //Navegador lateral | menú
      $('.selected-admin-pedidos').click( function( event ){
         if ( $(event.target).closest('.selected-admin-pedidos').find('.inter-menu').css('display') == 'none' ) {
            $(event.target).closest('.selected-admin-pedidos').find('.inter-menu').slideDown(200); 
            $(event.target).closest('.selected-admin-pedidos').find('.more-icon').addClass('more-icon-switched'); 
         } else {
            $(event.target).closest('.selected-admin-pedidos').find('.inter-menu').slideUp(200); 
            $(event.target).closest('.selected-admin-pedidos').find('.more-icon').removeClass('more-icon-switched'); 
         }
      }); 
    </script>


     <script type="text/javascript">

      //salir  
      $('.exit').click( function() {
            $('#overlay').fadeIn(); 
              let user = "";
              let pass = ""; 
              $.ajax({ 
                'url' : '{{asset("check-logout-admin")}}', 
                'method'  : 'post',  
                'data' : {
                  'user' : user, 
                  'pass' : pass
                }, 
                'success' : function( resp ) {
                  $('#overlay').fadeOut(); 
                    window.location.href = "{{asset('/login')}}"; 
                }
              }); 
      }); 

  $(document).ready( function() {
 
      let idactual = $( $('.container-ticket-row')[0] ).attr("idticket"); 
      let idnew    = $( $('.container-ticket-row')[0] ).attr("idticket"); 

      setInterval(checkNew, 2000);
      //notifications(); 

      function checkNew() {
        console.log( idactual ); 
        console.log( idnew );
        idnew = parseInt(idnew); 
          $.ajax({
            'url' : "ticketFrom/"+idnew, 
            'method' : 'get', 
            'success' : function( resp ) {
                resp = JSON.parse(resp); 
                console.log("--");
                  console.log( resp );  
                console.log("--");
                ticketsSA = resp.ticketsSA; 
                $('.num-notification').html(ticketsSA.length); 
               
                console.log(resp.ticketsN); 
                resp = resp.ticketsN; 
                if( resp.length > 0 ) {
                  last = resp[resp.length-1].idticket; 
                  console.log( resp[resp.length-1].idticket ); 
                  if( last > idnew ) {
                      notifications(); 
                      idnew = last;

                      var row = '<div class="container-ticket-row row" idticket="10">'; 
                      $('.rows-tickets').prepend(row); 

                  }
                }


              }
          });
      }

      let cant_n     = 0;  
      let cant_sales = 0; 
      function notifications() { 
         notification( "Nuevo ticket", "Restaurante", "{{asset('/ticket-list')}}" ); 
      }
 
  }); 

  function notification(n_body, n_header, n_location) {
          // Let's check if the browser supports notifications
          if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
          }

          // Let's check if the user is okay to get some notification
          else if (Notification.permission === "granted") {
            // If it's okay let's create a notification
            var notification = new Notification(n_header, {
                icon: '{{asset("/media-admin/eaxon.png")}}',
                body: n_body,
          }); 
            notification.onclick = function() {
             window.open(n_location);
            };
          }

          // Otherwise, we need to ask the user for permission
          // Note, Chrome does not implement the permission static property
          // So we have to check for NOT 'denied' instead of 'default'
          else if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {

              // Whatever the user answers, we make sure we store the information
              if(!('permission' in Notification)) {
                Notification.permission = permission;
              }
 
              // If the user is okay, let's create a notification
              if (permission === "granted") {
                const notification = new Notification("Notificaciones activas!");
              }
            });
          } else {
            alert(`Permission is ${Notification.permission}`);
          }
        }


  const notificationTexts = [
  "Hey Jussi! If you're recording your screen, I just wanted to tell that...",
  "Congratulations, you've found the meaning of life, which by the way is being present.",
  "You looked super today! Where's that smile from?",
  "COME HOME ALREADY! -MOM",
  "How are you doing? Dismiss this message to tell me that you've seen it.",
  "Dude, I've never slided so smoothly into anything before! Well, that sounded a bit weird to be honest.",
  "Did you know that LASER is an abbreviation for Light Amplification by the Stimulated Emission of Radiation?"
];

const addButton = document.querySelector(".add");
const notificationPosition = document.body.querySelector("div");
const margin = 16;

const addNotification = ( mge, title ) => {
  // Create notification
  
  const notification = document.createElement("div");
  // Add class "notification"
  notification.classList.add("notification");
  // Pick random content for notification
  const randomMessage = mge; 
  // Insert random content and close button
  notification.innerHTML = `
                    <div class="content">
            <h4 class="title">${title}</h4>
            <p class="description">${randomMessage}</p>
          </div>
          <button class="close-not" aria-label="Dismiss notification">ok</button>
        `;
  // Get close button within notification
  const closeButton = notification.querySelector(".close-not");
  // Listen for the button and attach "removeNotification" function to it
  closeButton.addEventListener("click", removeNotification);
  // Position notification
  notification.style.bottom = `${margin}px`;
  // Add notification on the page
  notificationPosition.prepend(notification);
  // Move other notifications down
  // 1. Get height of the newly added notification
  const currentHeight = notification.offsetHeight;
  // 2. Get the rest of the notifications and turn them into an array
  const restNotifications = Array.from(
    document.querySelectorAll(".notification")
  ).slice(1);
  // 3. Add the currently added notification's height to the rest of the notifications
  restNotifications.forEach((item) => {
    item.style.bottom = `${parseInt(item.style.bottom) + currentHeight + margin}px`;
  });  
};

const removeNotification = (event) => {
  // Get clicked close button
  const closeButton = event.currentTarget;
  // Get the notification
  const notification = closeButton.parentNode;
  // Get the height of the clicked notification
  const currentHeight = notification.offsetHeight;
  // Define rest of the notifications
  let restNotifications = [];
  let next = notification.nextElementSibling;
  // Loop always the next notification until none is found
  while (next) {
    // If the next element doesn't have 'notification' class, break the while loop
    if (!next.matches(".notification")) {
      break;
    }
    // Add the notification to the array
    restNotifications.push(next);
    // Set the next to be the next element
    next = next.nextElementSibling;
  }
  // Se the new height for each of the notifications below the removed one
  restNotifications.forEach((item) => {
    item.style.bottom = `${parseInt(item.style.bottom) - currentHeight - margin}px`;
  });
  // Animate removed notification
  notification.classList.add("animate-out");
  // Remove notification once animation has ended
  notification.addEventListener("animationend", () => {
    notification.parentNode.removeChild(notification);
  });
};

</script>
  
 
</body>
</html>