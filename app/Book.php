<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'category_id', 'id');
    }

    public function scopeSearch($query, $keyword)
    {
        $query->whereHas('category', function ($query) use ($keyword) {
            $query->where('name', $keyword);
        })
            ->orWhere('name', $keyword)
            ->orWhere('name', 'LIKE', $keyword . ' %')
            ->orWhere('name', 'LIKE', '% ' . $keyword)
            ->orWhere('name', 'LIKE', '% ' . $keyword . ' %')
            ->orWhere('author', $keyword)
            ->orWhere('author', 'LIKE', $keyword . ' %')
            ->orWhere('author', 'LIKE', '% ' . $keyword)
            ->orWhere('author', 'LIKE', '% ' . $keyword . ' %')
            ->orWhere('bookmaker', $keyword);
        return $query;
    }

    public function fileUrl()
    {
        return asset('uploads/' . $this->file);
    }
}
