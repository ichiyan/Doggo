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
        'reason', 'image',
    ];
    
    public function reports() {
        return $this->belongsTo(Post::class);
    }

}
