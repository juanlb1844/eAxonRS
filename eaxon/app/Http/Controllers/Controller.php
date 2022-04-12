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
     
    public function client( $hash ) { 
    	$user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
    	return view('client', ['hash' => $hash, 'user' => $user]);  
    }

     public function clientHome( $hash, $p) { 
        $user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
        $sliders = null; 
        $to_create = DB::table('sliders_home')->orderBy('order')->get(); 
        $portada = null; 
        foreach ($to_create as $key => $c) {
            if( $c->type == 'slider' ) {
                $sliders[] = $this->injectGallery($this->getRowSlider($c->idsource), $c->layout);
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

    private function injectGallery ( $array, $l ) {
        $cn = ""; 
        foreach ($array as $key => $value) { 
            $id = $value->iddish; 
            $cn = $value->category_name; 
            $gallery = DB::table('galery_dish')->where('dish_iddish', $id)->orderBy('order')->get(); 
            $array[$key]->gallery = $gallery; 
        }
        return ( array('products' => $array, 'cname' => $cn, 'layout' => $l ) );  
    }

    private function getRowSlider($id) {
        return DB::select("SELECT C.name 'category_name', CR.dish_iddish 'iddish', D.name 'namedish', D.price 'price'  FROM categories_menu AS C INNER JOIN category_relation CR 
    ON C.idcategories_menu = CR.categories_menu_idcategories_menu INNER JOIN dish D 
        ON CR.dish_iddish = D.iddish WHERE C.idcategories_menu = $id"); 
    }

     public function clientDish( $id, $hash, $p) { 

        $user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
        $dish = DB::table('dish')->where('iddish', $id)->get()[0]; 
        $gallery = DB::table('galery_dish')->where('dish_iddish', $id)->orderBy('order')->get();
        return view('dishClient', ['hash' => $hash, 'user' => $user, 'perfil' => $p, 'dish' => $dish, 'gallery' => $gallery ]);  
    }
}
  
