<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Answer;
use App\Model\User;
use App\Http\Helper\ResponseBuilder;
use DB;

class AsnwerController extends Controller
{
    //
	public function answer(){
		$data = Answer::all();
		$status = true;
		$info = "All Answer fetched";
		return ResponseBuilder::result($status,$info,$data);
	}
	
	public function answerFind($id){
		$data = Answer::find($id);
		return response()->json($data);
	}
	
	public function answerResult($stu_id)
	{
		$users = DB::table('answers')
            //->join('products_itm', 'products.id', '=', 'products_itm.pid')
            ->where('stu_id','=',$stu_id)
            //->skip(2)
            //->take(3)
            //->where('addess','=','mekhri')
            //->groupBy('products.id')
            ->get();
           //print_r($users->toSql());exit;

     return $users;
	}
	
	public function answerCheck($stu_id)
	{
		$count=0;
		$wrong=0;
		$users = DB::table('answers') 
            ->where('stu_id','=',$stu_id) 
            ->get(); 

     //return $users;
	 $result = json_decode($users, true);
	 foreach ($result as $user){
		  
			if($user['given_answer'] == $user['true_answer']){
				$count++;
			}else{
				$wrong++;
			}
	 }
	 $total = $count + $wrong;
	 echo "Total Question :-" .$total;
	 echo "\n";
	 echo "Total Count of Correct Answers:-".$count;
	 echo "\n";
	 echo "Total Count of Wrong Answer:-".$wrong;
	 echo "\n";
	 $percent = round(($count/$total)*100);
	 
	
	 if($percent > 70){
		
		 $status = "Pass";
		 $info = "You Cracked the interview";
		 $data = "Your Percentage :-" .$percent;
		 return ResponseBuilder::result($status,$info,$data);
	 }else{
		 $status = "Fail";
		 $info = "Sorry Try again next year";
		 $data = "Your Percentage :-" .$percent;
		 return ResponseBuilder::result($status,$info,$data);
	 }
	 
	  
	}

}
