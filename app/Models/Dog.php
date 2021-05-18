<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    protected $table = 'dogs';
    protected $fillable = [
        'registered_number', 'dog_detail_id',
        'dog_owner_id', 'dog_litter_id', 'is_Posted',
    ];

    public function siblings() {
        return $this->belongsTo(DogLitter::class);
    }

    public function information() {
        return $this->hasOne(DogDetail::class);
    }

    public function owner() {
        return $this->belongsTo(PcciMember::class);
    }
}
