<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('test db use factory', function () {
    $user = User::factory()->create([
        'name' => 'Thanh'
    ]);

    $this->assertDatabaseHas('users', [
        'name' => 'Thanh'
    ]);
});
