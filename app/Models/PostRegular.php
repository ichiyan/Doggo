<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostRegular extends Model
{
    use HasFactory;
    protected $table = 'post_regular';
    protected $fillable = [
        'post_id',
        'regular_id'
    ];

    public $timestamps = false;
}
