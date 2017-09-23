<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Logic\Encryption;
use Illuminate\Support\Facades\Validator;
use App\ProductDetail;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use URL;

class ProductController extends Controller
{
    public function getProduct(){
        return View('templates.productRegistration');
    }
    public function getBatches(){
        $products = Product::all();
        return View('templates.batchRegistration')->with('products', $products);
    }
    public function createProduct(Request $request){
        $rules = array(
            'name' => 'required',
            'product_details' => 'required',
            'product_image' => 'required',
            'secret_key' => 'required|min:3:max:10'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
        $data = $request->all();
		$image = $request->file('product_image');
        // dd($image);
		$img = str_replace(' ', '-', $image->getClientOriginalName());
		$cool = strlen($img);
		if($cool > 40){
          $initial = $cool-30;
          $img = substr($img, $initial);
		}
                // dd($img);
		$imagename = time() . "-" . $img;
                //dd($imagename);
		Image::make($image->getRealPath())->resize(640, 480, function ($constraint) {
        $constraint->aspectRatio();})->save(public_path() . '/images/product/' . $imagename);
		$image_url = '/images/product/' .$imagename;
        $data['product_image'] = $image_url;
        $data['user_id'] = Auth::user()->id;
        $product = new Product();
        $product->fill($data);
        if($product->save()){
            return  redirect()->back()->with('success','You have successfully added your product');
        }
            return  redirect()->back()->withFail('fail', 'an error occured while trying to update your match')->withInput();   
        }
    }
    public function generateVerification(Request $request){
        $rules = array(
            'product_id' => 'required',
            'first_batch' => 'required',
            'last_batch' => 'required',
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
        $data = $request->all();
        $first_batch = $data['first_batch'];
        $last_batch = $data['last_batch'];
        $product_id = $data['product_id'];
        $product = Product::find($product_id);
        $secret = $product->secret_key;
        // $product->secret_key = $secret;
        // $product->update();
        for($i = $first_batch; $i < $last_batch; $i++){
            $batch_number = $i;
            $batch = $batch_number . "";
            $track_number = $product->name . '-' . $i;
            $random_n = rand(12345, 99999);
            $final = time() - $random_n;
            $algo_number = 0;
            if($batch_number > $final){
                $algo_number = $batch_number - $final; 
            }
            else{
                $algo_number = $batch_number + $final;
            }
            $tracking_number = $algo_number;
            $data['tracking_number'] = $tracking_number;
            $data['batch_number'] = $batch_number;
            $product_details = new ProductDetail();
            $product_details->fill($data);
            $product_details->save();
        }
        $base_url = URL::to('/');
        $json_link = $base_url . '/verify/'.$product_id . '/' .$first_batch . '/' . $last_batch;
        $html = '<a href=' . $json_link . '> click here to download json data </a>';
            return  redirect()->back()->withSuccess('You have successfully created your tracking code ' .$html);    
        }
    }
    public function getTrackingJson($product_id, $first_batch, $last_batch){
        $product_details = ProductDetail::where('product_id', '=', $product_id)->whereBetween('batch_number',[$first_batch -1, $last_batch -1])->get();
        $prod_details = [];
        if(count($product_details) > 0){
          foreach($product_details as $product){
              $prod_details[] = ['batch_number' => $product->batch_number, 'tracking_code' => $product->tracking_number];
          }  
              return response()->json(['data' => $prod_details]);
        }
    }
    public function verifyProduct ($tracking_number){
        $token = $tracking_number;
        $product_details = ProductDetail::where('tracking_number', '=', $token)->first();
        if(!$product_details && $product_details->id){
            return response()->json(['msg' => "sorry this product is a fake product"]);
        }
        return response()->json(['msg' => 'You have an original ' .$product_details->product->name .' with you, with a batch number of ' .$product->batch_number .' thank you for using veripro']);
    }
    public function getSalt() {
     $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|';
     $randStringLen = 64;

     $randString = "";
     for ($i = 0; $i < $randStringLen; $i++) {
         $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
     }

     return $randString;
}
}
