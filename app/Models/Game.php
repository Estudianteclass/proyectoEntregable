<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = [
        'title',
        'genre',
        'price',
        'developer',
        'year',
        'cover',
    ];
    public function comments():BelongsToMany{
        return $this->belongsToMany(User::class,'comments')->withPivot('rating','decription');
    }
}
