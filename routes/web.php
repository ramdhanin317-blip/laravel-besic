<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index']);

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

// soft deletes
Route::get('/student/trash', [StudentController::class, 'trash'])->name('student.trash');
Route::put('/student/{student}/restore', [StudentController::class, 'restore'])->name('student.restore')->withTrashed();
Route::delete('/student/{student}/force-delete', [StudentController::class, 'forceDelete'])->name('student.forceDelete')->withTrashed();

Route::resource('department', DepartmentController::class);
Route::resource('lecturer', LecturerController::class);
Route::resource('organization', OrganizationController::class);
