<?php

// Faq Management
Route::group(['namespace' => 'Partners'], function () {
    Route::resource('partners', 'PartnersController', ['except' => ['show']]);

    //For DataTables
    Route::post('partners/get', 'PartnersTableController')->name('partners.get');
});
