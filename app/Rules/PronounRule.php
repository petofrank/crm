<?php

namespace App\Rules;

use App\Enums\Pronouns;
use App\Traits\EnumsToArray;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class PronounRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!in_array($value, Pronouns::toArray())) {
            $fail('The ' . $attribute . ' must be a valid pronoun.');
        }
    }
}
