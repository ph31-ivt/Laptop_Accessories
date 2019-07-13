<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;  
    
    protected $oderdetails=['deleted_at']; 
    protected $table = 'order_details';
    protected $fillable=[
    	 'quantity', 'price', 'order_id', 'product_id'
    ]; 

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function product()
    {
   	  return $this->belongsTo(Product::class);
    }
}
