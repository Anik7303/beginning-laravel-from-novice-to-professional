<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Settings\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/settings/profile', [ProfileController::class, 'edit'])->name('settings.profile.edit');

Route::put('/settings/profile', [ProfileController::class, 'update'])->name('settings.profile.update');

Route::resources([
    '/contacts' => ContactController::class,
    '/companies' => CompanyController::class
]);

// protect routes
// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index')->middleware('auth');
// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index')->middleware(['auth', 'verified']);

// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// // Route::get('/contacts/{contact:id}', [ContactController::class, 'show'])->name('contacts.show'); // default
// // Route::get('/contacts/{contact:first_name}', [ContactController::class, 'show'])->name('contacts.show');
// Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

// Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

// Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

// Route::resource('/companies.contacts', ContactController::class); // nested resource route

// Route::resource('/contacts', ContactController::class);

// Route::resource('/contacts', ContactController::class)->names([
//     'index' => 'contacts.all',
//     'show' => 'contacts.view',
//     'destroy' => 'contacts.remove',
// ]); // rename routes

// Route::resource('/contacts', ContactController::class)->parameters(['contacts' => 'kontak']); // rename parameter names

// Route::resource('/contacts', ContactController::class)->names([
//     'index' => 'contacts.all',
//     'show' => 'contacts.view',
//     'destroy' => 'contacts.remove',
// ])->parameters(['contacts' => 'kontak']); // rename route & parameter names

// Route::resource('/contacts', ContactController::class)->only(['store', 'show', 'update', 'destroy']);

// Route::resource('/contacts', ContactController::class)->except(['create', 'edit']);

// Route::resources([
//     '/contacts' => ContactController::class,
//     '/companies' => CompanyController::class
// ]);
