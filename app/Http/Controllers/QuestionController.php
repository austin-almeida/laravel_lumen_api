<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Question;
use App\Model\User;
use App\Http\Helper\ResponseBuilder;
use DB;

class QuestionController extends Controller
{
    //
	
	public function question(){
		$data = Question::all();
		$status = true;
		$info = "All Questions fetched";
		return ResponseBuilder::result($status,$info,$data);
	}
	
	public function questionShow($quiz_id){
		$data = Question::find($quiz_id);
		return response()->json($data);
	}
	
	public function questionSelect($quiz_id)
	{
		$users = DB::table('questions')
            //->join('products_itm', 'products.id', '=', 'products_itm.pid')
            ->where('quiz_id','=',$quiz_id)
            //->skip(2)
            //->take(3)
            //->where('addess','=','mekhri')
            //->groupBy('products.id')
            ->get();
           //print_r($users->toSql());exit;
		   //var_dump($users);exit;
	if($users != '[]'){
     //return $users;
		$status = true;
		$info = "All Questions fetched";
		return ResponseBuilder::result($status,$info,$users);
	}else{
		$status = false;
		$info = "No Data Avialable";
		return ResponseBuilder::result($status,$info,$users);
	}
	}
}
