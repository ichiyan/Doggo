<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogDetail extends Model
{
    use HasFactory;
    //protected $primaryKey = 'dog_detail_id';
    protected $table = 'dog_details';
    protected $fillable = [
        'first_name', 'kennel_name',
        'birthdate', 'gender',
        'breed'
    ];

    public function named() {
        return $this->belongsTo(Dog::class);
    }

    public function getAgeInMonths() {
        $date = $this->birthdate;
        $currentDate = Carbon::now()->toDate();
        $date = Carbon::parse($date);
        $result = $date->diffInMonths($currentDate);
        return $result;
    }

}
