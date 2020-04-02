<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/login', [
    'middleware' => 'guest',
    'as' => "login.index",
    'uses' => 'LoginController@index'
]);
$router->post('/login[/{flag}]', [
    'middleware' => 'guest',
    'uses' => 'LoginController@auth'
]);
$router->get('/logout', [
    'middleware' => 'auth',
    'as' => 'login.logout',
    'uses' => 'LoginController@logout'
]);

$router->get('/dashboard', [
    'middleware' => 'auth',
    'as' => "dashboard.index",
    'uses' => 'DashboardController@index'
]);


$router->get('/admin/users', [
    'middleware' => 'auth',
    'as' => "admin.users.index",
    'uses' => 'Admin\UsersController@index'
]);
$router->get('/admin/users/get[/{key}]', [
    'middleware' => 'auth',
    'as' => "admin.users.get",
    'uses' => 'Admin\UsersController@get'
]);
$router->get('/admin/users/data', [
    'middleware' => 'auth',
    'as' => "admin.users.data",
    'uses' => 'Admin\UsersController@data'
]);
$router->post('/admin/users/insert', [
    'middleware' => 'auth',
    'as' => "admin.users.insert",
    'uses' => 'Admin\UsersController@insert'
]);
$router->post('/admin/users/update', [
    'middleware' => 'auth',
    'as' => "admin.users.update",
    'uses' => 'Admin\UsersController@update'
]);
$router->post('/admin/users/delete', [
    'middleware' => 'auth',
    'as' => "admin.users.delete",
    'uses' => 'Admin\UsersController@delete'
]);

$router->get('/admin/permissions', [
    'middleware' => 'auth',
    'as' => "admin.permissions.index",
    'uses' => 'Admin\PermissionsController@index'
]);
$router->get('/admin/permissions/get[/{key}]', [
    'middleware' => 'auth',
    'as' => "admin.permissions.get",
    'uses' => 'Admin\PermissionsController@get'
]);
$router->get('/admin/permissions/data', [
    'middleware' => 'auth',
    'as' => "admin.permissions.data",
    'uses' => 'Admin\PermissionsController@data'
]);
$router->post('/admin/permissions/insert', [
    'middleware' => 'auth',
    'as' => "admin.permissions.insert",
    'uses' => 'Admin\PermissionsController@insert'
]);
$router->post('/admin/permissions/update', [
    'middleware' => 'auth',
    'as' => "admin.permissions.update",
    'uses' => 'Admin\PermissionsController@update'
]);
$router->post('/admin/permissions/delete', [
    'middleware' => 'auth',
    'as' => "admin.permissions.delete",
    'uses' => 'Admin\PermissionsController@delete'
]);