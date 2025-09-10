<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    protected $with = ['comments', 'likes'];

    protected $hidden = ['user_id'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
