<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    protected $guarded = [];

    public function books() {
        return $this->belongsToMany(Book::class);
    }
}
