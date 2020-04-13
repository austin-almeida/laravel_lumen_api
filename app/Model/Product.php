<?php

namespace App;
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;


Class Product extends Model 

{
	protected $table = 'products';
protected $fillable = ['name', 'price', 'description'];

public function p_item()
{
    return $this->hasMany('App\Product_Item','pid','id');
}


}
