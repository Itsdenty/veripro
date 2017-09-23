<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductDetail;

class USSDController extends Controller
{


    public function index(){


    	$sessionId = request()->input('sessionId');

		$serviceCode = request()->input('serviceCode');

		$phoneNumber = request()->input('phoneNumber');

    	$text = request()->input('text');

    	if($text == ""){

    	$response  = "CON please input the product verification number \n";

    	}
    	else if($text != ""){

    		$text = trim($text);

    		$code = ProductDetail::where('tracking_number', $text)->first();

    		if(!$code){

    			$response = "END The product verification code does not exist";

    			return $response;
    		}

    		$batch = $code->batch_number;

    		$response = "END This product with batch number $batch is verified OK!";

    		header('Content-type: text/plain');

    		return $response;


    	}
    }

}

   

    	

   
