<?php

// Contacts Management
Route::group(['namespace' => 'Supports'], function () {
   
    Route::resource('supports', 'SupportsController', ['except' => ['show']]);


    Route::put('supports/{id}', 'SupportsController@update');

  


    //For DataTables
    Route::post('contacts/get', 'SupportsTableController')->name('contacts.get');
});
