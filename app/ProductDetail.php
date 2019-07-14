<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use SoftDeletes;

    protected $productdetails=['deleted_at'];
    protected $table = 'product_details';
    protected $casts = [
        'properties' => 'array'
    ];
     protected $fillable=[
    	'properties', 'product_id'
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function setPropertiesAttribute($value)
    {  
        $properties = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['value'])) {
                $properties[] = $array_item;
            }
        }

        $this->attributes['properties'] = json_encode($properties);
    }
}
