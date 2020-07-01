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

/**
 * CLIENT
 */
$router->get('/', [
    'as' => "landing",
    'uses' => 'LandingController@index'
]);
$router->get('/lockdown', [
    'as' => "landing.lockdown",
    'uses' => 'LandingController@lockdown_page'
]);
$router->get('/data', [
    'as' => "landing.data",
    'uses' => 'LandingController@get_data'
]);
$router->get('/data/lockdown[/{limit}]', [
    'as' => "landing.lockdowns",
    'uses' => 'LandingController@get_lockdowns'
]);

$router->get('/data/maps/{id_kab}', [
    'as' => "landing.map",
    'uses' => 'LandingController@get_spesific_map'
]);


/**
 * DASHBOARD
 */

/**
 * AUTH
 */
$router->get('/dashboard/login', [
    'middleware' => 'guest',
    'as' => "login.index",
    'uses' => 'LoginController@index'
]);
$router->post('/dashboard/login[/{flag}]', [
    'middleware' => 'guest',
    'uses' => 'LoginController@auth'
]);
$router->get('/dashboard/logout', [
    'middleware' => 'auth',
    'as' => 'login.logout',
    'uses' => 'LoginController@logout'
]);

/**
 * DASHBOARD
 */
$router->get('/dashboard', [
    'middleware' => 'auth',
    'as' => "dashboard.index",
    'uses' => 'DashboardController@index'
]);

/**
 * CONTENT
 */
$router->get('/dashboard/content/lockdown', [
    'middleware' => 'auth',
    'as' => "content.lockdown.index",
    'uses' => 'Content\LockdownController@index'
]);
$router->get('/dashboard/content/lockdown/get[/{key}]', [
    'middleware' => 'auth',
    'as' => "content.lockdown.get",
    'uses' => 'Content\LockdownController@get'
]);
$router->get('/dashboard/content/lockdown/data', [
    'middleware' => 'auth',
    'as' => "content.lockdown.data",
    'uses' => 'Content\LockdownController@data'
]);
$router->post('/dashboard/content/lockdown/insert', [
    'middleware' => 'auth',
    'as' => "content.lockdown.insert",
    'uses' => 'Content\LockdownController@insert'
]);
$router->post('/dashboard/content/lockdown/update', [
    'middleware' => 'auth',
    'as' => "content.lockdown.update",
    'uses' => 'Content\LockdownController@update'
]);
$router->post('/dashboard/content/lockdown/delete', [
    'middleware' => 'auth',
    'as' => "content.lockdown.delete",
    'uses' => 'Content\LockdownController@delete'
]);

$router->get('/dashboard/content/maps/update', [
    'middleware' => 'auth',
    'as' => "content.maps.update",
    'uses' => 'Kot\MapsController@get_map'
]);

$router->get('/dashboard/content/maps/hapus_maps/{id}', [
    'middleware' => 'auth',
    'as' => "content.maps.hapus",
    'uses' => 'Kot\MapsController@hapusMaps'
]);

$router->post('/dashboard/content/maps/edit_maps',[
    'middleware' => 'auth',
    'as'    => "content.maps.perbarui",
    'uses'  => 'Kot\MapsController@updateMaps' 
]);

$router->post('/dashboard/content/maps/add_maps',[
    'middleware' => 'auth',
    'as'    => "content.maps.tambah",
    'uses'  => 'Kot\MapsController@tambah_map' 
]);

/**
 * KABUPATEN
 */
$router->get('/dashboard/kab/odp/update', [
    'middleware' => 'auth',
    'as' => "kabupaten.odp.update",
    'uses' => 'Kab\OdpController@edit'
]);
$router->post('/dashboard/kab/odp/update', [
    'middleware' => 'auth',
    'uses' => 'Kab\OdpController@update'
]);
$router->get('/dashboard/kab/odp/refresh', [
    'middleware' => 'auth',
    'as' => "kabupaten.odp.refresh",
    'uses' => 'Kab\OdpController@refresh'
]);
$router->get('/dashboard/kab/pdp/update', [
    'middleware' => 'auth',
    'as' => "kabupaten.pdp.update",
    'uses' => 'Kab\PdpController@edit'
]);
$router->post('/dashboard/kab/pdp/update', [
    'middleware' => 'auth',
    'uses' => 'Kab\PdpController@update'
]);
$router->get('/dashboard/kab/pdp/refresh', [
    'middleware' => 'auth',
    'as' => "kabupaten.pdp.refresh",
    'uses' => 'Kab\PdpController@refresh'
]);
$router->get('/dashboard/kab/positif/update', [
    'middleware' => 'auth',
    'as' => "kabupaten.positif.update",
    'uses' => 'Kab\PositifController@edit'
]);
$router->post('/dashboard/kab/positif/update', [
    'middleware' => 'auth',
    'uses' => 'Kab\PositifController@update'
]);
$router->get('/dashboard/kab/positif/refresh', [
    'middleware' => 'auth',
    'as' => "kabupaten.positif.refresh",
    'uses' => 'Kab\PositifController@refresh'
]);
 /**
 * KOTA
 */
$router->get('/dashboard/kota/odp/update', [
    'middleware' => 'auth',
    'as' => "kota.odp.update",
    'uses' => 'Kot\OdpController@edit'
]);

$router->post('/dashboard/kota/odp/update', [
    'middleware' => 'auth',
    'uses' => 'Kot\OdpController@update'
]);
$router->get('/dashboard/kota/odp/refresh', [
    'middleware' => 'auth',
    'as' => "kota.odp.refresh",
    'uses' => 'Kot\OdpController@refresh'
]);
$router->get('/dashboard/kota/pdp/update', [
    'middleware' => 'auth',
    'as' => "kota.pdp.update",
    'uses' => 'Kot\PdpController@edit'
]);
$router->post('/dashboard/kota/pdp/update', [
    'middleware' => 'auth',
    'uses' => 'Kot\PdpController@update'
]);
$router->get('/dashboard/kota/pdp/refresh', [
    'middleware' => 'auth',
    'as' => "kota.pdp.refresh",
    'uses' => 'Kot\PdpController@refresh'
]);
$router->get('/dashboard/kota/positif/update', [
    'middleware' => 'auth',
    'as' => "kota.positif.update",
    'uses' => 'Kot\PositifController@edit'
]);
$router->post('/dashboard/kota/positif/update', [
    'middleware' => 'auth',
    'uses' => 'Kot\PositifController@update'
]);
$router->get('/dashboard/kota/positif/refresh', [
    'middleware' => 'auth',
    'as' => "kota.positif.refresh",
    'uses' => 'Kot\PositifController@refresh'
]);


/**
 * ADMIN
 */
$router->get('/dashboard/admin/users', [
    'middleware' => 'auth',
    'as' => "admin.users.index",
    'uses' => 'Admin\UsersController@index'
]);
$router->get('/dashboard/admin/users/get[/{key}]', [
    'middleware' => 'auth',
    'as' => "admin.users.get",
    'uses' => 'Admin\UsersController@get'
]);
$router->get('/dashboard/admin/users/data', [
    'middleware' => 'auth',
    'as' => "admin.users.data",
    'uses' => 'Admin\UsersController@data'
]);
$router->post('/dashboard/admin/users/insert', [
    'middleware' => 'auth',
    'as' => "admin.users.insert",
    'uses' => 'Admin\UsersController@insert'
]);
$router->post('/dashboard/admin/users/update', [
    'middleware' => 'auth',
    'as' => "admin.users.update",
    'uses' => 'Admin\UsersController@update'
]);
$router->post('/dashboard/admin/users/delete', [
    'middleware' => 'auth',
    'as' => "admin.users.delete",
    'uses' => 'Admin\UsersController@delete'
]);

$router->get('/dashboard/admin/permissions', [
    'middleware' => 'auth',
    'as' => "admin.permissions.index",
    'uses' => 'Admin\PermissionsController@index'
]);
$router->get('/dashboard/admin/permissions/get[/{key}]', [
    'middleware' => 'auth',
    'as' => "admin.permissions.get",
    'uses' => 'Admin\PermissionsController@get'
]);
$router->get('/dashboard/admin/permissions/data', [
    'middleware' => 'auth',
    'as' => "admin.permissions.data",
    'uses' => 'Admin\PermissionsController@data'
]);
$router->post('/dashboard/admin/permissions/insert', [
    'middleware' => 'auth',
    'as' => "admin.permissions.insert",
    'uses' => 'Admin\PermissionsController@insert'
]);
$router->post('/dashboard/admin/permissions/update', [
    'middleware' => 'auth',
    'as' => "admin.permissions.update",
    'uses' => 'Admin\PermissionsController@update'
]);
$router->post('/dashboard/admin/permissions/delete', [
    'middleware' => 'auth',
    'as' => "admin.permissions.delete",
    'uses' => 'Admin\PermissionsController@delete'
]);