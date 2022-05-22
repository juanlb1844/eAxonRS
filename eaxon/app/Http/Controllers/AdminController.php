<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 
    // get ticket from 
    public function ticketFrom( $id ) {
        $ticket = DB::table('ticket')->where('idticket', '>=', $id)->get(); 
        return json_encode($ticket);    
    }

    // update status ticket 
    public function updateStatusTicket( Request $data ) {
        $idTicket = $data->input('idticket'); 
        $to = $data->input('changeto'); 
        DB::table("ticket")->where('idticket', $idTicket)->update(['status' => $to]); 
        echo $to; 
    }

    public function getDishesByCat( Request $data ) {
        $id = $data->input('idcat'); 
        return DB::select("SELECT * FROM category_relation CR INNER JOIN dish D ON 
    CR.dish_iddish = D.iddish WHERE CR.categories_menu_idcategories_menu = $id"); 
    }
    // config home 
     public function editSiliderHome( $id ) {
        $entitie = DB::table('sliders_home')->where('idsliders_home', $id)->get()[0]; 
        $categories = DB::table("categories_menu")->get(); 
        
        $product_selected = ""; 
        
        //  var_dump($entitie->idsource2); 
        if( $entitie->idsource2 ) {
            $product_selected = DB::table('dish')->where('iddish', $entitie->idsource2)->get()[0];
        }
        
        //print_r($product_selected); return; 
        $types = Array(
                Array('id' => 'producto de portada', 'name' => 'Producto de portada'), 
                Array('id' => 'slider', 'name' => 'Slider')
            ); 
        $layouts = Array(
                Array('id' => '1', 'name' => '1 por página'), 
                Array('id' => '2', 'name' => '2 por página'),
                Array('id' => '3', 'name' => '3 por página'), 
            ); 
        return view('admin/editSliderHome', ['entitie' => $entitie,
                                             'categories' => $categories, 
                                             'types' => $types,   
                                             'layouts' => $layouts, 
                                             'selected_product' => $product_selected, 
                                             'id' => $id ]); 
    } 
    public function newSiliderHome() {
        $categories = DB::table("categories_menu")->get(); 
        return view('admin/newSiliderHome', ['categories' => $categories ]); 
    }
    public function configHome() {
        $entities = DB::table('sliders_home')->get(); 
        return view('admin/configHome', ['entities' => $entities]); 
    }
    public function configStatus() { 
        return view('admin/configStatus'); 
    }

    // definir cuerpo de formulario 
    const form_restaurants = array(
        array('type' => 'input', 'name-field' => 'name') 
    ); 

    const url_local = 'http://localhost/eaxon/eaxon'; 
    const url_server = 'https://eaxon.com.mx/eaxon/eAxonRS/eaxon'; 
 
    // ENTIDAD => RESTAURANTES 
    // nuevo 
    public function newRestaurant( ) {
        $restaurants = DB::select("SELECT * FROM hotel"); 
        return view('admin/newRestaurant', ['restaurants' => $restaurants]);
    }
    // editar 
    public function editRestaurant($id) {
        $restaurants = DB::select("SELECT * FROM hotel");  
        $restaurant = DB::select("SELECT * FROM restaurants WHERE idrestaurants = $id ")[0]; 
        return view('admin/editRestaurant', ['restaurants' => $restaurants, 'entity' => $restaurant]);
    }
    // post editar 
    public function editRestaurantPost( Request $data ) {
        $entity_id = $data->input('entity_id'); 
        $data = $data->input('fileds'); 
        $table = null; 
        foreach ($data as $key => $value) {
            $table[$value['name_field']] = $value['val_field'];  
        }
        echo DB::table('restaurants')->where('idrestaurants', $entity_id)->update($table);  
    }
    // post nuevo 
    public function newRestaurantPost( Request $data ) {
        $data = $data->input('fileds'); 
        $table = null; 
        foreach ($data as $key => $value) {
            $table[$value['name_field']] = $value['val_field'];  
        }
        echo DB::table('restaurants')->insert($table); 
    }
    // delete 
    public function deleteEntity( Request $data ) { 
        $entity_id = $data->input('entity_id'); 
        $entity_name = $data->input('entity_name'); 
        $entity_id_field = $data->input('entity_id_field'); 
        
        $deleted = DB::table($entity_name)->where( $entity_id_field, '=', $entity_id)->delete();
    }
    // lista 
    public function restaurantsList() {
        $restaurants = DB::select("SELECT R.idrestaurants, R.url_img, R.ubication, R.name AS name_restaurant, H.name AS name_hotel FROM restaurants R INNER JOIN hotel H
                                        ON R.hotel_idhotel = H.idhotel "); 
        return view('admin/restaurantsList', ['restaurants' => $restaurants]);  
    } 
    // 
    // MENÚS 
    // 
    public function menuList() { 
        $menus = DB::select("SELECT M.idmenu, M.name name_menu, R.name name_rest FROM menu M INNER JOIN restaurants R 
    ON M.restaurants_idrestaurants = R.idrestaurants "); 
        return view('admin/menuList', ["menus" => $menus]);
    }
    // nuevo 
    public function newMenu() { 
        $restaurants = DB::select("SELECT * FROM restaurants");  
        return view('admin/newMenu', ['restaurants' => $restaurants]);
    }
    // editar vista 
    public function editMenu( $id ) { 
        $entity = DB::select("SELECT * FROM menu WHERE idmenu = $id")[0]; 
        $restaurants = DB::select("SELECT * FROM restaurants");  
        return view('admin/editMenu', ['id' => $id,'entity' => $entity,'restaurants' => $restaurants]);
    }
    // editar
    public function updateEntityPost( Request $data ) { 
        $entity_id = $data->input('entity_id'); 
        $entity_name = $data->input('entity_name');
        $entity_id_field = $data->input('entity_id_field'); 
        $data = $data->input('fileds'); 
        $table = null;  
        foreach ($data as $key => $value) {
            $table[$value['name_field']] = $value['val_field'];  
        }   
        echo DB::table($entity_name)->where($entity_id_field, '=', $entity_id)->update($table);
        echo $entity_id; 
    }
    // post new entity // menu 
    public function newEntityPost( Request $data ) {
        $entity_name = $data->input('entity_name'); 
        $data = $data->input('fileds'); 
        $table = null; 
        foreach ($data as $key => $value) {
            $table[$value['name_field']] = $value['val_field'];  
        }  
        echo DB::table($entity_name)->insert($table);
    }
  
    // 
    // HOTELES 
    // lista 
    public function hotelList() {
        $hotels = DB::select("SELECT H.idhotel, H.name, H.company, H.url_img,S.name as state FROM hotel H INNER JOIN state S ON H.state_idstate = S.idstate"); 
        return view('admin/hotelList', ["hotels" => $hotels]);
    }
    // nuevo 
    public function newHotel() { 
        $states = DB::table("state")->get();  
        $countries = DB::table("country")->get(); 
        return view('admin/newHotel', ['states' => $states, 'countries' => $countries]);  
    }
    // editar  
    public function editHotel( $id ) {  
        $states = DB::table("state")->get();  
        $countries = DB::table("country")->get(); 
        $entity = DB::table('hotel')->where('idhotel', '=', $id)->get(); 
        return view('admin/editHotel', ['id' => $id, 'entity' => $entity[0], 'states' => $states,'countries' => $countries]); 
    }
    public function newDish() {
        $categories_menu = DB::table("categories_menu")->get();  
        $ingredients = DB::table("ingredients")->get();  
        $guarnicions = DB::table("guarnicion")->get(); 
        return view('admin/newDish', ['categories_menu' => $categories_menu, 'ingredients' => $ingredients, 'guarnicions' => $guarnicions ]);
    }

    // GUEST 
    // registrar huesped 
    public function checkin() { 
        $hotels = DB::select("SELECT * FROM hotel"); 
        $client_types = DB::table("guest_types")->get();  
        return view('admin/checkin', ['hotels' => $hotels, 'client_types' => $client_types]);  
    }
    // lista de huéspedes 
     public function list() {
        $guests = DB::select("SELECT * FROM guest G LEFT JOIN guest_types GT ON G.guest_types_idguest_types = GT.idguest_types"); 
        return view('admin/list', ['guests' => $guests]);  
    }
 
    public function editGuest( $id ) { 
        $hotels = DB::select("SELECT * FROM hotel"); 
        $client_types = DB::table("guest_types")->get();  
        $guest = DB::table('guest')->where('idguest', $id)->get()[0]; 

        return view('admin/editGuest', ['hotels' => $hotels, 'client_types' => $client_types, 'guest' => $guest]);  
    }

      // HOTEL 
        public function uploadPhotoGuest(Request $request) {
            $file = $request->file('file');
            $path = public_path().'/application/guest/';  
            $fileName = uniqid().$file->getClientOriginalName();
            $file->move($path, $fileName); 
            $link      = $this->getUrlFiles()."/public/application/guest/".$fileName;  
            $idguest = $request->input('idguest');           
             
            DB::table('guest')->where('idguest', $idguest)->update(['url' => $link]); 

            $resp = Array('link' => $link, 'id' => $idguest);  
            $resp = json_encode($resp);   
            echo $resp;    
        }



    // lista 
    public function dishList() {
        $dishes = json_decode( DB::table('dish')->get() ); 
        foreach ($dishes as $key => $dish) {
            $dish->gallery = DB::table('galery_dish')->where('dish_iddish', $dish->iddish)->orderBy('order', 'asc')->get(); 
            $dish->ingredients = DB::select("SELECT * FROM ingredient_relation IR INNER JOIN ingredients I ON IR.ingredients_idingredients = I.idingredients WHERE IR.dish_iddish = ".$dish->iddish);  
        } 

        $ingredients = DB::table("ingredients")->get(); 
        $categories = DB::table("categories_menu")->get(); 
        //print_r( json_encode($dishes)); return;  
 
        return view('admin/dishList', ['dishes' => $dishes, 'ingredients' => $ingredients, 'categories' => $categories ]);   
    }
    // edit 
    public function editDish( $id ) {
        $dish = DB::table('dish')->where('iddish', $id)->get()[0];
        $gallery = DB::table('galery_dish')->where('dish_iddish', $id)->orderBy('order', 'asc')->get(); 
        $categories_menu      = DB::table("categories_menu")->get(); 
        $categories_relation  = DB::table("category_relation")->where("dish_iddish", $id)->get(); 
        $ingredients_relation = DB::table("ingredient_relation")->where("dish_iddish", $id)->get(); 
        $ingredients_menu     = DB::table("ingredients")->get(); 

        $guarnicion_relation = DB::table("guarnicion_relation")->where("dish_iddish", $id)->get(); 
        $guarnicions = DB::table("guarnicion")->get(); 
 
        return view('admin/editDish', ['entity' => $dish, 'gallery' => $gallery, 'categories_menu' => $categories_menu, "categories_relation" => $categories_relation, 'ingredients_relation' => $ingredients_relation, 'ingredients_menu' => $ingredients_menu, 'id' => $id, 
            'guarnicion_relation' => $guarnicion_relation, 'guarnicions' => $guarnicions ]);  
    } 
    // CATÁLOGOS HUÉSPEDES / TIPOS DE CLIENTES 
    // lista 
    public function listClientTypes() {
        $entities = DB::table("guest_types")->get(); 
        return view('admin/listClientTypes', ["entities" => $entities]); 
    } 
    // nuevo 
    public function newClientType() {
        return view('admin/newClientType');   
    }
    // editar 
    public function editClientType( $id ) {
        $entity = DB::table('guest_types')->where('idguest_types', $id)->get()[0]; 
        return view('admin/editClientType', ["id" => $id, "entity" => $entity]); 
    }  
    // GUARNICIONES 
    //lista 
    public function guarnicionsList() {
        $guarnicions = DB::table('guarnicion')->get(); 
        return view('admin/guarnicionsList', ['entities' => $guarnicions]); 
    }
    //nuevo 
    public function newGuarnicion() {
        return view('admin/newGuarnicion'); 
    }

    // INGREDIENTS 
    // lista de ingredientes 
    public function ingredientList() {
         $entities = DB::table("ingredients")->orderBy('name')->get();  
         return view('admin/ingredientsList', ["entities" => $entities]); 
    }
    //nuevo ingrediente 
    public function newIngredient() { 
        return view('admin/newIngredient');   
    }
    //editar ingrediente 
    public function editIngredient( $id ) { 
        $entity = DB::table("ingredients")->where('idingredients', $id)->get()[0]; 
        return view('admin/editIngredient', ['id' => $id, 'entity' => $entity]);    
    }

    // CATEGORIES DISH 
    //list 
    public function categoriesDishList() {
        $entities = DB::table("categories_menu")->orderBy('name')->get(); 

        return view('admin/categoriesDishList', ["entities" => $entities]); 
    }
    //new category dish 
    public function newDishCategory() {
        return view('admin/newDishCategory');   
    }
    // edit category dish  
    public function editCategorieDish( $id ) {
        $entity = DB::table('categories_menu')->where('idcategories_menu', $id)->get()[0]; 
        return view('admin/editCategorieDish', ["id" => $id, "entity" => $entity]); 
    }

    public function ticketList() {

        $tickets = DB::select("SELECT * FROM ticket ORDER BY to_time DESC");
        $client = ""; 
        foreach ($tickets as $key => $ticket) {
            $client = DB::select("SELECT * FROM guest G INNER JOIN guest_types GT ON G.guest_types_idguest_types = GT.idguest_types WHERE idguest = ".$ticket->id_client);   

            $tickets[$key]->client = $client; 
            $id = $ticket->idticket; 
            $ticket->img = DB::select("SELECT * FROM ticket_products_cart WHERE ticket_idticket = $id")[0]->options;
            $tickets[$key]->products = DB::select("SELECT * FROM ticket_products_cart WHERE ticket_idticket = $id"); 
        } 
     
        
        //print_r( $client); return; 
        return view('admin/ticket-list', ['tickets' => $tickets]);    
    }

    public function guest(Request $data) {
        $name  = $data->input('name'); 
        $phone = $data->input('phone');  
        $room  = $data->input('room'); 
        $hotel  = $data->input('hotel'); 
        $idguest_types  = $data->input('idguest_types'); 
        $nationality  = $data->input('nationality'); 
        $alergias  = $data->input('alergias'); 
         
        $random_base64 = base64_encode(random_bytes(18));
        $hash = serialize($random_base64);

        $hash = str_replace( array('"', '/'), array("", ""), $hash); 
 
        DB::select("INSERT INTO guest(name, hash, phone, room, hotel_idhotel, guest_types_idguest_types, nationality, notes) VALUES('$name', '$hash', '$phone', '$room', $hotel, $idguest_types, '$nationality', '$alergias')"); 
    }
      
     public function try() {
            echo $this->getUrlFiles(); 
        }

      public function getUrlFiles() {
            $url_base = ''; 
            if( $_SERVER['HTTP_HOST'] == 'localhost') {
                $url_base = self::url_local;  
            } else {
                $url_base = self::url_server;  
                $url_base = "https://demo.eaxon.com.mx/";  
            }
            return( $url_base ); 
      }

      // FILES UPLOAD 
      public function newDishEntityPost( Request $data ) {
        $resources = $data->input('resources'); 
        $categories_relation = $data->input('categories_relation'); 
        $ingredients_relation = $data->input('ingredients_relation'); 
        $guarnicion_relation = $data->input('guarnicion_relation'); 
        $entity_name = $data->input('entity_name'); 
        $data = $data->input('fileds'); 
        $table = null; 
        foreach ($data as $key => $value) {
            $table[$value['name_field']] = $value['val_field'];  
        } 
        //insert dish 
        DB::table($entity_name)->insert($table);
        //update resources (photos)
        $las_id =  DB::getPdo()->lastInsertId(); 
        //categories 
        foreach ($categories_relation as $key => $id) {
            DB::table("category_relation")->insert(["categories_menu_idcategories_menu" => $id, "dish_iddish" => $las_id]); 
        }
        foreach ($ingredients_relation as $key => $id) {
            DB::table("ingredient_relation")->insert(["ingredients_idingredients" => $id, "dish_iddish" => $las_id]); 
        }
         foreach ($guarnicion_relation as $key => $id) {
            DB::table("guarnicion_relation")->insert(["guarnicion_idguarnicion" => $id, "dish_iddish" => $las_id]); 
        }

        foreach ($resources as $key => $res) {
            DB::table('galery_dish')->where('url', $res)->update(["dish_iddish" => $las_id]); 
        }
      }
    

    public function updateListImgs( Request $data ) {
        $images = $data->input('images_list'); 

        foreach ($images as $key => $url) {
            DB::table('galery_dish')->where('url', $url)->update(['order' => $key]); 
        }
    }
    public function editDishEntityPost( Request $data ) {
        $resources = $data->input('resources'); 
        $identity = $data->input('id_entity');   
        $categories_relation = $data->input('categories_relation'); 
        $ingredients_relation = $data->input('ingredients_relation'); 

        $entity_name = $data->input('entity_name'); 
        $data = $data->input('fileds'); 
        $table = null; 
        foreach ($data as $key => $value) {
            $table[$value['name_field']] = $value['val_field'];  
        } 
        //insert dish 
        DB::table($entity_name)->where('iddish', $identity)->update($table);
        //update resources (photos)
        $las_id =  $identity; 
        //categories 
        DB::select("DELETE FROM category_relation WHERE dish_iddish = $las_id"); 
        foreach ($categories_relation as $key => $id) {
            DB::table("category_relation")->insert(["categories_menu_idcategories_menu" => $id, "dish_iddish" => $las_id]); 
        }
        DB::select("DELETE FROM ingredient_relation WHERE dish_iddish = $las_id"); 
        foreach ($ingredients_relation as $key => $id) {  
            DB::table("ingredient_relation")->insert(["ingredients_idingredients" => $id, "dish_iddish" => $las_id]); 
        }
        
        if( $resources ) {
            foreach ($resources as $key => $res) {
                DB::table('galery_dish')->where('url', $res)->update(["dish_iddish" => $las_id]); 
            }
        }
      }

      public function uploadPhoto(Request $request) {
            $file = $request->file('file');
            $path = public_path().'/application/dishes/';  
            $fileName = uniqid().$file->getClientOriginalName();
            $file->move($path, $fileName); 
            $link      = $this->getUrlFiles()."/public/application/dishes/".$fileName;  
            $idProduct = $request->input('idProuct');         

            //$nparte = DB::select("SELECT * FROM nissan_nparte2 WHERE id = $idProduct")[0]->nparte; 
            //DB::select("UPDATE nissan_nparte2 SET img = '$link' WHERE nparte = '$nparte'"); 
 
             DB::table('galery_dish')->insert(['url' => $link, 'dish_iddish' => 1000000, 'status' => 1, 'order' => 1 ]); 
            
            $resp = Array('link' => $link, 'id' => DB::getPdo()->lastInsertId() ); 
            $resp = json_encode($resp); 
            echo $resp;   
        }

    // HOTEL 

        public function uploadPhotoHotel(Request $request) {
            $file = $request->file('file');
            $path = public_path().'/application/hotels/';  
            $fileName = uniqid().$file->getClientOriginalName();
            $file->move($path, $fileName); 
            $link      = $this->getUrlFiles()."/public/application/hotels/".$fileName;   
            $idProduct = $request->input('idProuct');         
            
            $resp = Array('link' => $link); 
            $resp = json_encode($resp); 
            echo $resp;    
        }

}
