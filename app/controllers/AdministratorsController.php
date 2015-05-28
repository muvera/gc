<?php

class AdministratorsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /administrators
	 *
	 * @return Response
	 */
	public function index()
	{
		//
				$orders = Order::get();
				return View::make('administrators.index')
						->with('active', 1)
						->with('orders', $orders);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /administrators/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /administrators
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /administrators/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /administrators/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /administrators/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /administrators/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function admin_categories(){
		$categories = Category::get();

		return View::make('administrators.admin_categories')
				->with('active', 2)
				->with('categories', $categories);
	}

	public function admin_products(){
		$products = Product::get();
		$styles = Style::get();

		return View::make('administrators.admin_products')
				->with('active', 3)
				->with('styles', $styles)
				->with('products', $products);
	}

	public function admin_styles(){
		$styles = Style::get();

		return View::make('administrators.admin_styles')
				->with('active', 4)
				->with('styles', $styles);
	}

	public function admin_sizes(){
		$sizes = Size::get();

		return View::make('administrators.admin_sizes')
				->with('active', 5)
				->with('sizes', $sizes);
	}


	public function product_styles($id){

		$product = Product::find($id);
		return View::make('administrators.product_styles')
				->with('active', 0)
				->with('product', $product);
	}


}