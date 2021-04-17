<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    protected $primaryKey = 'registered_number';
    protected $table = 'dog';
    protected $keyType = 'string';

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function dog_detail() {
        return $this->hasOne(Dog_detail::class);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }
}
