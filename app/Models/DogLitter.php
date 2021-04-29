<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogLitter extends Model
{
    use HasFactory;
    protected $table = 'dog_litters';
    protected $fillable = [
        'population',
    ];

    public function pups() {
        return $this->hasMany(Dog::class);
    }

    public function dog() {
        return $this->hasOne(dog::class);
    }

    public function posted() {
        return $this->belongsTo(Post::class);
    }

}
