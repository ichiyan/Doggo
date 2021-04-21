<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\DogDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function validateDog(Request $request) {
        $DRN = $request->input('DRN');
        $dog = Dog::where('registered_number', $DRN)->first();

        if ($dog != NULL) {
            $dog->code_response = '<div class="valid-feedback">
                                        Dog Registration Number exists!~
                                    </div>';
        } else {
            $dog->code_response = '<div class="invalid-feedback">
                                        Your Dog is not registered yet.
                                    </div>';
        }
        // code_response not possible since it's static and dynamic pages without refreshing isn't in php (only in js e.g ajax)
        $request->session()->put('DRN', $DRN);
        $fill = $this->getFillData($DRN);
        return redirect()->route('shop.create')->with('fill', $fill)->with('dog', $dog);
    }

    public function getFillData($DRN) {
        $dog = Dog::where('registered_number', $DRN)->first();

        $dog = DogDetail::find($dog->dog_detail_id);
        $dog->age = $this->getMonths($dog->birthdate);

        return $dog;
    }

    public function getMonths($date) {
        $currentDate = Carbon::now()->toDate();
        $date = Carbon::parse($date);
        $result = $date->diffInMonths($currentDate);

        return $result;
    }
}
