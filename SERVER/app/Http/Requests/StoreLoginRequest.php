<?php

namespace App\Http\Requests;

class StoreLoginRequest extends FormRequest
{
    protected function afterValidationPasses()
    {
        $this->password = sha1($this->password);

        session()->flash()->set('success', ['Success!']);
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }
}