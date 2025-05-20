<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'profile_image',
        'full_name',
        'about',
        'company',
        'job',
        'address',
        'country',
        'phone',
        'email',
        'twitter_profile',
        'facebook_profile',
        'instagram_profile',
        'linkedin_profile',	
    ];
    public function user(){
        return $this->belongsTo(UserProfile::class ,'id');
    }
}

