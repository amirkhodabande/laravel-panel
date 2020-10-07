
<?php


Route::resource('/dashbord', 'DashbordController');

Route::resource('/users', 'UserController');

// Route::resource('/permissions', 'PermissionController');

Route::post('/permissions/{user}', 'PermissionController@store')->name(' permissions.store');
Route::delete('permissions/{permission}/{user}', 'PermissionController@destroy')->name(' permissions.destroy');

Route::post('/permissions/giverole/{name}/{user}', 'PermissionController@giverole')->name('permissions.giverole');
