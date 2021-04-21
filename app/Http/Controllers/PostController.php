<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\DogDetail;
use App\Models\DogLitter;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use App\Models\User_detail;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

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

    public function index() {
        $posts = DB::table('posts')
            ->select('posts.*', 'images.image_location as image')
            ->join('images', 'posts.id', '=', 'images.post_id')
            ->paginate(9);
        return view('shop', ['posts' => $posts]);
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

        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg, bmp, png'
            ]);

            $request->file->store('posts/'.$post->user_profile_id, 'public');

            $image = Image::create([
                'post_id' => $post->id,
                'image_location' => $request->file->hashName(),
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
        $post = Post::find($id);
        //find dog with dog_litter_id from post
        $dog = Dog::where('dog_litter_id', $post->dog_litter_id)->first();
        $user = UserProfile::find($dog->dog_owner_id);
        $user->email = User::find($user->user_id)->email;
        $dog = DogDetail::find($dog->dog_detail_id);
        $dog->age = $this->getMonths($dog->birthdate);
        // Post: post_title, post_description, price, status, interests, dog-litter_id
        // Dog_detail: first_name, kennel_name, birthdate, gender, breed
        // Dog:dog_detail_id

        return view('post', ['post' => $post, 'owner' => $user, 'dog' => $dog]);
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
}
