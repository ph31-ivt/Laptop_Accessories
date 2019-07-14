<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes; 

    protected $images=['deleted_at'];
    protected $table = 'images';
    protected $fillable=[
    	'path', 'product_id'
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
