<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Dog;
use App\Models\DogDetail;
use App\Models\DogLitter;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostType;
use App\Models\PostRegular;
use App\Models\Report;
use App\Models\ReportFile;
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
        $filters = NULL;
        $pivot = NULL;
        $tags = Tag::get();

        $search = $request->input('search-post');
        $input = $request->all('find');
        $filters = $input["find"];

        if($filters != NULL){
            $pivot = PostTag::whereIn('tag_id', $filters)->get();
        }

        $posts = Post::where('post_type_id', 1)
                    ->where('posts.post_title', 'LIKE', "%{$search}%")
                    ->paginate(18); //INTERFERS WITH THE FILTER. POSTS ON THE 2ND PAGE DOESN'T GET FILTERED

        foreach ($posts as $post) {
            // $post->dog = $post->getDog();
            $post->dog = Dog::where('dog_litter_id', $post->dog_litter_id)
                ->join('dog_details', 'dog_details.id', '=', 'dogs.dog_detail_id')
                ->first();
            $post->dog->fullName = $post->dog->first_name . ' ' . $post->dog->kennel_name;
            $post->dog->age = $this->getMonths($post->dog->birthdate);
            $post->img = Image::where('post_id', $post->id)->pluck('image_location')[0];
            if(Auth::check()){
                $post->bookmarked = DB::table('post_user_profile')->where('post_id', $post->id)->where('user_profile_id', Auth::id())->exists();
            }
        }

        //dd($filters);

        return view('shop.shopv3', compact('posts', 'tags', 'pivot') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.shop_new_post')->with('dog', session()->get('dog'));
        $error = 'Log in first';
        if (Auth::check()) {
                $userProf = UserProfile::where('user_id', Auth::id())->get()[0];
                if ($userProf->is_admin || $userProf->pcci_member_id != null) {
                    return view('shop.shop_new_post')->with('dog', session()->get('dog'));
                }
                $error = 'Only PCCI members are allowed to sell.';
                $userProf = UserProfile::where('user_id', Auth::id())->get()[0];

                if ($userProf->is_admin || $userProf->pcci_member_id != null) {
                    return view('shop.shop_new_post')->with('dog', session()->get('dog'));
                }
            }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ATTENTION: This function is not used instead, the app/Http/Livewire/ShopForm is used to process form submit
        $userProfile = UserProfile::where('user_id', Auth::id())->get('id');
        $dlID = DogLitter::create(['population' => 1])->id;

        $dog = Dog::where('registered_number', request()->session()->get('DRN'))->first();
        $dog->dog_litter_id = $dlID;
        $dog->price = $request->input('price');
        $dog->save();

        $post = Post::create([
            'user_id' => Auth::id(),
            'dog_litter_id' => $dlID,
            'post_type_id' => 1,
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
        $post->images = Image::where('post_id', $post->id)->limit(5)->get();
        // dd(Image::where('post_id', $post->id)->get());
        $name = 'Shop';

        return view('shop.postv3', compact('post', 'user', 'dog', 'name') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $post->images = Image::where('post_id', $post->id)->limit(5)->get();
        return view('shop.shop_edit_post', compact('post'));
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

    public function report($post_id, Request $request) {
        if (Auth::check()) {
            $post = Post::find($post_id);
            if ($post != NULL) {
                $path = '';
                if($request->hasFile('report_files')) {
                    // dd($request->input('report_image') != NULL, $request->input('report_image'), 'agfg');
                    // $validated = $request->validateWithBag('image',[
                    //     'report_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
                    //     ]);
                    // fix validation
                    // $path = $request->file('report_image')->store('reports');

                    foreach($request->file('report_files') as $file){
                        $filenameWithExt = $file->getClientOriginalName();
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension = $file->getClientOriginalExtension();
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        $path = $file->storeAs('reports', $fileNameToStore);

                        $report_file = new ReportFile();
                        $report_file->filenames = $fileNameToStore;
                        $report_file->post_id = $post->id;
                        $report_file->save();
                    }
                }
                $report = Report::create([
                    'post_id' => $post->id,
                    'user_profile_id' => UserProfile::where('user_id', Auth::id())->first()->id,
                    'reason' => $request->input('reason'),
                ]);

            };
            return redirect()->action([PostController::class, 'show'], ['shop' => $post->id])->with('report_submitted', 'Successfully submitted report.');
            // return redirect()->action([PostController::class, 'show'], ['shop' => $post->id]);
        }
        return back();
    }

    public function print($post_id) {
        $post = Post::find($post_id);
        $post->print_date = now()->toFormattedDateString();
        // print_date,

        return view('print', compact('post'));
    }

    public function validateImage($request) {
        $bool = false;
        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg, jpg, bmp, png'
            ]);
            $bool = true;
        }
        return $bool;
    }

    public function editImage($imgId, Request $request) {
        if ($request->has('description')) {
            $img = Image::find($imgId);
            $img->description = $request->input('description');
            $img->save();
        }

    }


    public function bookmark(Request $request) {

        if(Auth::check()){
            $id = $request->get('post_id');
            $bookmark = Post::findOrFail($id);
            if( DB::table('post_user_profile')->where('post_id', $id)->where('user_profile_id', Auth::id())->exists() ){
                DB::table('post_user_profile')->where('post_id', $id)->where('user_profile_id', Auth::id())->delete();
            }else{
                $bookmark->bookmarked()->attach(Auth::id());
            }
            // return back();
        }else{
            // session()->flash('bookmark_fail', 'You must be logged in to bookmark posts.');
            // return back()->with('bookmark_fail', 'You must be logged in to bookmark and unbookmark posts.');
        }
    }

}
