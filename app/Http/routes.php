<?php
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

/*
Route::get('contact',function(){
	return view("contact.contact");
});
*/

Route::get('shoppingcart',				'ShoppingcartController@index');
Route::get('shoppingcart/add/{id}',		'ShoppingcartController@add');
Route::post('shoppingcart/add',			'ShoppingcartController@addpost');
Route::get('shoppingcart/remove/{id}',	'ShoppingcartController@remove');
Route::put('shoppingcart',				'ShoppingcartController@update');
Route::get('shoppingcart/step/1',		'ShoppingcartController@account');
Route::get('shoppingcart/step/1/adres',	'ShoppingcartController@adres');
Route::get('shoppingcart/step/2',		'ShoppingcartController@payment');

Route::post('shoppingcart/step/1/login','ShoppingcartController@login');
Route::post('shoppingcart/step/1',		'ShoppingcartController@store_adres');

/**
 * Payment Routes
 */
Route::post('shoppingcart/payment',				'PaymentController@pay');
Route::post('shoppingcart/payment/success', 	'PaymentController@success');
Route::post('shoppingcart/payment/failed', 		'PaymentController@failed');

Route::controllers([
	'auth' => 			'Auth\AuthController',
	'password' => 		'Auth\PasswordController',
]);

Route::get('contact', 'ContactController@index');
Route::post('contact', 'ContactController@send');

Route::any('{url}', 			'ContentController@index')->where('url','(.*)?');