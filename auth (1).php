<?php

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\Auth\LinkedAccountController;
use App\Http\Controllers\Frontend\Auth\InfluencerController;
use App\Http\Controllers\Frontend\Auth\PersonaController;
use App\Http\Controllers\Frontend\Auth\AziendaController;
use App\Http\Controllers\Frontend\Auth\LandingController;
use App\Http\Controllers\Frontend\Auth\SocialLoginController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\ConfirmAccountController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\UpdatePasswordController;
use App\Http\Controllers\Frontend\Auth\PasswordExpiredController;
use App\Http\Controllers\Frontend\Auth\AppleLoginController;


/*
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend.auth'.
 */

/*
Route::group(['prefix' => 'auth','as' => 'auth.','namespace' => 'Auth','middleware' => 'role:influencer'], function () {
    Route::get('linking/login-as', [LinkedAccountController::class, 'loginAs'])->name('user.newlink.login-as');
});
*/

Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
    // These routes require the user to be logged in
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        //For when admin is logged in as user from backend
        Route::get('logout-as', [LoginController::class, 'logoutAs'])->name('logout-as');

        Route::get('logout-facebook', [LoginController::class, 'logoutFacebook'])->name('logout-facebook');

        // These routes can not be hit if the password is expired
        Route::group(['middleware' => 'password_expires'], function () {
            // Change Password Routes
            Route::patch('password/update', [UpdatePasswordController::class, 'update'])->name('password.update');
        });

        // Password expired routes
        Route::get('password/expired', [PasswordExpiredController::class, 'expired'])->name('password.expired');
        Route::patch('password/expired', [PasswordExpiredController::class, 'update'])->name('password.expired.update');

        // New Linked Account
        Route::get('link-account', [LinkedAccountController::class, 'linkForm'])->name('newlink.register');
        Route::post('link-account', [LinkedAccountController::class, 'link'])->name('newlink.post');
        Route::get('link-account/login-as/{id}', [LinkedAccountController::class, 'loginAs'])->name('user.newlink.login-as');
        Route::post('link-account/remove', [LinkedAccountController::class, 'linkDelete'])->name('link.remove');

    });

    // These routes require no user to be logged in
    Route::group(['middleware' => 'guest'], function () {
        // Authentication Routes
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login.post');

        // Socialite Routes
        Route::get('login/{provider}', [SocialLoginController::class, 'login'])->name('social.login');
        Route::get('login/{provider}/callback', [SocialLoginController::class, 'login']);
        Route::post('login/{provider}/callback', [SocialLoginController::class, 'login']);
        Route::get('login/apple/callback', [SocialLoginController::class, 'login']);
        Route::post('login/apple/callback', [SocialLoginController::class, 'login']);

        // Registration Routes
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register'])->name('register.post');
         //Route::get('register', [LoginController::class, 'showLoginForm'])->name('register');
        //Route::post('register', [LoginController::class, 'login'])->name('register.post');

        //Influencer Register
        Route::get('influencer', [LandingController::class, 'showRegistrationForm'])->name('influencer.register');
        Route::post('influencer', [LandingController::class, 'register'])->name('influencer.register.post');
        // Route::get('influencer', [LoginController::class, 'showLoginForm'])->name('influencer.register');
        //Route::post('influencer', [LoginController::class, 'login'])->name('influencer.register.pos');

        //Persona Register
        Route::get('persona', [PersonaController::class, 'showRegistrationForm'])->name('persona.register');
        Route::post('persona', [PersonaController::class, 'register'])->name('persona.register.post');

        //Azienda Register
        Route::get('azienda', [AziendaController::class, 'showRegistrationForm'])->name('azienda.register');
        Route::post('azienda', [AziendaController::class, 'register'])->name('azienda.register.post');

        //Landing Page Register
        //Route::get('landing', [LandingController::class, 'showRegistrationForm'])->name('landing.register');
        //Route::post('landing', [LandingController::class, 'register'])->name('landing.register.post');

        // Confirm Account Routes
        Route::get('account/confirm/{token}', [ConfirmAccountController::class, 'confirm'])->name('account.confirm');
        Route::get('account/confirm/resend/{uuid}', [ConfirmAccountController::class, 'sendConfirmationEmail'])->name('account.confirm.resend');

        // Password Reset Routes
        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.email');
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email.post');

        Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
        Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');

        //apple routes
        Route::get('apple/login', [AppleLoginController::class, 'login']);
        // Route::post('login/apple/callback', [AppleLoginController::class, 'callback']);

        // Route::get('apple/login', [AppleLoginController::class, 'appleLogin']);

        Route::get('/apple', function () {
            return Socialite::driver('apple')->redirect();
        });


    });



});
