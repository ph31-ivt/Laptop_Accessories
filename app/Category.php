<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
   use SoftDeletes;  
    protected $categories=['deleted_at'];
    protected $fillable=[
    	'name', 'icon'
    ];
    public function product(){
    	return $this->hasMany(Product::class);
    }
	public function properties(){
		return $this->hasMany(Property::class);
	}
}
