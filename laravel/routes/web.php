<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [StudentController::class, 'index'])->name('index');

Route::post('/', [StudentController::class, 'index'])->name('post_index');

Route::get('/find', function () {
    return view('guest.find');
})->name('find');

Route::post('/find/result', [StudentController::class, 'show'])->name('show');

Route::middleware(['auth'])->group(function () {
    Route::resource('admin/course', 'App\Http\Controllers\AdminController', ['parameters' => [
        'course' => 'id'
    ]]);
});

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
