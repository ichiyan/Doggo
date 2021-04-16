<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog_detail extends Model
{
    use HasFactory;
    protected $primaryKey = 'dog_detail_id';
    protected $fillable = [
        'first_name', 'last_name',
        'age', 'gender',
    ];

    protected $table = 'dog_detail';
    public $timestamps = false;
}
