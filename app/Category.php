<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{

    use SoftDeletes;
    
    protected $categories=['deleted_at'];
    protected $table = 'categories';
    protected $fillable=[
    	'name', 'icon','parent_id'
    ];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

	public function properties()
    {
		return $this->hasMany(Property::class);
	}

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }
}
