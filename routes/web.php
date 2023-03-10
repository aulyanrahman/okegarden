<?php

use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardProjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get(
    '/',
    function () {
        $strHome = 'home';
        return view('home', [
            'active' => "$strHome",
            'title' => 'Home',
        ]);
    }
);

Route::get(
    '/about',
    function () {
        return view('about', [
            'active' => 'about',
            'title' => 'About',
            'name' => 'Aulya Nur Rahman',
            'email' => 'aulyaasli@gmail.com',
            'image' => 'me.jpg',
        ]);
    }
);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/{project:slug}', [ProjectController::class, 'show']);
Route::get('/statuses', [StatusController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard/projects', DashboardProjectController::class)->middleware('auth');