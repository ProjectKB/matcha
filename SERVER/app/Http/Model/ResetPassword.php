<?php

namespace App\Http\Model;

class ResetPassword extends BaseModel
{
    public function __construct(public $key = '', public $userId = '')
    {}

    public function getFillable()
    {
        return [
            "key" => "key",
            "userId" => "user_id"
        ];
    }

    public function getTableName(): string
    {
        return 'reset_passwords';
    }

    public function user(): User
    {
        return (new User)->find($this->userId);
    }
}