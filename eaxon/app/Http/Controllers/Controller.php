<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function register() {
        return view('registration/layout'); 
    }

    public function createRegister() {  
        echo "mensaje"; 
    }
    // 

    public function homeMain( $hash ) {
        $user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0];
        return view('home-main', ['hash' => $hash, 'user' => $user]); 
    }

    // get ticket by id 
    public function ticketById( $id ) {
        $ticket = DB::table('ticket')->where('idticket', $id)->get(); 
        return json_encode( $ticket ); 
    }

    // crear ticket 
    public function createTicket( Request $data ) {
        date_default_timezone_set('America/Mexico_City'); 

        $hash = $data->get('hash'); 
        $json = json_encode( \Session::get('dishes') ); 
        $idguest = DB::table('guest')->where('hash', $hash)->get()[0]->idguest; 
         
        $to = date("Y-m-d H:i:s");  
        $to2 = date("Y-m-d H:i:s");  
  
        DB::table('ticket')->insert([
            'hora_de_peticion' => $to, 
            'id_client' => $idguest, 
            'to_time' => $to2, 
            'type_ticket_idtype_ticket' => 1, 
            'status' => 'atender',  
            'json' => $json]);  

        $idticket = DB::getPdo()->lastInsertId(); 
        
        foreach( \Session::get('dishes') as $k ) {
           // echo $k['info']->price; 
            DB::table('ticket_products_cart')->insert([
                'type_product_idtype_product' => 1, 
                'cant' => $k['cant'], 
                'ticket_idticket' => $idticket, 
                'name' => $k['info']->name, 
                'options' => $k['image'] 
            ]); 
            //print_r( $k );  
        }
         
        \Session::put('dishes', null);
        echo $idticket;
    }

    public function client( $hash ) { 
    	$user = DB::select("SELECT * FROM guest WHERE hash = '$hash'"); 
        if( count($user) > 0 ) {
            $user = $user[0]; 
    	    return view('client', ['hash' => $hash, 'user' => $user]);  
        } else {
            return view('client', ['hash' => $hash, 'user' => null]);  
        }
    } 

    public function homeSpa( $hash ) {
        $user = DB::select("SELECT * FROM guest WHERE hash = '$hash'"); 
        if( count($user) > 0 ) {
            $user = $user[0]; 
            return view('home-spa', ['hash' => $hash, 'user' => $user]);  
        } else {
            return view('home-spa', ['hash' => $hash, 'user' => null]);  
        }
    }

    public function welcome( ) { 
        return view('welcome', []);  
    }

     public function clientHome( $hash, $p) { 
        $user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
        $sliders = null; 
        $to_create = DB::table('sliders_home')->orderBy('order')->get(); 
        $portada = null; 
        foreach ($to_create as $key => $c) {
            if( $c->type == 'slider' ) { 
                $sliders[] = $this->injectGallery($this->getRowSlider($c->idsource), $c->layout, $c->name);
            } else if( trim($c->type) == 'producto de portada' ) {
                if( $c->idsource2 ) {
                    $portada = DB::table('dish')->where('iddish', $c->idsource2 )->get()[0]; 
                    $gallery = DB::table('galery_dish')->where('dish_iddish', $c->idsource2 )->orderBy('order')->get()[0];  
                    $portada->url = $gallery->url; 
                }  
            }  
        }
        return view('clientHome', ['hash'    => $hash, 
                                   'user'    => $user,  
                                   'perfil'  => $p,  
                                   'sliders' => $sliders, 
                                   'portada' => $portada ]);      
    }

    private function injectGallery ( $array, $l, $nameSlider ) {
        $cn = ""; 
        foreach ($array as $key => $value) { 
            $id = $value->iddish; 
            $cn = $value->category_name; 
            $gallery = DB::table('galery_dish')->where('dish_iddish', $id)->orderBy('order')->get(); 
            $array[$key]->gallery = $gallery; 
        }
        return ( array('products' => $array, 'cname' => $cn, 'layout' => $l, 'ns' => $nameSlider ) );  
    }

    private function getRowSlider($id) {
        return DB::select("SELECT C.name 'category_name', CR.dish_iddish 'iddish', D.name 'namedish', D.price 'price'  FROM categories_menu AS C INNER JOIN category_relation CR 
    ON C.idcategories_menu = CR.categories_menu_idcategories_menu INNER JOIN dish D 
        ON CR.dish_iddish = D.iddish WHERE C.idcategories_menu = $id"); 
    }

     public function clientDish( $id, $hash, $p) { 
        $user    = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
        $dish    = DB::table('dish')->where('iddish', $id)->get()[0];  
        $gallery = DB::table('galery_dish')->where('dish_iddish', $id)->orderBy('order')->get();
 
        $iddish = $dish->iddish;
        $ingredients = DB::select("SELECT idingredients, name, img FROM ingredient_relation IR INNER JOIN ingredients I ON IR.ingredients_idingredients = I.idingredients WHERE IR.dish_iddish = $iddish");
  
        $guarnicions = DB::select("SELECT * FROM guarnicion_relation GR INNER JOIN guarnicion G ON GR.guarnicion_idguarnicion = G.idguarnicion WHERE GR.dish_iddish = $iddish"); 

 
        return view('dishClient', ['id' => $id, 'hash' => $hash, 'user' => $user, 'perfil' => $p, 'dish' => $dish, 'gallery' => $gallery, 'ingredients' => $ingredients, 'guarnicions' => $guarnicions ]);  
    }


    public function clientOrder( $id, $hash, $p ) {
        $user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
        return view('order', ['hash' => $hash, 'user' => $user, 'perfil' => $p, 'id' => $id ]); 
    }

    public function cart( $id, $hash, $p ) {
        $user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
 
        $has_order = DB::select("SELECT * FROM ticket T INNER JOIN guest G ON T.id_client = G.idguest  WHERE G.hash = '$hash' AND T.status != 'recibido'"); 
 
        return view('carrito', ['hash' => $hash, 'user' => $user, 'perfil' => $p, 'orders' => $has_order ]); 
    }

    // CART 
    public function try() {
        //\Session::flush();
        print_r( json_encode( \Session::get('dishes') ) ); 
    } 
    // AÑADIR AL CARRITO 
    public function addToCart( Request $data ) {
        $type = $data->input('type'); 
        $cant = $data->input('cant'); 
        $id   = $data->input('id');  

        $excluded_ingredients = $data->input('excluded_ingredients'); 
        $included_guarnicions = $data->input('included_guarnicions'); 

        $dish = DB::table('dish')->where('iddish', $id)->get()[0]; 

        $gallery = DB::table('galery_dish')->where('idgalery_dish', $id)->orderBy('order')->get()[0]->url; 

        $item = array(  'cant' => $cant, 
                        'id' => $id, 
                        'info' => $dish,  
                        'image' => $gallery, 
                        'included_guarnicions' => $included_guarnicions, 
                        'excluded_ingredients' => $excluded_ingredients ); 

        \Session::push('dishes', $item);  
    }

}
  
