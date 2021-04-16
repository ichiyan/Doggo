<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_document extends Model
{
    use HasFactory;
    protected $primaryKey = 'dog_doc_id';
    protected $fillable = [
        'image',
    ];
    protected $table = 'user_document';
}
