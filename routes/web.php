<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\ModalController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Cache clear route
Route::get('{company}/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return redirect()->back()->with('success', get_phrase('Cache has been cleared.'));
})->name('clear.cache');

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
});

Route::prefix('{company}')->group(function () {
    //Redirect route
    Route::get('/dashboard', function () {
        if (auth()->user()->role == 'admin') {
            return redirect(route('admin.dashboard'));
        } else {
            return redirect(route('home'));
        }
    })->middleware(['auth', 'verified'])->name('dashboard');

});

//Common modal route
Route::prefix('{company}')->group(function () {

    Route::get('modal/{view_path}', [ModalController::class, 'common_view_function'])->name('modal');
    Route::any('get-video-details/{url?}', [CommonController::class, 'get_video_details'])->name('get.video.details');
    Route::get('view/{path}', [CommonController::class, 'rendered_view'])->name('view');

});

Route::get('closed_back_to_mobile_ber', function () {
    session()->forget('app_url');
    return redirect()->back();
})->name('closed_back_to_mobile_ber');

//Installation routes
Route::controller(InstallController::class)->group(function () {

    Route::get('/install_ended', 'index');
    Route::get('install/step0', 'step0')->name('step0');
    Route::get('install/step1', 'step1')->name('step1');
    Route::get('install/step2', 'step2')->name('step2');
    Route::any('install/step3', 'step3')->name('step3');
    Route::get('install/step4', 'step4')->name('step4');
    Route::get('install/step4/{confirm_import}', 'confirmImport')->name('step4.confirm_import');
    Route::get('install/install', 'confirmInstall')->name('confirm_install');
    Route::post('install/validate', 'validatePurchaseCode')->name('install.validate');
    Route::any('install/finalizing_setup', 'finalizingSetup')->name('finalizing_setup');
    Route::get('install/success', 'success')->name('success');
});
//Installation routes
