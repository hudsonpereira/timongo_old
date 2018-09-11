<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReservedWords implements Rule
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
        $value = str_slug($value);

        $reservedWords = [
            'home', 'explore', 'battle', 'revive', 'quests', 'arsenal', 'skills', 'inventory'
        ];

        return ! in_array($value, $reservedWords);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute cannot contain reserved words.';
    }
}
