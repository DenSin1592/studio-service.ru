<?php

// Admin users

Route::resource('admin-users', 'AdminUsersController', ['except' => 'show']);
Route::resource('admin-roles', 'AdminRolesController', ['except' => 'show']);
