<?php

namespace App\Http\Livewire;

use App\Models\Dog;
use App\Models\Image;
use App\Models\Post;
use App\Rules\UniquePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShopForm extends Component
{
    use WithFileUploads;
    public $registered_number, $post_type, $post_title, $post_description, $price;
    public $photos;

    // https://laravel-livewire.com/docs/2.x/input-validation
    // protected $messages = [
    //     'email.required' => 'The Email Address cannot be empty.',
    //     'email.email' => 'The Email Address format is not valid.',
    // ];

    protected $validationAttributes = [
        'post_title' => 'Post Title',
        'registered_number' => 'DRN',
        'post_description' => 'Description',
        'price' => 'Price',
        'photos' => 'Photos',
    ];

    protected function rules() {
        return [
                'post_title' => 'required|min:7|max:30',
                'registered_number' => 'required',
                'post_description' => 'required|min:20|max:1000',
                'price' => 'required|numeric',
                'photos.*' => 'max:30720|max:5|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100',
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
        $validatedData = $this->validate($this->rules());

        dd('cant reach here');
        $post = Post::create([
            'post_type_id' => 1,
            'post_title' => $this->post_title,
            'dog_litter_id' => 20,
            'post_description' => $this->post_description,
            'price' => $this->price,
            'status' => 'Has Documents',
        ]);

        foreach ($this->photos as $photo) {
            $location = $photo->store('posts');
            Image::create(['post_id' => $post->id, 'image_location' => $location, 'description' => 'to be filled']);
        }
        return redirect('shop');
    }

    public function render()
    {
        return view('livewire.shop-form');
    }
}
