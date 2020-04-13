<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Examinfo;
use App\Model\User;
use App\Http\Helper\ResponseBuilder;
use DB;

class ExaminfoController extends Controller
{
    //
	public function examCandidate()
	{
		
			$data = Examinfo::all();
			$status = true;
			$info = "Successfully fetched data from table";
			return ResponseBuilder::result($status,$info,$data);
			
	}
	
	public function examCandidateShow($id)
     {
        $examinfo = Examinfo::find($id);

        return response()->json($examinfo);
     }

	
	
}
