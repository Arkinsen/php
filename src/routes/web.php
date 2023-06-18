<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DefaultPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
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

Route::get('/', [DefaultPageController::class, 'getProperties']);

Route::get('/properties/{property}', [PropertiesController::class, 'show'])->name('properties.show');

Route::get('/homePage', function () {
    return view('homePage');
});

Route::get('/properties', [PropertiesController::class, 'index'])->name('propertiesList.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/propertyEditor', [PropertyListController::class, 'index'])->name('property.index');
    //adding
    Route::get('/propertyEditor/create', [PropertyListController::class, 'create'])->name('property.create');
    Route::post('/propertyEditor', [PropertyListController::class, 'store'])->name('property.store');
   
    // editing
    Route::get('/propertyEditor/{property}/edit', [PropertyListController::class, 'edit'])->name('property.edit');
    Route::put('/propertyEditor/{property}', [PropertyListController::class, 'update'])->name('property.update');
    //deleting
    Route::delete('/propertyEditor/{property}', [PropertyListController::class, 'destroy'])->name('property.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // pokud chci, aby byl klient přihlášen, aby se na tyto stránky mohl dostat

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
