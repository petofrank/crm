<?php

declare(strict_types=1);

use App\Models\Tenant;
use Database\Factories\ContactFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use function Pest\Laravel\getJson;

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

beforeEach(function () {
    tenancy()->initialize(Tenant::find('api.crm.localhost'));
});

it('it can retieve a list of contact for user', function () {

    auth()->loginUsingId((new Database\Factories\UserFactory)->create()->id);

    getJson(
        route('api:tests:index'))
    ->assertStatus( 200)->assertJson(fn (AssertableJson $json) =>
        $json->count(10)
            ->first(fn (AssertableJson $json) => $json->where('type', 'contact')->etc())
      );
});
