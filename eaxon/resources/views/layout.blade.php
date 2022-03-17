 
 


 

 
 <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS  --> 
 
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
       </style>

</head>


<body>

 <div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
 
 
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
  :root {
  --color-blue-100: #f5faff;
    --color-blue-200: #b8dcff;
    --color-blue-300: #7ab8ff;
    --color-blue-400: #3d90ff;
    --color-blue-500: #0064fe;
    --color-blue-600: #0046d1;
    --color-blue-700: #002ba3;
    --color-blue-800: #001575;
    --color-blue-900: #000647;
    --color-green-100: #f0fcf5;
    --color-green-200: #b4eece;
    --color-green-300: #78e0a7;
    --color-green-400: #3cd180;
    --color-green-500: #00c159;
    --color-green-600: #009645;
    --color-green-700: #006a31;
    --color-green-800: #003f1d;
    --color-green-900: #001309;
    --color-gray-100: #f3f5f6;
    --color-gray-200: #d0d8dd;
    --color-gray-300: #aebac2;
    --color-gray-400: #8d9ca7;
    --color-gray-500: #6c7d8b;
    --color-gray-600: #576674;
    --color-gray-700: #424e5c;
    --color-gray-800: #2e3843;
    --color-gray-900: #1c212a;
    --color-white: white;
    --color-black: black;
    --color-border: var(--color-gray-200);
    --space-0: 0;
    --space-1: 0.25rem;
    --space-2: 0.5rem;
    --space-3: 0.75rem;
    --space-4: .8rem;
    --space-5: 1.25rem;
    --space-6: 1.5rem;
    --space-8: 2rem;
    --space-10: 2.5rem;
    --space-12: 3rem;
    --space-16: 4rem;
    --space-20: 5rem;
    --space-24: 6rem;
    --text-sm: 0.875rem;
    --text-md: 2rem;
    --text-lg: 1.25rem;
    --text-xl: 1.5rem;
    --radius: 6px;
    --round: 1000px;
    --border: 1px solid var(--color-border);
    --shadow: 0px 2px 8px rgba(0, 0, 0, 0.06), 0px 1px 3px rgba(0, 0, 0, 0.05);
    --shadow-large: 0px 5px 18px rgba(0, 0, 0, 0.1), 0px 1px 3px rgba(0, 0, 0, 0.05);
    --shadow-focus: 0 0 0 var(--space-1) var(--color-blue-200);
    --transition-curve: cubic-bezier(0.2, 0.7, 0.3, 1);
    --transition-curve-bounce: cubic-bezier(0.175, 0.885, 0.32, 1.275);
    --transition-speed: 0.25s;
    --transition-speed-slow: 1s;
    --transition: all var(--transition-speed) var(--transition-curve);
    --transition-bounce: all var(--transition-speed) var(--transition-curve-bounce);
    --opacity-25: 0.25;
    --opacity-50: 0.5;
    --opacity-75: 0.75;
    --opacity-100: 1;
}

.notification {
  z-index: 999999;
  position: fixed;
  display: flex;
  width: var(--notification-size);
  right: var(--space-4);
  border: var(--border);
  background-color: var(--color-white);
  border-radius: var(--radius);
  box-shadow: var(--shadow-large);
  transition: var(--transition);
  animation: slide-in var(--transition-speed) var(--transition-curve);
}
.content {
  padding: var(--space-4);
}
.content .title {
  font-size: var(--text-md);
  margin-bottom: var(--space-1);
  font-weight: bold;
  color: var(--color-gray-800);
}
.description {
  color: var(--color-gray-600);
}
.close-not {
  font-size: 15px;
  margin-left: auto;
  padding: 12px; 
  border: 0;
  border-left: var(--border);
  background-color: transparent;
  border-radius: 0 var(--radius) var(--radius) 0;
  color: var(--color-gray-400);
  cursor: pointer;
}
.close-not:hover {
  background-color: var(--color-gray-100);
}
.close-not:active {
  color: var(--color-gray-700);
}
.close-not:focus,
.close-not:active {
  outline: none;
  box-shadow: var(--shadow-focus);
}
.add {
  padding: var(--space-3) var(--space-5);
  border: 0;
  font-weight: bold;
  background-color: var(--color-blue-500);
  color: var(--color-white);
  border-radius: var(--round);
  cursor: pointer;
  outline: none;
}
.add:hover {
  background-color: var(--color-blue-400);
}
.add:focus {
  box-shadow: var(--shadow-focus);
}
.add:active {
  background-color: var(--color-blue-500);
}
.animate-out {
  animation: fade-out var(--transition-speed) var(--transition-curve);
}
@keyframes fade-out {
  to {
    opacity: 0;
    transform: translateX(var(--notification-size));
  }
}
@keyframes slide-in {
  from {
    transform: translateX(var(--notification-size));
  }
  to {
    transform: translateX(0);
  }
}

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
        } 
        .menu-options li a {
            color: #434b69;  
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
        }
        .container-side {
            height: 100vh;
            background: #f5f5f5;
            position: fixed; 
            z-index: 99;
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
            background-size: 40%;
            background-position: center;
            background-repeat: no-repeat;
        }
        .opt-unidades {
            background-image: url({{asset('media/icons/etiqueta.svg')}}); 
        }
        .opt-contactos {
            background-image: url({{asset('media/icons/item.svg')}}); 
        }
        .opt-directorio {
            background-image: url({{asset('media/icons/cupon.svg')}}); 
        } 
        .opt-usuarios {
            background-image: url({{asset('media/icons/portapapeles.svg')}}); 
        }
        .opt-dashboard {
            background-image: url({{asset('media/icons/cuentakilometros.svg')}}); 
        }
        .opt-apartados {
            background-image: url({{asset('media-root/apartados.svg')}}); 
        }
        .txt-option {
            padding: 10px; 
            font-weight: 600;
        }
        .menu-options li {
            border-radius: 10px; 
            padding: 5px; 
            transition-property: all; transition-duration: .2s; 
      margin-top: 5px;
        } 
        .menu-options li:hover {
            background-color: #e8e8e8; 
            cursor: pointer;
            transition-property: all; transition-duration: .2s;  
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
</style>


 <script type="text/javascript">

 

  function notification(n_body, n_header, n_location) {
          // Let's check if the browser supports notifications
          if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
          }

          // Let's check if the user is okay to get some notification
          else if (Notification.permission === "granted") {
            // If it's okay let's create a notification
            var notification = new Notification(n_header, {
                icon: 'https://begima.com.mx/public/media/begima%20logotipo-01%20web-simple-medium.png',
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
};

</script>


    <div class="container-fluid" style="padding-left: 0px;">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 container-side" style="padding: 0px!important; width: 190px; overflow-y: auto;">
            <div>  
                <div style="text-align: center; padding-top: 0px!important;">
                    <h3 style="font-weight: 900; margin: 5px; color: #777777; ">eAxon</h3>
                </div>
                <ul class="menu-options">
                    <li class="col-lg-12 selected-admin-pedidos">
                        <a href="{{asset('')}}"> 
                            <div class="col-lg-6 option-side-conteainer opt-dashboard">
                                
                            </div>  
                            <div class="col-lg-6 txt-option">
                                <span>Checkin</span>
                <span class="notify" id="cantSalesNotify">0</span>
                            </div>
                        </a> 
                    </li> 
                    <li class="col-lg-12 selected-admin-home">
                        <a href="{{asset('list')}}"> 
                            <div class="col-lg-6 option-side-conteainer opt-dashboard">
                            </div>
                            <div class="col-lg-6 txt-option">
                                <span>Huespedes</span>
                            </div>
                        </a>
                    </li> 
                    
                   
                     

            <style type="text/css">
              .notify { background-color: black; color: white; display: inline-block; opacity: 0;  
                        height: 20px; width: auto; padding: 3px 8px; border-radius: 12px; }
            </style> 
  
                    
                </ul>
                
            </div> 
        </div>

        <style type="text/css">
            .container-avatar {
                display: inline-block; 
                margin-top: 3px; 
            }
            .avatar-content {
                border: 1px solid #eaeaea;;
                height: 45px;  
                width: 45px; 
                background-color: gray; 
                border-radius: 50%; 
                background-image: url({{asset('media/avatars/avatar-1.jpg')}}); 
                background-size: cover;
            }
            .content-submenu ul li {
                display: inline-block; 
                margin-top: 3px; 
            }
            .content-submenu .option-submenu {
                margin-top: 3px; 
                width: 150px; 
                display: table;
                height: 45px;  
                text-align: left;
                padding-top: 10px; 
            }
        </style>  
         
        <div style="position: fixed; width:  100%; z-index: 9; height: 50px; border-bottom: 1px solid #eaeaea; text-align: right; padding-right: 20px; ">  
            <div class="top-submenu">
                <div class="content-submenu">
                    <ul> 
                        @yield('content-submenu')
                         <li>
                            <div class="option-submenu" style="text-align: right;">
                                <p>Admin</p> 
                            </div>
                        </li>
                        <li> 
                                <div class="container-avatar">
                                    <div class="avatar-content">
                                        
                                    </div>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div> 

        <div style="padding-top: 70px;">
            @yield('page')   
        </div>
   

    </div>

 

<style type="text/css">
    .prev-img { width: 120px; }
    .hover:hover { cursor: pointer; color: green; }
    .sub-info { 
        display: inline-block;
        right: 0vw; 
        transition-property: all;
        transition-duration: .5s;
        height: 100vh;
        width: 80vw; 
        position: fixed;
        background-color: white;
        border-left: 2px solid gray;
        z-index: 99999;
    }
    .sub-info-2 { 
        display: inline-block;
        right: 0vw; 
        transition-property: all;
        transition-duration: .5s;
        height: 100vh;
        width: 80vw; 
        position: fixed;
        background-color: white;
        border-left: 2px solid gray;
        z-index: 99999;
    } 
    .hidden-sub { 
        position: fixed;
        transition-property: all;
        transition-duration: .5s; 
        right: -100vw; 
    }
</style>
 
 
 
</body>
</html>