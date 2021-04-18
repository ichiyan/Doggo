<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogPedigreeDoc extends Model
{
    use HasFactory;
    protected $table = 'dog_pedigree_docs';
    protected $fillable = [
        'registered_number',
        'directory',
    ];
}
