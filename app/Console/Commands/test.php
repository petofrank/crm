<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Stancl\Tenancy\Database\Models\Domain;
use Str;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $tenant2 = Tenant::create(['id' => 'api.crm.localhost']);
        $tenant2->domains()->create(['domain' => 'api.crm.localhost']);
    }
}
