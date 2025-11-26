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
        'start_year',
        'end_year',
        'description',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
