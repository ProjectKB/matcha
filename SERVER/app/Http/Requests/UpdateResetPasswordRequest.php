<?php

namespace App\Http\Requests;

class UpdateResetPasswordRequest extends FormRequest
{
    protected function afterValidationPasses()
    {
        $this->password = sha1($this->password);

        session()->flash()->set('success', ['Success!']);
    }

    public function rules()
    {
        return [
            'password' => 'required',
            'confirm_password' => 'required',
        ];
    }
}