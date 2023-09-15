<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionImportController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard1', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/dashboard', [TransactionController::class, 'showDashboard'])->name('dashboard');

    Route::get('/upload', [TransactionImportController::class, 'showUploadForm'])->name('upload');

    Route::post('/import', [TransactionImportController::class, 'import'])->name('import');
});
