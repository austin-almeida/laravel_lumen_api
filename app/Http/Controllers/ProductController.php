<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Product_Item;
use Illuminate\Http\Request;
use DB;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
     public function create(Request $request)
     {
		  
        $product = new Product;

       $product->name= $request->name;
       $product->price = $request->price;
       $product->description= $request->description;
       
       $product->save();

       //$product = Product::create($request->all());

       return response()->json($product);
     }


      
    }

    

