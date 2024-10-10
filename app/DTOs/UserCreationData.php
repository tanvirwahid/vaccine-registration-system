<?php

namespace App\DTOs;

use App\Http\Requests\UserRegistrationRequest;

class UserCreationData
{
    public function __construct(
        public string $name,
        public string $email,
        public $date_of_birth,
        public int $vaccine_center_id,
        public string $nid
    )
    {}

    public static function fromForm(UserRegistrationRequest $request)
    {
        return new self(...$request->except('_token'));
    }
}
