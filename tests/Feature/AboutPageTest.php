<?php

use function Pest\Laravel\get;

it('has a about page with successful status', function () {
    $response = get('/about-us');

    $response->assertStatus(200)->assertSee("We are Hiring");
});
