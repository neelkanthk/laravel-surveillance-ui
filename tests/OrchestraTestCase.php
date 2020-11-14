<?php

namespace Neelkanth\Laravel\SurveillanceUi\Tests;

use Neelkanth\Laravel\SurveillanceUi\Providers\SurveillanceUiServiceProvider;

class OrchestraTestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app)
    {
        return [
            SurveillanceUiServiceProvider::class,
        ];
    }
}
