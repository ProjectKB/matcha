
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
    }

    public function rules()
    {
        return [
            'email' => 'unique:users,email|email|required',
            'password' => 'required_with:confirm_password|same:confirm_password|min:5',
            'confirm_password' => 'string|required'
        ];
    }
}