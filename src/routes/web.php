<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyListController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PropertyController::class, 'getProperties']);

// Route::get('/properties', [PropertyListController::class, 'index']);

// Route::get('/properties', function () {
//     return view('properties');
// });

Route::get('/homePage', function () {
    return view('homePage');
});

Route::get('/properties', [PropertyListController::class, 'index'])->name('propertiesList.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // pokud chci, aby byl klient přihlášen, aby se na tyto stránky mohl dostat

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
