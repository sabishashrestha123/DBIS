<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookBorrow extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
        'late_fee',
        'is_returned',
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
