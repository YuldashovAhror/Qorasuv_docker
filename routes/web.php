<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\TestController;
use App\Http\Controllers\Dashboard\PlanController;
use App\Http\Controllers\Dashboard\WordController;
use App\Http\Controllers\Front\WelcomeController;

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

Route::get('test', [TestController::class, 'index']);

Route::get('/languages/{loc}', function ($loc) {
    if (in_array($loc, ['en', 'ru', 'uz'])) {
        session()->put('locale', $loc);
    }

    return redirect()->back();
});

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('dashboard/words', [WordController::class, 'index'])->name('words.index');
    Route::get('dashboard/plan', [PlanController::class, 'index'])->name('plan.index');
    Route::post('dashboard/plan', [PlanController::class, 'store'])->name('plan.store');
    Route::put('dashboard/plan{id}', [PlanController::class, 'update'])->name('plan.update');
    Route::delete('dashboard/plan{id}', [PlanController::class, 'destroy'])->name('plan.destroy');
    Route::get('dashboard/dowload', [PlanController::class, 'dowloadindex'])->name('dowload.index');
    Route::put('dashboard/dowload/{id}', [PlanController::class, 'dowloadupdate'])->name('dowload.update');

});
