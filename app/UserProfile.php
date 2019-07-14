<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;

    protected $userprofiles=['deleted_at'];
    protected $table='user_profiles';
    protected $fillable=[
    	'phone', 'address', 'gender','user_id', 'role'
    ];

    public function user()
    {
    	 return $this->belongsTo(User::class);
    }
}
