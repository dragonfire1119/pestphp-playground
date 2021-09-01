<?php

namespace Tests;

use Tests\Helpers\BlogRefreshDatabaseState;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Helpers\RefreshDatabase;
use Tests\Traits\BlogTestHelpers;

abstract class BlogTestCase extends BaseTestCase
{
    use CreatesApplication, BlogTestHelpers;

    protected $connectionsToTransact = ['blog', 'blog2'];

    protected function refreshDatabaseState()
    {
        return BlogRefreshDatabaseState::$migrated;
    }

    protected function setRefreshDatabaseState($value = false)
    {
        BlogRefreshDatabaseState::$migrated = $value;
    }

    /**
     * Boot the testing helper traits.
     *
     * @return array
     */
    protected function setUpTraits()
    {
        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[RefreshDatabase::class])) {
            $this->refreshDatabase();
        }

        if (isset($uses[DatabaseMigrations::class])) {
            $this->runDatabaseMigrations();
        }

        if (isset($uses[DatabaseTransactions::class])) {
            $this->beginDatabaseTransaction();
        }

        if (isset($uses[WithoutMiddleware::class])) {
            $this->disableMiddlewareForAllTests();
        }

        if (isset($uses[WithoutEvents::class])) {
            $this->disableEventsForAllTests();
        }

        if (isset($uses[WithFaker::class])) {
            $this->setUpFaker();
        }

        return $uses;
    }
}
