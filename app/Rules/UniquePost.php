<?php

namespace App\Rules;

use App\Models\Dog;
use Illuminate\Contracts\Validation\Rule;

class UniquePost implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($attribute == 'registered_number') {
            $dog = Dog::where('registered_number', $value)->first();
            return $dog != null && $dog->is_Posted === 0;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A dog with such registered number is already posted.';
    }
}
