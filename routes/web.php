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
$router->get('/article/{id}', [
    'as' => "landing.article",
    'uses' => 'LandingController@article_page'
]);
$router->get('/data', [
    'as' => "landing.data",
    'uses' => 'LandingController@get_data2'
]);
$router->get('/data/article[/{limit}]', [
    'as' => "landing.articles",
    'uses' => 'LandingController@get_articles'
]);

$router->get('/data/maps/{prefix}', [
    'as' => "landing.map",
    'uses' => 'LandingController@get_map'
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
    'uses' => 'DashboardController@index2'
]);

/**
 * CONTENT
 */
$router->get('/dashboard/content/article', [
    'middleware' => 'auth',
    'as' => "content.article.index",
    'uses' => 'Content\ArticleController@index'
]);
$router->get('/dashboard/content/article/get[/{key}]', [
    'middleware' => 'auth',
    'as' => "content.article.get",
    'uses' => 'Content\ArticleController@get'
]);
$router->get('/dashboard/content/article/data', [
    'middleware' => 'auth',
    'as' => "content.article.data",
    'uses' => 'Content\ArticleController@data'
]);
$router->post('/dashboard/content/article/insert', [
    'middleware' => 'auth',
    'as' => "content.article.insert",
    'uses' => 'Content\ArticleController@insert'
]);
$router->post('/dashboard/content/article/update', [
    'middleware' => 'auth',
    'as' => "content.article.update",
    'uses' => 'Content\ArticleController@update'
]);
$router->post('/dashboard/content/article/delete', [
    'middleware' => 'auth',
    'as' => "content.article.delete",
    'uses' => 'Content\ArticleController@delete'
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
// =============================================================
// ISTILAH BARU
// =============================================================
$router->get('/dashboard/kab/suspek/update', [
    'middleware' => 'auth',
    'as' => "kabupaten.suspek.update",
    'uses' => 'Kab\SuspekController@edit'
]);
$router->post('/dashboard/kab/suspek/update', [
    'middleware' => 'auth',
    'uses' => 'Kab\SuspekController@update'
]);
$router->get('/dashboard/kab/suspek/refresh', [
    'middleware' => 'auth',
    'as' => "kabupaten.suspek.refresh",
    'uses' => 'Kab\SuspekController@refresh'
]);
$router->get('/dashboard/kab/konfirmasi/update', [
    'middleware' => 'auth',
    'as' => "kabupaten.konfirmasi.update",
    'uses' => 'Kab\KonfirmasiController@edit'
]);
$router->post('/dashboard/kab/konfirmasi/update', [
    'middleware' => 'auth',
    'uses' => 'Kab\KonfirmasiController@update'
]);
$router->get('/dashboard/kab/konfirmasi/refresh', [
    'middleware' => 'auth',
    'as' => "kabupaten.konfirmasi.refresh",
    'uses' => 'Kab\KonfirmasiController@refresh'
]);

$router->get('/dashboard/kab/map', [
    'middleware' => 'auth',
    'as' => "kabupaten.map.index",
    'uses' => 'Kab\MapController@index'
]);
$router->get('/dashboard/kab/map/get[/{key}]', [
    'middleware' => 'auth',
    'as' => "kabupaten.map.get",
    'uses' => 'Kab\MapController@get'
]);
$router->get('/dashboard/kab/map/data', [
    'middleware' => 'auth',
    'as' => "kabupaten.map.data",
    'uses' => 'Kab\MapController@data'
]);
$router->post('/dashboard/kab/map/insert', [
    'middleware' => 'auth',
    'as' => "kabupaten.map.insert",
    'uses' => 'Kab\MapController@insert'
]);
$router->post('/dashboard/kab/map/update', [
    'middleware' => 'auth',
    'as' => "kabupaten.map.update",
    'uses' => 'Kab\MapController@update'
]);
$router->post('/dashboard/kab/map/delete', [
    'middleware' => 'auth',
    'as' => "kabupaten.map.delete",
    'uses' => 'Kab\MapController@delete'
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
// =============================================================
// ISTILAH BARU
// =============================================================
$router->get('/dashboard/kota/suspek/update', [
    'middleware' => 'auth',
    'as' => "kota.suspek.update",
    'uses' => 'Kot\SuspekController@edit'
]);
$router->post('/dashboard/kota/suspek/update', [
    'middleware' => 'auth',
    'uses' => 'Kot\SuspekController@update'
]);
$router->get('/dashboard/kota/suspek/refresh', [
    'middleware' => 'auth',
    'as' => "kota.suspek.refresh",
    'uses' => 'Kot\SuspekController@refresh'
]);
$router->get('/dashboard/kota/konfirmasi/update', [
    'middleware' => 'auth',
    'as' => "kota.konfirmasi.update",
    'uses' => 'Kot\KonfirmasiController@edit'
]);
$router->post('/dashboard/kota/konfirmasi/update', [
    'middleware' => 'auth',
    'uses' => 'Kot\KonfirmasiController@update'
]);
$router->get('/dashboard/kota/konfirmasi/refresh', [
    'middleware' => 'auth',
    'as' => "kota.konfirmasi.refresh",
    'uses' => 'Kot\KonfirmasiController@refresh'
]);

$router->get('/dashboard/kota/map', [
    'middleware' => 'auth',
    'as' => "kota.map.index",
    'uses' => 'Kot\MapController@index'
]);
$router->get('/dashboard/kota/map/get[/{key}]', [
    'middleware' => 'auth',
    'as' => "kota.map.get",
    'uses' => 'Kot\MapController@get'
]);
$router->get('/dashboard/kota/map/data', [
    'middleware' => 'auth',
    'as' => "kota.map.data",
    'uses' => 'Kot\MapController@data'
]);
$router->post('/dashboard/kota/map/insert', [
    'middleware' => 'auth',
    'as' => "kota.map.insert",
    'uses' => 'Kot\MapController@insert'
]);
$router->post('/dashboard/kota/map/update', [
    'middleware' => 'auth',
    'as' => "kota.map.update",
    'uses' => 'Kot\MapController@update'
]);
$router->post('/dashboard/kota/map/delete', [
    'middleware' => 'auth',
    'as' => "kota.map.delete",
    'uses' => 'Kot\MapController@delete'
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
