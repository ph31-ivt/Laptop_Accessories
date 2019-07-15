<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;  

    protected $oders=['deleted_at']; 
    protected $table = 'orders';
    protected $fillable=[
    	'code','fullname','phone', 'address', 'total_price', 'status', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function orderdetails()
    {
    	return $this->hasMany(OrderDetail::class);
    }
}
