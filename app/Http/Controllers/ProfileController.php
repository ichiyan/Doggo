<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;

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
