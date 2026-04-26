<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', function () {
    return view('student.index', ['title' => 'Student']);
});

Route::get('/student/create', function () {
    return view('student.create', ['title' => 'Create Student']);
});
