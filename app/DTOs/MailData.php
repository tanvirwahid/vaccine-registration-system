<?php

namespace App\DTOs;

class MailData
{
    public function __construct(
        public string $user_name,
        public string $date,
        public string $address,
        public string $center_name
    )
    {
    }

    public static function fromData(
        string $name,
        string $date,
        string $address,
        string $centerName
    )
    {
        return new self($name, $date, $address, $centerName);
    }
}
