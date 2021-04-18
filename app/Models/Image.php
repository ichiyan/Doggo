<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    //protected $primaryKey = 'image_id';
    protected $table = 'images';
    protected $fillable = [
        'post_id', 'image_location', 
        'description',
    ];
    
    public function viewable() {
        return $this->belongsTo(Post::class);
    }

}
