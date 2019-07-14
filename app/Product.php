<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $products=['deleted_at'];
    protected $table = 'products';
    protected $fillable=[
    	'name', 'price', 'quantity', 'producer', 'status', 'category_id', 'description', 'main_image'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function productdetail()
    {
    	return $this->hasOne(ProductDetail::class);
    }

    public function images()
    {
    	return $this->hasMany(Image::class);
    }

    public function orderdetail()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function promotions(){
        return $this->belongsToMany(Product::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
