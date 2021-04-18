<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';
    protected $fillable = [
        'fname', 'mname', 'lname',
        'birthdate', 'username',
        'city', 'province', 'zipCode',
        'bio', 'profile_pic', 
        'contact_number', 'user_id',
        'PCCI_member_id', 'regular_id'
    ];

    public function logs() {
        return $this->hasOne(User::class);
    }

    public function reg() {
        return $this->hasOne(Regular::class);
    }

    public function member() {
        return $this->hasOne(PcciMember::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function texts() {
        return $this->hasMany(Message::class);
    }

    public function transacts() {
        return $this->hasMany(ChatRoom::class);
    }
}
