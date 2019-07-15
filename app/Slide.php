<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use SoftDeletes;
    protected $slides=['deleted_at'];
    protected $table = 'slides';
    protected $fillable=[
    	'path', 'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
