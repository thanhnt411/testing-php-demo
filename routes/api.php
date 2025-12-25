<?php

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/users', function () {
    return User::all();
});

Route::post('/users', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);
    return response()->json($user, 201);
});

Route::get('/users/{id}', function () {
    return User::all();
});

Route::delete('/users/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();
    return response()->noContent();
});

Route::put('users/{id}', function (Request $request, $id) {
    $user = User::findOrFail($id);
    $validated = $request->validate([
        'name' => 'sometimes|string',
        'email' => [
            'sometimes',
            'required',
            'email',
            Rule::unique('users')->ignore($id)
        ],
    ]);


    $user->update($validated);
    return response()->json($user, 200);
});
