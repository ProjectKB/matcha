<?php

namespace App\Http\Model;


class User extends BaseModel
{
    public static $tableName = 'users';

    public function __construct(public $id = '',
                                public $firstName = '',
                                public $lastName = '',
                                public $email = '',
                                public $createdAt = '',
                                public $updatedAt = '')
    {
    }

    public function getFillable()
    {
        return [
            "id" => "id",
            "firstName" => "first_name",
            "lastName" => "last_name",
            "email" => "email",
            "createdAt" => "created_at",
            "updatedAt" => "updated_at"
        ];
    }
}