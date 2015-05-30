<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages.index')
			->with('active', 0);
});





Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::resource('styles', 'StylesController');
Route::resource('orders', 'OrdersController');
Route::resource('sizes', 'SizesController');
Route::resource('designs', 'DesignsController');


// Admin
Route::resource('administrators', 'AdministratorsController');
Route::get('admin', ['as'=>'admin', 'uses'=>'AdministratorsController@index']);
Route::get('admin_categories', ['as'=>'admin_categories', 'uses'=>'AdministratorsController@admin_categories']);
Route::get('admin_products', ['as'=>'admin_products', 'uses'=>'AdministratorsController@admin_products']);
Route::get('admin_styles', ['as'=>'admin_styles', 'uses'=>'AdministratorsController@admin_styles']);
Route::get('admin_sizes', ['as'=>'admin_sizes', 'uses'=>'AdministratorsController@admin_sizes']);
Route::get('product_styles', ['as'=>'product_styles', 'uses'=>'AdministratorsController@product_styles']);

// Admin uploads
Route::post('category_upload', ['as'=>'category_upload', 'uses'=>'UploadsController@category_upload']);
Route::post('product_upload', ['as'=>'product_upload', 'uses'=>'UploadsController@product_upload']);
Route::post('product_style_upload', ['as'=>'product_style_upload', 'uses'=>'UploadsController@product_style_upload']);

// Client Upload
Route::post('rectangle_upload', ['as'=>'rectangle_upload', 'uses'=>'UploadsController@rectangle_upload']);

// Designs Preview
Route::post('preview_design', ['as'=>'preview_design', 'uses'=>'UploadsController@preview_design']);

