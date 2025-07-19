<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotePollOption extends Model
{
    protected $fillable = [
        'vote_poll_id',
        'option_name',
        'vote_count',
    ];
    public function votePoll()
    {
        return $this->belongsTo(VotePoll::class);
    }
}
