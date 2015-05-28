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
Route::post('/designs/ajax', function() {
$path = 'files/';
// Require the file once
require_once base_path('app/ajax/ImgSelect.php');


session_start();

$options = array(

	// Upload directory
	'upload_dir' => $path, 

	// Accepted file types
	'accept_file_types' => 'png|jpg|jpeg|gif',
	
	// Directory mode
	'mkdir_mode' => 0777,
	
	// File max/min size in bytes
	'max_file_size' => null,
    'min_file_size' => 1,
    
    // Image size validation
    'max_width'  => null,
    'max_height' => null,
    'min_width'  => 1,
    'min_height' => 1,

	// If the image size < crop size then force the resize
    'force_crop' => true,
    // Crop max width
    'crop_max_width' => null,
    // Crop max height
    'crop_max_height' => null,

	/**
	 *	Before upload callback
	 *
	 *  @param 	stdClass  		$image 		Properties: name, type size
	 * 	@param  ImgSelect 		$instance 	ImgSelect instance
	 *
	 *  Use $_POST['data'] to get the custom data
	 */
	'before_upload' => function($image, $instance) {
		// Set image name. By default the image will have the original name but 
		// with a number at the end if already exits
		// You can set the name to the userID or something like that 
		//$image->name = "my_image.".$image->type;
	},

	/**
	 *	Upload complete callback
	 *
	 *  @param 	stdClass  		$image 		Properties: name, type, size, path, url, width, height
	 * 	@param  ImgSelect 		$instance 	ImgSelect instance
	 *
	 *  Use $_POST['data'] to get the custom data
	 */
	'upload_complete' => function($image, $instance) {
		// Here you can save the image to database
		$image->name;
		Session::put('tester', $image->name);
	},

	/**
	 *	Before crop callback
	 *
	 *  @param 	stdClass  		$crop 		Properties: file_name, file_type, src_path, dst_path, src_h, src_w, src_y, src_x, dst_w, dst_h
	 * 	@param  ImgSelect 		$instance 	ImgSelect instance
	 *
	 *  Use $_POST['data'] to get the custom data
	 */
	'before_crop' => function($crop, $instance) {
		// You can set the crop destionaton path so the original file will be keept
		//$filename = "my_image_cropped.".$crop->file_type;
		//$crop->dst_path = $instance->getUploadPath($filename);
	},

	/**
	 *	Crop complete callback
	 *
	 *  @param 	stdClass  		$image 		Properties: name, type, path, url, width, height
	 * 	@param  ImgSelect 		$instance 	ImgSelect instance
	 *
	 *  Use $_POST['data'] to get the custom data
	 */
	'crop_complete' => function($image, $instance) {
		// Here you can save the image to database
		// using $image->name to get the image name 
	}
);

new ImgSelect($options);

// $error_messages - array of error messages to be used instead of the default ones
// See ImgSelect.php
// new ImgSelect($options, $error_messages);



   
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

