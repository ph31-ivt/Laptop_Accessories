<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes; 
    protected $properties=['deleted_at']; 
    protected $table = 'properties';
    protected $fillable=[
    	 'name', 'category_id'
    ]; 

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
