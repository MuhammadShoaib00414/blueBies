<?php

// Contacts Management
Route::group(['namespace' => 'Contacts'], function () {
   
    Route::resource('contacts', 'ContactsController', ['except' => ['show']]);

    //For DataTables
    Route::post('contacts/get', 'ContactsTableController')->name('contacts.get');
});
