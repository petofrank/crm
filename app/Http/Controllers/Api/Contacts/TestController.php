<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class TestController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $contacts = QueryBuilder::for(Contact::class)
            ->limit(10)
            ->get();

        return new JsonResponse(ContactResource::collection(
            $contacts),
            200
        );
    }
}
