<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function likedBy (User $user) {
        return $this->likes->contains('user_id', $user->id); // contains is a laravel collection method that allows us to look inside a particular collection
    }                                                          //it will return true or false

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function likes () {
        return $this->hasMany(Like::class);
    }

}
