<?php

use function  Pest\Laravel\get;

it('has a home page with successful status', function () {
    $response = get('/');

    $response->assertStatus(200)->assertSee('Documentation');
});
