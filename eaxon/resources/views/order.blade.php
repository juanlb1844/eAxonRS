@extends('layout-home') 

@section('page')

<!-- 
	-Programar 
	-Calificar 
	-Compartir 
	-Configurar 
--> 

<style type="text/css">
	.mobile-content {
		padding: 0px; 
		background-position: center;
    background-size: cover;
    background-color: #333333;
	}
  .container-description {
    min-height: 15vh; 
    padding-top: 20px; 
  }
  .gallery-entiti .gallery-element {
    width: 100%;
    border-radius: 12px; 
    height: 350px; 
    background-position: center;
    background-size: cover;
  }
  .btn-style-1 {
    border-radius: 12px;
    font-weight: 600;
    padding: 5px 20px; 
  } 
</style>

<style type="text/css">
  .text {
  font-size:20px;
  font-family:helvetica;
  font-weight:bold;
  color:#71d90b;
  text-transform:uppercase;
}
.parpadea {
  
  animation-name: parpadeo;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;

  -webkit-animation-name:parpadeo;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo{  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
   100% { opacity: 1.0; }
}

@keyframes parpadeo {  
  0% { opacity: 1.0; }
   50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}
</style>

<div class="col-xs-12" style="background-color: #333333; color: white!important; min-height: 100vh; padding-top: 5vh;">
    <div class="col-xs-12" style="text-align: center;">
      <span style="font-size: 27px; font-weight: bolder;">estamos haciéndonos cargo de tu pedido..</span>
      <h1></h1>
    </div>
    <div class="col-lg-12 col-xs-12">
      <div class="gallery-entiti">
        <img src="{{asset('theme_client/cooking.svg')}}" style="width: 100%">
      </div>
    </div>
  

  <style type="text/css">
    .status-order { padding: 0px; }
    .status-order li{
      display: inline-block;
      width: 33%;
    }
    .step {
      display: inline-block;
      width: 20px; 
      height: 20px; 
      border-radius: 50%;
      background-color: #0daca2; 
      background-image: url('{{asset('theme_client/check.svg')}}'); 
      background-repeat: no-repeat;
      background-position: center;
    }
    .step-to {
      display: inline-block;
      width: 20px; 
      height: 20px; 
      border-radius: 50%;
      background-color: black; 
      background-repeat: no-repeat;
      background-position: center;
      text-align: center;
    }

    .order-status {
      font-size: 12px; 
    }
  </style>

  <div class="col-xs-12">
    <h1>&nbsp;</h1>
  </div>
  <div class="col-xs-12 order-status np">
    <div class="col-xs-4 np">
      <p><span class="step" id="status-atender">&nbsp;</span> orden recibida </p>
    </div>
    <div class="col-xs-4 np" style="text-align: center;">
      <p><span class="step-to" id="status-atendiendo">2</span> preparando</p>
    </div>
    <div class="col-xs-4 np">
      <p><span class="step-to" id="status-en-camino">3</span> en camino</p>
    </div>
  </div>

 <!-- 
  <ul class="status-order">
     <li><span class="parpadea text"><strong>PEDIDO RECIBIDO</strong></li> 
    <li><span>*</span>orden recivida</li>
    <li>preparando</li>
    <li>en camino</li>
  </ul> --> 
      
</div>


<script type="text/javascript">
    let orderId = {{$id}}; 
    checkStatus();  
 
    setInterval(checkStatus, 2000); 
    
    let notificado = true; 
    let notificado2 = true; 
    function checkStatus() {
      $.ajax({
        'url' : "{{asset('ticketById')}}/"+orderId, 
        'method' : 'post', 
        'data' : {}, 
        'success' : function( resp ) { 

          resp = JSON.parse(resp); 
          if( resp[0].status == 'atender') {

          } else if( resp[0].status == 'atendiendo') {
            $('#status-atendiendo').removeClass('step-to'); 
            $('#status-atendiendo').addClass('step'); 
            if( notificado2 ) {
                notification( "TU PEDIDO", "SE ESTÁ PREPARANDO", "" );  
                notificado2 = false; 
            }
          } else if( resp[0].status == 'en camino') {
            if( notificado ) {
                notification( "TU PEDIDO", "ESTÁ EN CAMINO..", "" );  
                notificado = false; 
            }
            $('#status-atendiendo').removeClass('step-to'); 
            $('#status-atendiendo').addClass('step'); 
            $('#status-atendiendo').text("");
            $('#status-en-camino').removeClass('step-to'); 
            $('#status-en-camino').addClass('step'); 
            $('#status-en-camino').text("");
          }
        }
      }); 
    }

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
                const notification = new Notification("Hi there!");
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
 }

</script>
 
@endsection 