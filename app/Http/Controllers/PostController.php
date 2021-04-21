<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Dog_detail;
use App\Models\Post;
use App\Models\User;
use App\Models\User_detail;
use Illuminate\Http\Request;
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
                    ->where('status', '!=', 'Complete')
                    ->select('id', 'post_description', 'price', 
                                'post_title', 'dog_litter_id', 
                                'interests')
                    ->paginate(9);
        $dogs = DB::table('dogs')
                    ->join('dog_details', 'dogs.dog_detail_id', 'dog_details.id')
                    ->get();

//dd($dogs);
        return view('shop', compact('posts', 'dogs') );
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
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $dog = Dog_detail::findOrFail($post->dog->dog_detail_id);
        $user = User_detail::findOrFail($post->dog->owner);

        return view('post', compact('post', 'owner', 'dog') );
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
}
