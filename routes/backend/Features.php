<?php

// Contacts Management
Route::group(['namespace' => 'Features'], function () {
   
    Route::resource('features', 'FeaturesController', ['except' => ['show']]);


    Route::put('features/{id}', 'FeaturesController@update');

  

    Route::put('features/{id}', 'FeaturesController@destroy');

    //For DataTables
    Route::post('features/get', 'FeaturesTableController')->name('features.get');

    
});
