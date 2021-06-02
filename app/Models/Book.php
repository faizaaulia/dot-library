<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Book extends Model
{
    protected $guarded = [];

    public function authors() {
        return $this->belongsToMany(Author::class);
    }
}
