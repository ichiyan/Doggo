<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;
    //protected $primaryKey = 'chat_room_id';
    protected $table = 'chat_rooms';
    protected $fillable = [
        'name',
    ];
    
    public function members() {
        return $this->hasMany(UserProfile::class);
    }

    public function conversations() {
        return $this->hasMany(Message::class);
    }

}
