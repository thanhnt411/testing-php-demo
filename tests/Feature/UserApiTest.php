<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
test('có thể lấy danh sách user qua api', function () {
    User::factory()->count(3)->create();
    $response = $this->getJson('/api/users');
    $response->assertStatus(200)
        ->assertJsonCount(3);
});

test('có thể tạo user mới qua api', function () {
    // 1. Chuẩn bị dữ liệu muốn gửi lên
    $userData = [
        'name' => 'TDD Master',
        'email' => 'tdd@example.com',
        'password' => 'password123',
    ];

    // 2. Thực thi: Gửi yêu cầu POST kèm dữ liệu JSON
    $response = $this->postJson('/api/users', $userData);

    // 3. Kiểm tra:
    // - Server trả về mã 201 (Created)
    $response->assertStatus(201);

    // - Dữ liệu đã nằm trong DB chưa?
    $this->assertDatabaseHas('users', [
        'email' => 'tdd@example.com',
    ]);
});

test('trả về lỗi nếu thiếu email khi tạo user', function () {
    $response = $this->postJson('/api/users', [
        'name' => 'No Email User',
        'password' => 'password123'
    ]);

    // Kỳ vọng: Trả về lỗi 422 (Unprocessable Entity)
    $response->assertStatus(422)
        ->assertJsonValidationErrors(['email']);
});
