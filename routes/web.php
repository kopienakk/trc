<?php

use App\Http\Controllers\Admincontrollers;
use App\Http\Controllers\Alumnicontrollers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TracerKerjaController;
use App\Http\Controllers\TracerKuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//admin
// Route::middleware('auth:admin')->group(function () {
//     Route::get('/admin/alumni/create', [Alumnicontrollers::class, 'create'])->name('alumni.create');
//     Route::post('/admin/alumni', [Alumnicontrollers::class, 'store'])->name('alumni.store');
// });
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [Admincontrollers::class, 'index'])->name('admin.dashboard');
    // Route::get('/admin/detail/{id}', [AdminControllers::class, 'detail'])->name('admin.detail');
    Route::post('/admin/delete/{id}', [AdminControllers::class, 'delete'])->name('admin.delete');
});



// Rute untuk Alumni

Route::middleware(['auth', 'role:alumni'])->group(function () {
    Route::get('/alumni/dashboard', [AlumniControllers::class, 'dashboard'])->name('alumni.dashboard');
    Route::get('/alumni/form', [AlumniControllers::class, 'form'])->name('alumni.form');
    Route::post('/alumni/save', [AlumniControllers::class, 'save'])->name('alumni.save');
    Route::get('/tambah', [AlumniControllers::class, 'create'])->name('alumni.create');
});

Route::post('/alumni/store', [AlumniControllers::class, 'store'])->name('alumni.store');


Route::get('/alumni', [AlumniControllers::class, 'index'])->name('alumni.index');
Route::get('/tracer-kuliah', [TracerKuliahController::class, 'index'])->name('tracer.kuliah.index');
Route::get('/tracer-kerja', [TracerKerjaController::class, 'index'])->name('tracer.kerja.index');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');

require __DIR__.'/auth.php';
