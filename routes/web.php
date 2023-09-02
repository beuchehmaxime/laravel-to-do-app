<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/profile/index', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('profile.index');

Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiles', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiles', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    // Route::controller(UserController::class)->group(function(){
    //     Route::get('/user', 'index')->name('user.index');
    // });
    Route::resource('/user', TaskController::class);
    Route::get('/pendingtask',[UserController::class, 'index'])->name('user.pendingtask');;
    Route::get('/logout',[UserController::class, 'logout'])->name('user.logout');;
});

require __DIR__.'/auth.php';
