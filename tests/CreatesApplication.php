<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $this->prepareSqliteDatabases();
        $this->runSeeders();

        return $app;
    }

    private function prepareSqliteDatabases(): void
    {
        $files = glob(database_path() .'/tenant.*', GLOB_BRACE);
        foreach($files as $file) {
            unlink($file);
        }

        file_put_contents(database_path('database.sqlite'), '');
    }

    /**
     * @return void
     */
    private function runSeeders(): void
    {
        Artisan::call('migrate:fresh');
        Artisan::call('tenants:migrate-fresh');
        Artisan::call('tenant:create');
    }
}
