<?php

namespace App\Http\Requests;

class UpdateUserRequest extends FormRequest
{
    protected function afterValidationPasses()
    {
        $this->forget('csrf_value');
        $this->forget('csrf_name');
        $this->forget('confirm_password');

        $this->password == ""
            ? $this->forget('password')
            : $this->password = sha1($this->password);

        session()->flash()->set('success', ['Success!']);
    }

    public function rules()
    {
        return [
            'email' => 'email',
            'password' => 'same',
            'gender' => 'gender',
            'bio' => 'max:1000',
            'orientation' => 'orientation',
        ];
    }
}