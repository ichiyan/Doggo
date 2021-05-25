<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = 'post_regular';
    protected $fillable = [
        'post_id',
        'post_user_profile_id'
    ];

    public $timestamps = false;
}
