<?php

namespace App\Custom_Validation;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CustomValidator implements Rule
{
    public function passes($attribute, $value)
    {
        // Write your custom validation logic here
        // For example, check if the phone number exists in the database
        // and consider different phone number formats as the same

        $phoneNumber = preg_replace('/\D/', '', $value); // Remove all non-numeric characters from the input value

        $exists = DB::table('users')
            ->where('phone', 'LIKE', '%'.$phoneNumber)
            ->orWhere('phone', 'LIKE', '01'.$phoneNumber)
            ->orWhere('phone', 'LIKE', '+8801'.$phoneNumber)
            ->exists();

        return !$exists; // If the phone number does not exist, the validation passes
    }

    public function message()
    {
        // Define the error message that will be shown if the validation fails
        return 'The :attribute is already taken.';
    }
}
