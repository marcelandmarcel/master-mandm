<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// alternate: resolve();
//$stripe = App::make('App\Billing\Stripe');

// winebook
Route::get('/winebook','winesController@index');

Route::get('/winebook/{wine}','winesController@show')->name('wines.show');


// Events
Route::get('/events/{event}','eventsController@show')->name('events.show');
Route::get('events', 
  ['as' => 'events.index', 'uses' => 'eventsController@index']);
Route::get('event', 
  ['as' => 'events.create', 'uses' => 'eventsController@create']);
Route::post('event', 
  ['as' => 'events.store', 'uses' => 'eventsController@store']);

// Admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/register', 'RegistrationController@create')->name('registration.create');

Route::post('/register', 'RegistrationController@store');


Route::get('login', 'SessionsController@create')->name('sessions.create');

Route::post('login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');


// home
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', 'HomeController@index');


// reviews
Route::get('/reviews', 'ReviewsController@create')->name('reviews.create');
Route::post('/wines/{wine}/reviews', 'ReviewsController@store');


// about
Route::get('about', function () {
    return view('about.about');
});


// purchase
Route::post('purchase','PurchasesController@store');


// voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// contact and about
Route::get('contact', 
  ['as' => 'about', 'uses' => 'AboutController@show']);
Route::get('contact', 
  ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact', 
  ['as' => 'contact_store', 'uses' => 'AboutController@store']);

// profile
Route::get('profile','ProfilesController@show')->name('profiles.show');

// SOCIALITE
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');



