<?php

namespace App\Http\Requests;

class StoreRegisterRequest extends FormRequest
{
    protected function afterValidationPasses()
    {
        $this->forget('csrf_value');
        $this->forget('csrf_name');
        $this->forget('confirm_password');
        $this->password = sha1($this->password);

        session()->flash()->set('success', ['Success!']);
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'unique|required',
            'birthdate' => 'adult|required',
            'password' => 'required|same',
            'confirm_password' => 'required'
        ];
    }
}