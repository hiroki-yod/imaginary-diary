<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiaryController;

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
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'can:isAdmin'])->group(function(){        //管理者用ページ
    Route::get('/admin/index', [AdminController::class, 'index']);
    Route::delete('/admin/{Diary}', [AdminController::class, 'delete']);
});

Route::get('/', [DiaryController::class, 'top'])->name('index');                   //一覧表示
Route::get('/diaries', [DiaryController::class, 'index']);          //一覧表示
Route::get('/diary/create', [DiaryController::class, 'create'])     //日記投稿
->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/diary', [DiaryController::class, 'store']);           //日記保存
Route::get('/diary/random', [DiaryController::class, 'random']);     //ランダムに詳細表示
Route::get('/diary/{diary}', [DiaryController::class, 'show']);     //詳細表示

require __DIR__.'/auth.php';
