<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Experience extends Model
{
    protected $fillable = [
        'person_id',
        'company',
        'position',
        'description',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'position' => 'array',
        'description' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'experience_skill');
    }
}
