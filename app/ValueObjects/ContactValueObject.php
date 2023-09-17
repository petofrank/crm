<?php

namespace App\ValueObjects;

use App\Contracts\ValueObjectContract;

final class ContactValueObject implements ValueObjectContract
{
    /**
     * @param string|null $title
     * @param string $firstName
     * @param string|null $middleName
     * @param string $lastName
     * @param string $preferredName
     * @param string $fullName
     * @param string|null $phone
     * @param string|null $email
     */
    public function __construct(
        public null|string $title,
        public string $firstName,
        public null|string $middleName,
        public string $lastName,
        public string $preferredName,
        public string $fullName,
        public null|string $phone,
        public null|string $email,
        public string $pronouns,

    ) {}

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'first_name' => $this->firstName,
            'middle_name' => $this->middleName,
            'last_name' => $this->lastName,
            'preferred_name' => $this->preferredName,
            'full_name' => $this->fullName,
            'phone' => $this->phone,
            'email' => $this->email,
            'pronouns' => $this->pronouns,
        ];
    }


}
