<?php

namespace App\Http\Requests;

class StoreResetPasswordRequest extends FormRequest
{
    public function prepareForValidation()
    {
    }

    public function rules()
    {
        /**
         * TODO: CREATE 'EXISTS' RULE
         */
        return [
            'email' => 'required|email'
        ];
    }
}