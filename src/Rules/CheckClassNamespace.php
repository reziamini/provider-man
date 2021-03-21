<?php

namespace ProviderMan\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\ServiceProvider;

class CheckClassNamespace implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return class_exists($value) and method_exists($value, 'register');
    }


    public function message()
    {
        return 'The namespace is invalid';
    }
}
