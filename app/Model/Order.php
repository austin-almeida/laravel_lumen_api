<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	
	protected $table = 'products';
protected $fillable = ['name', 'price', 'description'];
    //
}
