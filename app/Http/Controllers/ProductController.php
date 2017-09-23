<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Logic\Encryption;

class ProductController extends Controller
{
    public function createProduct(Request $request){
        $rules = array(
            'product_name' => 'required',
            'product_details' => 'required',
            'product_image' => 'required',
            'secret_key' => 'required|min:10'
        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
        $data = $request->all();
        $product = new Product();
        $product->fill($data);
        if($product->update()){
            return  redirect()->back()->withSuccess('You have successfully updated your match');
        }
            return  redirect()->back()->withFail('an error occured while trying to update your match')->withInput();   
        }
    }
    public function generatePinVerifications(Request $request){
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
        $current = [];
        for($i = $first_batch; $i < $last_batch; $i++){
            $batch_number = $i;
            $track_number = $product->name . '-' . $i;
            $encrypt = new Encryption;
            $secret = $product->secret_key;
            $tracking_number = $encrypt->simple_encrypt($track_number,$secret);
            $data['tracking_number'] = $tracking_number;
            $data['batch_number'] = $batch_number;
            $product_details = new ProductDetail();
            $product_details->fill($data);
            $current[] = $product_details;
        }
        $base_url = URL::to('/');
        $json_link = $base_url . '/verify/'.$product_id . '/' .$first_batch . '/' . $last_batch;
        $html = '<a href=' . $json_link . '> click here to download json data </a>';
            return  redirect()->back()->withSuccess('You have successfully created your tracking code ' .$html);    
        }
    }
    public function getTrackingJson($product_id, $first_batch, $last_batch){
        $product_details = ProductDetails::where('product_id', '=', $product_id)->whereBetween('tracking_number',[$first_batch -1, $last_batch -1])->get();
        $prod_details = [];
        if(count($products > 0)){
          foreach($product_details as $product){
              $prod_details[] = ['batch_number' => $product->batch_number, 'tracking_code' => $product->tracking_number];
          }  
              return response()->json(['data' => $prod_details]);
        }
    }
    public function verifyProduct ($tracking_number){
        $token = $tracking_number;
        $product_details = ProductDetails::where('tracking_number', '=', $token)->first();
        if(!$product_details && $product_details->id){
            return response()->json(['msg' => "sorry this product is a fake product"]);
        }
        return response()->json(['msg' => 'You have an original ' .$product_details->product->name .' with you, with a batch number of ' .$product->batch_number .' thank you for using veripro']);
    }
}
