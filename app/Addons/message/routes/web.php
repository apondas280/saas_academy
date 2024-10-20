<?php

use App\Addons\Message\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::prefix('{company}')->controller(MessageController::class)->group(function () {
    Route::get('messages', 'index')->name('messages');
    Route::get('messages.create', 'create')->name('messages.create');
});