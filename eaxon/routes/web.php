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
 
// HOME  
Route::get('/configHome', 'AdminController@configHome'); 
Route::get('/configStatus', 'AdminController@configStatus');  

Route::get('/newSiliderHome', 'AdminController@newSiliderHome'); 
Route::get('/editSiliderHome/{id}', 'AdminController@editSiliderHome'); 
Route::post('/getDishesByCat', 'AdminController@getDishesByCat');  
 
Route::get('/try', 'AdminController@try'); 
Route::post('/newDishEntityPost', 'AdminController@newDishEntityPost'); 
Route::post('/editDishEntityPost', 'AdminController@editDishEntityPost'); 
 
Route::get('/editDish/{id}', 'AdminController@editDish'); 
Route::get('/categoriesDishList', 'AdminController@categoriesDishList'); 
Route::get('/newDishCategory', 'AdminController@newDishCategory');  
Route::get('/editCategorieDish/{id}', 'AdminController@editCategorieDish');   
 
Route::post('updateListImgs', 'AdminController@updateListImgs'); 
 
// admin    
Route::get('ticket-list', 'AdminController@ticketList');   

Route::get('/', 'AdminController@checkin'); 
Route::get('/list', 'AdminController@list');
Route::get('/dishList', 'AdminController@dishList'); 
Route::get('/restaurantsList', 'AdminController@restaurantsList');
Route::get('/newDish', 'AdminController@newDish'); 
Route::get('/newMenu', 'AdminController@newMenu'); 
Route::get('/editMenu/{id}', 'AdminController@editMenu');   
Route::get('/newRestaurant', 'AdminController@newRestaurant'); 
Route::get('/editRestaurant/{id}', 'AdminController@editRestaurant');  
Route::get('/menuList', 'AdminController@menuList'); 
Route::get('/hotelList', 'AdminController@hotelList');  
Route::get('/newHotel', 'AdminController@newHotel');   
Route::get('/listClientTypes', 'AdminController@listClientTypes');     
Route::get('/newClientType', 'AdminController@newClientType');     
Route::get('/editClientType/{id}', 'AdminController@editClientType');      
   
Route::get('/editHotel/{id}', 'AdminController@editHotel'); 
Route::post('/uploadPhotoHotel', 'AdminController@uploadPhotoHotel');  
 
// ingredients  
Route::get('/ingredientList', 'AdminController@ingredientList'); 
Route::get('/newIngredient', 'AdminController@newIngredient');  
Route::get('/editIngredient/{id}', 'AdminController@editIngredient');  
// guarniciones 
Route::get('/guarnicionsList', 'AdminController@guarnicionsList'); 
Route::get('/newGuarnicion', 'AdminController@newGuarnicion'); 
 
Route::get('/catalogues', function () { 
    return "hola"; 
});


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

Route::get('/client/{hash}', 'Controller@client'); 
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


 





