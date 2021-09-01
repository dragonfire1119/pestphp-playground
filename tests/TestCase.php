<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Helpers\RefreshDatabase;
use Tests\Traits\Blog2TestHelpers;
use Tests\Traits\BlogTestHelpers;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, BlogTestHelpers, Blog2TestHelpers;

    protected $connectionsToTransact = ['blog', 'blog2'];

    protected function setUp(): void
    {
        parent::setUp();
        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[RefreshDatabase::class])) {
            $this->refreshDatabase();
        }
    }
}
