<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use Carbon\Carbon;

class Book extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function authors() {
        return $this->belongsToMany(Author::class);
    }

    public function getFormatedDateAttribute() {
        return Carbon::parse($this->published_on)->format('d M Y');
    }
}
