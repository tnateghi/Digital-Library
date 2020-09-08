<?php

namespace App;

use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function lends()
    {
        return $this->hasMany(Lend::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return $role->intersect($this->roles)->count();
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function getCreatedAtAttribute($value)
    {
        return jDate($value)->format('%d %B %Y');
    }

    public function getGetImageAttribute()
    {
        $value = $this->image;

        if ($value != 'default.jpg') {
            return asset('user-img/' . $value);
        }

        if (Gravatar::exists($this->email)) {
            return Gravatar::get($this->email);
        }

        return asset('img/placeholders/avatars/' . $value);
    }

    public function isAdmin()
    {
        return $this->level == 'admin' || $this->level == 'creator' ? true : false;
    }

    public function scopeSearch($query, $keyword)
    {

        $query->WhereRaw("concat(firstName, ' ', lastName) like '%{$keyword}%' ");
        return $query;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
