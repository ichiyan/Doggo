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

class ShopNewPostForm extends Component
{

    use WithFileUploads;
    public $registered_number, $user_id, $post_type, $post_title, $post_description, $price;
    public $photos = '';
    //new CreateForm

    // https://laravel-livewire.com/docs/2.x/input-validation
    protected $messages = [
        // 'email.required' => 'The Email Address cannot be empty.',
        'photos.*' => 'Photos must not be empty and should be less than 6.',
    ];

    protected $validationAttributes = [
        'post_title' => 'Post Title',
        'registered_number' => 'DRN',
        'post_description' => 'Description',
        'price' => 'Price',
        'photos' => 'Photos',
        'photos.*' => 'Photos',
    ];

    protected function rules() {
        return [
                'post_title' => 'required|min:7|max:30',
                'registered_number' => ['required', 'min:8', 'exists:dogs', new UniquePost()],
                'post_description' => 'required|min:20|max:1000',
                'price' => 'required|numeric',
                'photos.*' => 'max:30720|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100',
                'photos' => 'array|max:5',
            ];
    }


    public function updated($property) {
        $this->validateOnly($property, $this->rules());

        if ($property == 'registered_number' && $this->registered_number != null) {
            session()->flash($property, 'Registered Number is valid.');
            $dog = Dog::where('registered_number', $this->registered_number)
                    ->join('dog_details', 'dog_details.id', '=', 'dogs.dog_detail_id')
                    ->select('dog_details.*', 'dogs.registered_number')
                    ->first();
            session()->flash('dog', $dog);
        }
    }

    public function submitForm(Request $request)
    {
        $validatedData = $this->validate();

        $dog = Dog::where('registered_number', $validatedData['registered_number'])->first();
        $post = Post::create([
            'user_id' => Auth::id(),
            'post_type_id' => 1,
            'post_title' => $validatedData['post_title'],
            'dog_litter_id' => $dog->dog_litter_id,
            'post_description' => $validatedData['post_description'],
            'price' => $validatedData['price'],
            'status' => 'Has Documents',
        ]);

        $dog->is_Posted = 1;
        $dog->save();

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
            }
       }

        $this->reset();
        session()->flash('post_added', 'Successfully added a post.');
        return redirect('shop');
    }
    public function render()
    {
        return view('livewire.shop-new-post-form', ['photos' => $this->photos]);
    }
}
