@extends('admin.layout') 

@section('page')


<style type="text/css">
 
</style>
  
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Hotel Room Reservation</title>

  <script src='{{asset("timehotel/lib/dhtmlxScheduler/dhtmlxscheduler.js")}}'></script>
  <script src='{{asset("timehotel/lib/dhtmlxScheduler/ext/dhtmlxscheduler_limit.js")}}'></script>
  <script src='{{asset("timehotel/lib/dhtmlxScheduler/ext/dhtmlxscheduler_collision.js")}}'></script>
  <script src='{{asset("timehotel/lib/dhtmlxScheduler/ext/dhtmlxscheduler_timeline.js")}}'></script>
  <script src='{{asset("timehotel/lib/dhtmlxScheduler/ext/dhtmlxscheduler_editors.js")}}'></script>
  <script src='{{asset("timehotel/lib/dhtmlxScheduler/ext/dhtmlxscheduler_minical.js")}}'></script>
  <script src='{{asset("timehotel/lib/dhtmlxScheduler/ext/dhtmlxscheduler_tooltip.js")}}'></script>
  <script src='{{asset("timehotel/js/mock_backend.js")}}'></script>
  <script src='{{asset("timehotel/js/scripts.js")}}'></script>

  <link rel='stylesheet' href='{{asset("timehotel/lib/dhtmlxScheduler/dhtmlxscheduler_flat.css")}}'>
  <link rel='stylesheet' href='{{asset("timehotel/css/styles.css")}}'>
 

 <style type="text/css">
       .dhx_cal_container {
        background-color: #212228;
        font-family: "Segoe UI",Arial;
    }
 
.dhx_matrix_cell, .dhx_matrix_scell {
    border-bottom: 1px solid #363636;
    border-right: 1px solid #363636;
}

.dhx_matrix_cell {
    background-color: #212228;
}
table {
    border: 1px solid #363636;
    border-radius: 7px;
}
.dhx_scale_bar {
    color: white!important;
    background-color: #212228;
}
.dhx_cal_header div div {
    border-left: 1px solid #363636;
}
.dhx_scale_bar {
    color: #ffffff!important;
    background-color: #212228;
}
.dhx_cal_header {
    border: 1px solid #363636;
    border-left: 0;
    border-bottom: 0;
}
.dhx_second_scale_bar {
    border-bottom: 1px solid #363636;
    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: rgb(54, 54, 54);
}
.dhx_second_scale_bar {
    border-bottom: 1px solid #363636;
    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: rgb(54, 54, 54);
}
.dhx_cal_data {
    border-top: 1px solid #363636;
}
.timeline_item_separator {
    float: left;
    width: 1px;
    height: 100% !important;
}

element.style {
    height: 51px;
    left: 129px;
    width: 42px;
    top: 0px;
}
.timeline_weekend {
    background-color: #2b2c32;
}
 </style>

<body onload="init()">

      <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
          <div class="dhx_cal_navline">

              <div style="font-size:16px;padding:4px 20px;">
                  Show rooms:
                  <select id="room_filter" onchange='updateSections(this.value)'></select>
              </div>
              <div class="dhx_cal_prev_button">&nbsp;</div>
              <div class="dhx_cal_next_button">&nbsp;</div>
              <div class="dhx_cal_today_button"></div>
              <div class="dhx_cal_date"></div>
          </div>
          <div class="dhx_cal_header">
          </div>
          <div class="dhx_cal_data">
          </div>      
      </div>
  </body>


 @endsection