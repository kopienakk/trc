<?php

use App\Http\Controllers\Admin\ProgramKeahlianController;
use App\Http\Controllers\Admin\KonsentrasiKeahlianController;
use App\Http\Controllers\Admincontrollers;
use App\Http\Controllers\Alumnicontrollers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TambahDataController;
use App\Http\Controllers\Admin\TracerKerjaController;
use App\Http\Controllers\Admin\TracerKuliahController;
use App\Http\Controllers\Admin\BidangKeahlianController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\StatusAlumniController;
use App\Http\Controllers\Admin\TahunLulusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Alumni\DetailAlumniController;
use App\Http\Controllers\Alumni\ATracerKerjaController;
use App\Http\Controllers\Alumni\ATracerKuliahController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {


    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [Admincontrollers::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/detail/{id}', [AdminControllers::class, 'detail'])->name('admin.detail');
        Route::post('/admin/delete/{id}', [AdminControllers::class, 'delete'])->name('admin.delete');

        //tampilan dashboard
        Route::get('/tambahdata', function () {
            return view('admin.tambah');
        });
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        });
        Route::get('/admin/dashboard', [Admincontrollers::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/alumni', [AlumniControllers::class, 'index'])->name('admin.alumni');
        Route::get('/tracer-kuliah', [TracerKuliahController::class, 'index'])->name('tracer.kuliah.index');
        Route::get('/tracer-kerja', [TracerKerjaController::class, 'index'])->name('tracer.kerja.index');
        Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');


        // Rute Bidang Keahlian
        Route::get('/admin/bidang-keahlian', [BidangKeahlianController::class, 'index'])->name('admin.bidang-keahlian.index');
        Route::get('/admin/bidang-keahlian/tambah', [BidangKeahlianController::class, 'tambah'])->name('admin.bidang-keahlian.tambah');
        Route::post('/admin/bidang-keahlian/store', [BidangKeahlianController::class, 'store'])->name('admin.bidang-keahlian.store');
        Route::get('/admin/bidang-keahlian/edit/{id}', [BidangKeahlianController::class, 'edit'])->name('admin.bidang-keahlian.edit');
        Route::post('/admin/bidang-keahlian/update/{id}', [BidangKeahlianController::class, 'update'])->name('admin.bidang-keahlian.update');
        Route::post('/admin/bidang-keahlian/delete/{id}', [BidangKeahlianController::class, 'destroy'])->name('admin.bidang-keahlian.delete');

        // Rute Program Keahlian
        Route::get('/admin/program-keahlian', [ProgramKeahlianController::class, 'index'])->name('admin.program-keahlian.index');
        Route::get('/admin/program-keahlian/tambah', [ProgramKeahlianController::class, 'tambah'])->name('admin.program-keahlian.tambah');
        Route::post('/admin/program-keahlian/store', [ProgramKeahlianController::class, 'store'])->name('admin.program-keahlian.store');
        Route::get('/admin/program-keahlian/edit/{id}', [ProgramKeahlianController::class, 'edit'])->name('admin.program-keahlian.edit');
        Route::post('/admin/program-keahlian/update/{id}', [ProgramKeahlianController::class, 'update'])->name('admin.program-keahlian.update');
        Route::post('/admin/program-keahlian/delete/{id}', [ProgramKeahlianController::class, 'destroy'])->name('admin.program-keahlian.delete');

        // Rute Konsentrasi Keahlian
        Route::get('/admin/konsentrasi-keahlian', [KonsentrasiKeahlianController::class, 'index'])->name('admin.konsentrasi-keahlian.index');
        Route::get('/admin/konsentrasi-keahlian/tambah', [KonsentrasiKeahlianController::class, 'tambah'])->name('admin.konsentrasi-keahlian.tambah');
        Route::post('/admin/konsentrasi-keahlian/store', [KonsentrasiKeahlianController::class, 'store'])->name('admin.konsentrasi-keahlian.store');
        Route::get('/admin/konsentrasi-keahlian/edit/{id}', [KonsentrasiKeahlianController::class, 'edit'])->name('admin.konsentrasi-keahlian.edit');
        Route::post('/admin/konsentrasi-keahlian/update/{id}', [KonsentrasiKeahlianController::class, 'update'])->name('admin.konsentrasi-keahlian.update');
        Route::post('/admin/konsentrasi-keahlian/delete/{id}', [KonsentrasiKeahlianController::class, 'destroy'])->name('admin.konsentrasi-keahlian.delete');

        // Rute Sekolah
        Route::get('/admin/sekolah', [SekolahController::class, 'index'])->name('admin.sekolah.index');
        Route::post('/admin/sekolah/store', [SekolahController::class, 'store'])->name('admin.sekolah.store');
        Route::get('/admin/sekolah/edit/{id}', [SekolahController::class, 'edit'])->name('admin.sekolah.edit');
        Route::post('/admin/sekolah/update/{id}', [SekolahController::class, 'update'])->name('admin.sekolah.update');
        Route::post('/admin/sekolah/delete/{id}', [SekolahController::class, 'destroy'])->name('admin.sekolah.delete');

        // Rute Status Alumni
        Route::get('/admin/status-alumni', [StatusAlumniController::class, 'index'])->name('admin.status-alumni.index');
        Route::get('/admin/status-alumni/create', [StatusAlumniController::class, 'create'])->name('admin.status-alumni.create');
        Route::post('/admin/status-alumni/store', [StatusAlumniController::class, 'store'])->name('admin.status-alumni.store');
        Route::get('/admin/status-alumni/edit/{id}', [StatusAlumniController::class, 'edit'])->name('admin.status-alumni.edit');
        Route::post('/admin/status-alumni/update/{id}', [StatusAlumniController::class, 'update'])->name('admin.status-alumni.update');
        Route::post('/admin/status-alumni/delete/{id}', [StatusAlumniController::class, 'destroy'])->name('admin.status-alumni.delete');

        // Rute Tahun Lulus
        Route::get('/admin/tahun-lulus', [TahunLulusController::class, 'index'])->name('admin.tahun-lulus.index');
        Route::get('/admin/tahun-lulus/tambah', [TahunLulusController::class, 'tambah'])->name('admin.tahun-lulus.tambah');
        Route::post('/admin/tahun-lulus/store', [TahunLulusController::class, 'store'])->name('admin.tahun-lulus.store');
        Route::get('/admin/tahun-lulus/edit/{id}', [TahunLulusController::class, 'edit'])->name('admin.tahun-lulus.edit');
        Route::post('/admin/tahun-lulus/update/{id}', [TahunLulusController::class, 'update'])->name('admin.tahun-lulus.update');
        Route::post('/admin/tahun-lulus/delete/{id}', [TahunLulusController::class, 'destroy'])->name('admin.tahun-lulus.delete');

        //rute tracer kuliah
        // Route::get('/tracer-kuliah', [TracerKuliahController::class, 'index'])->name('tracer-kuliah.index');
        // Route::get('/tracer-kuliah/create', [TracerKuliahController::class, 'create'])->name('tracer-kuliah.create');
        // Route::post('/tracer-kuliah/store', [TracerKuliahController::class, 'store'])->name('tracer-kuliah.store');
        // Route::get('/tracer-kuliah/edit/{id}', [TracerKuliahController::class, 'edit'])->name('tracer-kuliah.edit');
        // Route::post('/tracer-kuliah/update/{id}', [TracerKuliahController::class, 'update'])->name('tracer-kuliah.update');
        // Route::post('/tracer-kuliah/delete/{id}', [TracerKuliahController::class, 'destroy'])->name('tracer-kuliah.delete');
        // Route::get('/tracer-kuliah/{id_tracer_kuliah}', [TracerKuliahController::class, 'show'])->name('tracerKuliah.show');


        //rute tracer kerja
        // Route::get('/tracer-kerja', [TracerKerjaController::class, 'index'])->name('tracer-kerja.index');
        // Route::get('/tracer-kerja/create', [TracerKerjaController::class, 'create'])->name('tracer-kerja.create');
        // Route::post('/tracer-kerja/store', [TracerKerjaController::class, 'store'])->name('tracer-kerja.store');
        // Route::get('/tracer-kerja/edit/{id}', [TracerKerjaController::class, 'edit'])->name('tracer-kerja.edit');
        // Route::post('/tracer-kerja/update/{id}', [TracerKerjaController::class, 'update'])->name('tracer-kerja.update');
        // Route::post('/tracer-kerja/delete/{id}', [TracerKerjaController::class, 'destroy'])->name('tracer-kerja.delete');
        // Route::get('/tracer-kerja/{id_tracer_kerja}', [TracerKerjaController::class, 'show'])->name('tracerKerja.show');

        Route::delete('/alumni/{id_alumni}', [AlumniControllers::class, 'destroy'])->name('alumni.destroy');



    });
    Route::middleware(['role:alumni'])->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/login', function () {
            return view('auth.login');
        })->name('login');

        Route::post('/login', [LoginController::class, 'login']);
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/alumni/dashboard', [AlumniControllers::class, 'dashboard'])->name('alumni.dashboard');
        Route::get('/alumni/form', [Alumnicontrollers::class, 'form'])->name('alumni.form');
        Route::get('/alumni/edit', [Alumnicontrollers::class, 'edit'])->name('alumni.edit');
        Route::post('/alumni/save', [Alumnicontrollers::class, 'save'])->name('alumni.save');

        //
        Route::get('/alumni/data-diri', [DetailAlumniController::class, 'dataDiri'])->name('alumni.data-diri');

        Route::post('/alumni/update-profile', [DetailAlumniController::class, 'updateProfile'])->name('update-profile');







    });
});



Route::get('/register', [Alumnicontrollers::class, 'create'])->name('alumni.create');
Route::post('/register', [AlumniControllers::class, 'store'])->name('alumni.store');

Route::post('/alumni/store', [AlumniControllers::class, 'store'])->name('alumni.store');




require __DIR__ . '/auth.php';
