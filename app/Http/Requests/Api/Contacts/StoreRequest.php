<?php

namespace App\Http\Requests\Api\Contacts;

use App\Rules\PronounRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:20'],
            'name.first' => ['required', 'string', 'min:2', 'max:80'],
            'name.middle' => ['nullable', 'string', 'min:2', 'max:80'],
            'name.last' => ['required', 'string', 'min:2', 'max:80'],
            'name.preferred' => ['required', 'string', 'min:2', 'max:80'],
            'name.full' => ['required', 'string', 'min:2', 'max:255'],
            'phone' => ['nullable', 'string'],
            'email' => ['nullable', 'email:rfc,dns'],
            'pronouns' => ['required', 'string', new PronounRule()],
        ];
    }
}
