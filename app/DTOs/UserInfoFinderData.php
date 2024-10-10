<?php

namespace App\DTOs;

use App\Http\Requests\UserInfoFinderRequest;

class UserInfoFinderData
{
    public function __construct(
        public string $nid,
        public string $uuid
    )
    {}

    public static function fromForm(UserInfoFinderRequest $request)
    {
        return new self(
            $request->get('nid'),
            $request->get('uuid')
        );
    }
}
