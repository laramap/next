<?php

Route::view('/', 'welcome');

Auth::routes();

Route::get('auth/social', 'Auth\SocialController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialController@handleProviderCallback')->name('social.callback');

Route::get('/home', 'HomeController@index')->name('home');
