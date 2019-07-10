<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;
    protected $promotions=['deleted_at'];
     protected $fillable=[
    	'name', 'discount'
    ];
    public function products(){
    	return $this->belongsMany(Product::class);
    }
}
