<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class UserLimit implements Rule
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
        // Limit User Creation to 5 daily for Demo purpose
        $user_limit_reached = User::whereDate('created_at', Carbon::today())->get();
        if ($user_limit_reached->count() > 5) return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This is a demo. The max user registration reached for today, please try tomorrow';
    }
}