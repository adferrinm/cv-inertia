<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'person_id',
        'institution',
        'degree',
        'field',
        'start_date',
        'end_date',
        'description',
    ];

    protected $casts = [
        'degree' => 'array',
        'field' => 'array',
        'description' => 'array',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
