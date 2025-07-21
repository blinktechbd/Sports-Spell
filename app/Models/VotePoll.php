<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotePoll extends Model
{
    protected $fillable = [
        'title',
        'total_vote',
        'status'
    ];
    public function votePollOption(){
        return $this->hasMany(VotePollOption::class,'vote_poll_id');
    }
}
