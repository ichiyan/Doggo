<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    //protected $primaryKey = 'report_id';
    protected $table = 'reports';
    protected $fillable = [
        'post_id', 'user_profile_id',
        'reason',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function user() {
        return $this->belongsTo(UserProfile::class);
    }

    // public function reportfiles() {
    //     return $this->hasMany(ReportFile::class);
    // }

}
