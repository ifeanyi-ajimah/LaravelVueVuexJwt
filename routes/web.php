<?php


Route::get('home',function(){
    return view('testing');
});


Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');


// Auth::routes();
// Route::get('{path}',"HomeController@index")->where('path', '([a-zA-Z\-\/_.]+)?' );

// Route::get('/home', 'HomeController@index')->name('home');



