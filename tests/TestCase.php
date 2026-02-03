<?php

namespace Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Paulhibbert\Features\FeaturesServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    use WithWorkbench;

    protected string $testNameSpace = 'Paulhibbert\\Features\\Examples\\';

    protected function setUp(): void
    {
        parent::setUp();

        config()->set('features.namespace.default', $this->testNameSpace);
    }

    protected function getPackageProviders($app)
    {
        return [
            FeaturesServiceProvider::class,
        ];
    }
}
