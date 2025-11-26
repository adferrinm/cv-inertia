<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'category',
        'logo_slug',
        'level',
    ];

    public function experiences(): BelongsToMany
    {
        return $this->belongsToMany(Experience::class, 'experience_skill');
    }
}
