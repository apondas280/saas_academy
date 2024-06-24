<?php

use App\Http\Controllers\instructor\BlogController;
use App\Http\Controllers\instructor\CourseController;
use App\Http\Controllers\instructor\DashboardController;
use App\Http\Controllers\instructor\LessonController;
use App\Http\Controllers\instructor\MyProfileController;
use App\Http\Controllers\instructor\PayoutController;
use App\Http\Controllers\instructor\PayoutSettingsController;
use App\Http\Controllers\instructor\SalesReportController;
use App\Http\Controllers\instructor\SectionController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('{company}')->group(function () {

    Route::name('instructor.')->prefix('instructor')->middleware('instructor')->group(function () {
        // dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Courses route
        Route::controller(CourseController::class)->group(function () {
            Route::get('courses', 'index')->name('courses');
            Route::get('course/create', 'create')->name('course.create');
            Route::post('course/store', 'store')->name('course.store');
            Route::get('course/edit/{id}', 'edit')->name('course.edit');
            Route::post('course/update/{id}', 'update')->name('course.update');
            Route::get('course/duplicate/{id}', 'duplicate')->name('course.duplicate');
            Route::get('course/delete/{id}', 'delete')->name('course.delete');
            Route::get('course/draft/{id}', 'draft')->name('course.draft');
            Route::get('course/status/{type}/{id}', 'status')->name('course.status');
            
        });

        //Section route
        Route::controller(SectionController::class)->group(function () {
            Route::post('section/store', 'store')->name('section.store');
            Route::post('section/update', 'update')->name('section.update');
            Route::get('section/delete/{id}', 'delete')->name('section.delete');
            Route::post('section/sort', 'sort')->name('section.sort');
        });

        // Lesson route
        Route::controller(LessonController::class)->group(function () {
            Route::post('lesson/store', 'store')->name('lesson.store');
            Route::post('lesson/update', 'update')->name('lesson.update');
            Route::get('lesson/delete/{id}', 'delete')->name('lesson.delete');
            Route::post('lesson/sort', 'sort')->name('lesson.sort');
        });

        // blog route
        Route::controller(BlogController::class)->middleware('instructorBlogPermission')->group(function () {
            Route::get('blogs', 'index')->name('blogs');
            Route::get('blog/create', 'create')->name('blog.create');
            Route::post('blog/store', 'store')->name('blog.store');
            Route::get('blog/edit/{id}', 'edit')->name('blog.edit');
            Route::post('blog/update/{id}', 'update')->name('blog.update');
            Route::get('blog/delete/{id}', 'delete')->name('blog.delete');
            Route::get('blog/pending', 'pending')->name('blog.pending');
        });

        // sales report
        Route::controller(SalesReportController::class)->group(function () {
            Route::get('sales-report', 'index')->name('sales.report');
        });

        // payout route
        Route::controller(PayoutController::class)->group(function () {
            Route::get('payout-reports', 'index')->name('payout.reports');
            Route::post('payout/request', 'store')->name('payout.request');
            Route::get('payout/request/delete/{id}', 'delete')->name('payout.delete');
        });

        //payout setting
        Route::controller(PayoutSettingsController::class)->group(function () {
            Route::get('payout_setting', 'payout_setting')->name('payout.setting');
            Route::post('payout_setting/store', 'payout_setting_store')->name('payout.setting.store');
        });

        //manage profile
        Route::controller(MyProfileController::class)->group(function () {
            Route::get('manage_profile', 'manage_profile')->name('manage.profile');
            Route::post('manage_profile/update', 'manage_profile_update')->name('manage.profile.update');
        });
    });

});