<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcciMember extends Model
{
    use HasFactory;
    protected $table = 'pcci_members';
    protected $fillable = [
        'citizenship',
        'educational_attainment',
        'employment', 'employer_name',
        'employer_address', 'isInterestedInDogShows',
        'isVolunteer', 'user_profile_id'
    ];

    public function owns() {
        return $this->hasMany(Dog::class);
    }

    public function information() {
        return $this->belongsTo(UserProfile::class);
    }
}
