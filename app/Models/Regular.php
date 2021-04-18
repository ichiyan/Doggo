<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regular extends Model
{
    use HasFactory;
    protected $table = 'regulars';
    protected $fillable = [
        'user_profile_id',
    ];

    public function details() {
        return $this->belongsTo(UserProfile::class);
    }
}
