<?php

namespace Angeloo\Me\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Angeloo\Me\MeServiceProvider;
use Illuminate\Support\Facades\Route;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations();
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->withFactories(__DIR__.'/database/factories');

        Route::meApi('me');
    }

    protected function getPackageProviders($app)
    {
        return [
            MeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
