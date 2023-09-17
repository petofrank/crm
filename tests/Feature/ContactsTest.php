<?php

declare(strict_types=1);

use App\Enums\Pronouns;
use App\Models\Contact;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

//beforeAll(function () {
//;
//    Artisan::call('tenant:create');
//    Artisan::call('tenants:migrate-fresh');
//});

beforeEach(function () {
    tenancy()->initialize(Tenant::find('api.crm.localhost'));
});

it('it get an unauthorized response when not logged in on index route', function () {
    getJson(
        route('api:tests:index'))
        ->assertStatus( 401);
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


it('it can create a new contact', function (string $string) {

    expect(Contact::query()->count())->toEqual(0);
    auth()->loginUsingId((new Database\Factories\UserFactory)->create()->id);

    postJson(
        route('api:contacts:store'),
        [
            'title' => $string,
            'name' => [
                'first' => $string,
                'middle' => $string,
                'last' => $string,
                'preferred' => $string,
                'full' => "$string $string $string",
            ],
            'phone' => $string,
            'email' => "$string@email.com",
            'pronouns' => Pronouns::random()
        ]
    )->assertStatus(201);

    expect(Contact::query()->count())->toEqual(1);
})->with('strings');
