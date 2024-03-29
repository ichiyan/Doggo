<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use HasFactory;
    protected $table = 'post_types';
    protected $fillable = [
        'post_type_name',
    ];

    public $timestamps = false;

    public function filterResults() {
        return $this->belongsToMany(Post::class);
    }
}
