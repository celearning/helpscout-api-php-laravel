<?php

declare(strict_types=1);

namespace HelpScout\Laravel\Test;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;

class LaravelServiceProviderTest extends ServiceProviderTest
{
    public function setUp()
    {
        if (!class_exists(Application::class)) {
            $this->markTestSkipped();
        }

        parent::setUp();
    }

    protected function setupApplication()
    {
        // Create the application such that the config is loaded.
        $app = new Application();

        $app->setBasePath(sys_get_temp_dir());
        $app->instance('config', new Repository());

        return $app;
    }
}
