<!DOCTYPE html>
<html>
<head>
	<title>Client - eAxón</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
<style type="text/css">
	.html {
		padding: 0px; margin: 0px; 
	}
	.mobile-content {
		background-color: #181818; 
		min-height: 100vh; 
		padding: 0px; 
	}
	.header-top {
		background-color: #050505; 
		text-align: center;
		padding: 10px 10px; 
	}
	.header-title {
		font-size: 30px; 
		font-weight: bolder;
		color: #ccc; 
	}

	.body-content {
		text-align: center;
		padding-top: 17vh; 
	}
	.title-1 {
		font-size: 28px; 
		font-weight: 600; 
		color: #ccc;
	}

	.avatar-content {
		display: inline-block;
		border: 2px solid black;
		width: 30vw; 
		height: 30vw;
		background-image: url('https://archive.org/download/profiles_202104/chicken.png'); 
		background-size: cover; 
		background-position: center;
	}

	.line-body {
		font-size: 32px; 
		color: white;
		padding: 20px 10px; 
	}
</style>

<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>


</head>
<body>

	<div class="container-fluid mobile-content video" id="vide">
		<div class="header-top">
			<!-- <span>{{$hash}}</span> --> 
			<span class="header-title">eAxón</span>
		</div>
		<div class="body-content">
			<div class="line-body">
				<span>¿Quién usará eAxón?</span>
			</div> 
			<div class="avatar-container">
				<a href='{{asset("/home-main/$hash/perfil/1")}}'>
					@if( strlen($user->url) > 10 )
						<div class="avatar-content" style="background-image: url('{{$user->url}}')"></div>
					@else 
						<div class="avatar-content"></div>
					@endif
				</a>
			</div>
			<span class="title-1">{{$user->name}}</span>

			<button onclick="initCam()">Leer QRx</button>

		</div>

	<!--	<video width="320" height="240" controls id="video"> --> 

	<div id="qr-reader" style="width:100%"></div>
    <div id="qr-reader-results"></div>

	</div> 

	<div class="form-row justify-content-md-center">
    <div class="form-group col-md-4 col-sm-4">
        <div class="justify-content-md-center" id="reader" width="300px" height="300px"></div>
    </div>
</div>


<script>
 
window.onload = function() {

Html5Qrcode.getCameras().then(devices => {

        if (devices && devices.length) {
            var cameraId;
            var cameraLabel;
            if (devices.length === 1) {
                cameraId = devices[0].id;
            } else {
                cameraId = devices[1].id;
                //This is for cellphones with 4 cameras. Usually the first 2 detected are the front so in my case selecting the third in the list worked.
                if (cameraLabel.includes("front")) {
                    cameraId = devices[1].id;
                }
            }

            const html5QrCode = new Html5Qrcode("qr-reader");
            html5QrCode.start(
                cameraId,
                {
                    fps: 10,    
                    qrbox: 250  
                },
                qrCodeMessage => {
                    //Things you want to do when you match a QR Code
                },
                errorMessage => {
                    // parse error, ignore it.
                })
                .catch(err => {
                    // Start failed, handle it.
                });

        }
    }).catch(err => {

    });
}

/*

    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(`Scan result ${decodedText}`, decodedResult);



                alert(decodedText); 
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250, disableFlip : false});
        html5QrcodeScanner.render(onScanSuccess);  

       
    });   */ 
</script>

<script type="text/javascript">

 /* 

	function initCam() {  
		var constraints = { video: { width: 800, height: 800 } };

		navigator.mediaDevices.getUserMedia(constraints)
		.then(function(mediaStream) {
		  var video = document.getElementById('video'); 
		  video.srcObject = mediaStream;
		  video.onloadedmetadata = function(e) {
		    video.play();
		  };
		})
		.catch(function(err) { console.log(err.name + ": " + err.message); }); // always check for errors at the end.
	}
	*/ 
</script>

</body>
</html>