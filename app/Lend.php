<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
