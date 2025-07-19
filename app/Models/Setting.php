<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'email',
        'address',
        'site_title',
        'site_desc',
        'logo',
        'favicon',
        'meta_title',
        'meta_desc',
        'meta_img',
        'social_fb_icon',
        'social_fb',
        'social_tw_icon',
        'social_tw',
        'social_ln_icon',
        'social_ln',
        'social_yt_icon',
        'social_yt',
        'about',
        'contact',
        'privacy_policy'
    ];
}
