<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KycContainer;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function (){

    Route::controller(LoginController::class)->group(function (){
        Route::get('login-form','showLoginForm')->name('login-Form');
        Route::post('login','login')->name('login');
        Route::post('logout','logout')->name('logout');
    });
    Route::get('', [ HomeController::class,'home' ])->name('home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile-page');
    Route::put('/profile_update/{id}', [HomeController::class, 'update'])->name('update-profile-page');
    Route::put('change-passwprd', [HomeController::class, 'validatepassword'])->name('change-password-page');

    // Users 

    Route::get('/users/{id}/edit', [ManagementController::class, 'editUser'])->name('edit-user-page');
    Route::put('/users/{id}/update', [ManagementController::class, 'updateUser'])->name('update-user-page');
    Route::get('/users',[ManagementController::class ,'UserManagement'])->name('user-page');
    Route::delete('/user/{id}/delete', [ManagementController::class, 'deleteUser'])->name('user-delete');

    Route::get('/post/{post}', [PageController::class, 'detailPost'])->name('blog-details');

    // send mail
    Route::get('/send-mail', [PageController::class, 'emailPage'])->name('send-mail-page');
    Route::get('/send-mail/create', [PageController::class, 'sendMail'])->name('send-mail-create');
    Route::post('/send-mail/store', [PageController::class, 'storeMail'])->name('send-mail-store');
    Route::delete('/send-mail/{id}/delete/', [PageController::class, 'mailDelete'])->name('send-mail-delete');


    // Tuition Payment
    Route::get('/tuition-payment', [PageController::class, 'tuitionView'])->name('tuition-payment-page');
    Route::get('/tuition-wire-transer', [PageController::class, 'tuitionWireView'])->name('tuition-wire-transfer-page');
    Route::delete('/tuition-wire-transer/{id}/delete', [PageController::class, 'tuitionDeleteWireView'])->name('tuition-wire-transfer-delete');
    Route::delete('/tuition-payment/{id}/delete', [PageController::class, 'tuitionDeView'])->name('tuition-payment-delete');

    // TransactionCharge
    Route::get('/transaction-charge', [PageController::class, 'TransactionCharges'])->name('transaction-charge-page');
    Route::get('/transaction-charge/create', [PageController::class, 'TransactionchargesCreate'])->name('transaction-charge-create');
    Route::post('/transaction-charge/store', [PageController::class, 'TransactionchargesStore'])->name('transaction-charge-store');
    Route::put('/transaction-charge/{id}/update', [PageController::class, 'TransactionChargesUpdate'])->name('transaction-charge-update');
    Route::delete('/transaction-charge/{id}/delete', [PageController::class, 'TransactionChargesDelete'])->name('transaction-charge-delete');

    Route::resource('kyc', KycContainer::class);
    Route::resource('Post',  PostController::class);


    // search Engine
    Route::get('search', [PageController::class, 'searchEngine'])->name('search-engine');

    // Enable features
    Route::get('Features', [PageController::class, 'enableLogging'])->name('features-page');
    Route::post('Features/update', [PageController::class, 'updateService'])->name('update-features');


    Route::get('optimize',function (){
        \Illuminate\Support\Facades\Artisan::call('optimize');
        return 1;
    });
    Route::get('clear',function (){
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        return 1;
    });
});





?>