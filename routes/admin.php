<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CorporateController;
use App\Http\Controllers\Admin\FlightController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KycContainer;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MerchandiseController;
use App\Http\Controllers\Admin\OtherServiceController;
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
    Route::put('/user/{user}/ban', [ManagementController::class, 'banUser'])->name('users.ban');
    Route::put('/user/{user}/unban', [ManagementController::class, 'unbanUser'])->name('users.unban');


    Route::get('/post/{post}', [PageController::class, 'detailPost'])->name('blog-details');

    // send mail
    Route::get('/send-mail', [PageController::class, 'emailPage'])->name('send-mail-page');
    Route::get('/send-mail/create', [PageController::class, 'sendMail'])->name('send-mail-create');
    Route::post('/send-mail/store', [PageController::class, 'storeMail'])->name('send-mail-store');
    // Route::get('/send-mail/{emailmail}/show', [PageController::class, 'mailShow'])->name('send-mail-show');
    Route::delete('/send-mail/{id}/delete/', [PageController::class, 'mailDelete'])->name('send-mail-delete');


    // // Merchanndise controller
    Route::get('/merchandise', [MerchandiseController::class,'indexMerchandise'])->name('merchandise-page');
    Route::put('/merchandise/{id}/completed', [MerchandiseController::class,'MerchandiseCompleted'])->name('merchandise-complete');
    Route::delete('/merchandise/{id}/delete', [MerchandiseController::class,'MerchandiseDelete'])->name('merchandise-delete');

    // Corporate service
    Route::get('/corporate-service', [CorporateController::class,'corporatePage'])->name('corporate-service-page');
    Route::put('/corporate-service/{id}/update', [CorporateController::class,'corporateUpdate'])->name('corporate-service-update');
    Route::delete('/corporate-service/{id}/delete', [CorporateController::class,'corporateDelete'])->name('corporate-service-delete');


    // otherservices otherService
    Route::get('/otherservices', [OtherServiceController::class, 'otherServicepage'])->name('otherservices-page');
    Route::put('/otherservices/{id}/completed', [OtherServiceController::class,'otherServiceCompleted'])->name('otherservices-complete');
    Route::delete('/otherservices/{id}/delete', [OtherServiceController::class,'otherServiceDelete'])->name('otherservices-delete');

    // flight controller
    Route::get('/flight/local', [FlightController::class, 'localflight'])->name('local-flight-page');
    Route::get('/flight/international', [FlightController::class, 'InternationalFLight'])->name('international-flight-page');
    Route::delete('/flight/local/{id}/delete/', [FlightController::class, 'LocalFlightDelete'])->name('Local-delete');
    Route::delete('/flight/international/{id}/delete/', [FlightController::class, 'InternationalFlightDelete'])->name('international-delete');


    // Tuition Payment
    Route::get('/tuition-payment', [PageController::class, 'tuitionView'])->name('tuition-payment-page');
    Route::get('/tuition-wire-transer', [PageController::class, 'tuitionWireView'])->name('tuition-wire-transfer-page');
    Route::delete('/tuition-wire-transer/{id}/delete', [PageController::class, 'tuitionDeleteWireView'])->name('tuition-wire-transfer-delete');
    Route::delete('/tuition-payment/{id}/delete', [PageController::class, 'tuitionDeView'])->name('tuition-payment-delete');
    Route::put('/tuition-payment/{id}/process', [PageController::class, 'TuitionCompleted'])->name('tuition-payment-complete');
    Route::put('/tuition-paymentwire/{id}/process', [PageController::class, 'TuitionwireProcess'])->name('tuition-payment-wire-processing');

    // Visa Application
    Route::get('/visa-application', [PageController::class, 'visaApplicationView'])->name('visa-application-page');
    Route::get('/visa-application/canada', [PageController::class, 'visaApplicationCanadaView'])->name('visa-application-canada-page');
    Route::delete('/visa-application/{id}/delete', [PageController::class, 'visaApplicationDelete'])->name('visa-application-delete');
    Route::put('/visa-application/{id}/process', [PageController::class, 'visaApplicationCanadaEdit'])->name('visa-application-process');

    // TransactionCharge
    Route::get('/transaction-charge', [PageController::class, 'TransactionCharges'])->name('transaction-charge-page');
    // Route::get('/transaction-charge/create', [PageController::class, 'TransactionchargesCreate'])->name('transaction-charge-create');
    Route::post('/transaction-charge/store', [PageController::class, 'TransactionchargesStore'])->name('transaction-charge-store');
    // Route::put('/transaction-charge/{id}/update', [PageController::class, 'TransactionChargesUpdate'])->name('transaction-charge-update');
    Route::delete('/transaction-charge/{id}/delete', [PageController::class, 'TransactionChargesDelete'])->name('transaction-charge-delete');

    Route::resource('kyc', KycContainer::class);
    Route::resource('Post',  PostController::class);


    // search Engine
    Route::get('search', [PageController::class, 'searchEngine'])->name('search-engine');

    // Enable features
    Route::get('Features', [PageController::class, 'enableLogging'])->name('features-page');
    Route::get('Baggage', [PageController::class, 'baggageView'])->name('baggage-page');
    Route::post('Features/update', [PageController::class, 'updateService'])->name('update-features');
    Route::post('Baggage/update', [PageController::class, 'baggage'])->name('update-baggage');


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