<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodaySport extends Model
{
    protected $fillable = [
        'category_id',
        'match_type',
        'match_title',
        'match_stadium',
        'match_time',
        'total_vote',
        'status'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function todaySportOption(){
        return $this->hasMany(TodaySportOption::class,'today_sport_id');
    }
}
