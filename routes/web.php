<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'agents', 'as' => 'agents.'], function() {
    Route::controller(AgentsController::class)->group(function() {
        Route::get('/', 'index')->name('liste');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{agent}/edit', 'edit')->name('edit');
        Route::put('{agent}', 'update')->name('update');
        Route::delete('{agent}/delete', 'destroy')->name('destroy');
    });
});

// Route::resource('agents', AgentController::class);

Route::controller(PagesController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/nous-contact', 'contact')->name('contact')->middleware(['auth', 'agent']);

    Route::get('/mes-projets/{projet}', 'project')->name('projet')
        ->middleware(['auth', 'role:editor']);
});

Route::view('/welcome', 'welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
