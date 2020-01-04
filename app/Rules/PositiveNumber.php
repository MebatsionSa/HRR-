<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PositiveNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $number;
    public function __construct($number)
    {
        $this->number = $number;
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
        if ((is_integer($value) || is_float($value)) && $value > $this->number) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute shoud be greater than'.$this->number.'.';
    }
}
