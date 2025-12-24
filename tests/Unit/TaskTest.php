<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, RefreshDatabase::class);
test('it casts status to uppercase first letter', function () {
    $task = \App\Models\Task::factory()->create(['status' => 'pending']);
    expect($task->status)->toBe('Pending');
});
