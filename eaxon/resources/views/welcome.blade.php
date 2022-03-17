<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
       
       <style type="text/css">
           .pd1 {
            padding: 10px; 
           }
       </style>
    </head>
    <body>
        
        <div class="container-fluid">
            <div class="container">
                <div class="col-lg-12 pd1">
                    <h1>Check in</h1>
                </div>
                <div class="col-lg-4 col-md-4 col-12 pd1">
                    <input class="form-control" id="checkin-name" placeholder="nombre" type="text" name="">
                </div>
                <div class="col-lg-4 col-md-4 col-12 pd1">
                    <input class="form-control" placeholder="habitación" type="text" name="">
                </div>
                <div id="qrcode-2"></div>
                <div class="col-lg-12 pd1">
                    <button class="btn btn-primary" onclick="save()">guardar</button>
                </div>
            </div>
        </div>
         
    </body>
</html>


<script type="text/javascript">
    function save() {
        let checkinName = $('#checkin-name').val(); 
        var qrcode = new QRCode(document.getElementById("qrcode-2"), { 
            text: checkinName, 
            width: 128,
            height: 128,
            colorDark : "#5868bf",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    }
</script>