<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_comment extends Model
{
    protected $table = 'blog_comment';
    protected $fillable = ['user_id','name','email','subject','message'];
}
