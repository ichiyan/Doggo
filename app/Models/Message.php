<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    //protected $primaryKey = 'message_id';
    protected $table = 'messages';
    protected $fillable = [
        'chat_room_id',
        'user_id',
        'text',
    ];

    public function contextualize() {
        return $this->belongsTo(ChatRoom::class);
    }

    public function written() {
        return $this->hasOne(UserProfile::class);
    }
    
}
