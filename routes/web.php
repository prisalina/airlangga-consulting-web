<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ServiceController;
use App\Livewire\Auth\LoginAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/layanan', [ServiceController::class, 'index'])->name('services.index');
Route::get('/layanan/{serviceItem:slug}', [ServiceController::class, 'showItem'])->name('services.show');

Route::get('/program', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/program/{program:slug}', [ProgramController::class, 'show'])->name('programs.show');

Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/studi-kasus', [CaseStudyController::class, 'index'])->name('case-studies.index');
Route::get('/studi-kasus/{caseStudy:slug}', [CaseStudyController::class, 'show'])->name('case-studies.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about.index');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

Route::get('/masuk', fn () => redirect('/admin'))->name('login');
Route::get('/masuk-admin', LoginAdmin::class)->name('login.admin');
