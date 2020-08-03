<?php

if(! function_exists('validator')) {
    /**
     * @param array $inputs
     * @param array $rules
     * @param array $messages
     * @return \Illuminate\Validation\Validator
     */
    function validator(array $inputs, array $rules, array $messages = [])
    {
        $factory = \NPCore\AppCapsule::validation();
        return $factory->make($inputs, $rules, $messages);
    }
}