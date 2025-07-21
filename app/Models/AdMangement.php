<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdMangement extends Model
{
    protected $fillable = [
        'home_special_header_top',
        'home_special_header_bottom',
        'home_category_bottom',
        'home_double_category_bottom',
        'home_sidebar_ad_one',
        'home_sidebar_ad_two',
        'home_sidebar_ad_three',
    ];
}
