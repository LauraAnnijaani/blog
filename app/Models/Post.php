<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['title', 'body'];

    protected function snippet(): Attribute {
        return Attribute::get(function () {
            return explode("\n\n", $this->body)[0];
        });
    }

    protected function displayBody(): Attribute {
        return Attribute::get(function () {
            return nl2br(htmlspecialchars($this->body));
        });
    }

    protected function authHasLiked(): Attribute {
        return Attribute::get(function () {
            if(Auth::check()){
                return $this->likes()->where('user_id', Auth::user()->id)->exists();
            }
            return false;
        });
    }

     public function user() {
        return $this->belongsTo(User::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
