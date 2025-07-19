<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodaySportOption extends Model
{
    protected $fillable = [
        'today_sport_id',
        'option_name',
        'vote_count',
    ];
    public function todaySport()
    {
        return $this->belongsTo(TodaySport::class);
    }
}
