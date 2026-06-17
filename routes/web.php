<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AsesorController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SertifikasiAlurController;
use App\Http\Controllers\Admin\SertifikasiSkemaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SertifikasiStatisticController;
use App\Http\Controllers\Admin\SebaranPesertaController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// ─── Public Routes ────────────────────────────────────────────────────────────
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil', [PublicController::class, 'profil'])->name('profil');
Route::get('/sertifikasi', [PublicController::class, 'sertifikasi'])->name('sertifikasi');
Route::get('/sertifikasi/{id}', [PublicController::class, 'sertifikasiDetail'])->name('sertifikasi.detail');
Route::get('/gallery', [PublicController::class, 'gallery'])->name('gallery');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');
Route::get('/daftar', [PublicController::class, 'daftar'])->name('daftar');
Route::post('/kontak/kirim', [PublicController::class, 'sendMessage'])->name('kontak.kirim');

// ─── Auth Routes (Breeze) ─────────────────────────────────────────────────────
require __DIR__ . '/auth.php';

// ─── Named 'dashboard' route (required by Breeze auth redirects) ──────────────
Route::get('/dashboard', fn () => redirect()->route('admin.dashboard'))
    ->middleware('auth')
    ->name('dashboard');

// ─── Admin Routes ─────────────────────────────────────────────────────────────
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Hero & About (singletons)
    Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');
    
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');

    // Programs (full CRUD)
    Route::resource('programs', ProgramController::class);

    // Certification
    Route::prefix('sertifikasi')->name('sertifikasi.')->group(function () {
        Route::post('skemas/{skema}/duplicate', [SertifikasiSkemaController::class, 'duplicate'])->name('skemas.duplicate');
        Route::resource('skemas', SertifikasiSkemaController::class);
        Route::resource('alurs', SertifikasiAlurController::class);
    });

    // Personnel
    Route::resource('asesors', AsesorController::class);
    Route::resource('team', TeamMemberController::class);
    // Content & Gallery
    Route::resource('activities', ActivityController::class);

    // Feedback
    Route::resource('testimonials', TestimonialController::class);

    // Statistics & Sebaran
    Route::resource('statistics', SertifikasiStatisticController::class);
    Route::resource('sebaran', SebaranPesertaController::class);

    // Contact & Settings
    Route::get('/contact', [ContactInfoController::class, 'edit'])->name('contact.edit');
    Route::put('/contact', [ContactInfoController::class, 'update'])->name('contact.update');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Redirect /admin ke /admin/dashboard
    Route::redirect('/dashboard', '/admin');
});
