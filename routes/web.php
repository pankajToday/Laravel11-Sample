<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){ return redirect('/login'); });
Route::inertia('login', 'Welcome')->name('login');


Route::view('/verify-email', 'emails.verify-email');
Route::get('/verify/{token}', [LoginController::class, 'VerifyToLogin'])->name('user-verify');
Route::get('/reset-your-password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('get-reset-password');



/**     Protected Routes (Login required) **/
Route::group(['middleware' => 'auth' ], function () {
    Route::inertia('/dashboard', 'Dashboard');
});


Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});


/**  end  **/
