<?php

namespace App\Models;

use App\Classes\Filter;
use App\Utilities\FilterBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    //protected $primaryKey = 'post_id';
    protected $table = 'posts';
    protected $fillable = [ 'user_id',
        'dog_litter_id', 'post_type_id',
        'post_title', 'post_description',
        'price', 'status', 'interests',
    ];

    public function getImage() {
        return Image::where('post_id', $this->id)->pluck('image_location')[0];
    }

    public function getDogLitter() {
        $dog_litter = DogLitter::find($this->dog_litter_id);
    }

    public function subject() {
        return $this->belongsTo(DogLitter::class);
    }

    public function getDog() {
        $dog = Dog::where('dog_litter_id', $this->dog_litter_id)
                ->join('dog_details', 'dog_details.id', '=', 'dogs.dog_detail_id')
                ->first();
        return $dog;
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

    public function bookmarked() {
        return $this->belongsToMany(UserProfile::class);
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
