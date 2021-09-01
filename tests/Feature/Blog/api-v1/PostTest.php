<?php

use Tests\Helpers\RefreshDatabase;

use function Pest\Faker\faker;

uses(RefreshDatabase::class);

it('Should Store Post In Blog', function () {
    $user = $this->accountsSetupUser();

    $attributes = [
        'title' => faker()->title,
        'content' => faker()->sentence,
    ];

    $response = $this->json('POST', '/blog/api/v1/posts', $attributes);

    $response->assertJsonFragment(['title' => $attributes['title']]);
})->group('blog');
