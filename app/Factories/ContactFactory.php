<?php

declare(strict_types=1);

namespace App\Factories;
use App\ValueObjects\ContactValueObject;

final class ContactFactory
{
    public static function make(array $attributes): ContactValueObject
    {
        return new ContactValueObject(
        data_get($attributes, 'title'),
        data_get($attributes, 'name.first'),
        data_get($attributes, 'name.middle'),
        data_get($attributes, 'name.last'),
        data_get($attributes, 'name.preferred'),
        data_get($attributes, 'name.full'),
        data_get($attributes, 'phone'),
        data_get($attributes, 'email'),
        data_get($attributes, 'pronouns'),
        );
    }
}
