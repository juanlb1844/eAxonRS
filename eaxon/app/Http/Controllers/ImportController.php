<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class ImportController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ImportBasicCatalogues() {
            
            // Paises 
            $countries = Array(
                Array("name" => "MX"), 
                Array("name" => "USA"), 
                Array("name" => "Italia"), 
                Array("name" => "Francia"), 
            ); 
            DB::table('country')->insert($countries); 

            //Estados 
            $states = Array(
                Array("name" => "BCS"), 
                Array("name" => "BC"), 
                Array("name" => "Sinaloa"), 
                Array("name" => "Sonora"), 
                Array("name" => "Jalisco"), 
                Array("name" => "Durango"), 
                Array("name" => "Chihuahua"),
            ); 
            DB::table('state')->insert($states); 
 
             //Estados 
            $types = Array(
                Array("title" => "sencilla", "price_per_night" => 6000), 
                Array("title" => "doble", "price_per_night" => 10000), 
                Array("title" => "ejecutiva", "price_per_night" => 12000), 
                Array("title" => "precidencial", "price_per_night" => 20000), 
            ); 
            DB::table('type_room')->insert($types); 

    }

} 
