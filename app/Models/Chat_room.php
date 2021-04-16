<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_room extends Model
{
    use HasFactory;
    protected $primaryKey = 'chat_room_id';
    protected $fillable = [
        'name',
    ];
    protected $table = 'chat_room';
}
