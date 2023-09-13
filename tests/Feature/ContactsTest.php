<?php

declare(strict_types=1);

use Database\Factories\ContactFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use function Pest\Laravel\getJson;

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

it('it can retieve a list of contact for user', function () {

    auth()->loginUsingId((new Database\Factories\UserFactory)->create()->id);

    (new ContactFactory())->createMany(10);

    getJson(
        route('api:contacts:index'))
    ->assertStatus( 200)->assertJson(fn (AssertableJson $json) =>
        $json->count(10)
            ->first(fn (AssertableJson $json) => $json->where('type', 'contact')->etc())
      );
});
