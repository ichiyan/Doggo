<?php

namespace App\Models;

use App\Classes\Filter;
use App\Utilities\FilterBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //protected $primaryKey = 'post_id';
    protected $table = 'posts';
    protected $fillable = [
        'dog_litter_id', 'post_type_id',
        'post_title', 'post_description',
        'price', 'status', 'interests',
    ];

    public function getDogLitter() {
        $dog_litter = DogLitter::find($this->dog_litter_id);
    }

    public function subjects() {
        return $this->hasOne(DogLitter::class);
    }

    public function categorized() {
        return $this->hasOne(PostType::class);
    }

    public function tagged() {
        return $this->belongsToMany(Tag::class);
    }

    public function violations() {
        return $this->hasMany(Report::class);
    }

    public function visuals() {
        return $this->hasMany(Image::class);
    }

    public function postedBy() {
        return $this->hasOne(UserProfile::class);
    }

    public function scopeFilterBy($query, $filters) {
        $namespace = 'App\Utilities\PostFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new Filter($request))->filter($builder);
    }
}
