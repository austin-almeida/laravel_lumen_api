<?php

namespace App\Http\Controllers;
use App\Model\User;
use App\Model\Order;
use App\Model\Product;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use DB;


//use Illuminate\Http\Request;

class UserController extends Controller
{
    //
	public function test(){
		$data = User::all();
		$status = true;
		$info = "Data is Listed successfully";
		return ResponseBuilder::result($status,$info,$data);
		//echo "here";
	}
	
	public function order1(Request $request){
		
	   $product = new Product;

       $product->name= $request->name;
       $product->price = $request->price;
       $product->description= $request->description;
       
       $result = $product->save();
	   if($result == 1){
		    $status = true;
			$info = "Data inserted successfully";
	   }else{
		    $status = false;
			$info = "no insertion";
	   }
		
		return ResponseBuilder::result($status,$info);
        

       return response()->json($product);
		
	}
}
