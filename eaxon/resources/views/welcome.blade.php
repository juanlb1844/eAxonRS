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
		min-height: 105vh; 
		padding: 0px; 
	}
	.header-top {
		background-color: #181818; 
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
		padding-top: 0px; 
	}
	.title-1 {
		font-size: 28px; 
		font-weight: 600; 
		color: #ccc;
	}
 
	.line-body {
		font-size: 32px; 
		color: white;
		padding: 10px 10px; 
	}



	/* QR */ 
	/*
	#qr-reader__status_span {
		display: none;
	}*/ 
	#qr-reader-results > div:nth-child(1), #qr-reader-results {
		border: none!important;
	}
	#qr-reader-results__dashboard_section_swaplink { display: none!important; }
	#qr-reader-results > div:nth-child(1) > span:nth-child(1) > a, #qr-reader-results__status_span { display: none; }
	#qr-reader-results button {
		background-color: #59d66c; 
		border-radius: 12px; 
		padding: 10px 20px;
		border: 0px;
	}
	/* 
	#qr-reader-results div { border: none!important; }
	#qr-reader-results a { display: none!important; } */
</style>

<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>


</head>
<body>

	<div class="container-fluid mobile-content video" id="vide">
		<div class="header-top" style="padding-top: 40px;">
			<!-- <span class="header-title">eAxón</span> --> 
			<img style="width: 120px;" src="{{asset('/media-admin/logo-eaxon.png')}}">
			<p class="title-1">eAxón</p>
			<p></p>
		</div>
		<div class="body-content">
			<div class="line-body">
				<span>Let's Start</span>
			</div> 
			<div class="avatar-container">
				<div id="qr-reader" style="width:100%"></div>
			</div>
			<span class="title-1"></span>

			<!-- <button onclick="initCam()">Leer QR</button> -->

		</div>

	<!--	<video width="320" height="240" controls id="video"> --> 

    <div id="qr-reader-results"></div>

	</div> 

	<!-- 
	<div class="form-row justify-content-md-center">
    	<div class="form-group col-md-4 col-sm-4">
        	<div class="justify-content-md-center" id="reader" width="300px" height="300px"></div>
    	</div>
	</div> --> 


<script>
 
 
 

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
 
                window.location.href = decodedText; 
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader-results", { fps: 10, qrbox: 250, disableFlip : false});
        html5QrcodeScanner.render(onScanSuccess);  

        document.querySelector("#qr-reader-results__dashboard_section_csr > div > button").innerText = "Escanear QR"; 
        
    });   
</script>

<script type="text/javascript">


	function initCam() {  
		alert( document.getElementsByTagName('select')[0].className ); 
 /* 
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
	*/ 
	}
</script>

</body>
</html>