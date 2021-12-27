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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => ['lang']], function () {
    Route::get('/', ['uses' => 'FrontController@getHome']);
    Route::get('/home', ['as' => 'home', 'uses' => 'FrontController@getHome']);
    Route::get('/lang/{lang}', ['as' => 'setLang', 'uses' => 'LangController@changeLanguage']);
    Route::get('/aboutMe', ['as' => 'aboutMe', 'uses' => 'FrontController@getAboutMe']);
    Route::get('/musicSearch', ['as' => 'musicSearch', 'uses' => 'FrontController@getMusicSearch']);
    Route::get('/searchResult', ['as' => 'searchResult', 'uses' => 'FrontController@getSearchResult']);
    Route::get('/helpUs', ['as' => 'helpUs', 'uses' => 'FrontController@getHelpUs']);
//    Route::get('/user/login', ['as' => 'user.login',
//        'uses' => 'AuthController@authentication']);
//    Route::post('/user/login', ['as' => 'user.login',
//        'uses' => 'AuthController@login']);
//    Route::get('/user/logout', ['as' => 'user.logout',
//        'uses' => 'AuthController@logout']);
//    Route::post('/user/register', ['as' => 'user.register',
//        'uses' => 'AuthController@registration']);
    Auth::routes();
});

// Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth','lang']], function () {
    Route::resource('song', 'SongController');
    Route::get('/song/{id}/destroy', ['as' => 'song.destroy',
        'uses' => 'SongController@destroy']);
    Route::get('/song/{id}/destroy/confirm', ['as' => 'song.destroy.confirm',
        'uses' => 'SongController@confirmDestroy']);
    Route::get('/song/{id}/update', ['as' => 'song.update',
        'uses' => 'SongController@update']);
    
    
   
    Route::get('/musicSearch/{id}/{up_down?}', ['as' => 'song.likeOrDislike', 'uses' => 'SongController@likeOrDislike']);
    Route::get('/searchResult/{id}/{up_down?}', ['as' => 'song.likeOrDislike', 'uses' => 'SongController@likeOrDislike']);

    Route::get('/ajaxSong', 'SongController@ajaxCheckForSong');
    //probabilmente manca una rotta che punta a /ajax
});

