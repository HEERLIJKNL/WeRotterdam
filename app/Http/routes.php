<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/** CMS */
Route::group(['middleware' => 'auth.admin'], function () {
	/** Dashboard */
	Route::get('admin', 'Cms\CmsController@index');

	/** Products */
	Route::get('admin/products', 				'Cms\ProductController@index');
	Route::get('admin/products/delete/{id}', 	'Cms\ProductController@delete');
	Route::post('admin/products/update', 		'Cms\ProductController@update');

	/** Categories */
	Route::get('admin/categories', 				'Cms\CategorieController@index');
	Route::get('admin/categories/delete/{id}', 	'Cms\CategorieController@destroy');
	Route::post('admin/categories/update',		'Cms\CategorieController@update');

	/** Navigation */
	Route::get('admin/navigation',				'Cms\NavigationController@index');



	Route::resource('admin/pages',				'Cms\PageController');
	Route::resource('admin/pages/{id}/delete',	'Cms\PageController@destroy');

});
/** EINDE CMS */


Route::get('/', 						'WelcomeController@index');
Route::post('imagecreate', 				'ImageCreateController@create');

Route::get('home', 						'HomeController@index');

Route::get('product/{slug}', 			'ProductController@detail');

Route::get('shoppingcart',				'ShoppingcartController@index');
Route::get('shoppingcart/add/{id}',		'ShoppingcartController@add');
Route::post('shoppingcart/add',			'ShoppingcartController@addpost');
Route::get('shoppingcart/remove/{id}',	'ShoppingcartController@remove');
Route::put('shoppingcart',				'ShoppingcartController@update');
Route::get('shoppingcart/step/1',		'ShoppingcartController@account');
Route::post('shoppingcart/step/1',		'ShoppingcartController@account_update');
Route::get('shoppingcart/step/2',		'ShoppingcartController@payment');

Route::controllers([
	'auth' => 			'Auth\AuthController',
	'password' => 		'Auth\PasswordController',
]);

Route::any('{url}', 			'ContentController@index')->where('url','(.*)?');