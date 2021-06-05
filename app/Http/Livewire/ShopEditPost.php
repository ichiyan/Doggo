<?php

namespace App\Http\Livewire;

use App\Models\Dog;
use App\Models\Image;
use App\Models\Post;
use App\Rules\UniquePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;


class ShopEditPost extends Component
{
    public $post, $post_id, $post_user_id, $images;

    use WithFileUploads;
    public $registered_number, $user_id, $post_type, $post_title, $post_description, $price;
    public $photos = [];
    public $dbphotos = [];

    //new CreateForm

    // https://laravel-livewire.com/docs/2.x/input-validation
    protected $messages = [
        // 'email.required' => 'The Email Address cannot be empty.',
        'photos.*' => 'Photos must not be empty and should be less than 6.',
    ];

    protected $validationAttributes = [
        'post_title' => 'Post Title',
        'post_description' => 'Description',
        'price' => 'Price',
        'photos' => 'Photos',
        'photos.*' => 'Photos',
    ];

    protected function rules() {
        return [
                'post_title' => 'required|min:7|max:30',
                'post_description' => 'required|min:20|max:1000',
                'price' => 'required|numeric',
                'photos.*' => 'max:30720|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100',
                'photos' => 'array|max:5',
            ];
    }

    public function mount($post){
        $this->post_id = $post->id;
        $this->post_title = $post->post_title;
        $this->post_description = $post->post_description;
        $this->price = $post->price;
        $this->images = $post->images;
        $this->post_user_id = $post->user_id;
    }

    public function removeImgPreview($ndx){
        array_splice($this->photos, $ndx);
    }

    public function deleteImage($image_id){
        $image = Image::where('id', $image_id)->pluck('image_location');
        Storage::delete($image);
        Image::where('id', $image_id)->delete();
    }

    public function update(Request $request, $id){

        $validatedData = $this->validate();

        $post = Post::findOrFail($id);
        $post->post_title = $validatedData['post_title'];
        $post->post_description = $validatedData['post_description'];
        $post->price = $validatedData['price'];

        $post->save();

        if ($validatedData['photos']){

            foreach ($validatedData['photos'] as $photo) {

                $filenameWithExt = $photo->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $photo->storeAs('posts', $fileNameToStore);

                $image = new Image();
                $image->post_id = $post->id;
                $image->image_location = $fileNameToStore;
                $image->description = '';
                $image->save();

                // $location = $photo->store('posts');
                // Image::create(['post_id' => $post->id, 'image_location' => $location, 'description' => '']);
            }
       }

       $this->reset();
       session()->flash('post_updated', 'Successfully updated post.');
       return redirect()->route('shop.show', [$id]);
    }

    public function cancel(){
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.shop-edit-post');
    }
}
