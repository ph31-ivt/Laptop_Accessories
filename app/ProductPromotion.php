<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductPromotion extends Model
{
    use SoftDeletes;
    protected $productpromotions=['deleted_at'];
    protected $table = 'product_promotion';
    protected $fillable=[
    	'product_id', 'promotion_id'
    ];
}
