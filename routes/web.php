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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'WelcomeController@Lanzamientos')->name('home');

Route::get('login/spotify', 'Auth\LoginController@redirectToProviderSpotify');
Route::get('login/spotify/callback', 'Auth\LoginController@handleProviderCallbackSpotify');
Route::get('/Lanzamientos', 'WelcomeController@Lanzamientos');
Route::get('/artista/{id}', 'WelcomeController@Artista');
