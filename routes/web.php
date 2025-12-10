<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about-us', function () {
    return 'Hello, We are Hiring';
});
