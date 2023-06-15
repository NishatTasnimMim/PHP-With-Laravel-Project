<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\StudentController;

Route::get('/', [FrontController::class, 'home'])->name('home');

Route::get('/student-details/{id}', [StudentController::class, 'details'])->name('student.details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
//        return view('dashboard');
        return redirect('/');
    })->name('dashboard');
    Route::get('/add-student', [StudentController::class, 'create'])->name('student.create');
    Route::get('/manage-student', [StudentController::class, 'index'])->name('student.index');
    Route::post('/new-student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/edit-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/update-student/{id}', [StudentController::class, 'update'])->name('student.update');
});
