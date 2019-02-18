<?php
// Route::group(['prefix' => 'api/v1', 'middleware' => ['api', 'client']], function () {
Route::group(['prefix' => 'api/v1', 'middleware' => ['api']], function () {
    // updates
    Route::post('update/version/check',  'Syscover\Update\Controllers\VersionController@check')->name('api.update_version_check');
});
