<?php

use App\Addons\Blog\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::prefix('{company}')->controller(BlogController::class)->group(function () {
    Route::get('get-blogs', 'index')->name('posts');
});
