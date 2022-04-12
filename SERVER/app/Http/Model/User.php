<?php

namespace App\Http\Model;


class User extends BaseModel
{
    public function __construct(public $id = '',
                                public $firstName = '',
                                public $lastName = '',
                                public $email = '',
                                public $password = '')
    {
    }

    public function getTableName()
    {
        return "users";
    }

    public function getFillable()
    {
        return [
            "id" => "id",
            "firstName" => "first_name",
            "lastName" => "last_name",
            "email" => "email",
            "password" => "password",
        ];
    }
}