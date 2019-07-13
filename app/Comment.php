<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use SoftDeletes; 
    protected $comments=['deleted_at']; 
    protected $fillable=[
    	 'title', 'content','rating','status','user_id', 'product_id'
    ]; 
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
