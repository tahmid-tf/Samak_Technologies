<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ------------------------------------------------------------------------------ Admin Panel --------------------------------------------------------------------------


Route::middleware('auth')->prefix('admin')->group(function () {


    //    ------------------------------------------------------ Sliders ------------------------------------------------------

    Route::resource('dashboard', "DashboardController");

//    ------------------------------------------------------ Sliders ------------------------------------------------------

//    ------------------------------------------------------ Sliders ------------------------------------------------------

    Route::resource('slider', "SliderController");

//    ------------------------------------------------------ Sliders ------------------------------------------------------

//    ------------------------------------------------------ mission and vision ------------------------------------------------------

    Route::resource('mission', "MissionController");

//    ------------------------------------------------------ mission and vision ------------------------------------------------------

    //    -------------------------------------------------- counter ------------------------------------------------------

    Route::resource('counter', "CounterController");

//    ------------------------------------------------------ counter ------------------------------------------------------

    //    -------------------------------------------------- platform ------------------------------------------------------

    Route::resource('platform', "PlatformController");

//    ------------------------------------------------------ platform ------------------------------------------------------

    //    -------------------------------------------------- objective ------------------------------------------------------

    Route::resource('objective', "ObjectiveController");

//    ------------------------------------------------------ objective ------------------------------------------------------

    //    -------------------------------------------------- ecosystem ------------------------------------------------------

    Route::resource('ecosystem', "EcosystemController");

//    ------------------------------------------------------ ecosystem ------------------------------------------------------

    //    -------------------------------------------------- achievement ------------------------------------------------------

    Route::resource('achievement', "AchievementController");

//    ------------------------------------------------------ achievement ------------------------------------------------------

    //    -------------------------------------------------- contact ------------------------------------------------------

    Route::resource('contact', "ContactController");

//    ------------------------------------------------------ contact ------------------------------------------------------

    // ------------------------------------------------------ Team --------------------------------------------------------

    Route::resource('team', "TeamController");

// ---------------------------------------------------------- Team --------------------------------------------------------

    // ------------------------------------------------------ Logout --------------------------------------------------------

    Route::get('logout', function (){
        \auth()->logout();
        return redirect('/');
    })->name('logout');
// ---------------------------------------------------------- Logout --------------------------------------------------------


});

// ------------------------------------------------------------------------------ Admin Panel --------------------------------------------------------------------------
