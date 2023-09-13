<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class ContactResource extends JsonApiResource
{
    protected $type = 'contacts';

    public function toAttributes(Request $request)
    {
        return [
            'title' => $this->title,
            'name' => [
                    'first' => $this->first_name,
                    'middle' => $this->middle_name,
                    'last' => $this->last_name,
                    'preferred' => $this->preferred_name,
                    'full_name' => $this->fullName(),
                ],
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }

    public function toType(Request $request): string
    {
        return 'contact';
    }

    /**
     * @return string
     */
    protected function fullName(): string
    {
        return ltrim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }
}
