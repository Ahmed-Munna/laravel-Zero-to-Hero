<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    public function postsOnProfile() {

        return $this->hasOneThrough(Post::class, User::class, 'id', 'user_id', 'id', 'id');
    }
}
