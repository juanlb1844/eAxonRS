<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| eAxón 
|--------------------------------------------------------------------------
| Dios dirige por buen camino cada línea que conforma este sistema 
| Protégenos de los bugs y malas implementaciones 
| Que tu pincel nos ilumine, 
| que sobre el cielo de tu capilla forajeremos otra forma de arte 
|
*/ 
// REGISTRATION 
  
Route::get('/register', 'Controller@register'); 
Route::post('/createRegister', 'Controller@createRegister'); 
 
// LOG IN 
 
Route::get('/login', 'AdminController@login'); 
Route::post('/check-login-admin', 'AdminController@checkLoginAdmin'); 
Route::post('/check-logout-admin', 'AdminController@logoutAdmin');   
// HOME   
Route::get('/configHome', 'AdminController@configHome')->middleware('logueadoAdmin'); 
Route::get('/configStatus', 'AdminController@configStatus')->middleware('logueadoAdmin');  

Route::get('/newSiliderHome', 'AdminController@newSiliderHome')->middleware('logueadoAdmin'); 
Route::get('/editSiliderHome/{id}', 'AdminController@editSiliderHome')->middleware('logueadoAdmin'); 
Route::post('/getDishesByCat', 'AdminController@getDishesByCat');  
 
Route::get('/try', 'AdminController@try'); 
Route::post('/newDishEntityPost', 'AdminController@newDishEntityPost'); 
Route::post('/editDishEntityPost', 'AdminController@editDishEntityPost'); 
 
Route::get('/editDish/{id}', 'AdminController@editDish')->middleware('logueadoAdmin'); 
Route::get('/categoriesDishList', 'AdminController@categoriesDishList')->middleware('logueadoAdmin'); 
Route::get('/newDishCategory', 'AdminController@newDishCategory')->middleware('logueadoAdmin');  
Route::get('/editCategorieDish/{id}', 'AdminController@editCategorieDish')->middleware('logueadoAdmin');   
 
Route::post('updateListImgs', 'AdminController@updateListImgs')->middleware('logueadoAdmin'); 
 
// admin    
Route::get('ticket-list', 'AdminController@ticketList')->middleware('logueadoAdmin');   

// ACTIVITIES 
Route::get('/activityList', 'AdminController@activityList')->middleware('logueadoAdmin'); 

// GUEST  
Route::get('/', 'AdminController@checkin')->middleware('logueadoAdmin'); 

Route::get('/list', 'AdminController@list')->middleware('logueadoAdmin'); 
Route::get('/editGuest/{id}', 'AdminController@editGuest')->middleware('logueadoAdmin');
Route::post('/getGuestDetails', 'AdminController@getGuestDetails')->middleware('logueadoAdmin');
Route::post('/uploadPhotoGuest', 'AdminController@uploadPhotoGuest');   
 
Route::post('/loadGuest', 'AdminController@loadGuest')->middleware('logueadoAdmin'); 

Route::get('/dishList', 'AdminController@dishList')->middleware('logueadoAdmin');
Route::get('/restaurantsList', 'AdminController@restaurantsList')->middleware('logueadoAdmin');
Route::get('/newDish', 'AdminController@newDish')->middleware('logueadoAdmin');
Route::get('/newMenu', 'AdminController@newMenu')->middleware('logueadoAdmin'); 
Route::get('/editMenu/{id}', 'AdminController@editMenu')->middleware('logueadoAdmin'); 
Route::get('/newRestaurant', 'AdminController@newRestaurant')->middleware('logueadoAdmin'); 
Route::get('/editRestaurant/{id}', 'AdminController@editRestaurant')->middleware('logueadoAdmin'); 
Route::get('/menuList', 'AdminController@menuList')->middleware('logueadoAdmin'); 
Route::get('/hotelList', 'AdminController@hotelList')->middleware('logueadoAdmin');
Route::get('/newHotel', 'AdminController@newHotel')->middleware('logueadoAdmin');   
Route::get('/listClientTypes', 'AdminController@listClientTypes')->middleware('logueadoAdmin'); 
Route::get('/newClientType', 'AdminController@newClientType')->middleware('logueadoAdmin');     
Route::get('/editClientType/{id}', 'AdminController@editClientType')->middleware('logueadoAdmin'); 

Route::get('/listRooms', 'AdminController@listRooms')->middleware('logueadoAdmin'); 
Route::post('/getRooms', 'AdminController@getRooms')->middleware('logueadoAdmin');  
Route::post('/availableRooms', 'AdminController@availableRooms')->middleware('logueadoAdmin'); 
    
Route::get('/editHotel/{id}', 'AdminController@editHotel')->middleware('logueadoAdmin');
Route::post('/uploadPhotoHotel', 'AdminController@uploadPhotoHotel');  
 
// ingredients  
Route::get('/ingredientList', 'AdminController@ingredientList')->middleware('logueadoAdmin');
Route::get('/newIngredient', 'AdminController@newIngredient')->middleware('logueadoAdmin');
Route::get('/editIngredient/{id}', 'AdminController@editIngredient')->middleware('logueadoAdmin'); 
// guarniciones 
Route::get('/guarnicionsList', 'AdminController@guarnicionsList')->middleware('logueadoAdmin');
Route::get('/newGuarnicion', 'AdminController@newGuarnicion')->middleware('logueadoAdmin');
Route::get('/editGuarnicion/{id}', 'AdminController@editGuarnicion')->middleware('logueadoAdmin');
// habitaciones 
Route::get('/newRoom', 'AdminController@newRoom')->middleware('logueadoAdmin');
Route::get('/editRoom/{id}', 'AdminController@editRoom')->middleware('logueadoAdmin');
  
Route::get('/getAllCustomers', 'AdminController@getAllCustomers')->middleware('logueadoAdmin'); 

Route::get('/catalogues', function () { 
    return "hola"; 
});

 
route::get('/gant', 'AdminController@gant')->middleware('logueadoAdmin');


// admin posts 
Route::post('/guest', 'AdminController@guest');
Route::post('/newRestaurantPost', 'AdminController@newRestaurantPost'); 
Route::post('/editRestaurantPost', 'AdminController@editRestaurantPost'); 
Route::post('/deleteEntity', 'AdminController@deleteEntity');
/* general */  
Route::post('/newEntityPost', 'AdminController@newEntityPost');
Route::post('/updateEntityPost', 'AdminController@updateEntityPost'); 
Route::post('/uploadPhoto', 'AdminController@uploadPhoto');  
  


//------------------------------------------
//------------------------------------------
// cliente 

//try session  
Route::get('trys', 'Controller@try'); 
 
Route::get('/home-main/{hash}/perfil/{p}', 'Controller@homeMain'); 
 
Route::get('/client/{hash}', 'Controller@client'); 
Route::get('/home-spa/{hash}/perfil/{p}', 'Controller@homeSpa'); 

Route::get('/welcome', 'Controller@welcome');  

Route::get('/client/{hash}/perfil/{p}', 'Controller@clientHome'); 
Route::get('/dish/{id}/hash/{hash}/perfil/{p}', 'Controller@clientDish');  

Route::get('/order/{id}/hash/{hash}/perfil/{p}', 'Controller@clientOrder');  
Route::get('/cart/{id}/hash/{hash}/perfil/{p}', 'Controller@cart');  

Route::post('/createTicket', 'Controller@createTicket'); 
Route::post('/updateStatusTicket', 'AdminController@updateStatusTicket');    
Route::get('ticketFrom/{id}', 'AdminController@ticketFrom'); 
Route::post('ticketById/{id}', 'Controller@ticketById');  

Route::post('/addToCart', 'Controller@addToCart');  
   

// import 
Route::get('/import', 'ImportController@ImportBasicCatalogues'); 


 





