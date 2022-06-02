<?php

namespace App\Http\Model;


class User extends BaseModel
{
    public function __construct(public $id = '',
                                public $username = '',
                                public $firstName = '',
                                public $lastName = '',
                                public $email = '',
                                public $password = '',
                                public $confirmed = false,
                                public $completed = false,
                                public $gender = '',
                                public $orientation = '',
                                public $bio = '',
                                public $interests = [],
                                public $picture = null,
                                public $localisation = '',
                                public $matchs = [],
                                public $score = 0,
                                public $notifications = [],
                                public $birthdate = null,
                                public $createdAt = '',
                                public $updatedAt = '')
    {
    }

    public function getFillable()
    {
        return [
            "id" => "id",
            "username" => "username",
            "firstName" => "first_name",
            "lastName" => "last_name",
            "email" => "email",
            "password" => "password",
            "confirmed" => "confirmed",
            "completed" => "completed",
            "gender" => "gender",
            "orientation" => "orientation",
            "bio" => "bio",
            "interests" => "interests",
            "picture" => "picture",
            "localisation" => "localisation",
            "matchs" => "matchs",
            "score" => "score",
            "notifications" => "notifications",
            "birthdate" => "birthdate",
            "createdAt" => "created_at",
            "updatedAt" => "updated_at"
        ];
    }

    public function getTableName(): string
    {
        return 'users';
    }
}