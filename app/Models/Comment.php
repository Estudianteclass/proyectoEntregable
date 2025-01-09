<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'game_id',
        'user_id',
        'rating',
        'description',
    ];

    public function game():BelongsTo{
        return $this->belongsTo(Game::class);
    }
}
