<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['user' , 'keywords'];

    protected $guarded = [];

    protected $dates = [
        'published_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }

}
