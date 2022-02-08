<?php

 

Route::get('/suchas-welfare', ['as' => 'welfare', 'middleware' => ['web'], 'uses' => 'HomeController@showWelfare']); 

Route::post('/submit-donation', ['as' => 'submitdonation.post', 'middleware' => ['web'], 'uses' => 'HomeController@submitDonation']);  
Route::post('/success', ['as' => 'success.post', 'middleware' => ['web'], 'uses' => 'HomeController@showSuccess']);  
Route::post('/failure', ['as' => 'failure.post', 'middleware' => ['web'], 'uses' => 'HomeController@showFailure']);  
   