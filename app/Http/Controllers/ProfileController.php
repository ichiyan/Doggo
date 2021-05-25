<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll($user_id)
    {
        $user = UserProfile::find($user_id);
        $user->email = User::findOrFail($user->user_id)->email;

        $filter = 'All Posts';

        $posts = Post::where('user_id', $user_id)
            ->paginate(9);

        $count = Post::where('user_id', $user_id)->count();

        foreach ($posts as $post) {
            $post->dog = $post->getDog();
            $post->dog->fullName = $post->dog->first_name . ' ' . $post->dog->kennel_name;
            $post->dog->age = $this->getMonths($post->dog->birthdate);
        }

        return view('profile', compact('user', 'posts', 'filter', 'count') );
    }

    public function showShop($user_id)
    {
        $user = UserProfile::find($user_id);
        $user->email = User::findOrFail($user->user_id)->email;

        $filter = 'Shop';

        $posts = Post::where('user_id', $user_id)->where('post_type_id', 1)
            ->paginate(9);

        $count = Post::where('user_id', $user_id)->where('post_type_id', 1)->count();

        foreach ($posts as $post) {
            $post->dog = $post->getDog();
            $post->dog->fullName = $post->dog->first_name . ' ' . $post->dog->kennel_name;
            $post->dog->age = $this->getMonths($post->dog->birthdate);
        }

        return view('profile', compact('user', 'posts', 'filter', 'count') );
    }

    public function showStud($user_id)
    {
        $user = UserProfile::find($user_id);
        $user->email = User::findOrFail($user->user_id)->email;

        $filter = 'Stud Service';

        $posts = Post::where('user_id', $user_id)->where('post_type_id', 2)
            ->paginate(9);

        $count = Post::where('user_id', $user_id)->where('post_type_id', 2)->count();

        foreach ($posts as $post) {
            $post->dog = $post->getDog();
            $post->dog->fullName = $post->dog->first_name . ' ' . $post->dog->kennel_name;
            $post->dog->age = $this->getMonths($post->dog->birthdate);
        }

        return view('profile', compact('user', 'posts', 'filter', 'count') );
    }

    public function showRehome($user_id)
    {
        $user = UserProfile::find($user_id);
        $user->email = User::findOrFail($user->user_id)->email;

        $filter = 'Shop';

        $posts = Post::where('user_id', $user_id)->where('post_type_id', 3)
            ->paginate(9);

        $count = Post::where('user_id', $user_id)->where('post_type_id', 3)->count();

        foreach ($posts as $post) {
            $post->dog = $post->getDog();
            $post->dog->fullName = $post->dog->first_name . ' ' . $post->dog->kennel_name;
            $post->dog->age = $this->getMonths($post->dog->birthdate);
        }

        return view('profile', compact('user', 'posts', 'filter', 'count') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        // P.S: Feel Free to add a flow
        // User submits profile data.
        // Query to the database.
        // refresh page to update data.

        //inputs are arrays that contain names of all input fields
        $userInputs = [];
        $userProfileInputs = [];

        $userData = $request->only($userInputs);
        $userProfData = $request->only($userProfileInputs);

        // if $id is for user and not for userProfile.
        User::where('id', $id)->update($userData);
        UserProfile::where('user_id', $id)->update($userProfData);

        // image is still to be added.

        // return redirect()->action([ProfileController::class, 'index']);
        return back();
    }

    /*
        deletes user's own post
    */
    public function destroyPost($postId) {
        $post = Post::find($postId);
        $images = Image::where('post_id', $postId)->pluck('image_location');

        Storage::delete($images);
        Image::where('post_id', $postId)->delete();

        // can't update a specific dog via dog_litter since there are lots of dogs with the same dog_litter_id
        // line below will update all dog with the dog_litter_id.
        // Dog::where('dog_litter_id', $post->dog_litter_id)->update(['is_Posted' => 0]);

        // line below will update all dog with the dog_litter_id and post_type_id;
        Dog::where('dog_litter_id', $post->dog_litter_id)->where('post_type_id', $post->post_type_id)->update(['is_Posted' => 0]);
        $post->delete();

        return back();
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
