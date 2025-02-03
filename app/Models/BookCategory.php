<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookCategory extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    public function semesters(): HasMany
    {
        return $this->hasMany(Semester::class);
    }
}
