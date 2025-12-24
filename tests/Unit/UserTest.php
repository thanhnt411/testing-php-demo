<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);
test('it can create a user', function () {
    $data = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ];

    $user = User::create($data);

    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com'
    ]);
});

test('it can create a user using factory', function () {
    $user = User::factory()->create([
        'name' => 'Nguyen Van Factory'
    ]);

    $this->assertDatabaseHas('users', ['name' => 'Nguyen Van Factory']);
});

test('it can create multipl users', function () {
    $user =  User::factory()->count(5)->create();
    expect($user)->toHaveCount(5);
});

test('a user has many tasks', function () {
    $user = User::factory()
        ->has(Task::factory()->count(3))
        ->create();
    expect($user->tasks)->toHaveCount(3);
    expect($user->tasks->first())->toBeInstanceOf(Task::class);
    expect($user->tasks->first()->user_id)->toBe($user->id);
});
