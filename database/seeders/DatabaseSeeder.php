<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Stancl\Tenancy\Database\Models\Domain;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedById;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws TenantCouldNotBeIdentifiedById
     */
    public function run(): void
    {
        $tenents = Tenant::all();
        foreach ($tenents as $tenent) {
            if (app()->environment('local')) {
                tenancy()->initialize(Tenant::find($tenent->id));
                $this->call([
                    ContactSeeder::class,
                ]);
            }
        }
    }

    protected function centralDomains(): array
    {
        return config('tenancy.central_domains');
    }
}
