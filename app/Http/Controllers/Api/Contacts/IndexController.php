<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        $tenant1 = Tenant::create(['id' => 'foo']);
        $tenant1->domains()->create(['domain' => 'crm.localhost']);

        $tenant2 = Tenant::create(['id' => 'bar']);
        $tenant2->domains()->create(['domain' => 'api.localhost']);
    }
}
