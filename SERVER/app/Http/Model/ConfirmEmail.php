<?php

namespace App\Http\Model;

class ConfirmEmail extends BaseModel
{
    public function __construct(public $key = '', public $username = '')
    {}

    public function getFillable()
    {
        return [
            "key" => "key",
            "username" => "username"
        ];
    }

    public function getTableName(): string
    {
        return 'confirm_emails';
    }

    public function user(): User
    {
        return (new User)->find_by(["username" => $this->username]);
    }
}