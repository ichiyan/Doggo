<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_detail_id';
    protected $fillable = [
        'first_name', 'last_name',
        'profile_pic', 'age',
        'gender',
    ];
    protected $table = 'user_detail';

    public $timestamps = false;
}
