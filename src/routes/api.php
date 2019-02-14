<?php

Route::group(['prefix' => 'api/v1', 'middleware' => ['api', 'client']], function () {

    // Update
    Route::post('update/version/check', 'Syscover\Admin\Controllers\VersionController@check')->name('api.update_check_version');
});
