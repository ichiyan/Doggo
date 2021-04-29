<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\DogDetail;
use App\Models\DogLitter;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostType;
use App\Models\Report;
use App\Models\Tag;
use App\Models\User;
use App\Models\User_detail;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //only used when login/register is implemented
    // public function __construct() {
    //     $this->middleware('auth');
    //     $this->middleware('log');
    // }

    public function index(Request $request) {
        // if ($request->has('FilterForm')) {
        //     $filters = $this->getFilters(collect($request->input()));

        //     $search = $request->input('search-post');
        //     $posts = DB::table('posts')->where('posts.post_title', 'LIKE', "%{$search}%")
        //         ->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
        //         ->whereIn('post_tag.tag_id', $filters)
        //         ->join('images', 'posts.id', '=', 'images.post_id')
        //         ->select('posts.*', 'images.image_location as image', 'post_tag.tag_id')
        //         ->paginate(9);

        // } else {
        //     $search = $request->input('search-post');
        //     $posts = $this->getPosts($search ?? '', $filters ?? []);
        // }
        $search = $request->input('search-post');
        $posts = $this->getPosts($search ?? '', $this->getFilters(collect($request->input())) ?? []);

        return view('shop', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form')->with('dog', session()->get('dog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Lacking Validation $request->validate([attr.s])
        $post_type = PostType::create(['post_type_name' => $request->input('post-type')]);
        $userProfile = UserProfile::where('user_id', Auth::id())->get('id');
        // for registered dog being posted results to Dog litter being created
        // unless able to determine which dog litter it came from.
        // can't access dog to update dog_litter_id (FK)
        $dlID = DogLitter::create(['population' => 1])->id;

        $dog = Dog::where('registered_number', request()->session()->get('DRN'))->first();
        $dog->dog_litter_id = $dlID;
        $dog->save();

        $post = Post::create([
            'dog_litter_id' => $dlID,
            'user_profile_id' => $userProfile,
            'post_type_id' => $post_type->id,
            'post_title' => $request->input('post-title'),
            'price' => $request->input('price'),
            'post_description' => $request->input('description'),
            'status' => "Has Documentation",
        ]);

        if ($this->validateImage($request)) {
            $path = $request->file->store('posts');

            $image = Image::create([
                'post_id' => $post->id,
                'image_location' => $path,
                'description' => '',
            ]);
        }

        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        //find dog with dog_litter_id from post
        $dog = Dog::where('dog_litter_id', $post->dog_litter_id)->first();
        $user = UserProfile::find($dog->dog_owner_id);
        $user->email = User::findOrFail($user->user_id)->email;
        $dog = DogDetail::findOrFail($dog->dog_detail_id);
        $dog->age = $this->getMonths($dog->birthdate);
        $post->image = Image::where('post_id', $post->id)->first();
        // Post: post_title, post_description, price, status, interests, dog-litter_id
        // Dog_detail: first_name, kennel_name, birthdate, gender, breed
        // Dog:dog_detail_id

        return view('post', compact('post', 'user', 'dog') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getMonths($date) {
        $currentDate = Carbon::now()->toDate();
        $date = Carbon::parse($date);
        $result = $date->diffInMonths($currentDate);
        return $result;
    }

    public function report(Request $request) {
        if ($request->has('post_id') && $request->has('user_profile_id')) {

            $path = $request->file('image')->store('reports');

            Report::create([
                'post_id' => $request->input('post_id'),
                'user_profile_id' => $request->input('user_profile_id'),
                'reason' => $request->input('reason'),
                'image' => $path,
            ]);
        };

        return back()->with('message', 'Report created');
    }

    public function validateImage($request) {
        $bool = false;
        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg, bmp, png'
            ]);
            $bool = true;
        }
        return $bool;
    }

    public function getPosts($search, $filters) {
        $posts = new Collection([]);
        // if (count($filters) > 0) {

        //     $posts = Post::where('post_type_id', 1)
        //             ->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
        //             // ->whereIn('post_tag.tag_id', array($filters))
        //             ->where('posts.post_title', 'LIKE', "%{$search}%")
        //             ->paginate(9);

        // } else {
        //     $posts = Post::where('post_type_id', 1)
        //             ->where('posts.post_title', 'LIKE', "%{$search}%")
        //             ->paginate(9);
        // }
        $posts = Post::where('post_type_id', 1)
                    ->where('posts.post_title', 'LIKE', "%{$search}%")
                    ->paginate(3);

        foreach ($posts as $post) {
            $post->dog = $post->getDog();
            $post->dog->fullName = $post->dog->first_name . ' ' . $post->dog->kennel_name;
            $post->dog->age = $this->getMonths($post->dog->birthdate);
            $post->image = Image::where('post_id', $post->id)->first()->image_location;
        }

        return $posts;
    }

    public function getFilters($collection) {
        $filters = [];

        foreach($collection as $key => $value) {
            if ($value == "on") {
                $filters[] = Tag::where('tag_name', str_replace('_', ' ', $key))->get();
            }
        }

        return $filters;
    }
}
