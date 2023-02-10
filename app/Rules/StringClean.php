<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StringClean implements Rule
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
        if(!empty($value)) {
            $str = str_replace(' ', ' ', trim(strip_tags($value))); // Replaces all spaces with hyphens.
            $str = preg_replace('/[^A-Za-z0-9. ?,-]/', '', $str);
            // Replace sequences of spaces with hyphen
            $str = preg_replace('/  */', ' ', $str);
            
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
