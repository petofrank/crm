<?php

declare(strict_types=1);

use App\Enums\Pronouns;
use App\Models\Contact;
use App\Models\Tenant;
use Database\Factories\ContactFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

//uses(RefreshDatabase::class);

beforeEach(function () {
    tenancy()->initialize(Tenant::find('api.crm.localhost'));
});

it('receives an 401 on index when not logged in', function () {
    getJson(
        route('api:tests:index'))
        ->assertStatus( 401);
});


it('can retrieve a contact by UUID', function () {
    auth()->loginUsingId((new Database\Factories\UserFactory)->create()->id);
    $contact = ContactFactory::new()->create();

    getJson(
        route('api:contacts:show', $contact->uuid))
        ->assertStatus( 200)->assertJson(fn (AssertableJson $json) =>
            $json->where('attributes.name.first', $contact->first_name)
                ->where('type', 'contact')
                ->etc()
    );
})->with('strings');


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
