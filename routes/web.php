<?php


use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;



Route::inertia('/', 'Welcome')->name('Welcome');
Route::inertia('/login', 'Auth/Login')->name('login');
Route::inertia('/privacy-policy', 'PrivacyPolicy')->name('privacy-policy');


// Route::view('/verify-email', 'emails.verify-email');
// Route::get('/verify/{token}', [LoginController::class, 'VerifyToLogin'])->name('user-verify');
// Route::get('/reset-your-password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('get-reset-password');



/**     Protected Routes (Login required) **/
Route::group(['middleware' => 'auth' ], function () {
    Route::inertia('/dashboard', 'Dashboard/Home');
    Route::inertia('/profile', 'Dashboard/Profile');
    Route::inertia('/categories', 'Dashboard/Category/List');
    Route::inertia('/products', 'Dashboard/Product/List');
    Route::inertia('/inventory', 'Dashboard/Inventory/List');
    Route::inertia('/dashboard-2', 'Dashboard/Dashboard');
    Route::inertia('/vendors', 'Dashboard/Vendor/List');
});


Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});


Route::get('/test', [TestController::class, 'test']);

/**  end  **/
