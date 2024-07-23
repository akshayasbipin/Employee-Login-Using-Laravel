<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['uname', 'email', 'password', 'type', 'sal'];
}

// class UArticle extends Model
// {
//     use HasFactory;
//     protected $table = 'users';
//     protected $fillable = ['type'];
// }
