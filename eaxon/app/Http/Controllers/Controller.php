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

    public function list() {
    	$guests = DB::select("SELECT * FROM guest"); 
    	return view('list', ['guests' => $guests]);  
    }

    public function client( $hash ) { 
    	$user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
       
    	return view('client', ['hash' => $hash, 'user' => $user]);  
    }

     public function clientHome( $hash, $p) { 
        $user = DB::select("SELECT * FROM guest WHERE hash = '$hash'")[0]; 
          
        return view('clientHome', ['hash' => $hash, 'user' => $user, 'perfil' => $p]);  
    }
  

    public function guest(Request $data) {
    	$name = $data->input('name'); 
    	$phone = $data->input('phone');  
    	$room = $data->input('room'); 

    	$random_base64 = base64_encode(random_bytes(18));
		$hash = serialize($random_base64);

        $hash = str_replace( array('"', '/'), array("", ""), $hash); 
 
    	DB::select("INSERT INTO guest(name, hash, phone, room) VALUES('$name', '$hash', '$phone', '$room')"); 
    }
}
