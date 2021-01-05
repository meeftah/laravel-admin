<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoDash implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($message = null)
    {
        $this->message = $message;
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
        return preg_match('/^[A-Za-z0-9_]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message ?: 'Tidak boleh menggunakan tanda pisah (-).';
    }
}
