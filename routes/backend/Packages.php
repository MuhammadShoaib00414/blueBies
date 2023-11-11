<?php

// Contacts Management
Route::group(['namespace' => 'Packages'], function () {
   
    Route::resource('packages', 'PackagesController', ['except' => ['show']]);


    Route::put('packages/{id}', 'PackagesController@update');

  

    Route::put('packages/{id}', 'PackagesController@destroy');

    //For DataTables
    // Route::post('contacts/get', 'SupportsTableController')->name('contacts.get');
});
