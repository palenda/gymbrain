<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('auth/google')->name('google.')->group(function () {
    Route::post('', [LoginController::class, 'loginWithGoogle'])->name('login');
    Route::get('callback', [LoginController::class, 'callbackFromGoogle'])->name('callback');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/* vue */
Route::any('{all}', function () {
    $user = Auth::user();
    return view('vue')->with(compact('user'));
})->where(['all' => '.*']);
