<?php

namespace App\Enums;

use App\Traits\EnumsToArray;
use Illuminate\Support\Arr;

enum Pronouns:string
{
    use EnumsToArray;

    case He = 'he';
    case She = 'she';
    case They = 'they';

    public static function random(): string
    {
        return (Arr::random(self::cases()))->value;
    }
}
