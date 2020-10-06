
<?php

Route::resource('/dashbord', 'DashbordController');

Route::resource('/users', 'UserController');

Route::resource('/permissions', 'PermissionController');

Route::post('/permissions/giverole/{name}', 'PermissionController@giverole')->name('permissions.giverole');
