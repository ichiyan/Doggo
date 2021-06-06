<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use App\Models\UserProfile;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class EditProfile extends Component
{
    public $user, $user_id;

    use WithFileUploads;
    public $name, $email, $birthdate, $username, $address, $bio, $profile_pic, $contact_no;

    public $new_photo;

    protected function rules() {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'birthdate' => 'required',
            'username' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'bio' => '',
            'new_photo' => '',
        ];
    }

    public function mount($user){
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->birthdate = $user->birthdate;
        $this->username = $user->username;
        $this->address = $user->address;
        $this->bio = $user->bio;
        $this->profile_pic = $user->profile_pic;
        $this->contact_no = $user->contact_number;
    }

    public function update($id){

        $validatedData = $this->validate();
        $userProfile = UserProfile::findOrFail($id);
        $user = User::findOrFail($userProfile->user_id);

        $userProfile->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $userProfile->birthdate = $validatedData['birthdate'];
        $userProfile->username = $validatedData['username'];
        $userProfile->address = $validatedData['address'];
        $userProfile->bio = $validatedData['bio'];
        $userProfile->contact_number = $validatedData['contact_no'];

        if($validatedData['new_photo']){
            foreach($validatedData['new_photo'] as $photo){
                $filenameWithExt = $photo ->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $photo->storeAs('profile-pictures', $fileNameToStore);

                $userProfile->profile_pic = $fileNameToStore;
            }
        }

        $userProfile->save();
        $user->save();

        $this->reset();
        session()->flash('profile_updated', 'Successfully updated profile.');
        return redirect()->route('profile_all', [$id]);
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
