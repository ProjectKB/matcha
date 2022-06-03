<?php

namespace App\Http\Requests;

class CompleteUserRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->fill(['gender' => '', 'orientation' => '', 'completed' => true]);
    }

    protected function afterValidationPasses()
    {
        $this->forget('csrf_value');
        $this->forget('csrf_name');

        $this->interests = json_encode($this->interests);

        session()->flash()->set('success', ['Success!']);
    }

    public function rules()
    {
        return [
            'gender' => 'gender|required',
            'bio' => 'max:1000|required',
            'orientation' => 'orientation|required',
            'interests' => 'required',
            'localisation' => 'required',
        ];
    }
}