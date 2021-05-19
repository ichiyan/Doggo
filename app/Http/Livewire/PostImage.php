<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class PostImage extends Component
{
    public $nthImage, $description, $image, $image_id, $created_at;


    public function mount($postImg)
    {
        $this->image = $postImg->image_location;
        $this->description = $postImg->description;
        $this->image_id = $postImg->id;
        $this->created_at = $postImg->created_at;
    }

    public function submitForm(Request $request) {
        $dbImage = Image::where('id', $this->image_id)->update(['description' => $this->description]);
    }

    public function render()
    {
        return view('livewire.post-image');
    }
}
