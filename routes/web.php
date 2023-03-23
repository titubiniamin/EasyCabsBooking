<?php


use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;


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
//Route::view('/', 'layouts.app');
Route::get('/', [FrontEndController::class, 'home'])->name('frontend.home');
Route::get('/about', [FrontEndController::class, 'about'])->name('frontend.about');
Route::get('/services', [FrontEndController::class, 'services'])->name('frontend.services');
Route::get('/pricing', [FrontEndController::class, 'pricing'])->name('frontend.pricing');
Route::get('/help', [FrontEndController::class, 'help'])->name('frontend.help');

Route::get('/booking',[BookingController::class,'showBookingPage'])->name('booking');
Route::post('/booking',[BookingController::class,'store'])->name('booking.store');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])
        ->middleware('auth:admin')
        ->name('dashboard');
    Route::get('settings', [\App\Http\Controllers\Admin\SettingsController::class, 'settings'])->name('settings');
//
//    Route::get('register', [AdminRegisteredUserController::class, 'create'])
//        ->middleware('guest:admin')
//        ->name('register');
//
//    Route::post('register', [AdminRegisteredUserController::class, 'store'])
//        ->middleware('guest:admin');

    Route::get('login', [AdminAuthenticatedSessionController::class, 'create'])
        ->middleware('guest:admin')
        ->name('login');


    Route::post('login', [AdminAuthenticatedSessionController::class, 'store'])
        ->middleware('guest:admin')
        ->name('loginCheck');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest')
        ->name('password.request');
//
//    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//        ->middleware('guest')
//        ->name('password.email');
//
//    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
//        ->middleware('guest')
//        ->name('password.reset');
//
//    Route::post('/reset-password', [NewPasswordController::class, 'store'])
//        ->middleware('guest')
//        ->name('password.update');
//
//    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
//        ->middleware('auth')
//        ->name('verification.notice');
//
//    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//        ->middleware(['auth', 'signed', 'throttle:6,1'])
//        ->name('verification.verify');
//
//    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//        ->middleware(['auth', 'throttle:6,1'])
//        ->name('verification.send');
//
//    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
//        ->middleware('auth')
//        ->name('password.confirm');
//
//    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
//        ->middleware('auth');
    Route::post('logout', [AdminAuthenticatedSessionController::class, 'destroy'])
        ->name('logout')
        ->middleware('auth:admin');

});

//Route::group(['prefix' => 'merchant', 'as' => 'merchant.'], function () {
//    Route::get('dashboard', [\App\Http\Controllers\Merchant\DashboardController::class, 'index'])->middleware(['auth:merchant'])->name('dashboard');
//    Route::get('register', [MerchantRegisteredUserController::class, 'create'])
//        ->middleware('guest:merchant')
//        ->name('register');
//    Route::get('login', [MerchantAuthenticatedSessionController::class, 'create'])
//        ->middleware('guest:merchant')
//        ->name('login');
//
//    Route::post('login', [MerchantAuthenticatedSessionController::class, 'store'])
//        ->middleware('guest:merchant')
//        ->name('loginCheck');
//});
Route::get('/location-suggestion',[BookingController::class,'locationSuggestion'])->name('location.suggestion');
Route::get('/location-suggestion2',[BookingController::class,'locationSuggestion2'])->name('location.suggestion2');
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::put('/merchant/inactive/{id}', [MerchantController::class, 'inactive'])->name('merchant.inactive');
    Route::put('/merchant/active/{id}', [MerchantController::class, 'active'])->name('merchant.active');

    Route::get('/merchant/login/{merchantId}', [MerchantController::class, 'login'])->name('merchant.login');
    Route::post('/parcel-transfer-accept', [\App\Http\Controllers\Admin\ParcelRequestController::class, 'accept'])->name('parcel.request.accept');

    Route::resource('merchant', MerchantController::class);

});

Route::get('/test',[TestController::class,'test']);
