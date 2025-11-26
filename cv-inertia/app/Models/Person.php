<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'name',
        'headline',
        'summary',
        'email',
        'phone',
        'location',
        'pdf_url',
        'github_url',
        'linkedin_url',
        'portfolio_url',
    ];

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class)->orderBy('start_date', 'desc');
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class)->orderBy('start_year', 'desc');
    }
}
