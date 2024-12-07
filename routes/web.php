<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;


Route::controller(PagesController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/nous-contact', 'contact')->name('contact');


    Route::get('/mes-projets/{projet}', 'project')->name('projet')
        ->middleware('auth');
});

Route::view('/welcome', 'welcome');

